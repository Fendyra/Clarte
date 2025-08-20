<?php
// Pastikan session sudah dimulai di awal file
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Pengaturan dasar dokumen -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Clarte Creative Agency</title>

    <!-- Load Tailwind CSS dari CDN -->
    <script src="https://cdn.tailwindcss.com"></script>

    <!-- Import Alpine.js -->
    <script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>

    <!-- Import font -->
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Inter:wght@400;700&display=swap');
        body {
            font-family: 'Inter', sans-serif;
        }
    </style>
</head>
<body class="bg-white">

    <!-- Header Section -->
    <!-- Alpine.js component for sidebar functionality -->
    <header class="bg-white" x-data="{ open: false, dropdown: false }" @click.away="open = false">
        <div class="container mx-auto flex justify-between items-center py-4 px-6">
            <div class="flex items-center">
                <div class="text-xl md:text-2xl font-bold text-gray-700">
                    <a href="index.php">
                        CLARTÉ
                    </a>
                </div>
                <span class="hidden md:inline-block text-gray-500 ml-6 text-sm">Brand & Design Studio</span>
            </div>

            <nav class="flex items-center space-x-2 md:space-x-4 text-sm md:text-base">
                <a href="about.php" class="text-gray-700 hover:underline">About</a>
                <span class="text-gray-300">/</span>
                <a href="services.php" class="text-gray-700 hover:underline">Services</a>
                <span class="text-gray-300">/</span>
                <a href="gallery.php" class="text-gray-700 hover:underline">Gallery</a>
            </nav>

            <div class="flex items-center space-x-2">
                <!-- Logika PHP untuk menampilkan nama atau tombol login/logout -->
                <?php if (isset($_SESSION['user_name'])): ?>
                    <!-- Tampilan jika user sudah login -->
                    <span class="text-gray-700 text-sm md:text-base">Hola, <?php echo htmlspecialchars($_SESSION['user_name']); ?></span>
                    <a href="logout.php" class="border border-gray-700 rounded-full text-black px-3 py-1 md:px-4 md:py-2 text-xs md:text-base 
                                                   relative overflow-hidden group transition-colors duration-300 hover:bg-black hover:text-white">
                        <span class="relative z-10">Logout</span>
                    </a>
                <?php else: ?>
                    <!-- Tampilan jika user belum login -->
                    <a href="login.php" class="border border-gray-700 rounded-full text-black px-3 py-1 md:px-4 md:py-2 text-xs md:text-base 
                                                   relative overflow-hidden group transition-colors duration-300 hover:bg-black hover:text-white">
                        <span class="relative z-10">Login</span>
                    </a>
                <?php endif; ?>

                <!-- Hamburger Button to toggle sidebar -->
                <button @click="open = !open" class="text-gray-700 focus:outline-none">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                        xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
                    </svg>
                </button>
            </div>
        </div>

        <!-- Sidebar (Off-canvas) -->
        <div class="fixed top-0 right-0 h-full w-64 bg-white shadow-xl transform transition-transform duration-300 ease-in-out z-50"
            :class="{ 'translate-x-0': open, 'translate-x-full': !open }" x-cloak>

            <div class="flex justify-between items-center p-4 border-b border-gray-200">
                <a href="index.php" class="text-xl font-bold text-gray-700">CLARTÉ</a>
                <button @click="open = false" class="text-gray-700 hover:text-gray-900 focus:outline-none">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                        xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                    </svg>
                </button>
            </div>

            <nav class="flex flex-col p-4 space-y-4">
                <a href="index.php" class="text-lg text-gray-800 hover:text-gray-600 transition duration-300">Home</a>

                <div x-data="{ dropdown: false }" class="relative">
                    <div @click="dropdown = !dropdown" class="flex items-center justify-between text-lg text-gray-800 cursor-pointer hover:text-gray-600 transition duration-300">
                        <span>Articles</span>
                        <svg class="w-4 h-4 transform transition-transform duration-200" :class="{ 'rotate-180': dropdown }" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                        </svg>
                    </div>
                    <div x-show="dropdown" x-collapse.duration.500ms class="pl-4 mt-2 space-y-2 text-sm text-gray-600 border-l border-gray-300">
                        <a href="#" class="block hover:underline">Design</a>
                        <a href="#" class="block hover:underline">Branding</a>
                        <a href="#" class="block hover:underline">Inspiration</a>
                    </div>
                </div>

                <a href="services.php" class="text-lg text-gray-800 hover:text-gray-600 transition duration-300">Services</a>
                <a href="gallery.php" class="text-lg text-gray-800 hover:text-gray-600 transition duration-300">Gallery</a>
            </nav>
        </div>
    </header>
</body>
</html>
