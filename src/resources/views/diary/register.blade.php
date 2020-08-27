@extends('layouts.app')

@section('content')
    <div class="container">
        <h3 class="title">My日記</h3>
        <p>
            本日はどんな一日でしたか？<br>
            今日あった事を書いてみてください。
        </p>
        <div>
            <form action="{{ route('diary.register.confirm') }}" method="POST">
                @csrf
                <div>
                    <label for="date">日付　：　</label>
                    <input type="text" name="date">
                </div>
                <div>
                    <label for="category">カテゴリ　：　</label>
                    <select name="category">
                        <option value=""></option>
                        <option value="work">仕事</option>
                        <option value="play">遊び</option>
                        <option value="sightseeing">観光</option>
                        <option value="other">その他</option>
                    </select>
                </div>
                <div>
                    <textarea class="diaryText" name="diary_text"></textarea>
                </div>
                <input type="submit" class="btn btn-info" value="登録">
            </form>
        </div>
    </div>
@endsection

@section('script')
    <script type="text/javascript" src="https://cdn.jsdelivr.net/jquery/latest/jquery.min.js"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
    <script>
        $(function() {
            $('input[name="date"]').daterangepicker({
                singleDatePicker: true,
                showDropdowns: true,
                minYear: 2000,
                maxYear: parseInt(moment().format('YYYY'),10)
            }, function(start) {
                $('input[name="date"]').value = start;
            });
        });
    </script>
@endsection