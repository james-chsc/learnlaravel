@extends('admin._layouts.default')

@section('main')

    <h2>編輯頁面</h2>

    {{ Notification::showAll() }}

    @if ($errors->any())
        <div class="alert alert-error">
            {{ implode('<br>', $errors->all()) }}
        </div>
    @endif

    {{ Form::model($page, [
        'method' => 'put',
        'route' => ['admin.pages.update', $page->id]
    ]) }}

        <div class="control-group">
            {{ Form::label('title', 'Title') }}
            <div class="controls">
                {{ Form::text('title') }}
            </div>
        </div>

        <div class="control-group">
            {{ Form::label('body', 'Content') }}
            <div class="controls">
                {{ Form::textarea('body') }}
            </div>
        </div>

        <div class="form-actions">
            {{ Form::submit('更新', ['class' => 'btn btn-success btn-save btn-large']) }}
            <a class="btn btn-large" href="{{ URL::route('admin.pages.index') }}">取消</a>
        </div>

    {{ Form::close() }}
@stop