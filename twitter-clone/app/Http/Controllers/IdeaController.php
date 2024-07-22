<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateIdeaRequest;
use App\Http\Requests\UpdateIdeaRequest;
use App\Models\Idea;
use Illuminate\Http\Request;

class IdeaController extends Controller
{

    public function show(Idea $idea){
        return view('ideas.show',compact('idea'));
    }

    public function store(CreateIdeaRequest $request){
        $validated = $request->validated();

        $validated['user_id'] = auth()->id();
      
        Idea::create($validated);

        return redirect()->route('dashboard')->with('success','Idea Created Successfully');  
        
    }

    public function destroy(Idea $idea){
    //    if (auth()->id() !== $idea->user_id){
    //         abort(404);
    //    }  
        $this->authorize('delete', $idea);
       $idea->delete();

       return redirect()->route('dashboard')->with('success','Idea deleted Successfully');  
    }



    

    public function edit(Idea $idea){
        // if (auth()->id() !== $idea->user_id){
        //     abort(404);
        // } 
        $this->authorize('update', $idea);
        $editing = true;
        return view('ideas.show',compact('idea', 'editing'));
    }

    function update(UpdateIdeaRequest $request , Idea $idea){
           $this->authorize('idea.edit', $idea);
        // if (auth()->id() !== $idea->user_id){
        //     abort(404);
        // } 
        $validated = $request->validated();

        $idea->update($validated);

        return redirect()->route('ideas.show',$idea->id)->with('success','Idea Updated Successfully');  
    }
    
}
