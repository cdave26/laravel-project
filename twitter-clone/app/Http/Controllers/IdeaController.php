<?php

namespace App\Http\Controllers;

use App\Models\Idea;
use Illuminate\Http\Request;

class IdeaController extends Controller
{
    public function store(){
        $ideaContent = request()->get('content','');

        $idea = new Idea([
            'content' => $ideaContent,
        ]);

        $idea->save();

        return redirect()->route('dashboard');  
        
    }
}
