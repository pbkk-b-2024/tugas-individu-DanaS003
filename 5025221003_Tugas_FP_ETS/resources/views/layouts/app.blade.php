<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'TokoKiu')</title>
    <link rel="icon" href="{{ asset('images/logo.jpg') }}" type="image/jpeg" sizes="16x16" />
    @vite('resources/css/app.css')
    @stack('styles')
</head>
<body class="bg-gray-100 font-sans leading-normal tracking-normal">
    <div x-data="{ sidebarOpen: false }" class="flex flex-col md:flex-row">
        <!-- Sidebar -->
        <nav :class="{'block': sidebarOpen, 'hidden': !sidebarOpen}" class="bg-gray-800 md:w-64 w-full md:block min-h-screen relative inset-y-0 left-0 transform md:translate-x-0 transition duration-200 ease-in-out z-30">
            <div class="p-4 flex justify-between items-center">
                <div class="flex gap-x-3 items-center">
                    <div class="w-16 h-auto">
                        <img src="{{ asset('images/logo.jpg') }}" alt="TokoKiu" class="w-16 h-auto object-cover rounded-lg cursor-pointer" id="productImage">
                    </div>
                    <div class="text-white text-2xl font-semibold">Mark'D</div>
                </div>
                <button @click="sidebarOpen = false" class="md:hidden text-gray-300 hover:text-white">
                    <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
            @auth
            <ul class="mt-6">
                <li class="text-gray-300 hover:bg-gray-700 mb-3">
                    <a href="{{ route('dashboard') }}" class="flex items-center px-4 py-3">
                        <svg class="h-6 w-6 mr-2" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-home">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                            <path d="M5 12l-2 0l9 -9l9 9l-2 0" />
                            <path d="M5 12v7a2 2 0 0 0 2 2h10a2 2 0 0 0 2 -2v-7" />
                            <path d="M9 21v-6a2 2 0 0 1 2 -2h2a2 2 0 0 1 2 2v6" /></svg>
                        Dashboard
                    </a>
                </li>
                @if(auth()->user()->hasRole('admin') || auth()->user()->hasRole('petugas'))
                <li class="text-gray-300 hover:bg-gray-700 mb-3">
                    <a href="{{ route('produk.index') }}" class="flex items-center px-4 py-3">
                        <svg class="h-6 w-6 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4" />
                        </svg>
                        Produk
                    </a>
                </li>
                <li class="text-gray-300 hover:bg-gray-700 mb-3">
                    <a href="{{ route('kategori.index') }}" class="flex items-center px-4 py-3">
                        <svg class="h-6 w-6 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10" />
                        </svg>
                        Kategori
                    </a>
                </li>
                @if(auth()->user()->hasRole('admin'))
                <li class="text-gray-300 hover:bg-gray-700 mb-3">
                    <a href="{{ route('transaksi.index') }}" class="flex items-center px-4 py-3">
                        <svg class="h-6 w-6 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01" />
                        </svg>
                        Transaksi
                    </a>
                </li>
                @endif
                <li class="text-gray-300 hover:bg-gray-700 mb-3">
                    <a href="{{ route('stok.index') }}" class="flex items-center px-4 py-3">
                        <svg class="h-6 w-6 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2" />
                        </svg>
                        Stok
                    </a>
                </li>
                @endif

                @if(auth()->user()->hasRole('admin'))
                <li class="text-gray-300 hover:bg-gray-700 mb-3">
                    <a href="{{ route('pengguna.index') }}" class="flex items-center px-4 py-3">
                        <svg class="h-6 w-6 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z" />
                        </svg>
                        Pengguna
                    </a>
                </li>
                @endif

                @if(auth()->user()->hasRole('pembeli'))
                <li class="text-gray-300 hover:bg-gray-700 mb-3">
                    <a href="{{ route('produk.list') }}" class="flex items-center px-4 py-3">
                        <svg class="h-6 w-6 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10" />
                        </svg>
                        Produk
                    </a>
                </li>
                <li class="text-gray-300 hover:bg-gray-700 mb-3">
                    <a href="{{ route('keranjang.index') }}" class="flex items-center px-4 py-3">
                        <svg class="h-6 w-6 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z" />
                        </svg>
                        Keranjang
                    </a>
                </li>
                <li class="text-gray-300 hover:bg-gray-700 mb-3">
                    <a href="{{ route('transaksi.list') }}" class="flex items-center px-4 py-3">
                        <svg class="h-6 w-6 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01" />
                        </svg>
                        Transaksi
                    </a>
                </li>
                @endif
            </ul>
            @endauth
        </nav>

        <!-- Content -->
        <div class="flex-1">
            <header class="bg-white shadow">
                <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8 flex justify-between items-center">
                    <div class="flex items-center">
                        <button @click="sidebarOpen = !sidebarOpen" class="md:hidden mr-4 text-gray-500 hover:text-gray-600">
                            <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                            </svg>
                        </button>
                        <h1 class="text-3xl font-bold text-gray-900">
                            @yield('header', 'Dashboard')
                        </h1>
                    </div>
                    @guest
                    {{-- <div>
                        <a href="{{ route('login') }}" class="text-gray-600 hover:text-gray-900 mr-4">Masuk</a>
                    <a href="{{ route('register') }}" class="text-gray-600 hover:text-gray-900">Daftar</a>
                </div> --}}
                @else
                <div class="flex items-center">
                    <div class="mr-4 hidden sm:flex gap-x-3">
                        <div class="pl-2 pr-4 py-2 bg-blue-100 ring-1 ring-blue-600 text-blue-700 rounded flex gap-x-1 items-center">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-user-circle">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                <path d="M12 12m-9 0a9 9 0 1 0 18 0a9 9 0 1 0 -18 0" />
                                <path d="M12 10m-3 0a3 3 0 1 0 6 0a3 3 0 1 0 -6 0" />
                                <path d="M6.168 18.849a4 4 0 0 1 3.832 -2.849h4a4 4 0 0 1 3.834 2.855" />
                            </svg>
                            {{ Auth::user()->name}}
                        </div>
                        <div class="pl-2 pr-4 py-2 bg-yellow-100 ring-1 ring-yellow-600 text-yellow-700 rounded flex gap-x-1 items-center">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-shield-chevron">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                <path d="M12 3a12 12 0 0 0 8.5 3a12 12 0 0 1 -8.5 15a12 12 0 0 1 -8.5 -15a12 12 0 0 0 8.5 -3" />
                                <path d="M4 14l8 -3l8 3" />
                            </svg>
                            {{ Auth::user()->role }}
                        </div>
                    </div>
                    <form action="{{ route('logout') }}" method="POST">
                        @csrf
                        <button type="submit" class="bg-red-500 hover:bg-red-600 text-white font-bold py-2 px-4 rounded">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-power">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                <path d="M7 6a7.75 7.75 0 1 0 10 0" />
                                <path d="M12 4l0 8" /></svg>
                        </button>
                    </form>
                </div>
                @endguest
        </div>
        </header>
        <main>
            <div class="max-w-7xl mx-auto py-6 sm:px-6 lg:px-8">
                @yield('content')
            </div>
        </main>
    </div>
    </div>

    @vite('resources/js/app.js')
    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script>
    @stack('scripts')
</body>
</html>
