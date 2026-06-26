<?php

namespace App\Services;

class SignatureParserService
{
    public function parse(string $text): array
    {
        $lines = array_filter(array_map('trim', explode("\n", $text)));
        $lines = array_values($lines); // Reindexar

        $data = [
            'name'  => $lines[0] ?? 'Nome Não Identificado',
            'role'  => $lines[1] ?? 'Cargo Não Identificado',
            'phone' => null,
            'email' => null,
        ];

        // Regex simples para capturar telefone e email
        foreach ($lines as $line) {
            if (preg_match('/[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}/i', $line, $matches)) {
                $data['email'] = $matches[0];
            }
            if (preg_match('/(?:\+?55\s?)?(?:\(?\d{2}\)?\s?)?\d{4,5}[-\s]?\d{4}/', $line, $matches)) {
                $data['phone'] = $matches[0];
            }
        }

        return $data;
    }
}
