<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Userapp;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    public function index(){
        $data['user'] = DB::table('userapps')->get();
       // dd($data['user']);
        return view ('page.user',$data);
        
    }
    public function tambahUser(){
        return view ('page.inputuser');
    }
    public function save(Request $r){
        $validator = Validator::make($r->all(),[
            'nama' => 'required',
            'no_telp' => 'required',
            'alamat' => 'required',
            'email' => 'required',
            'gambar' => 'required',
            'jk' => 'required',
            

        ]);

        if ($validator->fails()){
            return redirect('input-user')
            ->withErrors($validator)
            ->withInput();
        }

        $file = $r->file('gambar');
        $fileName = $file->getClientOriginalName();
        $file->move ('gambar/',$fileName);
        

        $simpan= Userapp::insert([
            'nama'=> $r->nama,
            'no_telp'=> $r->no_telp,
            'alamat'=> $r->alamat,
            'email'=> $r->email,
            'gambar'=> $fileName,
            'jk'=> $r->jk,                  
        ]);

        if($simpan == TRUE){
            return redirect ('user')-> with('success','Data Berhasil Disimpan');
        }else{
            return redirect ('input-user')-> with('error','Data Gagals Disimpan');

        }
        }
        public function edituser($id){
            $data['user'] = DB::table('userapps')->where('id',$id)->first();
            
             return view ('page.edituser',$data);
           
            }
            public function updateuser(Request $r,$id){
                $validator = Validator::make($r->all(),[
                    'nama' => 'required',
                    'no_telp' => 'required',
                    'alamat' => 'required',
                    'email' => 'required',
                    'gambar' => 'required',
                    'jk' => 'required',
                    
        
                ]);
        
                if ($validator->fails()){
                    return redirect('edit-user')
                    ->withErrors($validator)
                    ->withInput();
                }
               
                if ($r->file ('gambar')== NULL){
                    $simpan= Userapp::where('id',$id)->update([
                        'nama'=> $r->nama,
                        'no_telp'=> $r->no_telp,
                        'alamat'=> $r->alamat,
                        'email'=> $r->email,
                        'gambar'=> $fileName,
                        'jk'=> $r->jk,                  
                    ]);
                }else {
                    $fotolama= DB::table('userapps')-> where('id',$id)->first();
                    if ($fotolama->gambar != NULL){
                        unlink('gambar/'.$fotolama->gambar);
                    }
                    $file = $r->file('gambar');
                    $fileName = $file->getClientOriginalName();
                    $file->move ('gambar/',$fileName);

                    $simpan= Userapp::where('id',$id)->update([
                        'nama'=> $r->nama,
                        'no_telp'=> $r->no_telp,
                        'alamat'=> $r->alamat,
                        'email'=> $r->email,
                        'gambar'=> $fileName,
                        'jk'=> $r->jk,                  
                    ]);
                }
               
        
                if($simpan == TRUE){
                    return redirect ('user')-> with('success','Data Berhasil Update');
                }else{
                    return redirect ('input-user')-> with('error','Data Gagal Update');
        
                }
                }
public function hapus($id)
{
    $fotolama= DB::table('userapps')-> where('id',$id)->first();
                    if ($fotolama->gambar != NULL){
                        unlink('gambar/'.$fotolama->gambar);
                    }
    $hapus = DB::table('userapps')->where('id',$id)->delete();
    if ($hapus==TRUE){
        return redirect('user')->with('success','Data Berhasil Dihapus');
    }else{
        return redirect('user')->with('error','Data Gagal Dihapus');
    }

}

            }
        




