<?php

namespace App\Http\Controllers;

use App\Http\Requests\ImageFormRequest;
use App\Http\Resources\ImageResource;
use App\Models\Image;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class ImageController extends Controller
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
            'message' => 'Images fetched successfully',
            'data' => Image::paginate()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  ImageFormRequest  $request
     * @return JsonResponse
     */
    public function store(ImageFormRequest $request): JsonResponse
    {
        $path = $request->file('image_file')->store('images');

        $image = new Image();
        $image->name = $request->input('name');
        $image->provider_id = $request->input('provider');
        $image->image_file = $path;
        $image->save();

        return response()->json([
            'status' => true,
            'message' => 'Image saved successfully',
            'data' => new ImageResource($image)
        ], Response::HTTP_CREATED);
    }
}
