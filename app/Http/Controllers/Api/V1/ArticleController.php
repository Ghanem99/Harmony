<?php

namespace App\Http\Controllers\Api\V1;

use App\Models\Article;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ArticleController extends Controller
{
    public function index()
    {
        $articles = Article::all();

        return response()->json($articles);
    }

    public function show(Article $article)
    {
        return response()->json($article);
    }
}
