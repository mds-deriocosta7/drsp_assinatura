<?php

namespace App\Jobs;

use App\Services\LogoExtractorService;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Queue\Queueable;

class ProcessSignatureJob implements ShouldQueue
{
    use Queueable;

    public function __construct(
        public string $filePath
    ) {}

    public function handle(
        LogoExtractorService $logoExtractor
    ): void {

        $logoData = $logoExtractor->extract(
            $this->filePath
        );
    }
}
