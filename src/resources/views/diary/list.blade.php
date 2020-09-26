@extends('layouts.app')

@section('content')
    <div class="card card-default">
        <div class="card-header">
            <h3 class="card-title col-10">My日記一覧</h3>
            <a href="{{ route('diary.register') }}" class="btn btn-info float-right">新規投稿</a>
        </div>
        <div class="card-body">
            @if (count($diaries) > 0)
                <table class="table table-hover text-nowrap">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>カテゴリ</th>
                            <th>作成日</th>
                            <th>本文</th>
                            <th>編集</th>
                            <th>削除</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($diaries as $diary)
                            <tr>
                                <th id="diaryId">{{ $diary->id }}</th>
                                <th id="diaryCategory">{{ config("diary.category.$diary->category") }}</th>
                                <th id="diaryDate">{{ $diary->date }}</th>
                                <th id="diaryText">{{ $diary->text }}</th>
                                <th>
                                    <a href="{{ route('diary.edit', ['id' => $diary->id]) }}" class="btn btn-info">編集</a>
                                </th>
                                <th>
                                    <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#modal-danger" onClick="handleDelete(this)">削除</button>
                                </th>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <div class="modal fade show" id="modal-danger" style="display:bloak;" aria-modal="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <form action="{{ route('diary.destroy', ['id' => 1]) }}" method="post">
                                @csrf
                                @method('delete')
                                <div class="modal-header">
                                    <h4 class="modal-title">削除モーダル</h4>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">✖︎</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <p>以下の日記を削除しますか？</p>
                                    <div class="row">
                                        <p class="col-3">カテゴリ</p>
                                        <p class="col-9" id="modal-category"></p>
                                    </div>
                                    <div class="row">
                                        <p class="col-3">作成日</p>
                                        <p class="col-9" id="modal-date"></p>
                                    </div>
                                    <div class="row">
                                        <p class="col-3">作成者</p>
                                        <p class="col-9" id="modal-user"></p>
                                    </div>
                                    <div class="row">
                                        <p class="col-3">本文</p>
                                        <p class="col-9" id="modal-text"></p>
                                    </div>
                                </div>
                                <div class="modal-footer justify-content-between">
                                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-danger">削除</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            @else
                <div class="callout callout-warning">
                    <h5>日記投稿が1件もありません</h5>
                    <p>新規投稿ボタンから日記を投稿してみましょう</p>
                </div>
            @endif
        </div>
    </div>
@endsection

@section('script')
    <script>
        function handleDelete(e) {
            var element = e.parentNode.parentNode;
            $('#modal-category').text(element.getElementsByTagName('th')[1].innerHTML);
            $('#modal-date').text(element.getElementsByTagName('th')[2].innerHTML);
            $('#modal-user').text('userA');
            $('#modal-text').text(element.getElementsByTagName('th')[3].innerHTML);
        }
    </script>
@endsection