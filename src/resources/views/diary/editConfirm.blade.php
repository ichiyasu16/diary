@extends('layouts.app')    

@section('content')
    <div class="card card-default">
        <form action="{{ route('diary.update', ['id' => $id ]) }}" method="post">
            @csrf
            @method('PUT')
            <div class="card-header">
                <h3 class="title">My日記</h3>
            </div>
            <div class="card-body">
                <div class="row">
                    <p class="col-4">日付</p>
                    <p class="col-8">{{ $date }}</p>
                </div>
                <div class="row">
                    <p class="col-4">カテゴリ</p>
                    <p class="col-8">{{ config("diary.category.$category") }}</p>
                </div>
                <div class="row">
                    <p class="col-4">今日あったこと</p>
                    <p class="col-8"> {!! nl2br($diary_text) !!}</p>
                </div>
            </div>
            <div class="card-footer">
                <a class="btn btn-default" onclick=history.back()>戻る</a>
                <input type="submit" class="btn btn-success float-right" value="完了">
            </div>
        </form>
    </div>
@endsection