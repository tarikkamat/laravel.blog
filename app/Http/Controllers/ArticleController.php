<?php

namespace App\Http\Controllers;

use App\Http\Requests\Article\StoreArticleRequest;
use App\Http\Requests\Article\UpdateArticleRequest;
use App\Models\Article;
use App\Models\Category;
use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $articles = Article::paginate(10);
        return view('backend.article.index', ['articles' => $articles]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $tags = Tag::all();
        $categories = Category::all();
        return view('backend.article.create', ['tags' => $tags, 'categories' => $categories]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function store(StoreArticleRequest $request)
    {
        if ($request->hasFile('image')) {
            $imageName = Str::random(5) . '.' . $request->image->getClientOriginalExtension();
            $request->image->move(public_path('uploads'), $imageName);
        } else {
            $imageName = null;
        }

        $article = Article::create([
            'title' => $request->title,
            'slug' => $request->slug,
            'content' => $request->get('content'),
            'image_path' => $imageName
        ]);

        $article->tags()->attach($request->tags);
        $article->categories()->attach($request->categories);

        return back()->with('toast_success', 'Article has been saved successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        $article = Article::where('slug',$slug)->first();
        return view('frontend.view', compact('article'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $tags = Tag::all();
        $categories = Category::all();
        $article = Article::findOrFail($id);
        return view('backend.article.edit', compact('tags', 'categories', 'article'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateArticleRequest $request, $id)
    {

        $article = Article::findOrFail($id);

        if ($request->hasFile('image')) {
            $imageName = Str::random(5) . '.' . $request->image->getClientOriginalExtension();
            $request->image->move(public_path('uploads'), $imageName);
        } else {
            $imageName = $article->image_path;
        }

        $article->update([
            'title' => $request->title,
            'slug' => $request->slug,
            'content' => $request->get('content'),
            'image_path' => $imageName
        ]);

        $article->tags()->sync((array)$request->tags);
        $article->categories()->sync((array)$request->categories);

        return back()->with('toast_success', 'Article successfully updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $article = Article::findOrFail($id);
        $article->delete();

        return back()->with('toast_success', 'Article deleted successfully!');
    }
}
