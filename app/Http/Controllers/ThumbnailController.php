<?php

namespace App\Http\Controllers;

use App\Exceptions\MakeThumbnailException;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\ImageManager;

class ThumbnailController extends Controller
{
    public function __invoke(string $dir,
                             string $method,
                             string $size,
                             string $file): \Symfony\Component\HttpFoundation\BinaryFileResponse
    {

        try {
            Log::info('Файл: ' . $file);

            abort_if(
                !in_array($size, config('thumbnail.allowed_sizes', [])),
                403,
                'Size not allowed.'
            );

            $storage = Storage::disk('images');

            $realPath = $storage->path("$dir/$file");
            $newDirPath = "$dir/$method/$size";
            $resultPath = "$newDirPath/$file";

            $raw = file_get_contents($realPath);

            Log::info('$realPath: ' . $realPath);
            Log::info('$newDirPath: ' . $newDirPath);
            Log::info('$resultPath: ' . $resultPath);

            if (!$storage->exists($newDirPath)) {
                $storage->makeDirectory($newDirPath);
            }

            if (!file_exists($storage->path("$dir/$file"))) {
                throw new MakeThumbnailException('Файл не найден: ' . $storage->path("$dir/$file"));
            }

            if (!$storage->exists($resultPath)) {

                $image = ImageManager::imagick()->read($raw);

                [$w, $h] = explode('x', $size);

                $image->{$method}($w, $h);

                $image->save($storage->path($resultPath));

            }
            return response()->file($storage->path($resultPath));
        } catch (\Throwable $e) {
            throw new MakeThumbnailException('Ошибка при генерации изображения', 0, $e);
        }
    }
}
