@extends('layouts.app')    

@section('content')
    <div class="container">
        <h3 class="title">My日記</h3>
        <p>今日あったこと</p>
        <div>
            <p>{{ $event }}</p>
        </div>
    </div>
@endsection