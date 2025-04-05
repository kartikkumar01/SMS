<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>SMS - Learn Stock Market Videos</title>
    <?php include("include/head-links.php"); ?>
</head>
<body class="dark:bg-hsecondary-dark dark:text-text-dark text-text-light bg-bg-light text-body-desktop">
    <?php include("include/header.php"); ?>
    
    <main class="w-[93%] md:w-[70%] mx-auto">
        <h1 class="text-3xl md:text-4xl font-bold text-center my-8">Learn Stock Market - Video Tutorials</h1>
        
        <section class="bg-white dark:bg-gray-800 p-3 md:p-8  rounded-lg shadow-lg mb-8">
            <h2 class="text-3xl font-semibold mb-4">What is Compounding ?</h2>
            <iframe class="w-full h-35 md:h-110 rounded-lg" src="https://www.youtube.com/embed/b6NP2fIThPQ?si=8GjntTe6rvfRvt5T" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
            <p class="text-lg leading-relaxed mt-4">
                <div class="font-bold italic">"Compounding is when you earn money on the money you already earned"</div>
                For example, if you put money in a piggy bank and it grows a little each year, next year it grows even more because it’s growing on the new total!
            </p>
        </section>
        <section class="bg-white dark:bg-gray-800 p-3 md:p-8  rounded-lg shadow-lg mb-8">
            <h2 class="text-3xl font-semibold mb-4">What is Budget ?</h2>
            <iframe class="w-full h-35 md:h-110 rounded-lg" src="https://www.youtube.com/embed/9MdbLP6hQ7E?si=KadfdrHmB17IQWhd" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
            <p class="text-lg leading-relaxed mt-4">
                <div class="font-bold italic">"A budget is a plan for how to spend your money."</div>
                It helps you make sure you have enough for things you need, like food or toys, without running out.
            </p>
            </section>
            <section class="bg-white dark:bg-gray-800 p-3 md:p-8  rounded-lg shadow-lg mb-8">
                <h2 class="text-3xl font-semibold mb-4">What is Inflation ?</h2>
                <iframe class="w-full h-35 md:h-110 rounded-lg" src="https://www.youtube.com/embed/iIVBkyRTqXk?si=ncFNtGqDmwCm87rK" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
                <p class="text-lg leading-relaxed mt-4">
                    <div class="font-bold italic">"Inflation means things get more expensive over time."</div>
                    So, if a chocolate bar costs ₹10 today, it might cost ₹12 next year.
                </p>
        </section>

    </main>
    
    <?php include("include/footer.php"); ?>
</body>
</html>
