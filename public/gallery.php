<?php
// Mulai session untuk menyimpan data login & role user
session_start();

// Hubungkan ke database (file db_conn.php berisi konfigurasi koneksi MySQL)
include 'db_conn.php';

// Ambil semua data foto dari tabel gallery, urutkan berdasarkan waktu terbaru
$gallery_items = $conn->query("SELECT * FROM gallery");

// Cek apakah user yang login adalah admin
// Jika role ada di session DAN nilainya "admin", maka $is_admin = true
$is_admin = isset($_SESSION['role']) && $_SESSION['role'] === 'admin';

// Tutup koneksi ke database setelah query dijalankan
$conn->close();
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gallery - CLARTÉ</title>
    
    <!-- Import Tailwind CSS via CDN -->
    <script src="https://cdn.tailwindcss.com"></script>

    <!-- Gunakan font Inter dari Google Fonts -->
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Inter:wght@400;700&display=swap');
        body { font-family: 'Inter', sans-serif; }
    </style>
</head>
<body class="bg-white">
    <!-- Header website (di-include dari file terpisah) -->
    <header class="bg-white">
        <?php include "partials/header.php"; ?> 
    </header>

    <div class="container mx-auto p-8">
        <!-- Judul utama gallery -->
        <h1 class="text-4xl md:text-5xl font-bold uppercase mb-4 text-center tracking-wide text-black">
            Our Creative Moments
        </h1>
        <p class="text-center text-lg mb-16 text-gray-600">
            A glimpse into our world of design, innovation, and collaboration.
        </p>
        
        <!-- Jika user admin, tampilkan tombol ke dashboard untuk manage gallery -->
        <?php if ($is_admin): ?>
            <a href="../admin/dashboard.php" class="inline-block mb-6 py-2 px-4 bg-black text-white rounded-md hover:bg-gray-800">
                manage gallery            
            </a>
        <?php endif; ?>
        
        <!-- Grid gallery -->
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-8">
            
            <!-- Jika ada foto di database -->
            <?php if ($gallery_items->num_rows > 0): ?>
                
                <!-- Looping untuk setiap foto -->
                <?php while($row = $gallery_items->fetch_assoc()): ?>
                    <div class="group relative block overflow-hidden cursor-pointer">
                        
                        <!-- Tampilkan gambar (aman dengan htmlspecialchars untuk mencegah XSS) -->
                        <img src="<?php echo htmlspecialchars($row['file_path']); ?>" 
                             alt="<?php echo htmlspecialchars($row['title']); ?>"
                             class="w-full h-80 object-cover transform transition-transform duration-500 group-hover:scale-105" />
                        
                        <!-- Overlay muncul saat hover -->
                        <div class="absolute inset-0 bg-black/50 opacity-0 group-hover:opacity-100 transition-opacity duration-500 flex flex-col justify-end p-6">
                            <!-- Kategori foto -->
                            <p class="text-sm uppercase text-blue-700">
                                <?php echo htmlspecialchars($row['category']); ?>
                            </p>
                            <!-- Judul foto -->
                            <h3 class="text-xl font-bold uppercase mt-1 text-white">
                                <?php echo htmlspecialchars($row['title']); ?>
                            </h3>
                        </div>
                    </div>
                <?php endwhile; ?>
            
            <!-- Jika tidak ada foto -->
            <?php else: ?>
                <p class="text-gray-500">There are no photos in the gallery yet.</p>
            <?php endif; ?>
        </div>
    </div>

    <!-- Footer website (di-include dari file terpisah) -->
    <?php include "partials/footer.php"; ?>
</body>
</html>

