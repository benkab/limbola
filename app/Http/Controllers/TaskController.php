<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Task;
use Illuminate\Support\Facades\Auth;
use Toastr;

class TaskController extends Controller
{
    // get tasks
    public function getTasks()
    {
    	$tasks = Task::all();

    	return view('admin.views.tasks.index', ['tasks' => $tasks]);
    }

    // get Edit Task
    public function getEditTask($id)
    {
        $task = Task::where('id', $id)->first();
        $tasks = Task::all();

        return view('admin.views.tasks.edit', ['tasks' => $tasks, 'task' => $task]);
    }

    // Post tasks
    public function postTask(Request $request)
    {
    	// Retrieve data from the request
        $description    = $request['description'];
        $date       	= $request['date'];
        $time       	= $request['time'];
        $type	     	= $request->input('type', false);
        $user_id		= Auth::user()->id;

        // Create the slug
        $type_bool_value = filter_var($type, FILTER_VALIDATE_BOOLEAN);

        // Validate the request
        $this->validate($request, [
            'description' 	=> 'required',
            'date'  		=> 'required'
        ]);

        // Create an instance of the Post
        $task               = new Task();
        $task->description 	= $description;
        $task->date         = $date;
        $task->time         = $time;
        $task->type         = $type_bool_value;
        $task->user_id      = Auth::user()->id;


        // Create the Task
        $task->save();

        Toastr::success('Une nouvelle tache a &eacute;t&eacute; ajout&eacute;e', $title = null, $options = [
            "progressBar" => false,
            "positionClass" =>"toast-top-right",
            "preventDuplicates"=> false,
            "showDuration" => 500,
            "hideDuration" => 500,
            "timeOut" => 3000,
            "extendedTimeOut" => 1000,
            "showEasing" => "swing",
            "hideEasing"=> "swing",
            "showMethod" => "fadeIn",
            "hideMethod" => "fadeOut"
        ]);
        

    	return redirect()->route('view_tasks');
    }

    // Edit tasks
    public function postEditTask(Request $request, $id)
    {
        // Retrieve task
        $task = Task::where('id', $id)->first();

        // Retrieve data from the request
        $description    = $request['description'];
        $date           = $request['date'];
        $time           = $request['time'];
        $urgent         = $request->input('urgent', false);
        $secondaire     = $request->input('secondaire', false);
        $user_id        = Auth::user()->id;

        $urgent_bool_value          = filter_var($urgent, FILTER_VALIDATE_BOOLEAN);
        $secondaire_bool_value      = filter_var($secondaire, FILTER_VALIDATE_BOOLEAN);

        // Validate the request
        $this->validate($request, [
            'description'   => 'required',
            'date'          => 'required'
        ]);

        if($urgent_bool_value == true)
        {
            // Update task
            $task->update([
                'description'  => $description,
                'date'         => $date,
                'time'         => $time,
                'type'         => true
            ]);
        }
        else if($secondaire_bool_value == true)
        {
            // Update task
            $task->update([
                'description'  => $description,
                'date'         => $date,
                'time'         => $time,
                'type'         => false
            ]);
        }
        else{

            // Update task
            $task->update([
                'description'  => $description,
                'date'         => $date,
                'time'         => $time
            ]);
        }

        Toastr::success('Cette tache a &eacute;t&eacute; mis a jour', $title = null, $options = [
            "progressBar" => false,
            "positionClass" =>"toast-top-right",
            "preventDuplicates"=> false,
            "showDuration" => 500,
            "hideDuration" => 500,
            "timeOut" => 3000,
            "extendedTimeOut" => 1000,
            "showEasing" => "swing",
            "hideEasing"=> "swing",
            "showMethod" => "fadeIn",
            "hideMethod" => "fadeOut"
        ]);
        

        return redirect()->route('view_tasks');
    }

    // Delete task
    public function getDeleteTask($id)
    {
        $task = Task::where('id', $id)->first();

        // Delete task
            $task->delete();

        Toastr::success('Cette tache a &eacute;t&eacute; supprim&eacute;e', $title = null, $options = [
            "progressBar" => false,
            "positionClass" =>"toast-top-right",
            "preventDuplicates"=> false,
            "showDuration" => 500,
            "hideDuration" => 500,
            "timeOut" => 3000,
            "extendedTimeOut" => 1000,
            "showEasing" => "swing",
            "hideEasing"=> "swing",
            "showMethod" => "fadeIn",
            "hideMethod" => "fadeOut"
        ]);
        
        return redirect()->back();
    }

    // Secondaire task
    public function getSecondaireTask($id)
    {
        $task = Task::where('id', $id)->first();

        // Update task
            $task->update([
                'type' => false
            ]);

        Toastr::success('Cette tache a &eacute;t&eacute; design&eacute;e comme secondaire', $title = null, $options = [
            "progressBar" => false,
            "positionClass" =>"toast-top-right",
            "preventDuplicates"=> false,
            "showDuration" => 500,
            "hideDuration" => 500,
            "timeOut" => 3000,
            "extendedTimeOut" => 1000,
            "showEasing" => "swing",
            "hideEasing"=> "swing",
            "showMethod" => "fadeIn",
            "hideMethod" => "fadeOut"
        ]);
        
        return redirect()->back();
    }

    // Urgent task
    public function getUrgentTask($id)
    {
        $task = Task::where('id', $id)->first();

        // Update task
            $task->update([
                'type' => true
            ]);

        Toastr::success('Cette tache a &eacute;t&eacute; design&eacute;e comme urgent', $title = null, $options = [
            "progressBar" => false,
            "positionClass" =>"toast-top-right",
            "preventDuplicates"=> false,
            "showDuration" => 500,
            "hideDuration" => 500,
            "timeOut" => 3000,
            "extendedTimeOut" => 1000,
            "showEasing" => "swing",
            "hideEasing"=> "swing",
            "showMethod" => "fadeIn",
            "hideMethod" => "fadeOut"
        ]);
        
        return redirect()->back();
    }

}
