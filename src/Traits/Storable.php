<?php

namespace VerumConsilium\Browsershot\Traits;

use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Illuminate\Http\File;
use VerumConsilium\Browsershot\Wrapper;

trait Storable
{
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
