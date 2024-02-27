<?php

namespace App\Http\Controllers;

use App\Models\Idea;
use Illuminate\Http\Request;

class IdeaController extends Controller
{

    public function show(Idea $idea){
        return view('ideas.show',compact('idea'));
    }

    public function store(){
        $validated = request()->validate([
            'content' => 'required|min:5|max:300'
        ]);

        Idea::create($validated);

        return redirect()->route('dashboard')->with('success','Idea Created Successfully');  
        
    }

    public function destroy(Idea $idea){
       $idea->delete();

       return redirect()->route('dashboard')->with('success','Idea deleted Successfully');  
    }

    // public function destroy($id){
    //     Idea::where('id',$id)->firstOrFail()->delete();
    // //    $idea->delete();

    //    return redirect()->route('dashboard')->with('success','Idea deleted Successfully');  
    // }

    

    public function edit(Idea $idea){
        $editing = true;
        return view('ideas.show',compact('idea', 'editing'));
    }

    function update(Idea $idea){
        $validated = request()->validate([
            'content' => 'required|min:5|max:300'
        ]);

        $idea->update($validated);

        return redirect()->route('ideas.show',$idea->id)->with('success','Idea Updated Successfully');  
    }
    
}
