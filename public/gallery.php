<?php include "partials/header.php"; ?>

<body class="bg-white text-gray-900 font-sans">
  
  <section class="py-20 px-6">
    <div class="container mx-auto">
      <h1 class="text-4xl md:text-5xl font-bold uppercase mb-4 text-center tracking-wide text-black">
        Our Creative Moments
      </h1>
      <p class="text-center text-lg mb-16 text-gray-600">
        A glimpse into our world of design, innovation, and collaboration.
      </p>

      <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-8">

        <div class="group relative block overflow-hidden cursor-pointer" onclick="openLightbox('images/activity-1.jpg', 'Team brainstorming session on the new campaign.')">
          <img src="images/workshop-1.jpg" alt="Team Brainstorming"
               class="w-full h-80 object-cover transform transition-transform duration-500 group-hover:scale-105" />
          <div class="absolute inset-0 bg-black/50 opacity-0 group-hover:opacity-100 transition-opacity duration-500 flex flex-col justify-end p-6">
            <p class="text-sm uppercase text-blue-700">Workshop</p>
            <h3 class="text-xl font-bold uppercase mt-1 text-white">Brainstorming Session</h3>
          </div>
        </div>

        <div class="group relative block overflow-hidden cursor-pointer" onclick="openLightbox('images/activity-2.jpg', 'Behind the scenes of our latest video production.')">
          <img src="images/BTS-Studio.jpg" alt="Video Production"
               class="w-full h-80 object-cover transform transition-transform duration-500 group-hover:scale-105" />
          <div class="absolute inset-0 bg-black/50 opacity-0 group-hover:opacity-100 transition-opacity duration-500 flex flex-col justify-end p-6">
            <p class="text-sm uppercase text-blue-700">Production</p>
            <h3 class="text-xl font-bold uppercase mt-1 text-white">Behind the Scenes</h3>
          </div>
        </div>

        <div class="group relative block overflow-hidden cursor-pointer" onclick="openLightbox('images/activity-3.jpg', 'Capturing stunning visuals for a client’s product.')">
          <img src="images/product-photoshoot.jpg" alt="Visual Photography"
               class="w-full h-80 object-cover transform transition-transform duration-500 group-hover:scale-105" />
          <div class="absolute inset-0 bg-black/50 opacity-0 group-hover:opacity-100 transition-opacity duration-500 flex flex-col justify-end p-6">
            <p class="text-sm uppercase text-blue-700">Studio</p>
            <h3 class="text-xl font-bold uppercase mt-1 text-white">Product Shoot</h3>
          </div>
        </div>
        
        <div class="group relative block overflow-hidden cursor-pointer" onclick="openLightbox('images/activity-4.jpg', 'Celebrating a successful project with the team.')">
          <img src="images/event-1.jpg" alt="Team Event"
               class="w-full h-80 object-cover transform transition-transform duration-500 group-hover:scale-105" />
          <div class="absolute inset-0 bg-black/50 opacity-0 group-hover:opacity-100 transition-opacity duration-500 flex flex-col justify-end p-6">
            <p class="text-sm uppercase text-blue-700">Events</p>
            <h3 class="text-xl font-bold uppercase mt-1 text-white">Team Celebration</h3>
          </div>
        </div>
        
        <div class="group relative block overflow-hidden cursor-pointer" onclick="openLightbox('images/activity-5.jpg', 'A creative workshop to explore new design techniques.')">
          <img src="images/workshop-2.jpg" alt="Creative Workshop"
               class="w-full h-80 object-cover transform transition-transform duration-500 group-hover:scale-105" />
          <div class="absolute inset-0 bg-black/50 opacity-0 group-hover:opacity-100 transition-opacity duration-500 flex flex-col justify-end p-6">
            <p class="text-sm uppercase text-blue-700">Workshop</p>
            <h3 class="text-xl font-bold uppercase mt-1 text-white">Creative Brainstorm</h3>
          </div>
        </div>

        </div>
    </div>
  </section>

  <?php include "partials/footer.php"; ?>

</body>