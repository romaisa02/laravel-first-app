<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Project;

class ProjectController extends Controller
{
    //
    function index(){
    	$pap= Project::all();
    	//return $projects;
    	 return view('index',compact('pap'));
    }
    
    function store(){
        $attributes = request()->validate([
        'title' => ['required', 'min:10'],
        'description' => ['required', 'min:10']
    ]);
        Project::create([
            'title'=>request('title'),
            'description'=>request('description')
               ]);
    	// $projects= new Project();
    	// $projects->title=request('title');
    	// $projects->description=request('description');
    	// $projects->save();
    	return redirect('/projects');
    }
      
      
    public function show(Project $project)
    {
        //.
         //$projects=Project::findOrFail($id);
         //return $project;
         return view('show',compact('project'));
    
    }
function create()

    {
         return view('create');
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Project $project)
    {
        //
        //return $id;
        //$projects=Project::findOrFail($id);
         return view('edits',compact('project'));
    
    }

 
    public function update(Project $project)
    {
        $project->update([
            'title'=>request('title'),
            'description'=>request('description')
               ]);
        //
       // $projects=Project::find($id);
        // $projects->title=request('title');
        // $projects->description=request('description');
        // $projects->save();
        return redirect('/projects');
        

    }

  
    public function destroy($id)
    {
        //
        $projects=Project::find($id);
        $projects->delete();
        return redirect('/projects');
        dd('hello');
    }
}
