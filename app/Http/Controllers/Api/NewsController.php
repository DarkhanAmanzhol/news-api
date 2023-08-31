<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreNewsRequest;
use App\Http\Requests\UpdateNewsRequest;
use App\Http\Resources\NewsResource;
use App\Models\News;

class NewsController extends Controller
{
    public function index()
    {
        $news = News::whereNotNull('date_published')->get();

        return NewsResource::collection($news);
    }

    public function show(News $news)
    {
        if ($news->date_published === null) {
            abort(404);
        }

        // This process could be worked better if we could use another table for collecting `users IP addresses`,
        // so that the same ip will not counted as a new `view`. Or users should be authorized (SHOULD BE FIXED IN THE FUTURE)
        News::where('id', $news->id)->increment('views', 1);

        return NewsResource::make($news);
    }

    public function store(StoreNewsRequest $request)
    {
        News::create($request->validated());

        return response()->json(['message' => 'News created successfully']);
    }

    public function update(UpdateNewsRequest $request, News $news)
    {
        $news->update($request->validated());

        return response()->json(['message' => 'News updated successfully']);
    }

    public function destroy(News $news)
    {
        if (!auth()->user()->is_admin) {
            abort(403, 'This action is unauthorized.');
        }

        $news->delete();

        return response()->json(['message' => 'News deleted successfully']);
    }

    public function top()
    {
        $news = News::whereNotNull('date_published')->orderBy('views', 'desc')->take(10)->get();

        return NewsResource::collection($news);
    }
}
