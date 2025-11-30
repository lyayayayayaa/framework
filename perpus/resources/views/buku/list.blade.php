<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Buku</title>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">

    <!-- Tema Biru Laut -->
    <style>
        body {
            background: linear-gradient(135deg, #b3e5ff, #e6faff);
            font-family: "Comic Sans MS", cursive, sans-serif;
            text-align: center;
            padding: 20px;
            color: #004f7c;
        }
        h2 {
            font-weight: bold;
            text-shadow: 2px 2px #ffffff;
            margin-bottom: 20px;
        }
        table {
            background: #ffffffcc;
            border-radius: 12px;
            width: 90%;
            margin: auto;
        }
        th {
            background: #007bff;
            color: white;
        }
        td {
            color: #004b70;
        }
        tr:hover {
            background-color: #d8f2ff;
            transition: 0.2s;
        }
        a.btn-cute {
            background: #49a7ff;
            color: white;
            padding: 6px 14px;
            border-radius: 20px;
            font-weight: bold;
            text-decoration: none;
        }
        a.btn-del {
            background: #0089d1;
            color: white;
            padding: 6px 14px;
            border-radius: 20px;
            font-weight: bold;
        }
        a.btn-cute:hover {
            background: #006fbb;
            color: #fff;
        }
        a.btn-del:hover {
            background: #005d99;
            color: #fff;
        }
    </style>
</head>
<body>

    <h2>📚✨ Daftar Buku ✨📚</h2>

    <a class="btn-cute" href="{{ url('buku/add') }}">＋ Tambah Buku</a>
    <br><br>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Judul</th>
                <th>Pengarang</th>
                <th>Kategori</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($query as $item)
            <tr>
                <td>{{ $item->ID_Buku }}</td>
                <td>{{ $item->Judul }}</td>
                <td>{{ $item->Pengarang }}</td>
                <td>{{ $item->Kategori }}</td>
                <td>
                    <a class="btn-cute" href="{{url('buku/edit/'.$item->ID_Buku)}}">✏️</a>
                    <a class="btn-del" href="{{url('buku/delete/'.$item->ID_Buku)}}"
                        onclick="return confirm('MASA DIHAPUS WOI')">🗑️</a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <!-- jQuery Biru Laut -->
    <script src="https://code.jquery.com/jquery-3.6.0.slim.min.js"></script>
    <script>
        $(document).ready(function(){
            $("tr").mouseenter(function(){
                $(this).css("box-shadow", "0 0 12px #009cff");
            }).mouseleave(function(){
                $(this).css("box-shadow", "none");
            });
        });
    </script>

</body>
</html>
