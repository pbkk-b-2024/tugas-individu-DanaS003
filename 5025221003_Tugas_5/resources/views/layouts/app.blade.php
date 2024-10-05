<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'POS Sederhana')</title>
    @vite('resources/css/app.css')
    <style>
        /* Atur agar body memenuhi layar dan flex untuk mengatur tata letak */
        html, body {
            height: 100%;
            margin: 0;
            display: flex;
            flex-direction: column;
        }

        /* Main content harus memiliki fleksibilitas untuk memenuhi ruang di antara header dan footer */
        main {
            flex: 1;
        }

        /* Footer tetap di bagian bawah, tetapi tetap muncul ketika konten utama tidak cukup tinggi */
        footer {
            margin-top: auto;
        }
    </style>
</head>
<body class="bg-gray-100 font-sans leading-normal tracking-normal">
    <div x-data="{ sidebarOpen: false }" class="flex flex-col md:flex-row flex-1">
        <!-- Sidebar -->
        <nav :class="{'block': sidebarOpen, 'hidden': !sidebarOpen}" class="bg-gray-800 md:w-64 w-full md:block min-h-screen relative inset-y-0 left-0 transform md:translate-x-0 transition duration-200 ease-in-out z-30">
            <div class="p-4 flex justify-between items-center">
                <h1 class="text-white text-2xl font-semibold">POS Sederhana</h1>
                <button @click="sidebarOpen = false" class="md:hidden text-gray-300 hover:text-white">
                    <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
            @auth
            <ul>
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
            </ul>
            @endauth
        </nav>

        <!-- Main Content -->
        <main class="flex-1">
            <div class="max-w-7xl mx-auto py-6 sm:px-6 lg:px-8">
                @yield('content')
            </div>
        </main>
    </div>

    <!-- Footer -->
    <footer class="bg-gray-800 text-white text-center py-4">
        <p>5025221003 FP ETS PBKK</p>
    </footer>

    @vite('resources/js/app.js')
    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script>
</body>
</html>
