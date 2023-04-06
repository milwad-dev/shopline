<?php

namespace Modules\Media\Services;

use Illuminate\Support\Facades\Storage;
use Modules\Media\Contracts\FileServiceContract;
use Modules\Media\Models\Media;

class VideoFileService extends DefaultFileService implements FileServiceContract
{
    public static function upload($file, $filename, $dir): array
    {
        $filename = uniqid();
        $extension = $file->getClientOriginalExtension();
        $dir = 'private\\';
        Storage::putFileAs($dir, $file, $filename.'.'.$extension);

        return ['video' => $filename.'.'.$extension];
    }

    public static function thumb(Media $media)
    {
        return url('/img/video-thumb.png');
    }

    public static function getFilename()
    {
        return (static::$media->is_private ? 'private/' : 'public/').static::$media->files['video'];
    }
}
