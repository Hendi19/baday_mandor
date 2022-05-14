@extends('superadmin.layout.main')

@section('content')
<a href="{{ route('superadmin.post.create') }}"  class="btn btn-primary mb-3">Tambah data</a>
                    @if(Session::has('pesan-gagal'))
                    <div class="alert alert-danger  col-lg-10" role="alert">
                        {{Session::get('pesan-gagal')}}
                    </div>
                    @endif

                    @if(Session::has('pesan-berhasil'))
                    <div class="alert alert-success  col-lg-10" role="alert">
                        {{Session::get('pesan-berhasil')}}
                    </div>
                    @endif
<table class="table  col-lg-10">
    <thead class="thead-danger">
        <tr>
            <th scope="col">No</th>
            <th scope="col">Judul</th>
            <th scope="col">Kegiatan</th>
            <th scope="col">Gambar</th>
            <th scope="col">Aksi</th>
        </tr>
    </thead>
    @php $no = 1; @endphp
    <tbody>
        @foreach($post as $row)
        <tr>
            <td>{{ $no++ }}</td>
            <td>{{ $row->title }}</td>
            <td>{{ $row->category }}</td>
            <td>
                <img src="{{ asset('storage/'.$row->image) }}" alt="Gambar.jpg" style="width: 40px;">
            </td>
            <td><a href="{{ route('superadmin.post.edit', $row->id ) }}" class="badge bg-primary text-white"><i class="fa fa-edit"></i></a> |
                <a href="{{ route('superadmin.post.show', $row->id ) }} " class="badge bg-warning text-white"><i class="fa fa-eye"></i></a> |
                <a href="{{ route('superadmin.post.delete', $row->id ) }}" class="badge bg-danger text-white"><i class="fa fa-trash"></i></a>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection