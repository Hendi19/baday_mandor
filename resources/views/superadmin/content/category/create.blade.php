@extends('superadmin.layout.main')

@section('content')

    <form action="{{ route('superadmin.category.store') }}" method="post" enctype="multipart/form-data" class="col-lg-6">
        @csrf
        <div class="form-group">
            <label for="inputAddress">Nama Kategori Kegiatan</label>
            <input type="text" class="form-control" name="name" id="name" placeholder="kategori Kegiatan" required>
        </div>
        <div class="form-group">
            <label for="inputAddress">Slug Kategori Kegiatan</label>
            <input type="text" class="form-control" name="slug" id="slug" placeholder="kategori Kegiatan" required>
        </div>

        <button type="submit" class="btn btn-primary">Tambah</button>
    </form>

@endsection