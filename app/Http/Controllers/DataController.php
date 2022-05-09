<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Dataapp;
use Illuminate\Support\Facades\DB;

class DataController extends Controller
{
    public function index(){
        $data['data'] = DB::table('dataapps')->get();
       // dd($data['data']);
        return view ('page.data',$data);
        
    }
    public function tambahData(){
        return view ('page.inputdata');
    }
    public function save(Request $r){
        $validator = Validator::make($r->all(),[
            'nama' => 'required',
                    
        ]);

        if ($validator->fails()){
            return redirect('input-data')
            ->withErrors($validator)
            ->withInput();
        }

        $simpan= Dataapp::insert([
            'nama'=> $r->nama,
               
        ]);

        if($simpan == TRUE){
            return redirect ('data')-> with('success','Data Berhasil Disimpan');
        }else{
            return redirect ('input-data')-> with('error','Data Gagal Disimpan');

        }
        }
        public function editdata($id){
            $data['data'] = DB::table('dataapps')->where('id_data',$id)->first();
            
             return view ('page.editdata',$data);
           
            }
            public function updatedata(Request $r,$id){
                $validator = Validator::make($r->all(),[
                    'nama' => 'required',
                    
                    
        
                ]);
        
                if ($validator->fails()){
                    return redirect('edit-data')
                    ->withErrors($validator)
                    ->withInput();
                }
        
                $simpan= Dataapp::where('id_data',$id)->update([
                    'nama'=> $r->nama,
                 
                             
                ]);
        
                if($simpan == TRUE){
                    return redirect ('data')-> with('success','Data Berhasil Update');
                }else{
                    return redirect ('input-data')-> with('error','Data Gagal Update');
        
                }
                }
public function hapus($id)
{
    $hapus = DB::table('dataapps')->where('id_data',$id)->delete();
    if ($hapus==TRUE){
        return redirect('data')->with('success','Data Berhasil Dihapus');
    }else{
        return redirect('data')->with('error','Data Gagal Dihapus');
    }

}
}
