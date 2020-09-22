@extends('layouts.app')    

@section('content')
    <div class="card card-default">
        <form action="{{ route('diary.store') }}" method="post">
            @csrf
            <div class="card-header">
                <h3 class="title">My日記</h3>
            </div>
            <div class="card-body">
                <div>
                    <p>日付</p>
                    <p>{{ $date }}</p>
                </div>
                <div>
                    <p>カテゴリ</p>
                    <p>{{ $category }}</p>
                </div>
                <div>
                    <p>今日あったこと</p>
                    <p>{{ $diary_text }}</p>
                </div>
            </div>
            <div class="card-footer">
                <a class="btn btn-default" onclick=history.back()>戻る</a>
                <input type="submit" class="btn btn-success float-right" value="完了">
            </div>
        </form>
    </div>
@endsection