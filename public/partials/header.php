<!DOCTYPE html>
<html lang="en">
<head>
  <!-- Pengaturan dasar dokumen -->
  <meta charset="UTF-8"> 
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
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

      <a href="login.php"
         class="border border-gray-700 rounded-full text-black px-3 py-1 md:px-4 md:py-2 text-xs md:text-base 
                relative overflow-hidden group transition-colors duration-300 hover:bg-black hover:text-white">
        <span class="relative z-10">Login</span>
      </a>
    </div>
  </header>
</body>
</html>
