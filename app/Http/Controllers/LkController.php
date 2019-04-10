<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LkController extends Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->middleware('auth');
    }

    public function lk()
    {
        return view('lk');
    }

    public function update(Request $request)
    {
        $user = Auth::user();
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->floor = $request->input('floor');
        $user->office = $request->input('office');
        $user->comment = $request->input('comment');
        $user->save();

        return redirect()->route('home');
    }

}