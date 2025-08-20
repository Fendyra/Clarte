<?php include "partials/header.php"; ?> 
<!-- Memanggil file header.php -->

<body class="bg-white">

<!-- Section About -->
<section class="py-12 sm:py-16 md:py-20 bg-white mt-4 mb-[90px]">
    <div class="container mx-auto px-4 sm:px-6 md:px-8 lg:px-20">
        <div class="flex flex-col md:flex-row items-center gap-8 md:gap-12">
            <!-- Bagian Kiri: Foto -->
            <div class="relative flex-shrink-0 w-full md:w-1/2 flex flex-col md:flex-row items-center justify-center">
                
                <!-- Foto utama -->
                <img src="images/footage-1.jpg" alt="About 1"
                     class="w-[240px] sm:w-[280px] h-[320px] sm:h-[360px] object-cover rounded shadow-lg relative z-10 mb-8 mt-12 md:mb-0
                            transition-all duration-300 ease-in-out transform hover:scale-105 hover:shadow-xl md:left-18 md:left-32">

                <!-- Foto kedua (di belakang / overlap) -->
                <img src="images/footage-2.jpg" alt="About 2"
                     class="w-[240px] sm:w-[280px] h-[320px] sm:h-[360px] object-cover rounded relative md:absolute md:top-32 md:left-0 z-0
                            transition-all duration-300 ease-in-out transform hover:scale-105 hover:shadow-xl">
            </div>

            <!-- Bagian Kanan: Teks About -->
            <div class="w-full md:w-1/2 text-left">
                <p class="text-blue-700 text-sm font-semibold mb-2 ml-4">A BIT</p>
                <!-- Subjudul kecil / label -->

                <h2 class="text-2xl sm:text-3xl font-bold text-black mb-4 sm:mb-6 ml-4">
                    ABOUT CLARTÉ
                </h2>
                <!-- Judul utama (About Clarté) -->

                <p class="text-black leading-relaxed text-justify text-sm sm:text-base ml-4">
                    Clarte Creative Agency is a full-service creative and digital studio dedicated 
                    to building brands that connect and captivate. We believe that true creativity lies in 
                    the perfect fusion of art and strategy, and our mission is to transform your vision into an elegant, 
                    impactful digital presence that tells a compelling story and drives real results. Our team of passionate 
                    designers, developers, and strategists are committed to delivering excellence, from meticulous brand identities 
                    and cutting-edge web development to data-driven digital marketing, ensuring your brand shines with purpose and elegance.
                </p>
            </div>
        </div>
    </div>
</section>

<!-- Footer -->
<?php include "partials/footer.php"; ?>
<!-- Panggil file footer.php -->

</body>
