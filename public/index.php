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
                <h2 class="text-xl md:text-2xl font-bold leading-tight text-black mb-4">
                    About Us
                </h2>
                <p class="text-7xl md:text-8xl text-gray-400">
                  We build brands that speak volumes.
                </p>
            </div>

            <div class="flex flex-col space-y-6 lg:mt-[100px]">
                <p class="text-black leading-relaxed text-justify">
                    Clarte Creative Agency is a full-service creative and digital studio dedicated to building brands that connect and captivate. We believe that true creativity lies in the perfect fusion of art and strategy, and our mission is to transform your vision into an elegant, impactful digital presence that tells a compelling story and drives real results. Our team of passionate designers, developers, and strategists are committed to delivering excellence, from meticulous brand identities and cutting-edge web development to data-driven digital marketing, ensuring your brand shines with purpose and elegance.
                </p>
              <a href="about.php"
                class="self-start inline-block border border-gray-700 rounded-full text-black px-6 py-2 text-base transition-colors duration-300 hover:bg-black hover:text-white">
                <span class="relative z-10">See More</span>
              </a>

            </div>
            </div>
        </div>
</section>

<footer class="bg-black text-white font-sans py-10 md:py-16">
    <?php include "partials/footer.php"; ?>
 
</html>
