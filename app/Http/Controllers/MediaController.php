<?php

namespace App\Http\Controllers;

use App\Models\Image;
use App\Models\Video;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class MediaController extends Controller
{
    public function __invoke(): JsonResponse
    {
        $images = Image::query()
            ->select('id', 'provider_id', 'image_file', 'created_at')
            ->with('provider:id,name')
            ->get();

        $videos = Video::query()
            ->select('id', 'provider_id', 'video_file', 'created_at')
            ->with('provider:id,name')
            ->get();

        $medias = $images->concat($videos);

        return response()->json([
            'status' => true,
            'message' => 'All Media files fetched successfully',
            'data' => $medias->sortByDesc('created_at')->paginate(10)
        ]);
    }
}
