<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Aplikasi Perpustakaan</title>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">

<style>
    body {
        background: #dff4ff;
        font-family: "Poppins", sans-serif;
    }
    .container {
        margin-top: 30px;
    }
    .card {
        border-radius: 20px;
        box-shadow: 0 6px 16px rgba(80,160,255,.25);
        border: none;
    }
    .card-header {
        background-color: #7ec9ff;
        color: white;
        border-radius: 20px 20px 0 0;
        text-align: center;
        font-weight: 600;
        font-size: 1.4rem;
    }

    .list-group-item a {
        text-decoration: none;
        color: #0078d7;
        font-weight: 500;
    }
    .list-group-item a:hover {
        color: #005fa8;
        text-decoration: underline;
    }

    .logout-btn {
        border-radius: 10px;
    }

    /* ===== Buku Pastel Baby ===== */
    #bookBox {
        width: 160px;
        height: 200px;
        background: #a8d8ff;
        margin: 10px auto 25px;
        display: none;
        border-radius: 8px;
        box-shadow: 0 6px 20px rgba(0, 140, 255, .25);
        transform-origin: left center;
        transform: perspective(600px) rotateY(90deg);
    }
    .cover-line {
        width: 75%;
        height: 10px;
        background: #7dc3ff;
        border-radius: 5px;
        margin: 12px auto;
    }
    #toggleBook {
        background: #7ec9ff;
        border: none;
        padding: 9px 20px;
        border-radius: 14px;
        font-size: 15px;
        width: 100%;
        color: white;
        cursor: pointer;
        box-shadow: 0 4px 10px rgba(80,160,255,.3);
        transition: .3s;
    }
    #toggleBook:hover {
        background: #6bb3e8;
    }
</style>

</head>
<body>

    <div class="container">
        <div class="card">

            <div class="card-header">
                📚 Aplikasi Perpustakaan FTIK USM
            </div>

            <div class="card-body">
                
                <!-- Animasi Buku -->
                <button id="toggleBook">📘 Lihat Buku</button>
                <div id="bookBox">
                    <div class="cover-line"></div>
                    <div class="cover-line"></div>
                    <div class="cover-line"></div>
                </div>

                <p class="text-center font-weight-bold mb-3">Pilih menu berikut:</p>

                <ul class="list-group">
                    <li class="list-group-item">
                        <a href="{{ url('buku') }}">📖 Kelola Data Buku</a>
                    </li>
                    <li class="list-group-item">
                        <a href="{{ url('anggota') }}">👥 Kelola Data Anggota</a>
                    </li>
                    <li class="list-group-item">
                        <a href="{{ url('pinjam') }}">📦 Kelola Transaksi Peminjaman</a>
                    </li>
                </ul>

                <div class="text-center mt-4">
                    <form action="{{ url('/logout') }}" method="POST" style="display:inline;">
                        @csrf
                        <button type="submit" class="btn btn-danger logout-btn">
                            🚪 Logout
                        </button>
                    </form>
                </div>

            </div>
        </div>
    </div>

    <!-- jQuery Full (wajib untuk animasi) -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>

<script>
$(document).ready(function(){
    let opened = false;

    $("#toggleBook").click(function(){
        $("#bookBox").show();

        if(!opened) {
            $("#bookBox").animate({opacity:1},150)
                .css("transform","perspective(600px) rotateY(0deg)");
            $(this).text("Tutup Buku 💫");
            opened = true;
        } else {
            $("#bookBox").css("transform","perspective(600px) rotateY(90deg)");
            setTimeout(()=>$("#bookBox").hide(), 300);
            $(this).text("📘 Lihat Buku");
            opened = false;
        }
    });
});
</script>

</body>
</html>
