<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard User</title>
    <!-- Tambahkan CSS Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        /* Custom CSS */
        .navbar-brand {
            font-weight: bold;
        }

        .navbar-nav {
            margin-left: auto;
        }

        .navbar-nav .nav-item {
            margin-right: 20px;
        }

        .search-input {
            width: 300px;
            border-radius: 5px;
        }

        .search-button {
            border-top-right-radius: 5px;
            border-bottom-right-radius: 5px;
        }

        .navbar {
            padding: 20px 0; /* Atur padding navbar */
            background-color: #1a4780 !important; /* Warna navy pada navbar */
            position: sticky;
            top: 0;
            z-index: 1020;
        }

        .welcome-text {
            text-align: center;
            margin-top: 20px;
            font-size: 70px;
            font-weight: bold;
            background: linear-gradient(45deg, #ffcc00, #ff6600, #ff0066, #cc00ff, #6600ff, #0066ff, #00ccff, #00ff66, #66ff00, #ccff00, #ffcc00);
            background-size: 200% 200%;
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            animation: gradient-animation 5s linear infinite;
        }

        .user-name {
            text-align: center;
            font-size: 35px;
            margin-top: 20px;
            font-weight: bold;
        }

        @keyframes gradient-animation {
            0% {
                background-position: 0% 50%;
            }

            50% {
                background-position: 100% 50%;
            }

            100% {
                background-position: 0% 50%;
            }
        }

        body {
            display: flex;
            flex-direction: column;
            min-height: 100vh;
        }

        main {
            flex-grow: 1;
        }

        .button-container {
            display: flex;
            justify-content: center;
            gap: 50px;
            margin: 80px 0;
        }

        .btn-gradient {
            font-size: 18px;
            font-weight: bold;
            border: none;
            padding: 30px 50px;
            border-radius: 5px;
            color: white;
            cursor: pointer;
            transition: background 0.5s;
        }

        .videos {
    display: flex;
    flex-wrap: wrap;
    justify-content: center;
    padding: 20px;
}

.video-item {
    margin: 10px;
    flex: 1 1 calc(25% - 40px);
    box-sizing: border-box;
}

video {
    width: 100%;
    height: auto;
    border: 2px solid #ccc;
    border-radius: 5px;
}
    </style>
</head>
<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">User</a>
            <ul class="navbar-nav mx-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="{{ route('dashboarduser') }}">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('videos.index') }}">Videos</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('pdfs.index') }}">PDFs</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('ppts.index') }}">PPTs</a>
                </li>
                <li class="nav-item">
                    <div class="input-group">
                        <input class="form-control search-input" type="search" placeholder="Search" aria-label="Search">
                        <button class="btn btn-primary search-button" type="button">Cari</button>
                    </div>
                </li>
            </ul>
            <form method="POST" action="{{ route('logout') }}" class="d-flex">
            @csrf
            <button class="btn btn-outline-light" type="submit">Logout</button>
            </form>
        </div>
    </nav>
    <div class="videos">
    <script>
    // Mendapatkan data file dari localStorage
    var files = JSON.parse(localStorage.getItem('videos'));

    // Menampilkan data file
    files.forEach(function(file) {
        var videoItem = document.createElement('div');
        videoItem.className = 'video-item';

        // Tambahkan thumbnail
        var thumbnail = document.createElement('img');
        thumbnail.src = 'OptiCMS/public/image/VIDEOS.png'; // Ganti dengan path gambar thumbnail yang sesuai
        thumbnail.alt = 'Video Thumbnail';
        thumbnail.width = 200; // Atur lebar gambar sesuai kebutuhan
        thumbnail.height = 150; // Atur tinggi gambar sesuai kebutuhan

        var title = document.createElement('p');
        title.textContent = file.title;

        var date = document.createElement('p');
        date.textContent = file.date;

        // Tambahkan event listener untuk menampilkan judul dan tanggal saat thumbnail diklik
        thumbnail.addEventListener('click', function() {
            // Tampilkan judul dan tanggal
            title.style.display = 'block';
            date.style.display = 'none';
        });

        // Sembunyikan judul dan tanggal saat thumbnail tidak diklik
        thumbnail.addEventListener('mouseleave', function() {
            // Sembunyikan judul dan tanggal
            title.style.display = 'none';
            date.style.display = 'block';
        });

        videoItem.appendChild(thumbnail); // Tambahkan thumbnail ke video item
        videoItem.appendChild(date); // Tambahkan tanggal di atas thumbnail
        videoItem.appendChild(title); // Tambahkan judul di bawah thumbnail

        document.querySelector('.videos').appendChild(videoItem);
    });

</script>

</div>

    </body>
</html>