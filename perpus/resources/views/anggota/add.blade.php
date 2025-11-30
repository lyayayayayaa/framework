<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Anggota</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- jQuery Slim -->
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.4/dist/jquery.slim.min.js"></script>
</head>

<body class="container mt-5">

    <h2 class="text-center mb-4">➕ Tambah Anggota Baru</h2>

    <div class="card shadow p-4">
        <form action="{{ url('anggota/save') }}" method="POST" accept-charset="utf-8">
            @csrf

            <input type="hidden" name="id" value="">
            <input type="hidden" name="is_update" value="{{ $is_update }}">

            <div class="mb-3">
                <label class="form-label">NIM</label>
                <input type="text" name="nim" class="form-control" maxlength="100" required>
            </div>

            <div class="mb-3">
                <label class="form-label">Nama</label>
                <input type="text" name="nama" class="form-control" maxlength="150" required>
            </div>

            <div class="mb-3">
                <label class="form-label">Progdi</label>
                <select name="progdi" class="form-select">
                    @foreach ($optprogdi as $key => $value)
                        <option value="{{ $key }}">{{ $value }}</option>
                    @endforeach
                </select>
            </div>

            <button type="submit" class="btn btn-success w-100">Simpan</button>
        </form>

        <a href="{{ url('anggota') }}" class="btn btn-secondary w-100 mt-3">Kembali</a>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
