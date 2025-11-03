<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Portofolio Profesional Saya | @yield('title')</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        /* Efek glow lembut untuk tombol CTA */
        .glow {
            box-shadow: 0 0 15px rgba(99, 102, 241, 0.6),
                        0 0 30px rgba(99, 102, 241, 0.3);
        }
        .btn-gradient {
            background: linear-gradient(135deg, #6366f1, #8b5cf6);
            color: white;
            transition: all 0.3s ease;
        }
        .btn-gradient:hover {
            background: linear-gradient(135deg, #4f46e5, #7c3aed);
            transform: scale(1.05);
            box-shadow: 0 0 20px rgba(99, 102, 241, 0.6);
        }
        /* Efek shimmer animasi */
        .shine {
            position: relative;
            overflow: hidden;
        }
        .shine::after {
            content: '';
            position: absolute;
            top: 0;
            left: -75%;
            width: 50%;
            height: 100%;
            background: linear-gradient(
                120deg,
                rgba(255, 255, 255, 0.3) 0%,
                rgba(255, 255, 255, 0.6) 50%,
                rgba(255, 255, 255, 0.3) 100%
            );
            transform: skewX(-25deg);
            animation: shine 2s infinite;
        }
        @keyframes shine {
            0% { left: -75%; }
            100% { left: 125%; }
        }
    </style>
</head>
<body class="bg-gray-50 text-gray-800">

    {{-- Navbar --}}
    <header class="bg-white shadow-md sticky top-0 z-50">
        <nav class="container mx-auto px-4 py-4 flex justify-between items-center">
            {{-- Logo --}}
            <a href="{{ route('portfolio.index') }}" class="text-2xl font-bold text-indigo-600 hover:text-indigo-700 transition">
                MyPorto
            </a>

            {{-- Navigation Links --}}
            <div class="flex items-center space-x-2">
                <a href="{{ route('portfolio.index') }}"
                   class="px-4 py-2 rounded-md text-sm font-medium transition
                   {{ request()->routeIs('portfolio.index')
                        ? 'bg-indigo-600 text-white shadow-md'
                        : 'text-gray-700 hover:text-indigo-600 hover:bg-indigo-50' }}">
                    Portofolio
                </a>

                {{-- Tombol Layanan (spesial & menarik) --}}
                <a href="{{ route('portfolio.services') }}"
                   class="px-5 py-2 rounded-full text-sm font-semibold btn-gradient shine
                   {{ request()->routeIs('portfolio.services') ? 'glow scale-105 ring-2 ring-indigo-400' : '' }}">
                    🚀 Layanan
                </a>
            </div>
        </nav>
    </header>

    {{-- Main Content --}}
    <main class="container mx-auto px-4 py-8">
        @yield('content')
    </main>

    {{-- Footer --}}
    <footer class="bg-gray-800 text-white mt-12">
        <div class="container mx-auto px-4 py-6 text-center text-sm">
            &copy; {{ date('Y') }} Portofolio Saya. Dibuat dengan ❤️ menggunakan Laravel.
        </div>
    </footer>
</body>
</html>
