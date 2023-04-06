<?php

namespace Modules\Media\Http\Controllers;

use Illuminate\Http\Request;
use Modules\Media\Models\Media;
use Modules\Media\Services\MediaFileService;
use Modules\Share\Http\Controllers\Controller;

class MediaController extends Controller
{
    public function download(Media $media, Request $request)
    {
//        if (!$request->hasValidSignature()) abort(401);
        // TODO CORRECT
        return MediaFileService::stream($media);
    }
}
