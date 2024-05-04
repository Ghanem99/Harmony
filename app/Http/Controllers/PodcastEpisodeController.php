<?php

namespace App\Http\Controllers;

use App\Models\PodcastEpisode;
use Illuminate\Http\Request;

class PodcastEpisodeController extends Controller
{
   
        public function index()
    {
        // Retrieve all podcast episodes
        $episodes = PodcastEpisode::all();

        // Modify the response to include the public URL of each episode's audio file
        $episodes->transform(function ($episode) {
            $episode->audio_url = url("podcast/{$episode->audio_url}");
            return $episode;
        });

        return response()->json($episodes);
    }


}
