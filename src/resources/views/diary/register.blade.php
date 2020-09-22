@extends('layouts.app')

@section('content')
    <div class="card card-default">
        <div class="card-header">
            <h3 class="title">My日記</h3>
        </div>
        <div class="card-body">
            <form action="{{ route('diary.register.confirm') }}" method="POST">
                @csrf
                <div>
                    <label for="date" class="col-md-2">日付　：　</label>
                    <input type="text" name="date" class="datepicker col-md-5"/>
                    @if ($errors->has('date'))
                        <div class="text-danger">
                            {{ $errors->first('date') }}
                        </div>
                    @endif
                </div>
                <div>
                    <label for="category" class="col-md-2">カテゴリ　：　</label>
                    <select name="category" class="col-md-5">
                        <option value=""></option>
                        <option value="work">仕事</option>
                        <option value="play">遊び</option>
                        <option value="sightseeing">観光</option>
                        <option value="other">その他</option>
                    </select>
                </div>
                <div>
                    <p>
                        本日はどんな一日でしたか？<br>
                        今日あった事を書いてみてください。
                    </p>
                    <textarea class="diaryText" name="diary_text"></textarea>
                </div>
                <input type="submit" class="btn btn-info" value="登録確認画面へ">
            </form>
        </div>
    </div>
@endsection

@section('css')
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
@endsection

@section('script')
    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <script>
        $( function() {
            $('.datepicker').datepicker({
                changeMonth: true,
                changeYear: true,
                showAnim: 'slideDown'
            });
        });
    </script>
@endsection