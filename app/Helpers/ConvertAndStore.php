<?php

use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Intervention\Image\Drivers\Imagick\Driver;
use Intervention\Image\ImageManager;


function ConvertAndStore($file, $path)
{
    // Convert Image to Webp
    $manager = new ImageManager(new Driver());
    $image = $manager->read($file);
    $encoded = $image->toWebp(60);

    // Store Webp Image
    $thumbnailPath = $path . Str::random(30) . '.webp';
    Storage::disk('public')->put($thumbnailPath, $encoded);
    return basename($thumbnailPath);
}
