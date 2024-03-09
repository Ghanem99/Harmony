<?php

namespace App\Http\Controllers\Api\V1\Content;

use App\Http\Controllers\Controller;
use App\Http\Requests\V1\Lifestyle\StoreArticleRequest;
use App\Http\Resources\ArticleCollection;
use App\Http\Resources\ArticleResource;
use App\Models\Content\Article;
use Illuminate\Http\JsonResponse;

class ArticlesController extends Controller
{
   
    public function index()
    {
        $user = auth()->user();
        $articles = $user->articles()->paginate();
        if ($articles->isEmpty()) {
            return new JsonResponse(['message' => 'No Articles Found!']);
        }

        return ArticleResource::collection($articles);
    }

    public function store(StoreArticleRequest $request)
    {
        $article = auth()->user()->articles()->create($request->validated());

        return new ArticleResource($article);
    }


    public function show(Article $article)
    {
        return new ArticleResource($article);
    }

    
    public function update(Article $article, $request)
    {
        $article->update($request->all());

        return new ArticleResource($article);
    }

    
    public function destroy(Article $article)
    {
        $article->delete();

        return new JsonResponse(['message' => 'Article deleted Successfully!']);
        
    }
}
