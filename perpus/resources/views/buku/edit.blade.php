<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Buku</title>

    {{-- Bootstrap CSS --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">

    {{-- Custom Sea Blue Style --}}
    <style>
        body {
            background: linear-gradient(to bottom, #0077b6, #00b4d8);
            color: #ffffff;
        }
        .card {
            background: rgba(255, 255, 255, 0.15);
            padding: 20px;
            border-radius: 12px;
            backdrop-filter: blur(6px);
        }
        button {
            transition: 0.3s ease;
        }
        button:hover {
            background-color: #03045e !important;
            transform: scale(1.05);
        }
        h2 {
            font-weight: bold;
            text-shadow: 1px 1px 3px #000;
        }
    </style>
</head>
<body class="container mt-5">

    <div class="card shadow-lg p-4">
        <h2>Edit Data Buku 📘</h2>
        <hr>

        <form action="{{ url('buku/save') }}" method="post">
            @csrf

            <input type="hidden" name="id" value="{{ $query->ID_Buku }}">
            <input type="hidden" name="is_update" value="{{ $is_update }}">

            <label>Judul</label>
            <input type="text" name="Judul" value="{{ $query->Judul }}" class="form-control mb-3">

            <label>Pengarang</label>
            <input type="text" name="Pengarang" value="{{ $query->Pengarang }}" class="form-control mb-3">

            <label>Kategori</label>
            <select name="Kategori" class="form-control mb-3">
                @foreach ($optkategori as $key => $value)
                <option value="{{ $key }}" @if($key == $query->Kategori) selected @endif>
                    {{ $value }}
                </option>
                @endforeach
            </select>

            <button type="submit" class="btn btn-warning font-weight-bold">Update 🌟</button>
        </form>

        <br>
        <a href="{{ url('buku') }}" class="btn btn-secondary">Kembali</a>
    </div>

    {{-- jQuery Slim --}}
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.4/dist/jquery.slim.min.js"></script>

    {{-- Small Animation Script --}}
    <script>
        $(document).ready(function(){
            $("input, select").focus(function(){
                $(this).css("background", "#caf0f8");
            }).blur(function(){
                $(this).css("background", "white");
            });
        });
    </script>

    {{-- Bootstrap JS --}}
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
