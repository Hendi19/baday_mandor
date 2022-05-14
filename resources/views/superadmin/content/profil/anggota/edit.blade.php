@extends('superadmin.layout.main')

@section('content')

<div class="col-lg-8">
    <h2>Tambah Data Anggota</h2>
    <form action="{{ route('superadmin.anggota.update',$anggota->id) }}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label for="no_anggota" class="form-label ">Nomor Anggota :</label>
            <input type="text" class="form-control " id="no_anggota" name="no_anggota" value="{{ $anggota->no_anggota}}">
        </div>
        <div class="mb-3">
            <label for="name" class="form-label">Nama Anggota :</label>
            <input type="text" class="form-control" id="name" name="name" value="{{ $anggota->name}}">
        </div>
        <div class="mb-3">
            <label for="tgl_lahir" class="form-label ">Tanggal Lahir :</label>
            <input type="date" class="form-control " id="tgl_lahir" name="tgl_lahir" value="{{ $anggota->tgl_lahir}}">
        </div>
        <div class="form-group">
            <label for="exampleFormControlSelect2">Jenis Kelamin</label>
            <select name="jk" class="form-control">
                <option disabled>{{ $anggota->jk }}</option>
                <option value="P">Perempuan</option>
                <option value="L">Laki-Laki</option>
            </select>
        </div>
        <div class="form-group">
            <label for="exampleFormControlSelect2">Agama Anggota</label>
            <select name="agama" class="form-control">
            <option disabled>{{ $anggota->agama }}</option>
                <option value="Katolik">Katolik</option>
                <option value="Protestan">Protestan</option>
                <option value="Islam">Islam</option>
                <option value="Hindu">Hindu</option>
                <option value="Buddha">Buddha</option>
                <option value="Khonghucu">Khonghucu</option>
            </select>
        </div>
        <div class="mb-3">
            <label for="no_hp" class="form-label ">Nomor HP :</label>
            <input type="text" class="form-control " id="no_hp" name="no_hp" value="{{ $anggota->no_hp }}">
        </div>
        <div class="mb-3">
            <label for="image" class="form-label ">Masukan Gambar</label>
            <!-- untuk memberi tahu bahwa gambar lama ada atau tidak -->
            <input type="hidden" name="oldImage" value="{{ $anggota->image}}">
            @if($anggota->image)
            <img src="{{ asset('storage/'.$anggota->image) }}" class="img-preview img-fluid mb-3 col-sm-5 d-block">
            @else
            <img class="img-preview img-fluid mb-3 col-sm-5">
            @endif
            <!-- preview anggota -->
            <input class="form-control @error('image') is-invalid @enderror" type="file" id="image1" name="image" onchange="previewImage()">
            <!-- <input class="form-control @error('image') is-invalid @enderror" type=" file" id="image" name="image" onchange="previewImage()"> -->
            @error('image')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="alamat" class="form-label ">Alamat :</label>
            <input type="text" class="form-control " id="alamat"  name="alamat" value="{{ $anggota->alamat }}">
        </div>


        <button type="submit" class="btn btn-primary">Buat Data</button>
    </form>
</div>
<script>
    // fungsi script untuk preview gambar
    function previewImage() {
        const image = document.querySelector('#image');
        const imgPreview = document.querySelector('.img-preview');

        imgPreview.style.display = 'block';

        const oFReader = new FileReader();
        oFReader.readAsDataURL(image.files[0]);

        oFReader.onload = function(oFREvent) {
            imgPreview.src = oFREvent.target.result;
        }

    }
</script>

@endsection