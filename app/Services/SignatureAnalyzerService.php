<?php

namespace App\Services;

use App\Services\SignatureParserService;
use App\Services\OcrService;
use App\Services\LogoExtractorService;

class SignatureAnalyzerService
{
    public function __construct(
        private OcrService $ocr,
        private LogoExtractorService $logoExtractor,
        private SignatureParserService $parser
    ) {
    }

    public function analyze(
        string $imagePath
    ): array {

        $text = $this->ocr->extractText(
            $imagePath
        );

        $logo = $this->logoExtractor->extract(
            $imagePath
        );

        $data = $this->parser->parse(
            $text
        );

        $data['logo'] = $logo;

        return $data;
    }
}