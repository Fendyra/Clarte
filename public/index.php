<?php include "partials/header.php"; ?>

<body class="bg-white text-gray-900 font-sans">
  <!-- HERO SECTION -->
  <div class="relative h-screen flex flex-col justify-center overflow-hidden">
    <div class="flex items-center">
      <h1 class="text-left font-bold uppercase tracking-tight leading-none text-2xl md:text-[clamp(2.5rem,10vw,8rem)] p-4 pr-0">
        Elegant
      </h1>
      
      <div class="relative group ml-4 md:ml-8">
        <div class="text-xl md:text-3xl font-bold tracking-widest text-gray-800 cursor-default">
          CLARTÉ
        </div>
        <div class="absolute top-1/2 left-full ml-4 -translate-y-1/2 opacity-0 group-hover:opacity-100 transition-opacity duration-300 pointer-events-none">
          <span class="inline-block px-4 py-2 text-sm bg-white/70 backdrop-blur-sm rounded-full border border-gray-200 shadow-md whitespace-nowrap">
            Clarte – We craft elegant & soulful digital experiences
          </span>
        </div>
      </div>
    </div>

    <h1 class="text-center font-bold uppercase tracking-tight leading-none text-2xl md:text-[clamp(2.5rem,10vw,8rem)] p-4">
      Design For
    </h1>
    <h1 class="text-left font-bold uppercase tracking-tight leading-none text-2xl md:text-[clamp(2.5rem,10vw,8rem)] p-4">
      Creative Brands.
    </h1>

    <div class="absolute bottom-16 right-16 w-32 h-0.5 bg-yellow-400"></div>
  </div>
</body>

<section class="bg-black font-sans">
  <?php include "vision-mission.php"; ?>
</section>

<section class="bg-white">
  <div class="container mx-auto px-6 py-20">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-16 md:gap-24">

            <div class="flex flex-col justify-start lg:mt-16">
                <h2 class="text-5xl md:text-7xl font-bold leading-tight text-black mb-4">
                    About Us
                </h2>
                <p class="text-lg md:text-xl text-gray-400">
                    We exist to empower brands with a digital presence that resonates with soul and purpose.
                </p>
            </div>

            <div class="flex flex-col space-y-12">
                <div class="p-8 rounded-3xl bg-gray-200 text-black shadow-xl border border-gray-700 transition-all duration-300 hover:shadow-2xl hover:scale-[1.01] group">
                    <div class="flex items-center">
                        <span class="text-8xl font-thin text-black group-hover:opacity-40 transition-opacity duration-300">01</span>
                        <div class="ml-8">
                            <h3 class="text-4xl font-bold mb-2">Vision</h3>
                            <p class="leading-relaxed text-justify">
                                To be a leading creative agency known for crafting digital masterpieces that not only look stunning but also tell a compelling brand story. We envision a future where every brand, big or small, has a voice and a digital space that truly reflects its unique identity and values.
                            </p>
                        </div>
                    </div>
                </div>

                <div class="p-8 bg-black shadow-xl transition-all duration-300 hover:shadow-2xl hover:scale-[1.01] group">
                    <div class="flex items-center">
                        <span class="text-8xl font-thin text-white group-hover:opacity-40 transition-opacity duration-300">02</span>
                        <div class="ml-8">
                            <h3 class="text-4xl font-bold mb-2 text-white">Mission</h3>
                            <p class="text-white leading-relaxed text-justify">
                                Our mission is to combine cutting-edge technology with thoughtful design to deliver impactful solutions. We commit to understanding our clients' goals and challenges, providing a collaborative journey that results in beautiful, functional, and user-centric digital experiences.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>


 
</html>
