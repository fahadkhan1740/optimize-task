<?php

namespace App\Http\Controllers;

use App\Http\Requests\VideoFormRequest;
use App\Http\Resources\VideoResource;
use App\Models\Video;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class VideoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return JsonResponse
     */
    public function index(): JsonResponse
    {
        return response()->json([
            'status' => true,
            'message' => 'Videos fetched successfully',
            'data' => Video::paginate()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  VideoFormRequest  $request
     * @return JsonResponse
     */
    public function store(VideoFormRequest $request): JsonResponse
    {
        $path = $request->file('video_file')->store('public/images');

        $video = new Video();
        $video->name = $request->input('name');
        $video->provider_id = $request->input('provider');
        $video->video_file = $path;
        $video->save();

        return response()->json([
            'status' => true,
            'message' => 'Video saved successfully',
            'data' => new VideoResource($video)
        ], Response::HTTP_CREATED);
    }
}
