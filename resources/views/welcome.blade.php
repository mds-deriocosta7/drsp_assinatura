@extends('layout.app')

@section('title', 'Bem vindo emissor de asinaturas')

@section('content')|
    <!-- Header / Navbar -->
    <header class="w-full max-w-7xl mx-auto px-6 py-6 flex justify-between items-center">
        <div class="flex items-center gap-2">
            <!-- Ícone Simples / Logo -->
            <span class="text-2xl font-bold bg-gradient-to-r from-red-500 to-orange-500 bg-clip-text text-transparent">

            </span>
        </div>

        @if (Route::has('login'))
            <nav class="flex gap-4">
                @auth
                    <a href="{{ url('/dashboard') }}" class="text-sm font-medium hover:text-red-500 transition">Dashboard</a>
                @else
                    <a href="{{ route('login') }}" class="text-sm font-medium hover:text-red-500 transition">Log in</a>
                    @if (Route::has('register'))
                        <a href="{{ route('register') }}"
                            class="text-sm font-medium bg-red-500 text-white px-3 py-1.5 rounded-md hover:bg-red-600 transition">Register</a>
                    @endif
                @endauth
            </nav>
        @endif
    </header>

    <!-- Main Content -->
    <main class="w-full max-w-4xl mx-auto px-6 flex-1 flex flex-col justify-center items-center text-center my-12">

        <h1 class="text-4xl sm:text-6xl font-extrabold tracking-tight mb-4">
            Emissor de Assinatura para <span
                class="bg-gradient-to-r from-red-500 to-amber-500 bg-clip-text text-transparent">Email</span>
        </h1>

        <p class="text-lg text-neutral-500 dark:text-neutral-400 max-w-2xl mb-8">
            Emita agora suas assinatura para email agora
        </p>

        <!-- Grid de Cards de Links úteis -->
        <div class="grid sm:grid-cols-2 gap-4 w-full text-left">
            <a href="{{ url('/assinatura') }}"
                class="p-6 rounded-sm border border-neutral-200 dark:border-neutral-800 hover:border-red-500/40 dark:hover:border-red-500/40 bg-white dark:bg-neutral-900/50 transition group">
                <h3 class="font-bold text-lg group-hover:text-red-500 transition">Emitir &rarr;</h3>
            </a>
        </div>
    </main>

@endsection
