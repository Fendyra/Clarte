<?php
// Memulai sesi agar bisa mengakses variabel sesi yang ada
session_start();

// Menghapus semua variabel sesi yang tersimpan
session_unset();

// Menghancurkan sesi sepenuhnya (user dianggap sudah logout)
session_destroy();

// Setelah logout, arahkan pengguna kembali ke halaman utama (index.php)
header("Location: index.php");
exit(); // Pastikan script berhenti agar redirect berjalan sempurna
?>
