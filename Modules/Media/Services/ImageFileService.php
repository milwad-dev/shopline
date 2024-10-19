<?php

namespace Modules\Media\Services;

use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Drivers\Gd\Driver;
use Intervention\Image\ImageManager;
use Modules\Media\Contracts\FileServiceContract;
use Modules\Media\Models\Media;

class ImageFileService extends DefaultFileService implements FileServiceContract
{
    protected static array $sizes = ['300', '600'];

    public static function upload(UploadedFile $file, $filename, $dir): array
    {
        Storage::putFileAs($dir, $file, $filename.'.'.$file->getClientOriginalExtension());
        $path = $dir.$filename.'.'.$file->getClientOriginalExtension();

        return self::resize(Storage::path($path), $dir, $filename, $file->getClientOriginalExtension());
    }

    private static function resize($img, $dir, $filename, $extension)
    {
        $manager = new ImageManager(new Driver);

        $img = $manager->read($img);
        $imgs['original'] = $filename.'.'.$extension;
        foreach (self::$sizes as $size) {
            $imgs[$size] = $filename.'_'.$size.'.'.$extension;
            $img->resize($size)->save(Storage::path($dir).$filename.'_'.$size.'.'.$extension);
        }

        return $imgs;
    }

    /**
     * Get filename.
     */
    public static function getFilename(): string
    {
        return (static::$media->is_private ? 'private/' : 'public/').static::$media->files['original'];
    }

    /**
     * Get thumb(300) media.
     */
    public static function thumb(Media $media): string
    {
        return '/storage/'.$media->files['300'];
    }

    /**
     * Get original media.
     */
    public static function original(Media $media): string
    {
        return '/storage/'.$media->files['original'];
    }
}
