<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Anggota</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- jQuery Slim -->
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.4/dist/jquery.slim.min.js"></script>

</head>
<body class="container mt-5">

    <h2 class="mb-4 text-center">📋 Daftar Anggota</h2>

    <a href="{{ url('anggota/add') }}" class="btn btn-primary mb-3">Tambah Anggota Baru</a>

    <table class="table table-bordered table-striped text-center">
        <thead class="table-dark">
            <tr>
                <th>ID</th>
                <th>NIM</th>
                <th>Nama</th>
                <th>Progdi</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($query as $item)
            <tr>
                <td>{{ $item->ID_Anggota }}</td>
                <td>{{ $item->nim }}</td>
                <td>{{ $item->nama }}</td>
                <td>{{ $item->progdi }}</td>
                <td>
                    <a href="{{ url('anggota/edit/'.$item->ID_Anggota) }}" class="btn btn-warning btn-sm">Ubah</a>
                    <a href="{{ url('anggota/delete/'.$item->ID_Anggota) }}" class="btn btn-danger btn-sm" onclick="return confirm('Yakin mau hapus?')">Hapus</a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>