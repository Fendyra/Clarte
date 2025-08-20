<footer class="bg-black text-white font-sans py-4 md:py-6">
    <div class="container mx-auto px-6">
        <div class="flex flex-col md:flex-row justify-between items-start gap-12">
            <!-- Kolom Kiri: Brand & Sosmed -->
            <div class="w-full md:w-1/3">
                <h2 class="text-3xl font-bold uppercase tracking-widest mb-4">CLARTÉ</h2>
                <p class="text-sm text-gray-400 leading-relaxed mb-6">
                    We craft elegant & soulful digital experiences for creative brands.
                </p>
                <!-- Ikon Sosmed -->
                <div class="flex gap-4">
                    <!-- Instagram -->
                    <a href="#" target="_blank" 
                       class="transition-transform duration-300 hover:scale-110">
                        <iconify-icon icon="mingcute:instagram-line" width="25" height="25" style="color: #fff"></iconify-icon>
                    </a>
                    <!-- WhatsApp -->
                    <a href="https://wa.me/6285602683420?text=Halo,%20saya%20tertarik%20dengan%20layanan%20Anda" 
                       target="_blank" class="transition-transform duration-300 hover:scale-110">
                        <iconify-icon icon="ic:baseline-whatsapp" width="25" height="25" style="color: #fff"></iconify-icon>
                    </a>
                </div>
            </div>

            <!-- Kolom Kanan: Navigasi & Kontak -->
            <div class="flex flex-col sm:flex-row md:justify-end w-full md:w-2/3 gap-12">
                
                <!-- Menu Navigasi -->
                <nav>
                    <h3 class="font-bold text-lg mb-4 text-yellow-400 uppercase">Explore</h3>
                    <ul>
                        <li class="mb-2">
                            <a href="services.php" class="text-gray-300 hover:text-white transition-colors duration-300">
                                Services
                            </a>
                        </li>
                        <li class="mb-2">
                            <a href="work.php" class="text-gray-300 hover:text-white transition-colors duration-300">
                                Our Work
                            </a>
                        </li>
                        <li>
                            <a href="about.php" class="text-gray-300 hover:text-white transition-colors duration-300">
                                About Us
                            </a>
                        </li>
                    </ul>
                </nav>

                <!-- Menu Kontak -->
                <nav>
                    <h3 class="font-bold text-lg mb-4 text-yellow-400 uppercase">Contact Us</h3>
                    <ul>
                        <li class="mb-2">
                            <!-- Klik langsung call -->
                            <a href="tel:+6285602683420" 
                               class="text-gray-300 hover:text-white transition-colors duration-300">
                                +(62) 8560 2683 420
                            </a>
                        </li>
                        <li class="mb-2">
                            <!-- Klik langsung email -->
                            <a href="mailto:info@clarte.com" 
                               class="text-gray-300 hover:text-white transition-colors duration-300">
                                info@clarte.com
                            </a>
                        </li>
                        <li class="break-words">
                            <!-- Alamat -->
                            <p class="text-gray-300">Sleman, Yogyakrta, Indonesia</p>
                        </li>
                    </ul>
                </nav>
            </div>
        </div>

        <!-- Copyright -->
        <div class="border-t border-gray-700 mt-12 pt-6 text-center">
            <p class="text-sm text-gray-500">
                &copy; <?php echo date("Y"); ?> Clarté. All rights reserved.
                <!-- Tahun otomatis pakai PHP -->
            </p>
        </div>
    </div>
</footer>
