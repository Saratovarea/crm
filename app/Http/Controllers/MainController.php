<?php

namespace App\Http\Controllers;

use App\User;
use DateInterval;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MainController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        $category_checked = $request->input('category');
        $status_checked = $request->input('status');
        $creator_checked = $request->input('creator');
        $executor_checked = $request->input('executor');
        $date_create = $request->input('date_create');

        // filter string
        $filter = '';
        if ($category_checked) {
            $filter = 'tasks.category_id = ' . $category_checked . ' AND ';
        }

        if ($status_checked) {
            $filter = 'tasks.status_id = ' . $status_checked . ' AND ';
        }

        if ($creator_checked) {
            $filter = 'tasks.creator_id = ' . $creator_checked . ' AND ';
        }

        if ($executor_checked) {
            $filter = 'tasks.executor_id = ' . $executor_checked . ' AND ';
        }

        if ($date_create) {
            $filter = '\'' . date_create($date_create)->format('Y-m-d 00:00:00')
                . '\' <= tasks.created_at AND tasks.created_at <= \''
                . date_create($date_create)->add(new DateInterval('P1D'))->format('Y-m-d 00:00:00')
                . '\' AND ';
        }

        $filter .= '1 = 1';

        $tasks = DB::table('tasks')
            ->leftJoin('users as u1', 'tasks.creator_id', '=', 'u1.id')
            ->leftJoin('users as u2', 'tasks.executor_id', '=', 'u2.id')
            ->leftJoin('categories', 'tasks.category_id', '=', 'categories.id')
            ->leftJoin('statuses', 'tasks.status_id', '=', 'statuses.id')
            ->select('tasks.*', 'u1.name as creatorname', 'u2.name as executorname',
                'categories.name as categoryname', 'statuses.name as statusname',
                DB::raw("0 as time"))
            ->whereRaw($filter)
            ->paginate(25);

        foreach ($tasks as $task) {
            $startDate = DB::table('task_times')->select('created_at')
                ->where('task_id', $task->id)->orderBy('created_at', 'desc')->first()->created_at;
            $endDate = DB::table('task_times')->select('created_at')
                ->where('task_id', $task->id)->orderBy('created_at', 'asc')->first()->created_at;

            $date1 = date_create($startDate);
            $date2 = date_create($endDate);
            $diff = date_diff($date1, $date2);
            $time = '';
            if ($diff->format('%d') != '0') {
                $time .= $diff->format('%d д ');
            }
            if ($diff->format('%h') != '0') {
                $time .= $diff->format('%h ч ');
            }
            if ($diff->format('%i') != '0') {
                $time .= $diff->format('%i м ');
            }

            $task->time = $time;
        }

        $creators = User::get();
        $executors = User::get();
        $statuses = DB::table('statuses')->get();
        $categories = DB::table('categories')->get();

        return view('main', [
            'tasks' => $tasks,
            'creators' => $creators,
            'executors' => $executors,
            'statuses' => $statuses,
            'categories' => $categories,

            'category_checked' => $category_checked,
            'status_checked' => $status_checked,
            'creator_checked' => $creator_checked,
            'executor_checked' => $executor_checked,
            'date_create' => $date_create
        ]);
    }

}
