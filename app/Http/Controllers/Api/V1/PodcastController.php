<?php

namespace App\Http\Controllers\Api\V1;

use App\Models\Podcast;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PodcastController extends Controller
{
    public function index()
    {
        $podcasts = Podcast::all();

        return response()->json($podcasts);
    }

    public function show(Podcast $podcast)
    {
        return response()->json($podcast);
    }
}
