<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>CarCentum - Auto Onderdelen</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        primary: {
                            50: '#f0f9ff',
                            100: '#e0f2fe',
                            200: '#bae6fd',
                            300: '#7dd3fc',
                            400: '#38bdf8',
                            500: '#0ea5e9',
                            600: '#0284c7',
                            700: '#0369a1',
                            800: '#075985',
                            900: '#0c4a6e',
                        },
                        secondary: {
                            50: '#f8fafc',
                            100: '#f1f5f9',
                            200: '#e2e8f0',
                            300: '#cbd5e1',
                            400: '#94a3b8',
                            500: '#64748b',
                            600: '#475569',
                            700: '#334155',
                            800: '#1e293b',
                            900: '#0f172a',
                        },
                    }
                }
            }
        }
    </script>
</head>
<body class="bg-gray-50 text-secondary-900">

    <!-- Navigatie -->
    <nav class="absolute top-0 left-0 w-full z-50 bg-secondary-900 bg-opacity-90">
        <div class="max-w-7xl mx-auto px-4 py-4 flex justify-between items-center text-white">
            <a href="/" class="text-2xl font-bold text-primary-400 hover:text-primary-300 transition">CarCentum</a>
            <div class="flex items-center space-x-6">
                <a href="/" class="hover:text-primary-300 font-medium transition">Home</a>
                @auth
                    <a href="{{ route('dashboard') }}" class="hover:text-primary-300 font-medium transition">Dashboard</a>
                @endauth
                @guest
                    <a href="{{ route('login') }}" class="hover:text-primary-300 font-medium transition">Inloggen</a>
                    <a href="{{ route('register') }}" class="bg-primary-600 hover:bg-primary-700 text-white px-4 py-2 rounded-md font-medium transition">Registreren</a>
                @endguest
            </div>
        </div>
    </nav>

    <!-- Hero (onveranderd gelaten zoals gevraagd) -->
    <header class="relative h-screen bg-cover bg-center" style="background-image: url('https://www.topgear.com/sites/default/files/2023/09/33156-RS7PERFORMANCEASCARIBLUEJORDANBUTTERS132.jpg');">
        <div class="bg-secondary-900 bg-opacity-70 h-full flex flex-col items-center justify-center text-center text-white px-6">
            <h1 class="text-5xl font-bold mb-4">Welkom bij CarCentum</h1>
            <p class="text-xl mb-8 max-w-2xl">Jouw partner in betrouwbare auto-onderdelen met meer dan 15 jaar ervaring in de automotive sector</p>
            <a href="#producten" class="bg-primary-600 hover:bg-primary-700 text-white py-3 px-8 rounded-full text-lg font-semibold transition transform hover:scale-105">
                Bekijk onze producten
            </a>
        </div>
    </header>

    <!-- Waarom CarCentum? (met nieuwe kleur) -->
    <section class="py-20 px-6 bg-indigo-50"> <!-- Nieuwe achtergrondkleur -->
        <div class="max-w-5xl mx-auto text-center">
            <h2 class="text-4xl font-bold mb-6 text-secondary-800">Waarom CarCentum?</h2>
            <p class="text-lg text-secondary-600 mb-12">Wij combineren kwaliteit, betrouwbaarheid en scherpe prijzen. Meer dan 10.000 tevreden klanten gingen je voor.</p>
            <div class="grid md:grid-cols-3 gap-8">
                <div class="bg-white p-6 rounded-xl shadow-md hover:shadow-lg transition">
                    <div class="text-indigo-500 text-4xl mb-4">🚗</div> <!-- Nieuwe icon kleur -->
                    <h3 class="text-xl font-semibold mb-2 text-secondary-800">Originele Onderdelen</h3>
                    <p class="text-secondary-600">We leveren uitsluitend gecertificeerde onderdelen van topkwaliteit.</p>
                </div>
                <div class="bg-white p-6 rounded-xl shadow-md hover:shadow-lg transition">
                    <div class="text-indigo-500 text-4xl mb-4">⚙️</div> <!-- Nieuwe icon kleur -->
                    <h3 class="text-xl font-semibold mb-2 text-secondary-800">Snelle Levering</h3>
                    <p class="text-secondary-600">Voor 17:00 besteld? Morgen in huis.</p>
                </div>
                <div class="bg-white p-6 rounded-xl shadow-md hover:shadow-lg transition">
                    <div class="text-indigo-500 text-4xl mb-4">📞</div> <!-- Nieuwe icon kleur -->
                    <h3 class="text-xl font-semibold mb-2 text-secondary-800">Expert Support</h3>
                    <p class="text-secondary-600">Onze specialisten staan klaar voor advies over je bestelling.</p>
                </div>
            </div>
        </div>
    </section>

   <!-- Categorieën (met nieuwe foto's) -->
   <section class="py-20 px-6 bg-white">
    <div class="max-w-7xl mx-auto">
        <h2 class="text-3xl font-semibold mb-12 text-center text-secondary-800">Populaire Categorieën</h2>
        <div class="grid md:grid-cols-4 gap-6">
            @foreach ($categories as $category)
            <a href="{{ route('products.byCategory', $category->id) }}">
                <div class="relative group rounded-xl overflow-hidden shadow-md hover:shadow-xl transition duration-300">
                    <img src="{{ $category->image_url }}" 
                         class="h-48 w-full object-cover group-hover:scale-105 transition duration-500" 
                         alt="{{ $category->name }}">
                    <div class="absolute inset-0 bg-gradient-to-t from-secondary-900 via-secondary-900/30 to-transparent flex items-end p-4">
                        <h3 class="text-lg font-bold text-white">{{ $category->name }}</h3>
                    </div>
                </div>
            </a>
        @endforeach        
        </div>

        <div class="text-center mt-12">
            <a href="{{ route('categories.index') }}" class="bg-primary-600 hover:bg-primary-700 text-white py-3 px-8 rounded-full text-lg font-semibold transition transform hover:scale-105">
                Bekijk alle categorieën
            </a>
        </div>
    </div>
</section>

    <!-- Uitgelichte Producten (met nieuwe foto's) -->
    <section id="producten" class="py-20 px-6 bg-gray-50">
        <div class="max-w-6xl mx-auto">
            <h2 class="text-3xl font-semibold mb-12 text-center text-secondary-800">Uitgelichte Producten</h2>
            <div class="grid md:grid-cols-3 gap-6">
                <!-- Product 1 met nieuwe foto -->
                <div class="bg-white border border-gray-200 rounded-lg overflow-hidden shadow-sm hover:shadow-md transition hover:-translate-y-1">
                    <img src="https://images.unsplash.com/photo-1605548174642-4e3bd70c1bb1?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1374&q=80" alt="Premium remschijven" class="w-full h-48 object-cover">
                    <div class="p-5">
                        <span class="inline-block bg-primary-100 text-primary-600 text-xs px-2 py-1 rounded-full mb-2">Nieuw</span>
                        <h3 class="text-xl font-bold mb-2 text-secondary-800">Premium Remschijven</h3>
                        <p class="text-secondary-600 text-sm mb-4">Hoogwaardige remschijven voor optimale remprestaties.</p>
                        <div class="flex justify-between items-center">
                            <span class="text-lg font-semibold text-primary-600">€89,00</span>
                            <button class="bg-primary-600 hover:bg-primary-700 text-white text-sm px-4 py-2 rounded-md transition">
                                Bekijk details
                            </button>
                        </div>
                    </div>
                </div>
                
                <!-- Product 2 met nieuwe foto -->
                <div class="bg-white border border-gray-200 rounded-lg overflow-hidden shadow-sm hover:shadow-md transition hover:-translate-y-1">
                    <img src="https://images.unsplash.com/photo-1597938431887-15fb46554a0e?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1470&q=80" alt="LED koplampen" class="w-full h-48 object-cover">
                    <div class="p-5">
                        <span class="inline-block bg-primary-100 text-primary-600 text-xs px-2 py-1 rounded-full mb-2">Bestseller</span>
                        <h3 class="text-xl font-bold mb-2 text-secondary-800">LED Koplampen Set</h3>
                        <p class="text-secondary-600 text-sm mb-4">Ultraheldere LED verlichting voor betere zichtbaarheid.</p>
                        <div class="flex justify-between items-center">
                            <span class="text-lg font-semibold text-primary-600">€129,00</span>
                            <button class="bg-primary-600 hover:bg-primary-700 text-white text-sm px-4 py-2 rounded-md transition">
                                Bekijk details
                            </button>
                        </div>
                    </div>
                </div>
                
                <!-- Product 3 met nieuwe foto -->
                <div class="bg-white border border-gray-200 rounded-lg overflow-hidden shadow-sm hover:shadow-md transition hover:-translate-y-1">
                    <img src="https://images.unsplash.com/photo-1618843479313-40f8afb4b4d8?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1470&q=80" alt="Luchtfilter" class="w-full h-48 object-cover">
                    <div class="p-5">
                        <span class="inline-block bg-primary-100 text-primary-600 text-xs px-2 py-1 rounded-full mb-2">Aanbieding</span>
                        <h3 class="text-xl font-bold mb-2 text-secondary-800">Performance Luchtfilter</h3>
                        <p class="text-secondary-600 text-sm mb-4">Verbetert de luchtstroom voor meer motorvermogen.</p>
                        <div class="flex justify-between items-center">
                            <span class="text-lg font-semibold text-primary-600">€49,00</span>
                            <button class="bg-primary-600 hover:bg-primary-700 text-white text-sm px-4 py-2 rounded-md transition">
                                Bekijk details
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- CTA -->
    <section class="bg-gradient-to-r from-black to-primary-800 text-white py-20 text-center">
        <div class="max-w-3xl mx-auto px-6">
            <h2 class="text-4xl font-bold mb-4">Start vandaag nog met CarCentum</h2>
            <p class="text-lg mb-8">Registreer je gratis en ontdek duizenden hoogwaardige onderdelen voor jouw auto.</p>
            <a href="{{ route('register') }}" class="inline-block bg-white text-primary-600 hover:bg-gray-100 font-semibold py-3 px-8 rounded-full transition transform hover:scale-105">
                Gratis registreren
            </a>
        </div>
    </section>    

    <!-- Footer -->
    <footer class="bg-secondary-900 text-white py-8">
        <div class="max-w-7xl mx-auto px-4">
            <div class="flex flex-col md:flex-row justify-between items-center">
                <div class="mb-4 md:mb-0">
                    <a href="/" class="text-2xl font-bold text-primary-400">CarCentum</a>
                    <p class="text-secondary-400 mt-2">Jouw betrouwbare partner voor auto-onderdelen</p>
                </div>
                <div class="flex space-x-6">
                    <a href="#" class="text-secondary-300 hover:text-white transition">Algemene voorwaarden</a>
                    <a href="#" class="text-secondary-300 hover:text-white transition">Privacybeleid</a>
                    <a href="#" class="text-secondary-300 hover:text-white transition">Contact</a>
                </div>
            </div>
            <div class="border-t border-secondary-700 mt-6 pt-6 text-center text-secondary-400">
                &copy; {{ date('Y') }} CarCentum. Alle rechten voorbehouden.
            </div>
        </div>
    </footer>

</body>
</html>