<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function create(Request $request)
    {
        Comment::create([
            'name' => $request->name,
            'content' => $request->get('content'),
            'ip_adress' => $request->ip(),
            'article_id' => $request->article_id
        ]);
        return back()->with('toas_success', 'Successfully created a new comment');
    }


    public function statusChange($id)
    {
        $comment = Comment::findOrFail($id);

        if (!$comment->status)
            $status = true;
        else
            $status = false;

        if ($comment->update(['status' => $status]))
            return back()->with('toast_success', 'Successfully updated!');
        else
            return back()->with('toast_error', 'Error updating!');

    }

    public function destroy($id)
    {
        $comment = Comment::findOrFail($id);
        $comment->delete();
        return back()->with('toast_success', 'Successfully deleted!');

    }
}
