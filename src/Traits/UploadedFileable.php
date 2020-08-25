<?php

namespace IhorHnatchuk\Browsershot\Traits;

use Illuminate\Http\Response;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Illuminate\Http\File;
use IhorHnatchuk\Browsershot\Wrapper;

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


    /**
     * Stores the generated output file to local storage
     *
     * @param string      $path
     * @param null|string $filename
     * @return string
     * @internal param null|string $visibility
     */
    public function store(string $path, ?string $filename = null): string
    {
        $this->generateTempFile();

        $file = new File($this->tempFile);
        $filename = $filename ?? $this->getRandomFileName();

        return Storage::putFileAs($path, $file, $filename);
    }

    /**
     * Stores the file output with public visibility
     *
     * @param string $path
     * @param string $filename
     * @return string
     */
    public function storeAs(string $path, string $filename): string
    {
        return $this->store($path, $filename);
    }

    /**
     * Creates a random name for the file
     *
     * @return string
     */
    protected function getRandomFileName(): string
    {
        return Str::random() . '.' . $this->getFileExtension();
    }

    abstract protected function getFileExtension(): string;

    abstract protected function generateTempFile(): Wrapper;
}