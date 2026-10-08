@extends('layout.app')

@section('title', 'Gerador de Assinaturas')

@section('sidebar')
    @parent
@endsection

@section('content')
    <form action="{{ url('/upload') }}" method="POST" enctype="multipart/form-data"
        class="w-full max-w-md mx-auto bg-white dark:bg-neutral-900 p-6 rounded-xl border border-neutral-200 dark:border-neutral-800 shadow-sm">
        @csrf

        <!-- Container do Input (Antigo mb-3) -->
        <div class="mb-5 flex flex-col gap-2 text-left">
            <label class="block text-sm font-semibold text-neutral-700 dark:text-neutral-300">
                Imagem da assinatura
            </label>

            <!-- Input de Arquivo Customizado com Tailwind -->
            <input type="file" name="image" accept="image/*" required
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
        </div>

        <div class="text-center py-4 lg:px-4">
            <div class="p-2 bg-red-800 items-center text-white-100 leading-none lg:rounded-full flex lg:inline-flex"
                role="alert">
                <span class="flex rounded-full bg-indigo-500 uppercase px-2 py-1 text-xs font-bold mr-3">
                    Alerta!!</span>
                <span class="font-semibold mr-2 text-left flex-auto">
                    Insira a imagem neutra sem dados pessoais iniciamente.
                </span>
                <svg class="fill-current opacity-75 h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                    <path d="M12.95 10.707l.707-.707L8 4.343 6.586 5.757 10.828 10l-4.242 4.243L8 15.657l4.95-4.95z" />
                </svg>
            </div>
        </div>

        <button type="submit"
            class="w-full bg-red-500 text-white font-medium px-4 py-2.5 rounded-lg hover:bg-red-600 transition-colors shadow-sm focus:outline-none focus:ring-2 focus:ring-red-500 focus:ring-offset-2 dark:focus:ring-offset-neutral-900 cursor-pointer">
            Analisar Assinatura
        </button>
    </form>
@endsection
