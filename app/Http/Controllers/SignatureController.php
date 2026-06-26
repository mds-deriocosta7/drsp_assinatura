<?php

namespace App\Http\Controllers;

use App\Models\Signatures;
use Illuminate\Http\Request;

use App\Services\SignatureAnalyzerService;
use Spatie\Browsershot\Browsershot;

class SignatureController extends Controller
{
    public function index()
    {
        return view('signature.upload');
    }

    public function upload(Request $request, SignatureAnalyzerService $analyzer)
    {
        // 1. Faz o upload e analisa a imagem antiga (Seu fluxo original)
        $path = $request->file('signature')->store('signatures_raw', 'private');
        $fullPath = storage_path('app/private/' . $path);

        $extractedData = $analyzer->analyze($fullPath);

        $relativeLogoPath = $extractedData['logo']['logo']; // "signatures/cropped_logo.png"

        // Isso vai se transformar exatamente em: /var/www/storage/app/private/signatures/cropped_logo.png
        $logoFullPath = storage_path('app/private/' . $relativeLogoPath);

        if (!file_exists($logoFullPath)) {
            throw new \Exception("O Python disse que salvou o arquivo, mas ele não está em: " . $logoFullPath);
        }

        $logoBase64 = base64_encode(file_get_contents($logoFullPath));

        // 2. Renderiza a view Blade para uma string HTML
        $htmlContent = view('signature.template', [
            'name' => $extractedData['name'],
            'role' => $extractedData['role'],
            'phone' => $extractedData['phone'],
            'email' => $extractedData['email'],
            'logoBase64' => $logoBase64
        ])->render();

        // 3. Define onde a NOVA imagem gerada será salva
        $newImageName = 'new_signature_' . uniqid() . '.png';
        $destinationPath = storage_path('app/public/signatures/' . $newImageName);

        // Garante que o diretório de destino existe
        if (!file_exists(dirname($destinationPath))) {
            mkdir(dirname($destinationPath), 0755, true);
        }

        // 4. Aplica o Browsershot para tirar o print do HTML e gerar a imagem
        Browsershot::html($htmlContent)
            ->setScreenshotType('png')
            ->windowSize(500, 200) // Define um tamanho limite para a janela do "print"
            ->deviceScaleFactor(2)  // Aumenta o fator de escala (Retina/Alta Resolução) para a imagem não ficar pixelada
            ->hideBackground()     // Torna o fundo transparente se necessário
            ->save($destinationPath);

        // 5. Salva no banco de dados para manter o histórico
        $signatureHistory = Signatures::create([
            'name' => $extractedData['name'],
            'role' => $extractedData['role'],
            'phone' => $extractedData['phone'],
            'email' => $extractedData['email'],
            'raw_image_path' => $path,
            'generated_image_path' => 'signatures/' . $newImageName,
        ]);

        // 6. Retorna a resposta com os dados e a URL da nova assinatura pronta
        return response()->json([
            'message' => 'Assinatura processada e gerada com sucesso!',
            'data' => $signatureHistory,
            'new_signature_url' => asset('storage/signatures/' . $newImageName)
        ]);
    }
}
