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

    public function edit(Request $request, $id)
    {
        $data = [
            'diary' => Diary::find($id)
        ];
        return view('diary.edit', $data);
    }

    public function editConfirm(DiaryRequest $request, $id)
    {
        $data = $request->input();
        $data['id'] = $id;
        $request->session()->put('diaryRequest', $data);
        return view('diary.editConfirm', $data);
    }

    public function update(Request $request)
    {
        $data = $request->session()->get('diaryRequest');
        $data['text'] = $data['diary_text'];
        $data['user_id'] = '1';
        $diary = Diary::find($data['id']);
        $diary->fill($data);
        $diary->save();
        return redirect()->route('diary.index');
    }

    public function destroy(Request $request, $id)
    {
        $diary = Diary::find($id);

        if ($diary) {
            $diary->delete();
        }
        
        return redirect()->route('diary.index');
    }
}
