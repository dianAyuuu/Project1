@php
    $videosIndexRoute = route('videos.index');
@endphp

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kategori</title>
    <!-- Tambahkan CSS Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        /* Custom CSS */
        body {
            background: #E8EBEA;
            margin: 0;
            padding: 0;
            font-family: Arial, sans-serif;
            display: flex;
            flex-direction: column;
        }
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
            padding: 20px 0;
            background-color: #1a4780 !important;
            position: sticky;
            top: 0;
            z-index: 1020;
        }
        .tab-content {
            margin-top: 20px;
            background-color: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        .table-container {
            margin-top: 20px;
        }
        .tab-links {
            display: flex;
            justify-content: center;
            margin-top: 20px;
        }
        .tab-links a {
            margin: 0 20px;
            font-size: 18px;
            font-weight: bold;
            color: #1a4780;
            cursor: pointer;
        }
        .tab-links a.active {
            text-decoration: underline;
        }
        .tab-content {
            display: none;
        }
        .tab-content.active {
            display: block;
        }
        .button-container {
            display: flex;
            justify-content: space-between;
            margin-bottom: 10px;
        }
        .kategori-header {
            margin-top: 30px !important;
            color: black;
            font-weight: bold;
            font-size: 36px;
            overflow: hidden;
            white-space: nowrap;
            margin: 0 auto;
            letter-spacing: .15em;
            animation: typing 3.5s steps(30, end) infinite, blink-caret .5s step-end infinite alternate;
        }

        @keyframes typing {
            from { width: 0 }
            to { width: 100% }
        }

        @keyframes blink-caret {
            from, to { border-color: transparent }
            50% { border-color: orange; }
        }

        /* Dialog Style */
        .modal {
            display: none;
            position: fixed;
            z-index: 1;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            overflow: hidden; /* Menghapus overflow: auto */
            background-color: rgba(0,0,0,0.4);
        }

        .modal-content {
            background-color: #fefefe;
            margin: 10% auto; /* Mengubah margin-top menjadi margin */
            padding: 20px;
            border: 1px solid #888;
            width: 40%;
            border-radius: 10px;
        }

        .close {
            color: #aaa;
            float: right; /* Mengubah posisi menjadi float:right */
            font-size: 28px;
            font-weight: bold;
            margin-left: 10px; /* Menambah margin kiri untuk jarak dari content */
        }

        .close:hover,
        .close:focus {
            color: black;
            text-decoration: none;
            cursor: pointer;
        }

        .add-file {
            font-size: 30px; /* Mengubah ukuran teks menjadi 20px */
            text-align: center; /* Pusatkan teks */
            margin-bottom: 20px; /* Tambahkan margin bawah */
        }

        .save-button {
            float: right; /* Posisi kanan */
        }

        iframe {
            width: 100%;
            height: 500px; /* Sesuaikan tinggi iframe sesuai kebutuhan */
        }

    </style>
</head>
<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Admin</a>
            <ul class="navbar-nav mx-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="{{ route('login.dashboard') }}">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('user') }}">User Management</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('kategori') }}">Kategori</a>
                </li>
                <li class="nav-item">
                    <div class="input-group">
                    <input id="searchInput" class="form-control search-input" type="search" placeholder="Search" aria-label="Search">
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
    <div class="container text-center">
        <h2 class="kategori-header">KATEGORI</h2>
        <div class="tab-links">
            <a class="tab-link active" onclick="openTab('videos')">Videos</a>
            <a class="tab-link" onclick="openTab('pdfs')">PDFs</a>
            <a class="tab-link" onclick="openTab('ppts')">PPTs</a>
        </div>

        <div id="videos" class="tab-content active">
            <div class="button-container">
                <button class="btn btn-success add-button" onclick="showForm('video')">Tambah Video</button>
                <button class="btn btn-primary import-button">Import</button>
            </div>
            <div class="table-container">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                        <th>No.</th>
                        <th>File</th>
                        <th>Tanggal</th>
                        <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody id="videoTableBody">
                        <!-- Isi tabel akan dimuat oleh JavaScript -->
                    </tbody>
                </table>
            </div>
        </div>

        <div id="pdfs" class="tab-content">
            <div class="button-container">
                <button class="btn btn-primary add-button" onclick="showForm('pdf')">Tambah PDF</button>
                <button class="btn btn-primary import-button">Import</button>
            </div>
            <div class="table-container">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>File</th>
                            <th>Tanggal</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody id="pdfTableBody">
                        <!-- Isi tabel akan dimuat oleh JavaScript -->
                    </tbody>
                </table>
            </div>
        </div>

        <div id="ppts" class="tab-content">
    <div class="button-container">
        <button class="btn btn-success add-button" onclick="showForm('ppt')">Tambah PPT</button>
        <div class="button-container">
            <button class="btn btn-primary import-button" onclick="sendFilesToDashboardUser('ppts')">Import</button>
        </div>
    </div>
    <div class="table-container">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>No.</th>
                    <th>File</th>
                    <th>Tanggal</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody id="pptTableBody">
                <!-- Isi tabel akan dimuat oleh JavaScript -->
            </tbody>
        </table>
    </div>
