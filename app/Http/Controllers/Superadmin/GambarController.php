<?php

namespace App\Http\Controllers\Superadmin;

use App\Http\Controllers\Controller;
use App\Models\Gambar;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;

class GambarController extends Controller
{
  
    public function index()
    {
        $gambar = Gambar::latest()->get();
        return view('superadmin/content/galery/gambar/list', compact('gambar'));
    }

    
    public function create()
    {
        $gambar = Gambar::all();

        return view('superadmin/content/galery/gambar/create', compact('gambar'));
    }

    public function store(Request $request)
    {
         $validateData = $request->validate([
           
             'image' => 'image|file|max:1024',
            
           
        ]);
        // untuk mengecek apakah ada gambar atau tidak
        if($request->file('image')){
            $validateData['image'] = $request->file('image')->store('galery-images');
        }
        $validateData['excerpt'] = Str::limit(strip_tags($request->body), 200); 
        Gambar::create ($validateData);

        try {
            
            return redirect(route('superadmin.gambar.index'))->with('pesan-berhasil', 'Anda berhasil menambah data');
        } catch (\Exception $e) {
            return redirect(route('superadmin.gambar.index'))->with('pesan-gagal', 'Anda gagal menambah data');
        }
    }


    public function show(Gambar $gambar)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Gambar  $gambar
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $gambar = Gambar::findOrFail($id);
        return view('superadmin/content/galery/gambar/edit', compact('gambar'));
    }

    public function update(Request $request, $id)
    {
        $gambar= Gambar::find($id); 
        $gambar->image = $request->image;
     
        if($request->file('image')){
          
             if($request->oldImage){
                 Storage::delete($request->oldImage);
             }
             $gambar['image'] = $request->file('image')->store('post-images');
     }
        try {
            $gambar->update();
          
            return redirect(route('superadmin.gambar.index'))->with('pesan-berhasil', 'Anda berhasil mengubah data');
        } catch (\Exception $e) {
            //pesan notifikasi tidak sukses
            return redirect(route('superadmin.gambar.index'))->with('pesan-gagal', 'Anda gagal mengubah data');
        }
    }

    public function delete($id)
    {
        $gambar= Gambar::findOrFail($id);
        try{
            $gambar->delete();
            //pesan notifikasi sukses
            //redirect
            return redirect(route('superadmin.gambar.index'))->with('pesan-berhasil','Anda berhasil menghapus data');

        }catch (\Exception $e){
            //pesan notifikasi tidak sukses
            return redirect(route('superadmin.gambar.index'))->with('pesan-gagal','Anda gagal menghapus data');
        }
    }
}
