<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Task;


class TaskController extends Controller
{
    public function add_task_interface()
    {
        return view('tasks.add-new-task');
    }

    public function store(Request $request)
    {
       
        $validated = $request->validate([
            'name' => 'required|max:255',
            'details' => 'required',
            
            
        ]);
      
        if($request->isComplete=="completed")
        {
            $isComplete=true;
        }
        else
        {
            $isComplete=false;
        }
        
        $task= new Task();
        $task->task_name=$validated['name'];
        $task->details=$validated['details'];
        $task->isComplete=$isComplete;
        $task->save();

        return redirect('/add-task')->with('success',$validated['name']." added successfully!");
        
    }

    public function list()
    {
        $tasks=Task::all();
        $title="Listing all Tasks";
        
        return view('tasks.list-tasks',['tasks'=>$tasks,'title'=>$title]);
    }

    public function delete($id)
    {
        Task::where('id',$id)->first()->delete();
        return redirect()->back()->with('success',"Task Deleted Successfully!");
    }

    public function edit_interface($id)
    {
        $task=Task::where('id',$id)->first();
        return view('tasks.edit-task',['task'=>$task]);
    }


    public function edit($id)
    {
        
      
        $validated = request()->validate([
            'name' => 'required|max:255',
            'details' => 'required',
            
            
        ]);
      
        if(request()->isComplete=="completed")
        {
            $isComplete=true;
        }
        else
        {
            $isComplete=false;
        }
        $task= Task::where('id',$id)->first();
        $task->task_name=$validated['name'];
        $task->details=$validated['details'];
        $task->isComplete=$isComplete;
        $task->save();
        

        return redirect('/list-tasks')->with('success',$validated['name']." edited successfully!");
        
    }

    public function set_complete($id)
    {
        $task= Task::where('id',$id)->first();
        $task->isComplete=true;
        $task->save();
    
        return redirect()->back()->with('success',$task->task_name." marked as completed!");

    }

    public function list_completed()
    {
        $tasks=Task::where('isComplete',true)->get();
        $title="Listing all Completed Tasks";
        return view('tasks.list-tasks',['tasks'=>$tasks,'title'=>$title]);
    }

    public function list_incomplete()
    {
        $tasks=Task::where('isComplete',false)->get();
        $title="Listing all Incomplete Tasks";
        return view('tasks.list-tasks',['tasks'=>$tasks,'title'=>$title]);
    }



}
