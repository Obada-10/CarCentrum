<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>@yield('title', 'CarCentum')</title>
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

    <main class="pt-24">
        @yield('content')
    </main>

    <!-- Footer -->
    <footer class="bg-secondary-900 text-white py-8 mt-24">
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
