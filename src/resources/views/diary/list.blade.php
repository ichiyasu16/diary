@extends('layouts.app')

@section('content')
    <div class="card card-default">
        <div class="card-header">
            <h3 class="card-title col-10">My日記一覧</h3>
            <a href="{{ route('diary.register') }}" class="btn btn-info col-2">登録画面</a>
        </div>
        <div class="card-body">
            <table class="table table-hover text-nowrap">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>カテゴリ</th>
                        <th>作成日</th>
                        <th>本文</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($diaries as $diary)
                        <tr>
                            <th>{{ $diary->id }}</th>
                            <th>{{ config("diary.category.$diary->category") }}</th>
                            <th>{{ $diary->date }}</th>
                            <th>{{ $diary->text }}</th>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection