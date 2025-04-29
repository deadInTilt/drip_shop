<?php

namespace App\Models\Traits;

use Illuminate\Support\Facades\File;

trait HasThumbnail
{
    abstract function thumbnailDir(): string;

    public function makeThumbnail(string $size, string $method = 'resize'): string
    {
        return route('intervention-image', [
            'size' => $size,
            'dir' => $this->thumbnailDir(),
            'method' => $method,
            'file' => File::name($this->{$this->imageColumn()}) . '.' . File::extension($this->{$this->imageColumn()})
        ]);
    }

    public function imageColumn(): string
    {
        return 'preview_image';
    }
}
