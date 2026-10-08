@extends('layout.app')

@section('title', 'Gerador de Assinaturas')

@section('sidebar')
    @parent
@endsection

@section('content')
    <div class="flex flex-col items-center gap-6 p-7 md:flex-row md:gap-8 rounded-2xl">
        <div class="shadow-xl rounded-md">
            <label class="block text-sm font-semibold text-neutral-700 dark:text-neutral-300">
                Imagem enviada
            </label>
            <img src="{{ asset('storage/' . $path) }}" width="350" value="{{ $path }}">
        </div>
        <form id="editForm" action="{{ url('/generate') }}" method="POST" enctype="multipart/form-data"
            class="w-full max-w-md mx-auto bg-white dark:bg-neutral-900 p-6 rounded-xl border border-neutral-200 dark:border-neutral-800 shadow-sm">
            @csrf
            <input type="hidden" name="path" value="{{ $path }}">
            <label for="name" class="block text-sm font-semibold text-neutral-700 dark:text-neutral-300">
                Nome
            </label>
            <input id="name" name="name" required
                class="block w-full text-sm text-neutral-500 dark:text-neutral-400
                      file:mr-4 file:py-2 file:px-4
                      file:rounded-md file:border-0
                      file:text-sm file:font-semibold
                      file:bg-red-50 file:text-red-600
                      dark:file:bg-red-950/30 dark:file:text-red-400
                      file:cursor-pointer hover:file:bg-red-100 dark:hover:file:bg-red-950/50
                      border border-neutral-300 dark:border-neutral-700 rounded-lg p-2 bg-transparent">

            <label for="position" class="block text-sm font-semibold text-neutral-700 dark:text-neutral-300">
                Cargo
            </label>
            <input id="position" name="position" required
                class="block w-full text-sm text-neutral-500 dark:text-neutral-400
                      file:mr-4 file:py-2 file:px-4
                      file:rounded-md file:border-0
                      file:text-sm file:font-semibold
                      file:bg-red-50 file:text-red-600
                      dark:file:bg-red-950/30 dark:file:text-red-400
                      file:cursor-pointer hover:file:bg-red-100 dark:hover:file:bg-red-950/50
                      border border-neutral-300 dark:border-neutral-700 rounded-lg p-2 bg-transparent">

            <label for="department" class="block text-sm font-semibold text-neutral-700 dark:text-neutral-300">
                Unidade de Lotação
            </label>
            <input id="department" name="department" required
                class="block w-full text-sm text-neutral-500 dark:text-neutral-400
                      file:mr-4 file:py-2 file:px-4
                      file:rounded-md file:border-0
                      file:text-sm file:font-semibold
                      file:bg-red-50 file:text-red-600
                      dark:file:bg-red-950/30 dark:file:text-red-400
                      file:cursor-pointer hover:file:bg-red-100 dark:hover:file:bg-red-950/50
                      border border-neutral-300 dark:border-neutral-700 rounded-lg p-2 bg-transparent">

            <label for="phone" class="block text-sm font-semibold text-neutral-700 dark:text-neutral-300">
                Telefone
            </label>
            <input id="phone" name="phone" required
                class="block w-full text-sm text-neutral-500 dark:text-neutral-400
                      file:mr-4 file:py-2 file:px-4
                      file:rounded-md file:border-0
                      file:text-sm file:font-semibold
                      file:bg-red-50 file:text-red-600
                      dark:file:bg-red-950/30 dark:file:text-red-400
                      file:cursor-pointer hover:file:bg-red-100 dark:hover:file:bg-red-950/50
                      border border-neutral-300 dark:border-neutral-700 rounded-lg p-2 bg-transparent">

            <label for="logo" class="block text-sm font-semibold text-neutral-700 dark:text-neutral-300">
                Logo da Lotação
            </label>
            <input type="file" name="logo" accept="image/*"
                class="block w-full text-sm text-neutral-500 dark:text-neutral-400
                      file:mr-4 file:py-2 file:px-4
                      file:rounded-md file:border-0
                      file:text-sm file:font-semibold
                      file:bg-red-50 file:text-red-600
                      dark:file:bg-red-950/30 dark:file:text-red-400
                      file:cursor-pointer hover:file:bg-red-100 
                      dark:hover:file:bg-red-950/50
                      border border-neutral-300 dark:border-neutral-700 
                      rounded-lg p-2 bg-transparent">

            <label for="email" class="block text-sm font-semibold text-neutral-700 dark:text-neutral-300">
                Email
            </label>
            <input id="email" name="email" type="email" required
                class="block w-full text-sm text-neutral-500 dark:text-neutral-400
                      file:mr-4 file:py-2 file:px-4
                      file:rounded-md file:border-0
                      file:text-sm file:font-semibold
                      file:bg-red-50 file:text-red-600
                      dark:file:bg-red-950/30 dark:file:text-red-400
                      file:cursor-pointer hover:file:bg-red-100 dark:hover:file:bg-red-950/50
                      border border-neutral-300 dark:border-neutral-700 rounded-lg p-2 bg-transparent">

            <button type="submit"
                class="w-full bg-red-500 text-white font-medium px-4 py-2.5 rounded-lg hover:bg-red-600 transition-colors shadow-sm focus:outline-none focus:ring-2 focus:ring-red-500 focus:ring-offset-2 dark:focus:ring-offset-neutral-900 cursor-pointer">
                Gerar Assinatura
            </button>
        </form>
    </div>
@endsection
