<?php include "partials/header.php"; ?> 
<!-- Meng-include file header.php agar struktur header konsisten di semua halaman -->

<body class="bg-black text-white font-sans">
  
  <!-- Section utama untuk menampilkan layanan/portofolio -->
  <section class="py-20 px-6">
    <div class="container mx-auto">
      
      <!-- Judul utama halaman -->
      <h1 class="text-6xl font-bold uppercase mb-4 text-center tracking-wide text-black">
        Branding / Identity / Emotions
      </h1>
      <!-- Deskripsi singkat di bawah judul -->
      <p class="text-center text-lg mb-16 text-gray-400">
        We craft elegant and impactful digital experiences.
      </p>

      <!-- Grid layout untuk menampilkan daftar layanan (2 kolom pada layar medium ke atas) -->
      <div class="grid grid-cols-1 md:grid-cols-2 divide-x divide-y divide-gray-700">

        <!-- Item 1: Branding & Identity -->
        <a href="#" class="group relative block p-8 transition-all duration-300 hover:bg-white/5">
          <!-- Judul layanan -->
          <h2 class="text-6xl font-bold uppercase transition-colors duration-300 group-hover:text-blue-500 mb-6">
            Branding & Identity
          </h2>
          <!-- Gambar layanan -->
          <img src="images/brand-identity.jpg" alt="Branding" 
               class="w-full h-auto object-cover transform transition-transform duration-500 group-hover:scale-105" />
        </a>

        <!-- Item 2: Design & Creative -->
        <a href="#" class="group relative block p-8 transition-all duration-300 hover:bg-white/5">
          <img src="images/design-creative.jpg" alt="Design & Creative" 
               class="w-full h-auto object-cover transform transition-transform duration-500 group-hover:scale-105" />
          <h2 class="text-6xl font-bold uppercase tracking-wide transition-colors duration-300 group-hover:text-blue-500 mt-6">
            Design & Creative
          </h2>
        </a>

        <!-- Item 3: Social Media Management -->
        <a href="#" class="group relative block p-8 transition-all duration-300 hover:bg-white/5">
          <h2 class="text-6xl font-bold uppercase tracking-wide transition-colors duration-300 group-hover:text-blue-500 mb-6">
            Social Media Management
          </h2>
          <img src="images/SMM.jpg" alt="Social Media Management" 
               class="w-full h-auto object-cover transform transition-transform duration-500 group-hover:scale-105" />
        </a>
        
        <!-- Item 4: Motion Graphics -->
        <a href="#" class="group relative block p-8 transition-all duration-300 hover:bg-white/5">
          <img src="images/motion-graphics.jpg" alt="Motion Graphics" 
               class="w-full h-auto object-cover transform transition-transform duration-500 group-hover:scale-105" />
          <h2 class="text-6xl font-bold uppercase tracking-wide transition-colors duration-300 group-hover:text-blue-500 mt-6">
            Motion Graphics
          </h2>
        </a>
        
        <!-- Item 5: Web & Technology -->
        <a href="#" class="group relative block p-8 transition-all duration-300 hover:bg-white/5">
          <h2 class="text-6xl font-bold uppercase tracking-wide transition-colors duration-300 group-hover:text-blue-500 mb-6">
            Web & Technology
          </h2>
          <img src="images/web-technology.jpg" alt="Visual Photography" 
               class="w-full h-auto object-cover transform transition-transform duration-500 group-hover:scale-105" />
        </a>

        <!-- Item 6: Event & Activation -->
        <a href="#" class="group relative block p-8 transition-all duration-300 hover:bg-white/5">
          <img src="images/event.jpg" alt="Studio Rental" 
               class="w-full h-auto object-cover transform transition-transform duration-500 group-hover:scale-105" />
          <h2 class="text-6xl font-bold uppercase tracking-wide transition-colors duration-300 group-hover:text-blue-500 mt-6">
            Event & Activation
          </h2>
        </a>
      </div>
    </div>
  </section>

  <!-- Meng-include file footer.php agar struktur footer konsisten di semua halaman -->
  <?php include "partials/footer.php"; ?>

</body>
