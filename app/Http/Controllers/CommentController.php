<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{
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
