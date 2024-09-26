<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Comment;
use App\Models\Idea;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Log;

class DashboardController extends Controller
{
    //
    public function index(){
        // if (!auth()->user()->is_admin){
        //     abort(403);
        // }
        // Log::info('Inside admin Dashboard');
        // $this ->authorize('admin');
        $totalUsers = User::count();
        $totalIdea = Idea::count();
        $totalComments = Comment::count();

        return view('admin.dashboard', compact('totalUsers', 'totalIdea', 'totalComments'));
    }
}
