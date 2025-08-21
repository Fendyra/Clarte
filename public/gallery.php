<?php
session_start();
include 'db_conn.php';

// Ambil semua foto dari database
$gallery_items = $conn->query("SELECT * FROM gallery ORDER BY created_at DESC");

// Cek apakah pengguna adalah admin
$is_admin = isset($_SESSION['role']) && $_SESSION['role'] === 'admin';
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gallery - CLARTÉ</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Inter:wght@400;700&display=swap');
        body { font-family: 'Inter', sans-serif; }
    </style>
</head>
<body class="bg-white">
    <header class="bg-white">
        <?php include "partials/header.php"; ?> 
    </header>

    <div class="container mx-auto p-8">
        <h1 class="text-4xl md:text-5xl font-bold uppercase mb-4 text-center tracking-wide text-black">
            Our Creative Moments
        </h1>
        <p class="text-center text-lg mb-16 text-gray-600">
            A glimpse into our world of design, innovation, and collaboration.
        </p>
        
        <?php if ($is_admin): ?>
            <a href="../admin/dashboard.php" class="inline-block mb-6 py-2 px-4 bg-black text-white rounded-md hover:bg-gray-800">
                manage gallery            
            </a>
        <?php endif; ?>
        
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-8">
            <?php if ($gallery_items->num_rows > 0): ?>
                <?php while($row = $gallery_items->fetch_assoc()): ?>
                    <div class="group relative block overflow-hidden cursor-pointer">
                        <img src="<?php echo htmlspecialchars($row['file_path']); ?>" alt="<?php echo htmlspecialchars($row['title']); ?>"
                             class="w-full h-80 object-cover transform transition-transform duration-500 group-hover:scale-105" />
                        <div class="absolute inset-0 bg-black/50 opacity-0 group-hover:opacity-100 transition-opacity duration-500 flex flex-col justify-end p-6">
                            <p class="text-sm uppercase text-blue-700"><?php echo htmlspecialchars($row['category']); ?></p>
                            <h3 class="text-xl font-bold uppercase mt-1 text-white"><?php echo htmlspecialchars($row['title']); ?></h3>
                        </div>
                    </div>
                <?php endwhile; ?>
            <?php else: ?>
                <p class="text-gray-500">There are no photos in the gallery yet.</p>
            <?php endif; ?>
        </div>
    </div>

    <?php include "partials/footer.php"; ?>
</body>
</html>
