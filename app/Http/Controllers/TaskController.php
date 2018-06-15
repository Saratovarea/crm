<?php

namespace App\Http\Controllers;

use App\Models\Task;
use App\Models\TaskTime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

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

        $taskId = ($task->id == null) ? 0 : $task->id;

        $taskHistory = DB::table('task_times')
            ->leftJoin('users', 'task_times.user_id', '=', 'users.id')
            ->leftJoin('statuses', 'task_times.status_id', '=', 'statuses.id')
            ->select('task_times.*', 'users.name as username', 'statuses.name as statusname')
            ->whereRaw('task_times.task_id = ' . $taskId)
            ->get();

        $sumary = '';
        if ($id > 0) {
            $startDate = DB::table('task_times')->select('created_at')
                ->where('task_id', $task->id)->orderBy('created_at', 'desc')->first()->created_at;
            $endDate = DB::table('task_times')->select('created_at')
                ->where('task_id', $task->id)->orderBy('created_at', 'asc')->first()->created_at;

            $date1 = date_create($startDate);
            $date2 = date_create($endDate);
            $diff = date_diff($date1, $date2);

            if ($diff->format('%d') != '0') {
                $sumary .= $diff->format('%d д ');
            }
            if ($diff->format('%h') != '0') {
                $sumary .= $diff->format('%h ч ');
            }
            if ($diff->format('%i') != '0') {
                $sumary .= $diff->format('%i м ');
            }
        }

        return view('task/task', [
            'categories' => $categories,
            'statuses' => $statuses,
            'executors' => $executors,
            'task' => $task,
            'taskHistory' => $taskHistory,
            'sumary' => $sumary
        ]);
    }

    public function iud(Request $request)
    {
        $id = $request->input('id');

        $task = ($id > 0) ? Task::find($id) : null;
        $task = ($task == null) ? new Task() : $task;
        $isStatusChanged = ($id == 0) ? true : ($task->status_id != $request->input('status')
            && $id > 0) ? true : false;

        $task->creator_id = ($id == 0) ? Auth::id() : $task->creator_id;
        $task->executor_id = ($request->input('executor') > 0) ? $request->input('executor') : null;
        $task->category_id = $request->input('category');
        $task->status_id = ($task->id > 0) ? $request->input('status') : 1;
        $task->title = $request->input('title');
        $task->descr = $request->input('descr');
        $task->save();

        if ($isStatusChanged) {
            $taskTime = new TaskTime();
            $taskTime->task_id = $task->id;
            $taskTime->status_id = $task->status_id;
            $taskTime->user_id = Auth::id();
            $taskTime->save();
        }

        return redirect()->route('home');
    }

}