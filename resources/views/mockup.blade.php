<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        <title>Simple Tailwind Mockup</title>
        <script src="https://cdn.tailwindcss.com"></script>
        <link rel="stylesheet" href="style.css">
    </head>
    <body class="antialiased text-gray-800 bg-white font-sans">

    <!-- Navbar -->
    <header class="bg-white shadow">
        <div class="max-w-6xl mx-auto px-6 flex items-center justify-between h-16">
            <div class="text-xl font-bold text-blue-600">Logo</div>
            <nav class="flex gap-6 text-sm">
                <a href="index.html" class="hover:text-blue-600">quiz</a>
                <a href="leaderboard.html" class="hover:text-blue-600">leaderboard</a>
                <a href="auth.html" class="hover:text-blue-600">authenticatie</a>
            </nav>
        </div>
    </header>


    <!-- Hero -->
    <section class="max-w-6xl mx-auto px-6 py-16 text-center">
        <h1 class="text-4xl font-extrabold">Build better, faster</h1>
        <p class="mt-4 text-gray-600">A simple mockup website made with Tailwind CSS.</p>
        <div class="mt-6 flex justify-center gap-4">
            <a href="#pricing" class="px-5 py-3 bg-blue-600 text-white rounded-lg">Get Started</a>
            <a href="#features" class="px-5 py-3 border rounded-lg">Learn More</a>
        </div>
    </section>

    <section class="container max-w-6xl mx-auto">
        <div class="grid grid-cols-1 md:grid-cols-3 gap-3">
            <div class="card bg-gray-300 rounded-md">
                <h3>
                    Titel
                </h3>
            </div>
        </div>
    </section>

    <!-- Features -->
    <section id="features" class="max-w-6xl mx-auto px-6 py-12">
        <h2 class="text-2xl font-bold text-center">Features</h2>
        <div class="mt-8 grid grid-cols-1 md:grid-cols-3 gap-6 text-center">
            <div class="p-6 border rounded-lg">
                <h3 class="font-semibold">Fast</h3>
                <p class="text-sm text-gray-600 mt-2">Quick to set up and use.</p>
            </div>
            <div class="p-6 border rounded-lg">
                <h3 class="font-semibold">Responsive</h3>
                <p class="text-sm text-gray-600 mt-2">Looks great on any device.</p>
            </div>
            <div class="p-6 border rounded-lg">
                <h3 class="font-semibold">Simple</h3>
                <p class="text-sm text-gray-600 mt-2">Clean design with no clutter.</p>
            </div>
        </div>
    </section>


    <!-- Pricing -->
    <section id="pricing" class="bg-gray-50 py-12">
        <div class="max-w-6xl mx-auto px-6">
            <h2 class="text-2xl font-bold text-center">Pricing</h2>
            <div class="mt-8 grid grid-cols-1 md:grid-cols-3 gap-6">
                <div class="p-6 bg-white border rounded-lg text-center">
                    <div class="text-lg font-semibold">Free</div>
                    <div class="mt-2 text-3xl font-bold">$0</div>
                </div>
                <div class="p-6 bg-white border rounded-lg text-center">
                    <div class="text-lg font-semibold">Pro</div>
                    <div class="mt-2 text-3xl font-bold">$12/mo</div>
                </div>
                <div class="p-6 bg-white border rounded-lg text-center">
                    <div class="text-lg font-semibold">Enterprise</div>
                    <div class="mt-2 text-3xl font-bold">Contact</div>
                </div>
            </div>
        </div>
    </section>


    <!-- Inloggen -->
    <section id="Login" class="max-w-6xl mx-auto px-6 py-12">
        <h2 class="text-2xl font-bold text-center">Login</h2>
        <form class="mt-6 max-w-md mx-auto flex flex-col gap-4">
            <input class="p-2 border rounded" placeholder="Email" />
            <input class="p-2 border rounded" placeholder="Wachtwoord" />
            <button class="px-4 py-2 bg-blue-600 text-white rounded">Inloggen</button>
            <p>Heb je geen account? <a class="underline" href="">Meld je dan aan</a></p>
        </form>
    </section>

    <section class="max-w-6xl mx-auto px-6 py-12">
        <div class="w-36 h-36 rounded-full bg-gray-200">
            <p>3204</p>
        </div>

        <button class="py-4 px-8 bg-gray-300 rounded-md hover:bg-gray-500 transition-colors duration-200">Stoppen</button>
        <button class="p-4 bg-gray-300 hover:bg-gray-500">Doorgaan</button>
    </section>
</html>