</div>

    <!-- Form Dialog -->
    <div id="addForm" class="modal">
        <div class="modal-content">
            <span class="close" onclick="closeForm()">&times;</span>
            <h2 class="add-file">Tambah Data</h2>
            <form id="fileForm" enctype="multipart/form-data"> <!-- Tambahkan enctype untuk mengunggah file -->
                @csrf <!-- Tambahkan token CSRF untuk keamanan form -->
                <div class="mb-3">
                    <label for="fileInput" class="form-label">Upload File</label>
                    <input type="file" class="form-control" id="fileInput" name="file"> <!-- Tambahkan atribut name untuk menyimpan nama file -->
                </div>
                <div class="mb-3">
                    <label for="fileDate" class="form-label">Tanggal</label>
                    <input type="date" class="form-control" id="fileDate" name="date">
                </div>
                <button type="button" class="btn btn-primary save-button" onclick="saveFile()">Save</button>
            </form>
        </div>
    </div>

    <!-- Tambahkan JavaScript Bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script>
// Tambahkan event listener untuk input pencarian
document.getElementById('searchInput').addEventListener('input', function() {
    var searchValue = this.value.toLowerCase(); // Ambil nilai input dan ubah menjadi lowercase

    // Filter dan tampilkan baris yang cocok dengan kata kunci pencarian di tabel videos
    document.querySelectorAll('#videos table tbody tr').forEach(function(row) {
        var itemName = row.querySelector('td:nth-child(2)').textContent.toLowerCase(); // Ambil nama item dari kolom kedua
        if (itemName.includes(searchValue)) {
            row.style.display = ''; // Tampilkan baris jika nama item cocok dengan kata kunci
        } else {
            row.style.display = 'none'; // Sembunyikan baris jika nama item tidak cocok
        }
    });

    // Filter dan tampilkan baris yang cocok dengan kata kunci pencarian di tabel pdfs
    document.querySelectorAll('#pdfs table tbody tr').forEach(function(row) {
        var itemName = row.querySelector('td:nth-child(2)').textContent.toLowerCase(); // Ambil nama item dari kolom kedua
        if (itemName.includes(searchValue)) {
            row.style.display = ''; // Tampilkan baris jika nama item cocok dengan kata kunci
        } else {
            row.style.display = 'none'; // Sembunyikan baris jika nama item tidak cocok
        }
    });

    // Filter dan tampilkan baris yang cocok dengan kata kunci pencarian di tabel ppts
    document.querySelectorAll('#ppts table tbody tr').forEach(function(row) {
        var itemName = row.querySelector('td:nth-child(2)').textContent.toLowerCase(); // Ambil nama item dari kolom kedua
        if (itemName.includes(searchValue)) {
            row.style.display = ''; // Tampilkan baris jika nama item cocok dengan kata kunci
        } else {
            row.style.display = 'none'; // Sembunyikan baris jika nama item tidak cocok
        }
    });
});

    // Fungsi untuk menampilkan tab yang dipilih
    function openTab(tabName) {
        var tabContents = document.querySelectorAll('.tab-content');
        tabContents.forEach(function(tabContent) {
            tabContent.style.display = "none"; // Semua tab-content disembunyikan
        });
        document.getElementById(tabName).style.display = "block"; // Tab yang dipilih ditampilkan

        var tabLinks = document.querySelectorAll('.tab-link');
        tabLinks.forEach(function(tabLink) {
            tabLink.classList.remove("active"); // Menghapus kelas active dari semua tab-link
        });
        event.currentTarget.classList.add("active"); // Menambahkan kelas active pada tab yang dipilih
    }

    // Fungsi untuk menampilkan formulir dialog
    function showForm() {
        document.getElementById("addForm").style.display = "block";
    }

    // Fungsi untuk menutup formulir dialog
    function closeForm() {
        document.getElementById("addForm").style.display = "none";
    }

    // Fungsi untuk menyimpan file yang dipilih ke dalam tabel
    function saveFile() {
        var fileInput = document.getElementById('fileInput');
        var file = fileInput.files[0];

        var fileName = file.name;
        var fileDate = document.getElementById('fileDate').value;

        var activeTab = document.querySelector('.tab-content.active');
        var category = activeTab.id;

        var tableBody = activeTab.querySelector('table tbody');
        var newRow = tableBody.insertRow();

        var rowCount = tableBody.rows.length;
        var cellNo = newRow.insertCell(0);
        cellNo.innerHTML = rowCount + 1;

        var cellFile = newRow.insertCell(1);
        cellFile.innerHTML = fileName;

        var cellDate = newRow.insertCell(2);
        cellDate.innerHTML = fileDate;

        var cellAction = newRow.insertCell(3);
        cellAction.innerHTML = '<a href="#" class="btn btn-success btn-sm open-button" data-file-name="' + fileName + '" data-category="' + category + '">Open</a> ' +
                                '<a href="#" class="btn btn-danger btn-sm" onclick="deleteRow(this)">Hapus</a>';

        var fileData = {
            name: fileName,
            date: fileDate
        };

        var existingFiles = JSON.parse(localStorage.getItem(category)) || [];
        existingFiles.push(fileData);
        localStorage.setItem(category, JSON.stringify(existingFiles));

        closeForm();
    }

    // Fungsi untuk menghapus baris tabel
    function deleteRow(btn) {
        var row = btn.parentNode.parentNode;
        var table = row.parentNode.parentNode;
        var category = table.parentNode.id;
        table.deleteRow(row.rowIndex);
        updateRowNumbers(table);
        saveTableDataToLocalStorage(category); // Perbarui localStorage setelah menghapus baris
    }

    // Fungsi untuk memperbarui nomor urutan setelah penghapusan baris
    function updateRowNumbers(table) {
        var rows = table.rows;
        for (var i = 1; i < rows.length; i++) {
            rows[i].cells[0].innerHTML = i;
        }
    }

    // Fungsi untuk memuat data tabel dari localStorage saat halaman dimuat
    function loadTableDataFromLocalStorage() {
        var tabContents = document.querySelectorAll('.tab-content');
        tabContents.forEach(function(tabContent) {
            var category = tabContent.id;
            var files = JSON.parse(localStorage.getItem(category));
            if (files) {
                var tableBody = tabContent.querySelector('table tbody');
                tableBody.innerHTML = '';
                files.forEach(function(fileData, index) {
                    var newRow = tableBody.insertRow();
                    var cellNo = newRow.insertCell(0);
                    cellNo.innerHTML = index + 1;
                    var cellFile = newRow.insertCell(1);
                    cellFile.innerHTML = fileData.name;
                    var cellDate = newRow.insertCell(2);
                    cellDate.innerHTML = fileData.date;
                    var cellAction = newRow.insertCell(3);
                    cellAction.innerHTML = '<a href="#" class="btn btn-success btn-sm open-button" data-file-name="' + fileData.name + '" data-category="' + category + '">Open</a> ' +
                                            '<a href="#" class="btn btn-danger btn-sm" onclick="deleteRow(this)">Hapus</a>';
                });
            }
        });
    }

    // Pemanggilan fungsi untuk memuat data tabel dari localStorage saat halaman dimuat
    window.onload = function() {
        loadTableDataFromLocalStorage();
    };

    // Fungsi untuk membuka file secara otomatis
    function openFile(btn) {
        var fileName = btn.getAttribute('data-file-name');
        var category = btn.getAttribute('data-category');
        var files = JSON.parse(localStorage.getItem(category));
        var fileData = files.find(function(file) {
            return file.name === fileName;
        });
        if (fileData) {
            console.log('Opening file:', fileData);
            // Lakukan tindakan yang sesuai untuk membuka file
            // Contoh: window.open(fileData.src); // Buka file dengan menggunakan URL file
        } else {
            console.log('File not found:', fileName);
        }
        event.preventDefault(); // Menghentikan tindakan default dari link
    }

    // Fungsi untuk mengaktifkan tombol "Open"
    function activateOpenButton(btn) {
        btn.addEventListener('click', function() {
            openFile(btn);
        });
    }

    // Memuat data tabel dari localStorage saat halaman dimuat
    window.addEventListener('DOMContentLoaded', function() {
        loadTableDataFromLocalStorage();
        // Menambahkan event listener untuk tombol "Open" setiap kali halaman dimuat
        var openButtons = document.querySelectorAll('.open-button');
        openButtons.forEach(function(button) {
            activateOpenButton(button);
        });
    });

    // Fungsi untuk menyimpan data tabel ke localStorage setelah penghapusan baris
    function saveTableDataToLocalStorage(category) {
        var tableBody = document.getElementById(category);
        var files = [];
        var rows = tableBody.rows;
        for (var i = 0; i < rows.length; i++) {
            var file = {
                name: rows[i].cells[1].innerHTML,
                date: rows[i].cells[2].innerHTML
            };
            files.push(file);
        }
        localStorage.setItem(category, JSON.stringify(files)); // Menyimpan data ke localStorage
    }
    // Fungsi untuk menghapus baris tabel
function deleteRow(btn) {
    event.preventDefault(); // Mencegah perilaku default dari link
    var row = btn.parentNode.parentNode;
    var table = row.parentNode.parentNode;
    var category = table.parentNode.id;
    table.deleteRow(row.rowIndex);
    updateRowNumbers(table);
    saveTableDataToLocalStorage(category); // Perbarui localStorage setelah menghapus baris
}

// Memuat data tabel dari localStorage saat halaman dimuat
window.addEventListener('DOMContentLoaded', function() {
    loadTableDataFromLocalStorage();
    // Menambahkan event listener untuk tombol "Hapus" setiap kali halaman dimuat
    var deleteButtons = document.querySelectorAll('.delete-button');
    deleteButtons.forEach(function(button) {
        activateDeleteButton(button);
    });
});

// Fungsi untuk mengaktifkan tombol "Hapus"
function activateDeleteButton(btn) {
    btn.addEventListener('click', function() {
        deleteRow(btn);
    });
}

</script>


</body>
</html>

