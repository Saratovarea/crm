<?php

namespace App\Http\Controllers;


use App\Models\Task;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Zizaco\Entrust\Entrust;

class TaskController extends Controller
{

    /**
     * TaskController constructor.
     */
    public function __construct()
    {
        parent::__construct();
        $this->middleware('auth');
    }

    public function view(Request $request, $id = null)
    {
        $categories = DB::table('categories')->get();
        $statuses = DB::table('statuses')->get();
        $executors = DB::table('users')->get();

        $task = ($id > 0) ? Task::find($id) : null;
        $task = ($task == null) ? new Task() : $task;

        return view('task/task', [
            'categories' => $categories,
            'statuses' => $statuses,
            'executors' => $executors,
            'task' => $task
        ]);
    }

    public function iud(Request $request)
    {
        $id = $request->input('id');

        $task = ($id > 0) ? Task::find($id) : null;
        $task = ($task == null) ? new Task() : $task;

        $task->creator_id = Auth::id();
        $task->executor_id = ($request->input('executor') > 0) ? $request->input('executor') : null;
        $task->category_id = $request->input('category');

        $task->status_id = ($task->id > 0) ? $request->input('status') : 1;

        $task->title = $request->input('title');
        $task->descr = $request->input('descr');
        $task->save();

        return redirect()->route('home');
    }

}