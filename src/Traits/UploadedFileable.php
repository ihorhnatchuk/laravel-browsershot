<?php

namespace IhorHnatchuk\Browsershot\Traits;

use Illuminate\Http\Response;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Str;
use Illuminate\Http\File;

trait UploadedFileable
{
    /**
     * UploadedFile the generated output file 
     *
     * @param string|null $filename
     * @param array $additionalHeaders
     * @return Response
     */
    public function getUplodFile(?string $filename = null)
    {
        $this->generateTempFile();
        $filename = $filename ?? $this->getRandomFileName();
        $file = new UploadedFile($this->tempFile, $filename);

        return $file;
        
    }

    abstract protected function getFileExtension(): string;

    abstract protected function generateTempFile(): Wrapper;
}
