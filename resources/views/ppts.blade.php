<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PPTs</title>
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

        .ppts {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            padding: 20px;
        }

        .ppt-item {
            margin: 10px;
            flex: 1 1 calc(20% - 20px);
            box-sizing: border-box;
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        iframe {
            width: 100%;
            max-width: 200px; /* Tetapkan lebar maksimal thumbnail */
            height: 150px; /* Tetapkan tinggi tetap */
            border: 2px solid #ccc;
            border-radius: 5px;
        }

        .ppt-item p {
            margin: 5px 0;
            text-align: center;
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

    <!-- Content -->
    <div class="ppts">
        <!-- Data PPT akan dimuat oleh JavaScript -->
    </div>

    <!-- Tambahkan JavaScript Bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        // Mendapatkan data file PPT dari localStorage
        var files = JSON.parse(localStorage.getItem('ppts'));

        // Menampilkan data file PPT
        files.forEach(function(file) {
            var pptItem = document.createElement('div');
            pptItem.className = 'ppt-item';

            var iframe = document.createElement('iframe');
            iframe.src = file.src;

            var title = document.createElement('p');
            title.textContent = file.title;

            var date = document.createElement('p');
            date.textContent = file.date;

            pptItem.appendChild(iframe);
            pptItem.appendChild(title);
            pptItem.appendChild(date);

            document.querySelector('.ppts').appendChild(pptItem);
        });
    </script>
</body>
</html>
