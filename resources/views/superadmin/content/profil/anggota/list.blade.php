@extends('superadmin.layout.main')

@section('content')
<h2>Data Anggota Bala Dayak Mandor</h2>
<a href="{{ route('superadmin.anggota.create') }}"  class="btn btn-primary mb-3">Tambah data</a>
<a href="{{ route('superadmin.anggota.exportpdf') }}"  class="btn btn-success mb-3">Download Pdf</a>
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
<table class="table">
    <thead class="thead-dark">
        <tr>
            <th scope="col">No</th>
            <th scope="col">Nomor Anggota</th>
            <th scope="col">Nama</th>
            <th scope="col">Tanggal Lahir</th>
            <th scope="col">Jenis Kelamin</th>
            <th scope="col">Agama</th>
            <th scope="col">No Hp</th>
            <th scope="col">Gambar</th>
            <th scope="col">Alamat</th>
            <th scope="col">Aksi</th>
        </tr>
    </thead>
    @php $no = 1; @endphp
    <tbody>
        @foreach($anggota as $row)
        <tr>
            <td>{{ $no++ }}</td>
            <td>{{ $row->no_anggota }}</td>
            <td>{{ $row->name }}</td>
            <td>{{ $row->tgl_lahir }}</td>
            <td>{{ $row->jk }}</td>
            <td>{{ $row->agama }}</td>
            <td>{{ $row->no_hp }}</td>
            <td>
                <img src="{{ asset('storage/'.$row->image) }}" alt="Gambar.jpg" style="width: 90px;">
            </td>
            <td>{{ $row->alamat }}</td>
            <td><a href="{{ route('superadmin.anggota.edit', $row->id ) }}" class="badge bg-primary text-white"><i class="fa fa-edit"></i></a> |
                <a href="" class="badge bg-danger text-white"><i class="fa fa-trash"></i></a> |
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection