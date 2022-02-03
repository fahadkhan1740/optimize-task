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
        $images = Image::all();
        $videos = Video::all();

        $images->merge($videos);

        return response()->json([
            'status' => true,
            'message' => 'All Media files fetched successfully',
            'data' => $images->all()
        ]);
    }
}
