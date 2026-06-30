<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'SIKEPEL') }} - Login</title>

        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=inter:300,400,500,600,700&display=swap" rel="stylesheet" />

        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans antialiased bg-gray-50">
        <div class="min-h-screen flex">

            <!-- Branding Panel - Hidden on mobile, shown on lg+ -->
            <aside class="hidden lg:flex lg:w-1/2 flex-col items-center justify-center bg-gradient-to-br from-emerald-800 via-emerald-700 to-emerald-900 p-12 relative overflow-hidden">
                <!-- Background pattern -->
                <div class="absolute inset-0 opacity-10">
                    <svg class="w-full h-full" viewBox="0 0 100 100" preserveAspectRatio="none">
                        <defs>
                            <pattern id="grid" width="10" height="10" patternUnits="userSpaceOnUse">
                                <path d="M 10 0 L 0 0 0 10" fill="none" stroke="white" stroke-width="0.5"/>
                            </pattern>
                        </defs>
                        <rect width="100" height="100" fill="url(#grid)"/>
                    </svg>
                </div>

                <!-- Floating elements -->
                <div class="absolute top-20 left-10 w-32 h-32 bg-white/10 rounded-full blur-3xl"></div>
                <div class="absolute bottom-20 right-10 w-48 h-48 bg-emerald-300/20 rounded-full blur-3xl"></div>

                <div class="relative z-10 max-w-lg">
                    <!-- Logo -->
                    <div class="flex items-center gap-3 mb-10">
                        <div class="w-14 h-14 bg-white rounded-2xl flex items-center justify-center shadow-2xl shadow-emerald-900/30">
                            <span class="text-emerald-800 font-bold text-2xl tracking-tight">SK</span>
                        </div>
                        <div>
                            <h1 class="text-white font-bold text-3xl tracking-tight">SIKEPEL</h1>
                            <p class="text-emerald-200/80 text-sm mt-1">Sistem Informasi Kelurahan</p>
                        </div>
                    </div>

                    <!-- Tagline -->
                    <p class="text-white/90 text-lg leading-relaxed mb-12">
                        Kelola surat keluar, surat masuk, SKTM, dan surat belum rumah dengan cepat, aman, dan terintegrasi.
                    </p>

                    <!-- Features -->
                    <div class="space-y-4">
                        @foreach([
                            ['icon' => 'M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z', 'title' => 'Surat Keluar', 'desc' => 'Buat dan kelola surat keluar resmi'],
                            ['icon' => 'M20 13V6a2 2 0 00-2-2H6a2 2 0 00-2 2v7m16 0v5a2 2 0 01-2 2H6a2 2 0 01-2-2v-5', 'title' => 'Surat Masuk', 'desc' => 'Terima dan disposisi surat masuk'],
                            ['icon' => 'M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z', 'title' => 'SKTM & Belum Rumah', 'desc' => 'Pelayanan masyarakat terintegrasi'],
                        ] as $feature)
                            <div class="flex items-start gap-4 bg-white/10 backdrop-blur-sm rounded-xl p-4 border border-white/20 hover:bg-white/15 transition-colors">
                                <div class="w-11 h-11 rounded-xl bg-white/20 flex items-center justify-center flex-shrink-0">
                                    <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="{{ $feature['icon'] }}"/>
                                    </svg>
                                </div>
                                <div>
                                    <p class="text-white font-semibold">{{ $feature['title'] }}</p>
                                    <p class="text-emerald-100/80 text-sm">{{ $feature['desc'] }}</p>
                                </div>
                            </div>
                        @endforeach
                    </div>

                    <!-- Footer -->
                    <div class="absolute bottom-8 left-12 right-12 flex items-center justify-between text-emerald-200/60 text-sm">
                        <span>Kecamatan {{ config('app.kecamatan', 'Cibodas') }} - Kota Tangerang</span>
                        <span>v{{ config('app.version', '1.0.0') }}</span>
                    </div>
                </div>
            </aside>

            <!-- Form Panel -->
            <main class="flex-1 flex items-center justify-center p-6 lg:p-12">
                <div class="w-full max-w-md">
                    <!-- Mobile branding -->
                    <div class="lg:hidden flex items-center justify-center gap-3 mb-10">
                        <div class="w-12 h-12 bg-gradient-to-br from-emerald-400 to-emerald-600 rounded-xl flex items-center justify-center shadow-lg shadow-emerald-200">
                            <span class="text-white font-bold text-xl tracking-tight">SK</span>
                        </div>
                        <div>
                            <h1 class="text-gray-900 font-bold text-2xl tracking-tight">SIKEPEL</h1>
                            <p class="text-gray-500 text-sm">Sistem Informasi Kelurahan</p>
                        </div>
                    </div>

                    <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-8 lg:p-10">
                        <header class="text-center mb-8 lg:mb-10">
                            <h2 class="text-2xl lg:text-3xl font-bold text-gray-900">Selamat Datang</h2>
                            <p class="text-gray-500 mt-2">Masuk ke akun Anda untuk melanjutkan</p>
                        </header>

                        {{ $slot }}

                        <footer class="mt-8 text-center text-sm text-gray-400">
                            <p>&copy; {{ date('Y') }} {{ config('app.name', 'SIKEPEL') }}. Hak cipta dilindungi.</p>
                        </footer>
                    </div>
                </div>
            </main>
        </div>
    </body>
</html>