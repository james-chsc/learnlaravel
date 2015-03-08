@extends('admin._layouts.default')

@section('main')

    <h2>頁面內容</h2>

    <div class="onepage">

        <div class="title">
            <h3>{{ $page->title }}</h3>
        </div>

        <div class="info">
            由 {{ $author }} 所發佈於 {{ $page->created_at }}  最後更新 {{ $page->updated_at }}
        </div>

        <div class="body">
            {{ $page->body }}
        </div>

    </div>
    <br>
    <a class="btn btn-success"
       href="{{ URL::route('admin.pages.edit', $page->id) }}">編輯</a>
    <a class="btn btn-primary"
       href="{{ URL::route('admin.pages.index') }}" >回列表</a>

@stop