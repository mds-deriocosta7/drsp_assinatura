@extends('layout.app')

@section('title', 'Gerador de Assinaturas')

@section('sidebar')
    @parent
@endsection

@section('content')
    <div class="signature">
        <img src="{{ asset('storage/' . $path) }}" class="background">
        <div class="name">
            {{ $name }}
        </div>

        <div class="position">
            {{ $position }}
        </div>

        <div class="department">
            | {{ $department }}
        </div>

        <div class="email">
            <a href="mailto:{{ $email }}">{{ $email }}</a>
        </div>

        <div class="phone">
            {{ $phone }}
        </div>
    </div>
    <div class="">
        <a href="#" onclick="copiar()"
            class="w-full bg-green-500 text-white font-medium px-4 py-2.5 rounded-lg hover:bg-red-600 transition-colors shadow-sm focus:outline-none focus:ring-2 focus:ring-red-500 focus:ring-offset-2 dark:focus:ring-offset-neutral-900 cursor-pointer">
            Gerar assinatura de email
        </a>
        <a href="#" onclick="editar()"
            class="ml-2 w-full bg-yellow-500 text-white font-medium px-4 py-2.5 rounded-lg hover:bg-red-600 transition-colors shadow-sm focus:outline-none focus:ring-2 focus:ring-red-500 focus:ring-offset-2 dark:focus:ring-offset-neutral-900 cursor-pointer">
            Editar assinatura de email
        </a>
        <a href="{{ url('/') }}" onclick="editar()"
            class="ml-2 w-full bg-blue-500 text-white font-medium px-4 py-2.5 rounded-lg hover:bg-red-600 transition-colors shadow-sm focus:outline-none focus:ring-2 focus:ring-red-500 focus:ring-offset-2 dark:focus:ring-offset-neutral-900 cursor-pointer">
            Refazer assinatura
        </a>
    </div>
@endsection
