<?php

namespace App\Http\Controllers;

use App\Models\News;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    public function index()
    {
        $news = News::all();
        return view('news.index', compact('news'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'image' => 'nullable|string',
        ]);

        $news = News::create($data);
//        return response()->json($news, 201);
        return redirect()->route('news.list')->with('success', 'Новость успешно добавлена!');
    }

    public function show($id)
    {
        $news = News::findOrFail($id);
        return response()->json($news);
    }

    public function update(Request $request, $id)
    {
        $data = $request->validate([
            'title' => 'sometimes|required|string|max:255',
            'content' => 'sometimes|required|string',
            'image' => 'nullable|string',
        ]);

        $news = News::findOrFail($id);
        $news->update($data);
        return response()->json($news);
    }

    public function delete($id)
    {
        $news = News::findOrFail($id);
        $news->delete();
//        return response()->json(['message' => 'News deleted successfully']);
        return redirect()->route('news.list');
    }

    public function hidden($id)
    {
        $news = News::findOrFail($id);
        $news->hidden = true;
        $news->save();
        //        return response()->json(['message' => 'News deleted successfully']);
        return redirect()->route('news.list');
    }

    public function create()
    {
        return view('news.create');
    }
}
