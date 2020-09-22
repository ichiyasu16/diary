<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Models\Diary;
use App\Http\Requests\DiaryRequest;

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
        $data = [
            'diaries' => Diary::all()
        ];

        return view('diary.list', $data);
    }

    public function register()
    {
        return view('diary.register');
    }

    public function registerConfirm(DiaryRequest $request)
    {
        $data = $request->input();
        $request->session()->put('diaryRequest', $data);
        return view('diary.registerConfirm', $data);
    }

    public function store(Request $request)
    {
        $data = $request->session()->get('diaryRequest');
        $diary = new Diary;
        $data['text'] = $data['diary_text'];
        $data['user_id'] = '1';
        $diary->fill($data);
        $diary->save();

        return redirect()->route('diary.index');
    }
}
