<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Category;
use App\Models\Comment;
use App\Models\Tag;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $articleCount = Article::count();
        $categoryCount = Category::count();
        $tagCount = Tag::count();
        $comments = Comment::paginate(10);
        return view('backend.dashboard',compact('articleCount','categoryCount','tagCount','comments'));
    }
}
