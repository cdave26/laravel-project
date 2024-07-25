<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Comment;
use App\Models\User;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    //
    public function index(){
        $comments = Comment::latest()->paginate(8);

        return view('admin.comments.index', compact('comments'));
    }

    public function destroy(Comment $comment){

      $comment->delete();

      return redirect()->route('admin.comments.index')->with('success', 'delete comment successfully');
      
    }
}
