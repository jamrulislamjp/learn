<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>LearnWith Jamrul | Laravel 13</title>

        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600,700" rel="stylesheet" />

        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="bg-[#FDFDFC] dark:bg-[#0a0a0a] text-[#1b1b18] dark:text-[#EDEDEC] min-h-screen flex flex-col font-sans">
        
        <header class="w-full max-w-7xl mx-auto px-6 py-6 flex justify-between items-center">
            <div class="flex items-center gap-2">
                <div class="w-10 h-10 bg-[#FF2D20] rounded-lg flex items-center justify-center shadow-lg">
                    <span class="text-white font-bold text-xl">J</span>
                </div>
                <span class="text-xl font-bold tracking-tight">LearnWith <span class="text-[#FF2D20]">Jamrul</span></span>
            </div>

            @if (Route::has('login'))
                <nav class="flex items-center gap-4">
                    @auth
                        <a href="{{ url('/dashboard') }}" class="px-5 py-2 border border-[#19140035] dark:border-[#3E3E3A] rounded-full text-sm font-medium hover:bg-gray-50 dark:hover:bg-[#161615] transition-all">Dashboard</a>
                    @else
                        <a href="{{ route('login') }}" class="text-sm font-medium hover:text-[#FF2D20] transition-colors">Log in</a>
                        @if (Route::has('register'))
                            <a href="{{ route('register') }}" class="px-5 py-2 bg-[#1b1b18] dark:bg-[#eeeeec] text-white dark:text-[#1c1c1a] rounded-full text-sm font-medium hover:opacity-90 transition-all shadow-md">Get Started</a>
                        @endif
                    @endauth
                </nav>
            @endif
        </header>

        <main class="flex-grow flex items-center justify-center px-6">
            <div class="max-w-4xl w-full text-center">
                <div class="inline-block px-4 py-1.5 mb-6 bg-[#FF2D2010] border border-[#FF2D2020] rounded-full">
                    <span class="text-[#FF2D20] text-xs font-bold uppercase tracking-widest">New: Laravel 14 + Tailwind v4</span>
                </div>
                
                <h1 class="text-5xl lg:text-7xl font-extrabold leading-tight mb-6 tracking-tighter">
                    Elevate Your Coding with <br/>
                    <span class="bg-gradient-to-r from-[#FF2D20] to-orange-500 bg-clip-text text-transparent">LearnWith Jamrul</span>
                </h1>

                <p class="text-lg lg:text-xl text-[#706f6c] dark:text-[#A1A09A] mb-10 max-w-2xl mx-auto leading-relaxed">
                    Build enterprise-level applications with high-quality standards. Mastering Laravel, FilamentPHP, and modern software architecture.
                </p>

                <div class="flex flex-col sm:flex-row items-center justify-center gap-4">
                    <a href="https://laravel.com/docs" class="w-full sm:w-auto px-8 py-4 bg-[#FF2D20] text-white rounded-xl font-bold text-lg shadow-[0_10px_20px_-5px_rgba(255,45,32,0.4)] hover:scale-105 transition-transform duration-300">
                        Explore Documentation
                    </a>
                    <a href="#" class="w-full sm:w-auto px-8 py-4 border border-[#e3e3e0] dark:border-[#3E3E3A] rounded-xl font-bold text-lg hover:bg-gray-50 dark:hover:bg-[#161615] transition-all">
                        Watch Tutorials 
                    </a>
                </div>

                <div class="mt-20 grid grid-cols-1 md:grid-cols-3 gap-6 text-left">
                    <div class="p-6 border border-[#e3e3e0] dark:border-[#3E3E3A] rounded-2xl hover:shadow-md transition-shadow">
                        <h3 class="font-bold text-lg mb-2">Filament v5 Ready</h3>
                        <p class="text-sm text-[#706f6c] dark:text-[#A1A09A]">Modern administrative panels and dashboards made easy.</p>
                    </div>
                    <div class="p-6 border border-[#e3e3e0] dark:border-[#3E3E3A] rounded-2xl hover:shadow-md transition-shadow">
                        <h3 class="font-bold text-lg mb-2">Clean Architecture</h3>
                        <p class="text-sm text-[#706f6c] dark:text-[#A1A09A]">Implementing enterprise standards and testing practices.</p>
                    </div>
                    <div class="p-6 border border-[#e3e3e0] dark:border-[#3E3E3A] rounded-2xl hover:shadow-md transition-shadow">
                        <h3 class="font-bold text-lg mb-2">Advanced SaaS</h3>
                        <p class="text-sm text-[#706f6c] dark:text-[#A1A09A]">Multi-tenant architecture for scalable business solutions.</p>
                    </div>
                </div>
            </div>
        </main>

        <footer class="w-full py-10 text-center text-sm text-[#706f6c] dark:text-[#A1A09A]">
            <p>&copy; {{ date('Y') }} <strong></strong>. Built by <a href="#" class="underline underline-offset-4 hover:text-[#FF2D20]">Jamrul Islam</a>.</p>
        </footer>
    </body>
</html>