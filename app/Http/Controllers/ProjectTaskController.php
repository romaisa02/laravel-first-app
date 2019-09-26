<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Task;
use App\Project;
class ProjectTaskController extends Controller
{
    //
  public function update(Task $task)
    {
    	# code...
    	//dd(request()->all());
    	//dd(request()->exists('completed'));
    	  $task->update([
            'completed'=>request()->exists('completed')
          
             ]);
    	 return back();
    }

    public function store(Project $project){
    	//dd($project->id);
    	  $attributes = request()->validate([
       
        'description' => ['required', 'min:3']
    ]);
$project->addTask($attributes);
    	 // Task::create([
      //      'project_id'=>$project->id,
      //       'description'=>request('taskname')
      //        ]);
    	 return back();
    }
    
}
