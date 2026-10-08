<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>@yield('title', 'Gerador de Assinaturas')</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://bunny.net">
    <link href="https://fonts.bunny.net/css?family=bricolage-grotesque:400,500,600,700" rel="stylesheet" />

    <!-- Vite + Tailwind CSS -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body
    class="bg-[#FDFDFC] text-[#1C1A17] dark:bg-[#0A0A0A] dark:text-[#EDEDEC] font-sans antialiased min-h-screen flex flex-col md:flex-row">

    <!-- 1. Barra Lateral (Sidebar) -->
    <aside
        class="w-full md:w-64 bg-white dark:bg-neutral-900 border-b md:border-b-0 md:border-r border-neutral-200 dark:border-neutral-800 flex flex-col justify-between p-6 shrink-0">
        <div>
            <!-- Logo / Nome do Sistema -->
            <div class="mb-8">
                <span
                    class="text-xl font-bold bg-gradient-to-r from-red-500 to-orange-500 bg-clip-text text-transparent">
                    Painel Laravel
                </span>
            </div>

            <!-- Links e Seções da Sidebar -->
            <nav class="space-y-4">
                @section('sidebar')
                    <!-- Links fixos que sempre vão aparecer -->
                    <a href="{{ url('/')}}"
                        class="block text-sm font-medium text-red-500 bg-red-50/50 dark:bg-red-950/20 px-3 py-2 rounded-lg">
                        Início
                    </a>
                    <a href="{{ url('/templates')}}"
                        class="block text-sm font-medium text-neutral-500 dark:text-neutral-400 hover:text-red-500 dark:hover:text-red-400 px-3 py-2 rounded-lg transition-colors">
                        Modelos de Assinatura
                    </a>
                @show
            </nav>
        </div>

        <!-- Rodapé da Sidebar (Informações do Usuário/Sistema) -->
        <div
            class="mt-6 pt-4 border-t border-neutral-100 dark:border-neutral-800 text-xs text-neutral-400 dark:text-neutral-500">
            Gerador de assinatura de emails
        </div>
    </aside>

    <!-- 2. Área do Conteúdo Principal -->
    <main class="flex-1 p-6 md:p-10 max-w-7xl mx-auto w-full">
        <!-- Cabeçalho Dinâmico da Página -->
        <h1 class="mb-8 text-2xl font-bold tracking-tight text-center text-neutral-900 dark:text-white">
            @yield('title')
        </h1>
        @yield('content')
    </main>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/html-to-image/1.11.13/html-to-image.js"></script>

    @stack('scripts')
    <script>
        function copiar() {
            // Seleciona o elemento com a classe .signature
            const targetElement = document.querySelector('.signature');

            // Usa o objeto global htmlToImage injetado pela tag script
            htmlToImage.toPng(targetElement, {
                    cacheBust: true,
                    pixelRatio: 2
                })
                .then((dataUrl) => {
                    // Cria o link invisível para forçar o download
                    const link = document.createElement('a');
                    link.download = 'assinatura.png';
                    link.href = dataUrl;
                    link.click();
                })
                .catch((error) => {
                    console.error('Erro ao converter HTML para PNG:', error);
                });
        }

        function editar() {
            document
                .getElementById('editForm')
                .submit();
        }
    </script>

</body>

</html>
