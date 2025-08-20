<!DOCTYPE html>
<html lang="en">
<head>
  <!-- Pengaturan dasar dokumen -->
  <meta charset="UTF-8"> 
  <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
  <title>Clarte Creative Agency</title>

  <!-- Load Tailwind CSS dari CDN -->
  <script src="https://cdn.tailwindcss.com"></script>

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
  <header class="bg-white">
    <div class="container mx-auto flex justify-between items-center py-4 px-6">
      <!-- Container utama header: flex untuk sejajar logo, navigasi, dan button -->

      <!-- Logo -->
      <div class="flex items-center">
        <div class="text-2xl font-bold text-gray-700">
          <a href="index.php">
            CLARTÉ
          </a>
        </div>
        <!-- Tagline kecil -->
        <span class="text-gray-500 ml-6">Brand & Design Studio</span>
      </div>

      <!-- Navigation Links -->
      <nav class="space-x-1">
        <!-- Link navigasi utama -->
        <a href="about.php" class="text-gray-700 hover:underline">About</a>
        <span class="text-gray-300">/</span> 
        <a href="profile.php" class="text-gray-700 hover:underline">Profile</a>
        <span class="text-gray-300">/</span>
        <a href="services.php" class="text-gray-700 hover:underline">Services</a>
        <span class="text-gray-300">/</span>
        <a href="contact.php" class="text-gray-700 hover:underline">Let's Talk</a>
      </nav>

      <!-- Login Button -->
      <a href="login.php"
        class="border border-gray-700 rounded-full text-black px-4 py-2 text-base relative overflow-hidden group transition-colors duration-300 hover:bg-black hover:text-white">
        <span class="relative z-10">Login</span>
      </a>

    </div>
  </header>
</body>
</html>
