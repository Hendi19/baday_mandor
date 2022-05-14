<!DOCTYPE html>
<html>

<head>
    <style>
        #customers {
            font-family: Arial, Helvetica, sans-serif;
            border-collapse: collapse;
            width: 100%;
        }

        #customers td,
        #customers th {
            border: 1px solid #ddd;
            padding: 8px;
        }

        #customers tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        #customers tr:hover {
            background-color: #ddd;
        }

        #customers th {
            padding-top: 12px;
            padding-bottom: 12px;
            text-align: center;
            background-color: #04AA6D;
            color: white;
        }
        .judul{
            text-align: center;
        }
    </style>
</head>

<body>

    <h3 class="judul">Daftar Anggota Bala Dayak Mandor</h3>

    <table id="customers">
        <thead>
            <tr>
                <th scope="col">No</th>
                <th scope="col">Nomor Anggota</th>
                <th scope="col">Nama</th>
                <th scope="col">Tanggal Lahir</th>
                <th scope="col">Jenis Kelamin</th>
                <th scope="col">Agama</th>
                <th scope="col">Nomor Hp</th>
                <th scope="col">Alamat</th>
            </tr>
        </thead>
        @php $no = 1; @endphp
        @foreach($anggota as $row)
        <tr>
            <td>{{ $no++ }}</td>
            <td>{{ $row->no_anggota }}</td>
            <td>{{ $row->name }}</td>
            <td>{{ $row->tgl_lahir }}</td>
            <td>{{ $row->jk }}</td>
            <td>{{ $row->agama }}</td>
            <td>{{ $row->no_hp }}</td>
            <td>{{ $row->alamat }}</td>

        </tr>
        @endforeach

    </table>

</body>

</html>