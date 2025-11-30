<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Buku</title>

    <!-- jQuery Slim -->
    <script src="https://code.jquery.com/jquery-3.7.1.slim.min.js"></script>

    <!-- Ocean Blue Cute Style -->
    <style>
        body {
            background-color: #d7f3ff;
            font-family: Arial, sans-serif;
        }

        form {
            background: #6ec9ff;
            padding: 20px;
            border-radius: 20px;
            width: 350px;
            margin: 50px auto;
            color: #003d5c;
            font-weight: bold;
            box-shadow: 0 0 10px #40a9ff;
        }

        button {
            background: linear-gradient(45deg, #0077b6, #00b4d8);
            border: none;
            padding: 12px 25px;
            border-radius: 25px;
            color: white;
            font-size: 16px;
            font-weight: bold;
            cursor: pointer;
            position: relative;
            animation: glitter 1.5s infinite linear;
            box-shadow: 0 0 10px #0096c7;
            transition: 0.3s;
        }

        button:hover {
            transform: scale(1.08);
            box-shadow: 0 0 20px #48cae4;
        }

        @keyframes glitter {
            0% { box-shadow: 0 0 5px #caf0f8; }
            50% { box-shadow: 0 0 15px #e0fbff; }
            100% { box-shadow: 0 0 5px #caf0f8; }
        }

        a {
            display: block;
            text-align: center;
            margin-top: 15px;
            color: #005f7f;
            font-weight: bold;
        }

        input, select {
            padding: 6px;
            border: 2px solid #ade8f4;
            border-radius: 8px;
            margin-top: 5px;
            margin-bottom: 8px;
            width: 95%;
        }

        input:focus, select:focus {
            border-color: #00b4d8;
            outline: none;
            box-shadow: 0 0 8px #90e0ef;
        }
    </style>

    <script>
        $(document).ready(function() {
            $("button").click(function() {
                alert("🌊📚 Data buku berhasil disiapkan untuk disimpan! 💙✨");
            });
        });
    </script>

</head>
<body>

    <form action="{{ url('buku/save') }}" method="POST" accept-charset="utf-8">
        @csrf
        <input type="hidden" name="id" value="">
        <input type="hidden" name="is_update" value="{{ $is_update }}">

        Judul :
        <input type="text" name="Judul" maxlength="100">

        <br>Pengarang:
        <input type="text" name="Pengarang" maxlength="150">

        <br>Kategori:
        <select name="Kategori">
            @foreach ($optkategori as $key => $value)
                <option value="{{ $key }}">{{ $value }}</option>
            @endforeach
        </select>
        <br><br>
        <button type="submit" class="sparkle-btn">🌊 Simpan</button>
    </form>

    <a href="{{ url('buku') }}">Kembali</a>

</body>
</html>
