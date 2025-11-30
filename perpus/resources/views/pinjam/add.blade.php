<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>Tambah Peminjaman Buku</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">

    <style>
        body {
            background-color: #f8f9fa;
        }

        .card {
            border-radius: 15px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
        }

        h2 {
            font-weight: 600;
        }

        .btn-custom {
            border-radius: 10px;
        }
    </style>
</head>

<body>

    <div class="container my-5">
        <div class="card">
            <div class="card-header bg-primary text-white">
                <h2 class="mb-0">📖 Tambah Peminjaman Buku</h2>
            </div>

            <div class="card-body">

                <form action="{{ url('pinjam/save') }}" method="POST" id="formPinjam">
                    @csrf

                    <!-- Anggota -->
                    <div class="form-group">
                        <label><strong>Anggota</strong></label>
                        <select name="ID_Anggota" class="form-control">
                            <option value="">- Pilih Anggota -</option>
                            @foreach ($optanggota as $key => $value)
                                <option value="{{ $key }}">{{ $value }}</option>
                            @endforeach
                        </select>
                    </div>

                    <!-- Buku -->
                    <div class="form-group">
                        <label><strong>Buku</strong></label>
                        <select name="ID_Buku" class="form-control">
                            <option value="">- Pilih Buku -</option>
                            @foreach ($optbuku as $key => $value)
                                <option value="{{ $key }}">{{ $value }}</option>
                            @endforeach
                        </select>
                    </div>

                    <!-- Tanggal Pinjam -->
                    <div class="form-group">
                        <label><strong>Tanggal Pinjam</strong></label>
                        <input type="date" name="tgl_pinjam" class="form-control">
                    </div>

                    <!-- Tanggal Kembali -->
                    <div class="form-group">
                        <label><strong>Tanggal Kembali</strong></label>
                        <input type="date" name="tgl_kembali" class="form-control">
                    </div>

                    <div class="d-flex justify-content-between mt-4">
                        <a href="{{ url('pinjam') }}" class="btn btn-secondary btn-custom">← Kembali</a>
                        <div>
                            <button type="reset" class="btn btn-warning btn-custom">Batal</button>
                            <button type="submit" class="btn btn-primary btn-custom">Simpan</button>
                        </div>
                    </div>
                </form>
