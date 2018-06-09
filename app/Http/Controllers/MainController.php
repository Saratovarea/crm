<?php

namespace App\Http\Controllers;

use App\User;
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

        $filter .= '1 = 1';

        $tasks = DB::table('tasks')
            ->leftJoin('users as u1', 'tasks.creator_id', '=', 'u1.id')
            ->leftJoin('users as u2', 'tasks.executor_id', '=', 'u2.id')
            ->leftJoin('categories', 'tasks.category_id', '=', 'categories.id')
            ->leftJoin('statuses', 'tasks.status_id', '=', 'statuses.id')
            ->select('tasks.*', 'u1.name as creatorname', 'u2.name as executorname', 'categories.name as categoryname', 'statuses.name as statusname')
            ->whereRaw($filter)
            ->paginate(25);

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
