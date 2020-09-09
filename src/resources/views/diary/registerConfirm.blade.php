@extends('layouts.app')    

@section('content')
    <div class="card card-default">
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
    </div>
@endsection