<?php

namespace App\Http\Controllers\Superadmin;

use App\Http\Controllers\Controller;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;


class CategoryController extends  Controller
{
    public function index()
    {
        Session::put('title', 'Data Kategori');
        $category = Category::latest()->get();
        return view('superadmin/content/category/list', compact('category'));
       
    }

    public function create()
    {
      
        // $category = Category::all();

        return view('superadmin/content/category/create');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|string|max:100'
        ]);

        $category = Category::create([
            'name' => $request->name,
            'slug' => Str::slug($request->name)
        ]);


        try {
            $category->save();
            return redirect(route('superadmin.category.index'))->with('pesan-berhasil', 'Anda berhasil menambah data');
        } catch (\Exception $e) {
            return redirect(route('superadmin.category.index'))->with('pesan-gagal', 'Anda gagal menambah data');
        }
    }

    public function  edit($id)
    {
       
        $category = Category::findOrFail($id);
        return view('superadmin/content/category/edit', compact('category'));
    }

    public function update(Request $request, $id)
    {
       

        $category = Category::find($id); 
        $category->name = $request->name;
        $category->slug = $request->slug;
        //     dd($category);
        try {
            $category->update();
            //pesan notifikasi sukses
            //redirect
            return redirect(route('superadmin.category.index'))->with('pesan-berhasil', 'Anda berhasil mengubah data');
        } catch (\Exception $e) {
            //pesan notifikasi tidak sukses
            return redirect(route('superadmin.category.index'))->with('pesan-gagal', 'Anda gagal mengubah data');
        }
    }

    public function delete($id)
    {
        //pastikan ada data
        $category = Category::findOrFail($id);

        // dd($category);
        try {
            $category->delete();
            //pesan notifikasi sukses
            //redirect
            return redirect(route('superadmin.category.index'))->with('pesan-berhasil', 'Anda berhasil menghapus data');
        } catch (\Exception $e) {
            //pesan notifikasi tidak sukses
            return redirect(route('superadmin.category.index'))->with('pesan-gagal', 'Anda gagal menghapus data');
        }
    }
}
