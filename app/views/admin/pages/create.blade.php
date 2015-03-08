@extends('admin._layouts.default')

@section('main')

    <h2>新增一個頁面</h2>

    {{ Notification::showAll() }}

    @if ($errors->any())
        <div class="alert alert-error">
            {{ implode('<br>', $errors->all()) }}
        </div>
    @endif

    {{ Form::open(['route' => 'admin.pages.store']) }}

    <div class="control-group">
        {{ Form::label('title', 'Title') }}
        <div class="controlls">
            {{ Form::text('title') }}
        </div>
    </div>

    <div class="control-group">
        {{ Form::label('body', 'Content') }}
        <div class="controlls">
            {{ Form::textarea('body') }}
        </div>
    </div>

    <div class="form-actions">
        {{ Form::submit('新增', ['class' => 'btn btn-success btn-save btn-large']) }}
        <a class="btn btn-large" href="{{ URL::route('admin.pages.index') }}">取消</a>
    </div>

    {{ Form::close() }}
@stop