{{-- layouts/app.blade.phpを読み込む --}}
@extends('layouts.app')


{{-- admin.blade.phpの@yield('title')に'ニュースの新規作成'を埋め込む --}}
@section('title', 'Home')

{{-- admin.blade.phpの@yield('content')に以下のタグを埋め込む --}}
@section('content')
<div class="container">
    <form action="{{ action('PostController@create') }}" method="post" enctype="multipart/form-data">
        @if (count($errors) > 0)
        <ul>
            @foreach($errors->all() as $e)
            <li>{{ $e }}</li>
            @endforeach
        </ul>
        @endif
        <div class="form-group row">
            <div class="col-md-10 row">
                <input type="text" class="form-control col-md-10" name="body" value="{{ old('body') }}">
                <input type="submit" class="btn btn-primary col-auto" value="つぶやく">
            </div>
        </div>
        <input type="hidden" name="user_id" value="{{Auth::user()->id}}">
        {{ csrf_field() }}
    </form>
    @foreach($posts as $post)
    <div class="flex card mb-2 justify-between">
        @foreach($users as $user)
            @if ($user->id == $post->user_id)
                <div class="d-flex justify-content-between">
                    <div class="col-8">{{ $user->name }}</div>
                    <div class="col-4 text-right">{{ $post->created_at }}</div>
                </div>
                <div class="d-flex justify-content-between">
                    <div class="col-10">{{ $post->body }}</div>
                    @if (Auth::user()->id == $post->user_id)
                        <a class="col-2 text-right" href="{{ action('PostController@delete', ['id'=>$post->id]) }}">削除</a>
                    @endif
                </div>
            @endif
        @endforeach
    </div>
    @endforeach
</div>
@endsection