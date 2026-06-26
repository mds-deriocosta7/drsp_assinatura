<form action="{{ url('/assinatura/upload') }}" method="POST" enctype="multipart/form-data" class="w-full max-w-md mx-auto bg-white dark:bg-neutral-900 p-6 rounded-xl border border-neutral-200 dark:border-neutral-800 shadow-sm">
    @csrf
    
    <!-- Container do Input (Antigo mb-3) -->
    <div class="mb-5 flex flex-col gap-2 text-left">
        <label class="block text-sm font-semibold text-neutral-700 dark:text-neutral-300">
            Imagem da assinatura
        </label>
        
        <!-- Input de Arquivo Customizado com Tailwind -->
        <input type="file" 
               name="signature" 
               accept="image/*"
               required
               class="block w-full text-sm text-neutral-500 dark:text-neutral-400
                      file:mr-4 file:py-2 file:px-4
                      file:rounded-md file:border-0
                      file:text-sm file:font-semibold
                      file:bg-red-50 file:text-red-600
                      dark:file:bg-red-950/30 dark:file:text-red-400
                      file:cursor-pointer hover:file:bg-red-100 dark:hover:file:bg-red-950/50
                      border border-neutral-300 dark:border-neutral-700 rounded-lg p-2 bg-transparent">
    </div>

    <!-- Botão de Envio (Antigo btn btn-primary) -->
    <button type="submit" 
            class="w-full bg-red-500 text-white font-medium px-4 py-2.5 rounded-lg hover:bg-red-600 transition-colors shadow-sm focus:outline-none focus:ring-2 focus:ring-red-500 focus:ring-offset-2 dark:focus:ring-offset-neutral-900 cursor-pointer">
        Analisar Assinatura
    </button>
</form>