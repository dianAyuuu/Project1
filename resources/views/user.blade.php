<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Management</title>
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
        <h2 class="kategori-header">USER MANAGEMENT</h2>

        <div id="akun user" class="tab-content active">
            <div class="button-container">
                <button class="btn btn-success add-button" onclick="showForm('video')">Tambah</button>
                <button class="btn btn-primary import-button">Jumlah User : </button>
            </div>
            <div class="table-container">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                        <th>No.</th>
                        <th>Nama</th>
                        <th>Email</th>
                        </tr>
                    </thead>
                    <tbody id="userTableBody">

</tbody>

                </table>
            </div>
        </div>


    <script>
        // Tambahkan event listener untuk input pencarian
document.querySelector('.search-input').addEventListener('input', function() {
    var searchValue = this.value.toLowerCase(); // Ambil nilai input dan ubah menjadi lowercase

    // Filter dan tampilkan baris yang cocok dengan kata kunci pencarian di tabel pengguna
    document.querySelectorAll('#user-table-body tr').forEach(function(row) {
        var rowData = row.textContent.toLowerCase(); // Ambil teks dari semua kolom dalam baris dan ubah menjadi lowercase
        if (rowData.includes(searchValue)) {
            row.style.display = ''; // Tampilkan baris jika teks dalam baris cocok dengan kata kunci pencarian
        } else {
            row.style.display = 'none'; // Sembunyikan baris jika teks dalam baris tidak cocok
        }
    });
});

        // Hitung total pengguna dan aktif/pasif pengguna
        function calculateUserStats() {
            var totalUsers = document.querySelectorAll('#user-table-body tr').length;
            var activeUsers = document.querySelectorAll('#user-table-body select option[value="aktif"]:checked').length;
            var inactiveUsers = totalUsers - activeUsers;
            document.getElementById('activeUsersButton').innerText = 'User Aktif: ' + activeUsers;
            document.getElementById('inactiveUsersButton').innerText = 'User Pasif: ' + inactiveUsers;
            document.getElementById('totalUsersButton').innerText = 'Total User: ' + totalUsers;
        }

        // Update statistik pengguna saat terjadi perubahan pada pilihan status
        function updateUserStats() {
            calculateUserStats();
        }

        
        // Tambahkan baris baru
        function addNewRow() {
            var tableBody = document.getElementById('user-table-body');
            var rowCount = tableBody.getElementsByTagName("tr").length;
            var newRow = tableBody.insertRow(-1);
            var cellCount = newRow.insertCell(0);
            cellCount.innerHTML = rowCount + 1;

            for (var i = 0; i < 5; i++) {
                newRow.insertCell(-1).innerHTML = 'New Data';
            }

            var selectCell = newRow.insertCell(-1);
            selectCell.innerHTML = `
                <select onchange="updateUserStats()">
                    <option value="aktif">Aktif</option>
                    <option value="pasif">Pasif</option>
                </select>
            `;

            var actionCell = newRow.insertCell(-1);
            actionCell.innerHTML = `
                <button class="edit-button" onclick="editRow(this)">Edit</button>
                <button class="delete-button" onclick="deleteRow(this)">Hapus</button>
            `;

            calculateUserStats();
        }

        // Fungsi edit baris
// Fungsi edit baris
function editRow(button) {
    var row = button.parentNode.parentNode;
    var cells = row.getElementsByTagName('td');

    for (var i = 1; i < cells.length - 2; i++) { // Hanya kolom nama, email, unit, subunit, dan no HP yang diedit
        var cellData = cells[i].innerHTML;
        cells[i].innerHTML = `<input type="text" value="${cellData}">`;
    }

    var editButton = row.querySelector('.edit-button');
    editButton.innerHTML = 'Simpan';
    editButton.setAttribute('onclick', 'saveRow(this)');
}

        // Fungsi simpan baris yang diedit
 // Fungsi simpan baris yang diedit
function saveRow(button) {
    var row = button.parentNode.parentNode;
    var cells = row.getElementsByTagName('td');

    for (var i = 1; i < cells.length - 2; i++) { // Hanya kolom nama, email, unit, subunit, dan no HP yang disimpan
        var inputData = cells[i].querySelector('input').value;
        cells[i].innerHTML = inputData;
    }

    var editButton = row.querySelector('.edit-button');
    editButton.innerHTML = 'Edit';
    editButton.setAttribute('onclick', 'editRow(this)');
}


        // Fungsi hapus baris
        function deleteRow(button) {
            var row = button.parentNode.parentNode;
            row.parentNode.removeChild(row);
            calculateUserStats(); // Setelah menghapus baris, perbarui statistik
        }

        // Hitung statistik saat memuat halaman
        calculateUserStats();
        // Update statistik pengguna saat terjadi perubahan pada status pengguna
function updateStatsOnStatusChange() {
    var selectElements = document.querySelectorAll('#user-table-body select');
    selectElements.forEach(function(selectElement) {
        selectElement.addEventListener('change', function() {
            updateStatsBasedOnStatus();
        });
    });
}

// Mengupdate statistik pengguna berdasarkan status yang dipilih
function updateStatsBasedOnStatus() {
    var activeUsers = 0;
    var inactiveUsers = 0;

    var selectElements = document.querySelectorAll('#user-table-body select');
    selectElements.forEach(function(selectElement) {
        if (selectElement.value === 'aktif') {
            activeUsers++;
        } else {
            inactiveUsers++;
        }
    });

    document.getElementById('activeUsersButton').innerText = 'User Aktif: ' + activeUsers;
    document.getElementById('inactiveUsersButton').innerText = 'User Pasif: ' + inactiveUsers;
    document.getElementById('totalUsersButton').innerText = 'Total User: ' + (activeUsers + inactiveUsers);
}

// Memanggil fungsi untuk mengupdate statistik saat halaman dimuat
updateStatsOnStatusChange();
 // Fungsi untuk menampilkan user aktif
 function showActiveUsers() {
        var rows = document.querySelectorAll('#user-table-body tr');
        for (var i = 0; i < rows.length; i++) {
            var select = rows[i].querySelector('select');
            if (select.value === 'aktif') {
                rows[i].style.display = '';
            } else {
                rows[i].style.display = 'none';
            }
        }
    }

    // Fungsi untuk menampilkan user pasif
    function showInactiveUsers() {
        var rows = document.querySelectorAll('#user-table-body tr');
        for (var i = 0; i < rows.length; i++) {
            var select = rows[i].querySelector('select');
            if (select.value === 'pasif') {
                rows[i].style.display = '';
            } else {
                rows[i].style.display = 'none';
            }
        }
    }

    // ...

    // Tambahkan event listener pada tombol "User Aktif"
    document.getElementById('activeUsersButton').addEventListener('click', showActiveUsers);

    // Tambahkan event listener pada tombol "User Pasif"
    document.getElementById('inactiveUsersButton').addEventListener('click', showInactiveUsers);
// Fungsi untuk menampilkan semua user
function showAllUsers() {
        var rows = document.querySelectorAll('#user-table-body tr');
        for (var i = 0; i < rows.length; i++) {
            rows[i].style.display = '';
        }
    }

    // ...

    // Tambahkan event listener pada tombol "Total Pengguna"
    document.getElementById('totalUsersButton').addEventListener('click', showAllUsers);

// add a click event listener to each "New Data" cell
const cells = document.querySelectorAll('.user-table td.new-data');
cells.forEach(cell => {
  cell.addEventListener('click', () => {
    cell.classList.toggle('visible');
  });
});

    </script>
</body>
</html>