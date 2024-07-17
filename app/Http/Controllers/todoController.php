<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\todo;
use Illuminate\Console\View\Components\Task;
use Illuminate\Http\Request;

class todoController extends Controller
{   
    //create
    public function store(Request $request)
    {
        $task = new todo();
        $task->fill($request->all());
        $task->save();
        return redirect('todoApp')->with('flash_message','task added!'); 
    }

    //read
    public function todo()
    {
        $tasks = todo::all();
        return view('todoApp', ['tasks' => $tasks]);
    }

    //update
    public function update(Request $request, $id)
    {
        $request->validate([
            'updatedTask' => 'required'
        ]);

        $task = todo::findOrFail($id);
        $task->task = $request->updatedTask;
        $task->save();

        return redirect()->route('todoApp')->with('success', 'Todo item deleted successfully');
    }

    //delete
    public function delete($id) {
        $todo = Todo::find($id);
        if ($todo) {
            $todo->delete();
            return redirect()->route('todoApp')->with('success', 'Todo item deleted successfully');
        } else {
            return redirect()->route('todoApp')->with('error', 'Todo item not found');
        }
    }

    //deleteAll
    public function deleteAll() {
        $todo = todo::all();
        foreach($todo as $Task){
            $Task->delete();
        }
        return redirect()->route('todoApp')->with('success', 'Todo item deleted successfully');
    }
    
}
