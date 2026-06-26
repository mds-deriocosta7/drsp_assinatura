<?php

namespace App\Services;

use thiagoalessio\TesseractOCR\TesseractOCR;

class OcrService
{
    public function extractText(
        string $file
    ): string {

        return (new TesseractOCR($file))
            ->lang('por')
            ->run();
    }
}
