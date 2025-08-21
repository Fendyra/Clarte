<?php
session_start();
// Include the header partial
include 'partials/header.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Articles - CLARTÉ</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Inter:wght@400;700&display=swap');
        body { font-family: 'Inter', sans-serif; }
    </style>
</head>
<body class="bg-gray-100">

    <div class="container mx-auto p-8">
        <!-- Breadcrumb Navigation -->
        <nav class="text-sm text-gray-500 mb-8">
            <a href="index.php" class="hover:underline">Home</a> / 
            <span class="font-bold text-gray-700">Branding Articles</span>
        </nav>

        <!-- Header Section -->
        <h1 class="text-4xl md:text-5xl font-bold text-gray-800 mb-4 text-center tracking-wide">
            Branding Articles
        </h1>
        <p class="text-center text-lg mb-16 text-gray-600 max-w-2xl mx-auto">
            Explore insights, stories, and inspirations from the world of design and branding.
        </p>

        <!-- Articles Grid -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            <!-- Article Card 1: Design -->
            <div class="bg-white p-6 rounded-2xl shadow-lg hover:shadow-xl transform transition-all duration-300 hover:-translate-y-2">
                <h3 class="text-2xl font-bold text-gray-800 mb-2">Brand & Identity</h3>
                <p class="text-gray-600 mb-4">
                    Why Storytelling is the Core of Branding
                </p>
                <a href="#" class="inline-block py-2 px-4 bg-black text-white text-sm font-semibold rounded-md hover:bg-gray-800 transition-colors duration-300">
                    Read More
                </a>
            </div>

            <!-- Article Card 2: Branding -->
            <div class="bg-white p-6 rounded-2xl shadow-lg hover:shadow-xl transform transition-all duration-300 hover:-translate-y-2">
                <h3 class="text-2xl font-bold text-gray-800 mb-2">Branding</h3>
                <p class="text-gray-600 mb-4">
                    Discover how to build a strong brand identity that resonates with your audience.
                </p>
                <a href="#" class="inline-block py-2 px-4 bg-black text-white text-sm font-semibold rounded-md hover:bg-gray-800 transition-colors duration-300">
                    Read More
                </a>
            </div>

            <!-- Article Card 3: Inspiration -->
            <div class="bg-white p-6 rounded-2xl shadow-lg hover:shadow-xl transform transition-all duration-300 hover:-translate-y-2">
                <h3 class="text-2xl font-bold text-gray-800 mb-2">Rebranding </h3>
                <p class="text-gray-600 mb-4">
                    Rebranding Done Right: Lessons from Global Brands
                </p>
                <a href="#" class="inline-block py-2 px-4 bg-black text-white text-sm font-semibold rounded-md hover:bg-gray-800 transition-colors duration-300">
                    Read More
                </a>
            </div>
        </div>
    </div>

    <?php 
    // Include the footer partial
    include 'partials/footer.php';
    ?>
</body>
</html>
