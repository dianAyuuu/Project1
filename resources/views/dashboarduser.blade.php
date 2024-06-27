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

        .btn-user {
            background: linear-gradient(45deg, #ffcc00, #ff6600);
        }

        .btn-videos {
            background: linear-gradient(45deg, #ff0066, #cc00ff);
        }

        .btn-pdfs {
            background: linear-gradient(45deg, #6600ff, #0066ff);
        }

        .btn-ppts {
            background: linear-gradient(45deg, #00ccff, #00ff66);
        }
    </style>
</head>
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

    <!-- Welcome Text -->
    <<main>
    <div class="welcome-text">
        Selamat Datang
    </div>

    <div class="button-container">
        <button class="btn btn-gradient btn-videos">Jumlah Videos <span class="badge bg-secondary">50</span></button>
        <button class="btn btn-gradient btn-pdfs">Jumlah PDFs <span class="badge bg-secondary">30</span></button>
        <button class="btn btn-gradient btn-ppts">Jumlah PPTs <span class="badge bg-secondary">20</span></button>
    </div>
</main>

    <!-- Tambahkan Script Bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>