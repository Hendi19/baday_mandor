@extends('superadmin.layout.main')

@section('content')
    <h2>List Gambar Galery</h2>
    <hr>
    <a href="{{ route('superadmin.gambar.create') }}" class="btn btn-primary mb-3">Tambah Gambar</a>
                    @if(Session::has('pesan-gagal'))
                    <div class="alert alert-danger  col-lg-6" role="alert">
                        {{Session::get('pesan-gagal')}}
                    </div>
                    @endif

                    @if(Session::has('pesan-berhasil'))
                    <div class="alert alert-success  col-lg-6" role="alert">
                        {{Session::get('pesan-berhasil')}}
                    </div>
                    @endif
<table class="table  col-lg-6">
    <thead class="thead-dark">
        <tr>
            <th scope="col">No</th>
            <th scope="col">Gambar</th>
            <th scope="col">Action</th>
        </tr>
    </thead>
    @php $no = 1; @endphp
    <tbody>
    @foreach($gambar as $row)
        <tr>
            <td>{{ $no++ }}</td>
            <td>
                <img src="{{ asset('storage/'.$row->image) }}" alt="gambar" style="width: 70px;">
            </td>
            <td><a href="{{ route('superadmin.gambar.edit', $row->id ) }}" class="badge bg-primary text-white"><i class="fa fa-edit"></i></a> |
                <a href="{{ route('superadmin.gambar.delete', $row->id ) }}" class="badge bg-danger text-white"><i class="fa fa-trash"></i></a>
            </td>
        </tr>
    @endforeach 
    </tbody>
</table>
@endsection