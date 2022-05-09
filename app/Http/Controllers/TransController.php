<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Transapp;
use Illuminate\Support\Facades\DB;

class TransController extends Controller
{
    public function index($tanggal = null){
        // dd($tanggal);
        if($tanggal == null)
        {
            $data['trans'] = DB::table('transapps')
            ->get();
        }else{
            $data['trans'] = DB::table('transapps')
            ->where('tgl',$tanggal)
            ->get();

        }
       // 
        return view ('page.trans',$data);
        
    }
    public function tambahTrans(){
        $data['keranjangtmps']= DB::table('keranjangtmps')->join('barangapps','barangapps.id_barang','keranjangtmps.id_barang')->get();
        $data['barangapp']= DB::table('barangapps') ->get();

        $dataInv = DB::table('transapps')->orderBy('id_trans','DESC')->first();
        if($dataInv != NULL)
        {
            $kode = $dataInv->invoice + 1;
            $invoice = str_pad($kode,6,'0',STR_PAD_LEFT);
        }else{
            $kode = 1;$invoice = str_pad($kode,6,'0',STR_PAD_LEFT);
            $invoice = str_pad($kode,6,'0',STR_PAD_LEFT);
        }
        $data['invoice'] = $invoice;
        
        return view ('page.inputtrans',$data);
    }

    public function keranjang(Request $r)
    {
        $validator = Validator::make($r->all(),[
            'id_barang' => 'required'
            
        ]);

        if ($validator->fails()){
            return redirect('input-trans')
            ->withErrors($validator)
            ->withInput();
        }else{
            // ambil harga barang dari id barang
            $barang = DB::table('barangapps')->where('id_barang',$r->id_barang)->first();
            // stelah data hargabarang di dapat maka jumlah dikali harga
            $harga = $barang->harga_jl;
            
            $total = $harga * $r->jumlah;


            $simpan= DB::table('keranjangtmps')->insert([
                'id_barang'=> $r->id_barang,
                'tgl'=> date('Y-m-d'),
                'terjual'=> $r->jumlah,
                'ket'=> $r->keterangan,
                'total'=> $total,
                   
            ]);
        }

        if($simpan == TRUE){
            return redirect ('input-trans')-> with('success','Data Berhasil Disimpan');
        }else{
            return redirect ('input-trans')-> with('error','Data Gagal Disimpan');
        }
    }

    public function save(Request $r){
        
            // simpan data ke dalam table transaksi
            $tgl = date('Y-m-d');
            $invoice = $r->invoice;

            $id_trans = DB::table('transapps')->insertGetId([
                'tgl' => $tgl,
                'invoice' => $invoice
            ]);

            // pindahkan semua data dari table keranjang tmp ke dalam tabel keranjang
            $data = DB::table('keranjangtmps')->get();
            foreach($data as $isi)
            {
                $stok = DB::table('barangapps')->where('id_barang',$isi->id_barang)->first();
                $total = $stok->stok - $isi->terjual;
                DB::table('barangapps')->where('id_barang',$isi->id_barang)->update(['stok' => $total ]);
                DB::table('keranjangapps')->insert([
                    'id_trans' => $id_trans,
                    'id_barang' => $isi->id_barang,
                    'tgl' => $isi->tgl,
                    'terjual' => $isi->terjual,
                    'ket' => $isi->ket,
                    'total' => $isi->total,
                    
                ]);
            }

            // setelah data berhasil dipindahkan maka kosongkan kernajang tmp
            $simpan = DB::table('keranjangtmps')->delete();

        if($simpan == TRUE){
            return redirect ('trans')-> with('success','Data Berhasil Disimpan');
        }else{
            return redirect ('input-trans')-> with('error','Data Gagal Disimpan');

        }
    }

    public function cetaktrans($id){
          

            $data['trans'] = DB::table('transapps')->where('transapps.id_trans',$id)->first();

            $data['detail'] = DB::table('keranjangapps')->join('barangapps','keranjangapps.id_barang','barangapps.id_barang')->where('id_trans',$id)->get();
            
            // $data['barangapp']= DB::table('barangapps')->get();
            // $data['kategoriapp']= DB::table('kategoriapps') ->get();
            // $data['dataapp']= DB::table('dataapps') ->get();
         
        
             return view ('page.cetaktrans',$data);
           
        }
        public function dettrans($id){
          

            $data['trans'] = DB::table('transapps')->where('transapps.id_trans',$id)->first();

            $data['detail'] = DB::table('keranjangapps')->join('barangapps','keranjangapps.id_barang','barangapps.id_barang')
            ->join('kategoriapps','barangapps.id','=','kategoriapps.id')
            ->join('dataapps','barangapps.id_data','=','dataapps.id_data')
            ->where('id_trans',$id)->get();
            
          
        
             return view ('page.dettrans',$data);
           
        }
public function hapus($id)
{
    $hapus = DB::table('transapps')->where('id_trans',$id)->delete();
    if ($hapus==TRUE){
        return redirect('trans')->with('success','Data Berhasil Dihapus');
    }else{
        return redirect('trans')->with('error','Data Gagal Dihapus');
    }

}
public function data(Request $request)
{
    $id_barang = $request->id_barang;
   // dd($id_barang);
    $barang= DB::table('barangapps')
    
    ->join('kategoriapps','barangapps.id','=','kategoriapps.id')

     ->join('dataapps','barangapps.id_data','=','dataapps.id_data')
    ->where('barangapps.id_barang',$id_barang)
    ->first();
    // dd($barang);
    $data =[
        'message' => 'ok',
        'data'=> $barang,
    ];

    return response()->json ($data);
}

public function filtertanggal(Request $r)
{
    $tanggal = $r->tanggal;
    return redirect('trans/'.$tanggal);
}

}
