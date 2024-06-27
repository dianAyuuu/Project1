<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>OptiCMS</title>
    <!-- Tambahkan Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <!-- Tambahkan CSS Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        /* CSS untuk latar belakang dan tata letak */
        html, body {
            height: 100%;
        }
        body {
            background: linear-gradient(to bottom, #0a0e24, #1a4780);
            margin: 0;
            padding: 0;
            font-family: Arial, sans-serif;
            display: flex;
            flex-direction: column;
        }
        .navbar {
            background-color: #1a4780;
        }
        .navbar-brand, .navbar-nav .nav-link {
            color: white !important;
        }
        .hero-section {
            text-align: center;
            color: white;
            padding: 100px 20px;
            flex: 1; /* Membuat konten utama memenuhi ruang yang tersedia */
        }
        .hero-section h1 {
            font-size: 4rem;
            margin-bottom: 20px;
        }
        .hero-section p {
            font-size: 1.2rem;
            margin-bottom: 40px;
        }
        footer {
            background-color: #1a4780;
            color: white;
            text-align: center;
            padding: 20px 0;
        }
        /* CSS untuk bagian tambahan di bawah halaman blog */
        .additional-content {
            background-color: #f0f0f0;
            padding: 50px 20px;
            border-radius: 10px;
            margin-top: 50px;
        }
        /* CSS untuk warna latar belakang jumlah pengguna terdaftar */
        #userCount {
            background: linear-gradient(to bottom, #0a0e24, #1a4780);
            color: white;
            padding: 5px 10px;
            border-radius: 5px;
        }
        /* CSS untuk warna kuning gold */
        .gold-text {
            color: gold;
        }

    </style>
</head>
<body>
    <!-- Navigasi -->
    <nav class="navbar navbar-expand-lg navbar-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="{{ route('login') }}">USER</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('google.redirect') }}">
                            <i class="fab fa-google google-icon"></i> Login With Google
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Bagian Hero -->
    <div class="hero-section">
        <h1>
            <span id="typing-text" class="gold-text"></span>
            <span id="cursor"></span>
        </h1>
        <p class="stay-fixed">Solusi Terbaik untuk Pengelolaan yang Efesien</p>
    <p class="stay-fixed">User Terdaftar: <span id="userCount">1000</span></p>
    </div>

    <!-- Footer -->
    <footer>
        <p> Copyright &copy; 2024 OptiCMS. All rights reserved.</p>
    </footer>

    <!-- Tambahkan Script Bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
        <!-- Script untuk animasi mengetik -->
        <script>
        const typingText = document.getElementById('typing-text');
        const cursor = document.getElementById('cursor');
        const text = 'Welcome to OptiCMS';
        let index = 0;

        function typeWriter() {
            if (index < text.length) {
                typingText.textContent += text.charAt(index);
                index++;
                setTimeout(typeWriter, 100); // Ubah angka ini untuk mengatur kecepatan animasi
            } else {
                setTimeout(eraseText, 1000); // Tambahkan jeda sebelum menghapus teks
            }
        }

        function eraseText() {
            if (index >= 0) {
                typingText.textContent = text.substring(0, index - 1);
                index--;
                setTimeout(eraseText, 50); // Ubah angka ini untuk mengatur kecepatan animasi penghapusan
            } else {
                setTimeout(typeWriter, 1000); // Tambahkan jeda sebelum memulai mengetik lagi
            }
        }

        // Memulai animasi
        typeWriter();

        // Menampilkan kursor
        setInterval(() => {
            cursor.style.visibility = (cursor.style.visibility === 'hidden') ? 'visible' : 'hidden';
        }, 500); // Ubah angka ini untuk mengatur kecepatan kedipan kursor
    </script>
</body>
</html>
