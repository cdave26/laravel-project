<?php

namespace App\Http\Controllers;

use App\Models\Idea;
use Illuminate\Http\Request;

class IdeaController extends Controller
{

    public function show(Idea $id){
        return view('idea.show',[
            'idea' => $id
        ]);
    }

    public function store(){
        request()->validate([
            'content' => 'required|min:5|max:300'
        ]);

        $ideaContent = request()->get('content','');

        $idea = new Idea([
            'content' => $ideaContent,
        ]);

        $idea->save();

        return redirect()->route('dashboard')->with('success','Idea Created Successfully');  
        
    }

    public function destroy(Idea $id){
       $id->delete();

       return redirect()->route('dashboard')->with('success','Idea deleted Successfully');  
    }
}
