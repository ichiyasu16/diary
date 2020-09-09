<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Models\Diary;

class DiaryController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

    public function register()
    {
        return view('diary.register');
    }

    public function registerConfirm(Request $request)
    {
        $data = $request->input();
        return view('diary.registerConfirm', $data);
    }
}
