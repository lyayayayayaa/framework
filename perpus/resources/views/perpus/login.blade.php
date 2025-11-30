<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Aplikasi Perpustakaan - Login</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    {{-- Bootstrap CSS --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">

<style>
    /* Tema Biru Pastel Baby */
    body {
        background: #dff4ff;
        font-family: "Poppins", sans-serif;
    }

    #bookBox {
        width: 160px;
        height: 200px;
        background: #a8d8ff;
        margin: 10px auto 25px;
        display: none;
        border-radius: 6px;
        box-shadow: 0 6px 20px rgba(0, 140, 255, .25);
        transform-origin: left center;
        transform: perspective(600px) rotateY(90deg);
    }

    .cover-line {
        width: 80%;
        height: 10px;
        background: #7dc3ff;
        border-radius: 5px;
        margin: 12px auto;
    }

    #toggleBook {
        background: #7ec9ff;
        border: none;
        padding: 10px 20px;
        border-radius: 14px;
        font-size: 15px;
        color: white;
        cursor: pointer;
        width: 100%;
        box-shadow: 0 4px 10px rgba(80,160,255,.3);
        transition: .3s;
    }
    #toggleBook:hover {
        background: #6bb3e8;
    }
</style>

</head>
<body class="bg-light">

    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-4">

                <h3 class="text-center mb-3">🔐 Silahkan Login</h3>

                {{-- Animasi Buku --}}
                <button id="toggleBook">💙 Lihat Buku</button>
                <div id="bookBox">
                    <div class="cover-line"></div>
                    <div class="cover-line"></div>
                    <div class="cover-line"></div>
                </div>

                {{-- Pesan error jika login gagal --}}
                @if(session('loginError'))
                    <div class="alert alert-danger text-center">
                        {{ session('loginError') }}
                    </div>
                @endif

                {{-- Pesan sukses jika logout --}}
                @if(session('success'))
                    <div class="alert alert-success text-center">
                        {{ session('success') }}
                    </div>
                @endif

                <form action="{{ url('login') }}" method="POST" accept-charset="utf-8">
                    @csrf

                    <div class="form-group">
                        <label for="username">Username</label>
                        <input type="text"
                               name="username"
                               id="username"
                               class="form-control"
                               placeholder="Masukkan username"
                               required autofocus>
                    </div>

                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password"
                               name="password"
                               id="password"
                               class="form-control"
                               placeholder="Masukkan password"
                               required>
                    </div>
                    <button type="submit" name="btn_simpan" class="btn btn-primary btn-block">
                        Login
                    </button>
                </form>
            </div>
        </div>
    </div>

    {{-- jQuery Full (Bukan Slim!) --}}
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    {{-- Bootstrap JS --}}
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
            $(this).text("💙 Lihat Buku");
            opened = false;
        }
    });
});
</script>

</body>
</html>
