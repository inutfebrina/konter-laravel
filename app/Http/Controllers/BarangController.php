<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Barangapp;
use Illuminate\Support\Facades\DB;

class BarangController extends Controller
{
    public function index(){
        $data['barang'] = DB::table('barangapps')
        ->join('kategoriapps','barangapps.id','=','kategoriapps.id')
        ->join('dataapps','barangapps.id_data','=','dataapps.id_data')
        ->get();
       // dd($data['barang']);
        return view ('page.barang',$data);
        
    }
    public function tambahBarang(){
        $data['kategoriapp']= DB::table('kategoriapps') ->get();
        $data1['dataapp']= DB::table('dataapps') ->get();
        
        return view ('page.inputbarang',$data,$data1);
    }
    public function save(Request $r){
        $validator = Validator::make($r->all(),[
            'kategoriapp_privat' => 'required',
            'dataapp_privat' => 'required',
            
            'nm_barang' => 'required',
            'harga_bl' => 'required',
            'harga_jl' => 'required',
            'stok' => 'required',
            'unit' => 'required',
            // 'terjual' => 'required',
            
            

        ]);

        if ($validator->fails()){
            return redirect('input-barang')
            ->withErrors($validator)
            ->withInput();
        }else{
            $simpan= Barangapp::insert([
                'id'=> $r->kategoriapp_privat,
                'id_data'=> $r->dataapp_privat,

                'nm_barang'=> $r->nm_barang,
                'harga_bl'=> $r->harga_bl,
                'harga_jl'=> $r->harga_jl,
                'stok'=> $r->stok,
                'unit'=> $r->unit,                  
                // 'terjual'=> $r->terjual,                  
                   
            ]);
        }

       

        if($simpan == TRUE){
            return redirect ('barang')-> with('success','Data Berhasil Disimpan');
        }else{
            return redirect ('input-barang')-> with('error','Data Gagal Disimpan');

        }
        }
        public function editbarang($id){
            $data['barang'] = DB::table('barangapps')->where('id_barang',$id)->first();
            $data['kategoriapp']= DB::table('kategoriapps') ->get();
            // where('id',$id)->first();
            $data['dataapp']= DB::table('dataapps') ->get();
            // where('id_data',$id)->first();
        
             return view ('page.editbarang',$data);
           
            }
            public function updatebarang(Request $r,$id){
                $validator = Validator::make($r->all(),[
                    'kategoriapp_privat' => 'required',
                    'dataapp_privat' => 'required',
                    
                    'nm_barang' => 'required',
                    'harga_bl' => 'required',
                    'harga_jl' => 'required',
                    'stok' => 'required',
                    'unit' => 'required',
                    // 'terjual' => 'required',
                    
                    
        
                ]);
        
                if ($validator->fails()){
                    return redirect('edit-barang')
                    ->withErrors($validator)
                    ->withInput();
                }
        
                $simpan= Barangapp::where('id_barang',$id)->update([
                    'id'=> $r->kategoriapp_privat,
                    'id_data'=> $r->dataapp_privat,
                    
                    'nm_barang'=> $r->nm_barang,
                    'harga_bl'=> $r->harga_bl,
                    'harga_jl'=> $r->harga_jl,
                    'stok'=> $r->stok,
                    'unit'=> $r->unit,                  
                    // 'terjual'=> $r->terjual,                  
                             
                ]);
        
                if($simpan == TRUE){
                    return redirect ('barang')-> with('success','Data Berhasil Update');
                }else{
                    return redirect ('edit-barang')-> with('error','Data Gagal Update');
        
                }
                }
public function hapus($id)
{
    $hapus = DB::table('barangapps')->where('id_barang',$id)->delete();
    if ($hapus==TRUE){
        return redirect('barang')->with('success','Data Berhasil Dihapus');
    }else{
        return redirect('barang')->with('error','Data Gagal Dihapus');
    }

}
}
