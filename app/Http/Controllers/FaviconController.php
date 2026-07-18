<?php

namespace App\Http\Controllers;

use Illuminate\Http\Response;
use Illuminate\Support\Facades\File;

class FaviconController extends Controller
{
    public function svg(): Response
    {
        $photoData = $this->photoDataUri();

        return response()
            ->view('favicon', ['photoData' => $photoData])
            ->header('Content-Type', 'image/svg+xml')
            ->header('Cache-Control', 'public, max-age=86400');
    }

    public function png(): Response
    {
        $binary = $this->roundPngBinary(64);

        return response($binary, 200, [
            'Content-Type' => 'image/png',
            'Cache-Control' => 'public, max-age=86400',
        ]);
    }

    public function sync(): void
    {
        File::put(public_path('favicon.ico'), $this->roundPngBinary(64));
        File::put(public_path('favicon.svg'), $this->svgContent());
    }

    private function svgContent(): string
    {
        return view('favicon', [
            'photoData' => $this->photoDataUri(),
        ])->render();
    }

    private function photoDataUri(): string
    {
        $path = $this->photoPath();

        return 'data:'.mime_content_type($path).';base64,'.base64_encode(file_get_contents($path));
    }

    private function photoPath(): string
    {
        $photo = config('portfolio.photo');

        if (! $photo) {
            abort(404);
        }

        $path = public_path($photo);

        if (! File::exists($path)) {
            abort(404);
        }

        return $path;
    }

    private function roundPngBinary(int $size): string
    {
        $path = $this->photoPath();

        $source = match (mime_content_type($path)) {
            'image/png' => imagecreatefrompng($path),
            'image/webp' => function_exists('imagecreatefromwebp') ? imagecreatefromwebp($path) : imagecreatefromjpeg($path),
            default => imagecreatefromjpeg($path),
        };

        $srcWidth = imagesx($source);
        $srcHeight = imagesy($source);
        $cropSize = min($srcWidth, $srcHeight);
        $srcX = (int) (($srcWidth - $cropSize) / 2);
        $srcY = (int) (($srcHeight - $cropSize) / 2);

        $square = imagecreatetruecolor($size, $size);
        imagecopyresampled($square, $source, 0, 0, $srcX, $srcY, $size, $size, $cropSize, $cropSize);

        $round = imagecreatetruecolor($size, $size);
        imagesavealpha($round, true);
        $transparent = imagecolorallocatealpha($round, 0, 0, 0, 127);
        imagefill($round, 0, 0, $transparent);

        $radius = $size / 2;

        for ($x = 0; $x < $size; $x++) {
            for ($y = 0; $y < $size; $y++) {
                $deltaX = $x - $radius + 0.5;
                $deltaY = $y - $radius + 0.5;

                if (($deltaX * $deltaX) + ($deltaY * $deltaY) <= ($radius * $radius)) {
                    imagesetpixel($round, $x, $y, imagecolorat($square, $x, $y));
                }
            }
        }

        imagedestroy($source);
        imagedestroy($square);

        ob_start();
        imagepng($round);
        imagedestroy($round);

        return ob_get_clean();
    }
}
