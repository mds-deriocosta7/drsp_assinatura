<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>@yield('title', 'Laravel 12 App')</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://bunny.net">
    <link href="https://bunny.net/css?family=instrument-sans:400,500,600,700" rel="stylesheet" />

    <!-- Vite + Tailwind CSS -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-[#FDFDFC] text-[#1C1A17] dark:bg-[#0A0A0A] dark:text-[#EDEDEC] font-sans antialiased min-h-screen flex flex-col md:flex-row">

    <!-- 1. Barra Lateral (Sidebar) -->
    <aside class="w-full md:w-64 bg-white dark:bg-neutral-900 border-b md:border-b-0 md:border-r border-neutral-200 dark:border-neutral-800 flex flex-col justify-between p-6 shrink-0">
        <div>
            <!-- Logo / Nome do Sistema -->
            <div class="mb-8">
                <span class="text-xl font-bold bg-gradient-to-r from-red-500 to-orange-500 bg-clip-text text-transparent">
                    Painel Laravel
                </span>
            </div>

            <!-- Links e Seções da Sidebar -->
            <nav class="space-y-4">
                @section('sidebar')
                    <!-- Links fixos que sempre vão aparecer -->
                    <a href="#" class="block text-sm font-medium text-red-500 bg-red-50/50 dark:bg-red-950/20 px-3 py-2 rounded-lg">
                        Início
                    </a>
                    <a href="#" class="block text-sm font-medium text-neutral-500 dark:text-neutral-400 hover:text-red-500 dark:hover:text-red-400 px-3 py-2 rounded-lg transition-colors">
                        Uploads
                    </a>
                @show
            </nav>
        </div>

        <!-- Rodapé da Sidebar (Informações do Usuário/Sistema) -->
        <div class="mt-6 pt-4 border-t border-neutral-100 dark:border-neutral-800 text-xs text-neutral-400 dark:text-neutral-500">
            Ambiente Docker Ativo
        </div>
    </aside>

    <!-- 2. Área do Conteúdo Principal -->
    <main class="flex-1 p-6 md:p-10 max-w-7xl mx-auto w-full">
        <!-- Cabeçalho Dinâmico da Página -->
        <header class="mb-8">
            <h1 class="text-2xl font-bold tracking-tight text-neutral-900 dark:text-white">
                @yield('title')
            </h1>
        </header>

        <!-- Conteúdo Injetado via @section('content') -->
        <div class="bg-white dark:bg-neutral-900 rounded-xl border border-neutral-200 dark:border-neutral-800 p-6 shadow-sm">
            @yield('content')
        </div>
    </main>

</body>
</html>
