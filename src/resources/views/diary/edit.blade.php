@extends('layouts.app')

@section('content')
    <div class="card card-default">
        <div class="card-header">
            <h3 class="title">My日記</h3>
        </div>
        <div class="card-body">
            <form action="{{ route('diary.edit.confirm', ['id' => $diary->id]) }}" method="post">
                @csrf
                @method('PUT')
                <div>
                    <label for="date" class="col-md-2">日付　：　</label>
                    <input type="text" name="date" class="datepicker col-md-5" value="{{ $diary->date }}"/>
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
                        @foreach( config('diary.category') as $key => $value)
                            <option value="{{ $key }}" {{ $diary->category == $key ? 'selected' : '' }}>{{ $value }}</option>
                        @endforeach
                    </select>
                    @if ($errors->has('category'))
                        <div class="text-danger">
                            {{ $errors->first('category') }}
                        </div>
                    @endif
                </div>
                <div>
                    <p>
                        本日はどんな一日でしたか？<br>
                        今日あった事を書いてみてください。
                    </p>
                    <textarea class="diaryText" name="diary_text">{{ $diary->text }}</textarea>
                    @if ($errors->has('diary_text'))
                        <div class="text-danger">
                            {{ $errors->first('diary_text') }}
                        </div>
                    @endif
                </div>
                <input type="submit" class="btn btn-info" value="編集確認画面へ">
            </form>
        </div>
    </div>
@endsection

@section('script')
    <script>
        $( function() {
            $('.datepicker').datepicker({
                changeMonth: true,
                changeYear: true,
                showAnim: 'slideDown',
                dateFormat: 'yy-mm-dd'
            });
        });
    </script>
@endsection