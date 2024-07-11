<?php

namespace App\Http\Controllers;

use App\Models\Idea;
use Illuminate\Http\Request;

class FeedController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {

        $user = auth()->User();

        // pluck is a method to get specific column
        $followingId = $user->followings()->pluck('user_id');

        // dd($followingId);

        $ideas =  Idea::whereIn('user_id', $followingId)->latest();

        if(request()->has('search')){
            $ideas = $ideas->where('content','like', '%' . request()->get('search','') . '%');
        }
        #query all idea tabl
        //select all from idea


        return view('dashboard',[
            'ideas' => $ideas->paginate(5)
        ]);
    }
}
