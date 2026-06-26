@extends('layout.app')
 
@section('title', 'Análise de Assinaturas')
 
@section('sidebar')
    @parent
 
    <!-- Este parágrafo será adicionado LOGO ABAIXO dos links fixos da sidebar -->
    <div class="mt-4 pt-4 border-t border-neutral-100 dark:border-neutral-800">
        <p class="text-xs font-semibold uppercase tracking-wider text-neutral-400 dark:text-neutral-500 mb-2">Instruções</p>
        <p class="text-xs text-neutral-500 dark:text-neutral-400 leading-relaxed">Envie imagens nítidas em formato PNG ou JPG para melhor legibilidade da inteligência artificial.</p>
    </div>
@endsection
 
@section('content')
    <!-- Coloque aqui o formulário em Tailwind que criamos no passo anterior -->
    <p class="text-neutral-600 dark:text-neutral-400 mb-6">Selecione o arquivo digitalizado da assinatura para iniciar o processo de validação de autenticidade.</p>
    
    @include('components.forms')
@endsection
