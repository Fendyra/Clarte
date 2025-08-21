<?php
// Konfigurasi database (server, user, password, dan nama database)
$servername = "localhost";   
$username   = "root";       
$password   = "";           
$dbname     = "clarte";    

// Buat koneksi ke database MySQL menggunakan objek mysqli
$conn = new mysqli($servername, $username, $password, $dbname);

// Periksa apakah koneksi berhasil atau gagal
if ($conn->connect_error) {
    // Jika koneksi gagal → hentikan program dan tampilkan pesan error
    die("Koneksi gagal: " . $conn->connect_error);
}

// Jika sampai baris ini berjalan, berarti koneksi berhasil dibuat
?>
