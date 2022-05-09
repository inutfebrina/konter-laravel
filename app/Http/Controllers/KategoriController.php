<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Kategoriapp;
use Illuminate\Support\Facades\DB;


class KategoriController extends Controller
{
    public function index(){
       
        $kategori['kategori'] = DB::table('kategoriapps')->get();
       
        // dd($kategori['kategori']);
        return view ('page.kategori',$kategori);
        
    }
    public function tambahKategori(){
        return view ('page.inputkategori');
    }
    public function save(Request $r){
        $validator = Validator::make($r->all(),[
            'provider' => 'required',
            'gambar' => 'required',

                    
        ]);

        if ($validator->fails()){
            return redirect('input-kategori')
            ->withErrors($validator)
            ->withInput();
        }

        $file = $r->file('gambar');
       
        $fileName = $file->getClientOriginalName();
        $file->move ('gambar/',$fileName);
        
        $simpan= Kategoriapp::insert([
            'provider'=> $r->provider,
            'gambar'=> $fileName,
               
        ]);

        if($simpan == TRUE){
            return redirect ('kategori')-> with('success','Data Berhasil Disimpan');
        }else{
            return redirect ('input-kategori')-> with('error','Data Gagal Disimpan');

        }
        }
        public function editkategori($id){
            $kategori['kategori'] = DB::table('kategoriapps')->where('id',$id)->first();
            
             return view ('page.editkategori',$kategori);
           
            }


            public function updatekategori(Request $r,$id){
                $validator = Validator::make($r->all(),[
                    'provider' => 'provider',
                    
                                       
        
                ]);
        
                // if ($validator->fails()){
                //     return redirect('edit-kategori')
                //     ->withErrors($validator)
                //     ->withInput();
                // }
                if ($r->file ('gambar')== NULL){
                $simpan= Kategoriapp::where('id',$id)->update([
                    'provider'=> $r->provider,
                     'gambar'=> $fileName,
                 
                             
                ]);
            }else {
                $fotolama= DB::table('kategoriapps')-> where('id',$id)->first();
                if ($fotolama->gambar != NULL){
                    unlink('gambar/'.$fotolama->gambar);
                }
                $file = $r->file('gambar');
                $fileName = $file->getClientOriginalName();
                $file->move ('gambar/',$fileName);

                $simpan= Kategoriapp::where('id',$id)->update([
                    'provider'=> $r->provider,
                     'gambar'=> $fileName,          
                ]);
            }
                if($simpan == TRUE){
                    return redirect ('kategori')-> with('success','Data Berhasil Update');
                }else{
                    return redirect ('input-kategori')-> with('error','Data Gagal Update');
        
                }
                }
public function hapus($id)
{
    $hapus = DB::table('kategoriapps')->where('id',$id)->delete();
    if ($hapus==TRUE){
        return redirect('kategori')->with('success','Data Berhasil Dihapus');
    }else{
        return redirect('kategori')->with('error','Data Gagal Dihapus');
    }

}

}
