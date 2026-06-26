<?php

namespace App\Services;

class LogoExtractorService
{
    public function extract(string $imagePath): array
    {
        $python = base_path('python/detect_logo.py');

        // Adicionamos o "2>&1" para capturar mensagens escondidas caso o script printe avisos do OpenCV
        $command = sprintf(
            'python3 "%s" "%s" 2>&1',
            $python,
            $imagePath
        );

        exec($command, $output, $code);

        $rawOutput = implode('', $output);

        if ($code !== 0 || empty($rawOutput)) {
            throw new \Exception("O script Python falhou ou não retornou dados. Saída: " . $rawOutput);
        }

        $data = json_decode($rawOutput, true);

        // Se o JSON for inválido (null), tratamos o erro amigavelmente
        if (is_null($data)) {
            throw new \Exception("O script Python retornou uma string que não é um JSON válido: " . $rawOutput);
        }

        return $data;
    }
}
