<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Status;
use App\Models\UserRole;
use App\Role;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class AdministrationController extends Controller
{

    /**
     * AdministrationController constructor.
     */
    public function __construct()
    {
        parent::__construct();
        $this->middleware('auth');
    }

    public function view()
    {
        return view('administration/common');
    }

    public function categories()
    {
        $categories = Category::get();

        return view('administration/categories', ['categories' => $categories]);
    }

    public function statuses()
    {
        $statuses = Status::get();

        return view('administration/statuses', ['statuses' => $statuses]);
    }

    public function statusAdd(Request $request)
    {
        $statusName = $request->input('name');
        if (isset($statusName) && strlen($statusName) > 0) {
            $status = new Status();
            $status->name = $statusName;
            $status->save();
        }

        return Redirect::back();
    }

    public function categoryAdd(Request $request)
    {
        $categoryName = $request->input('name');
        if (isset($categoryName) && strlen($categoryName) > 0) {
            $categorty = new Category();
            $categorty->name = $categoryName;
            $categorty->save();
        }

        return Redirect::back();
    }

    public function statusDelete($id)
    {
        Status::findOrFail($id)->delete();
        return Redirect::back();
    }

    public function categoryDelete($id)
    {
        Category::findOrFail($id)->delete();
        return Redirect::back();
    }

    public function statusUpdate(Request $request)
    {
        $status = Status::findOrFail($request->input('id'));
        $status->name = $request->input('name');
        $status->save();

        return Redirect::back();
    }

    public function categoryUpdate(Request $request)
    {
        $category = Category::findOrFail($request->input('id'));
        $category->name = $request->input('name');
        $category->save();

        return Redirect::back();
    }

    public function users()
    {
        return view('administration/users');
    }

    public function accessLevelUsers()
    {
        $users = User::get();
        $roles = Role::get();
        return view('administration/accessLevelUsers', [
            'users' => $users,
            'roles' => $roles,
        ]);
    }

//    public function createUserRole(Request $request)
//    {
//        $user = $request->input('user');
//        $role = $request->input('role');
//        $userRole = UserRole::whereRaw('user_id = ' . $user . ' and role_id = ' . $role)->first();
//        $userRole = ($userRole != null) ?: $userRole->delete();
//        $userRole = ($userRole == null) ?:  new UserRole() ;
//        $userRole->user_id = $user;
//        $userRole->role_id = $role;
//        $userRole->save();
//
//
//        return Redirect::back();
//    }

    public function createUserRole(Request $request)
    {
        $user = $request->input('user');
        $role = $request->input('role');
        $userRole = UserRole::whereRaw('user_id = ' . $user . ' and role_id = ' . $role)->first();
        $userRole = ($userRole == null) ? new UserRole() : $userRole;
        $userRole->user_id = $user;
        $userRole->role_id = $role;
        $userRole->save();

        return Redirect::back();
    }


}