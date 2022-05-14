<?php

namespace App\Http\Controllers\Superadmin;

use App\Http\Controllers\Controller;
use App\Models\Anggota;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use PDF;
use Mpdf\Mpdf;
use PhpOffice\PhpSpreadsheet\Writer\Pdf\Mpdf as PdfMpdf;
class AnggotaController extends Controller
{
   
    public function index()
    {
      
        $anggota = anggota::latest()->get();
        return view('superadmin/content/profil/anggota/list', compact('anggota'));
    }

    public function create()
    {
        $anggota = Anggota::all();
        return view('superadmin/content/profil/anggota/create');
    }

    public function store(Request $request)
    {
        $validateData = $request->validate([
            'no_anggota' => 'required|unique:anggota',
            'name' => 'required|max:25',
             'tgl_lahir' => 'required',
             'jk' => 'required',
             'agama' => 'required',
             'no_hp' => 'required|max:12',
             'image' => 'image|file|max:1024',
             'alamat' => 'required'
           
       ]);
       if($request->file('image')){
           $validateData['image'] = $request->file('image')->store('anggota-images');
       }
       Anggota::create ($validateData);

       try {
           
           return redirect(route('superadmin.anggota.index'))->with('pesan-berhasil', 'Anda berhasil menambah data');
       } catch (\Exception $e) {
           return redirect(route('superadmin.anggota.index'))->with('pesan-gagal', 'Anda gagal menambah data');
       }
    }


    public function edit($id)
    {
        return view('superadmin/content/profil/anggota/edit',[
            'anggota' => Anggota::findOrFail($id), 
        ]);
    }

    public function update(Request $request, $id)
    {
        $anggota= Anggota::find($id); 
        $anggota->no_anggota = $request->no_anggota;
        $anggota->name = $request->name;
        $anggota->tgl_lahir = $request->tgl_lahir;
        $anggota->jk = $request->jk;
        $anggota->agama = $request->agama;
        $anggota->no_hp = $request->no_hp;
        $anggota->image = $request->image;
        $anggota->alamat = $request->alamat;
         
        // pengecekan slug jika ada perubahan saat melakukan edit
     
        if($request->file('image')){
            // cek dulu apakah gambar lama ada jika ada dihapus
             if($request->oldImage){
                 Storage::delete($request->oldImage);
             }
             $anggota['image'] = $request->file('image')->store('anggota-images');
     }
        try {
            $anggota->update();
            //pesan notifikasi sukses
            //redirect
            return redirect(route('superadmin.anggota.index'))->with('pesan-berhasil', 'Anda berhasil mengubah data');
        } catch (\Exception $e) {
            //pesan notifikasi tidak sukses
            return redirect(route('superadmin.anggota.index'))->with('pesan-gagal', 'Anda gagal mengubah data');
        }
    }

    public function destroy(Anggota $anggota)
    {
        //
    }

    public function exportpdf()
    {
        $anggota = Anggota::all();
        view()->share('anggota', $anggota);
        $pdf = PDF::loadview('superadmin/content/profil/anggota/data-pdf');
        return $pdf->download('anggota.pdf');
    }
}
