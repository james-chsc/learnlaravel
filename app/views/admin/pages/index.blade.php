@extends('admin._layouts.default')

@section('main')

    {{ Notification::showAll() }}

    <a class="btn btn-primary" href="{{ URL::route('admin.pages.create') }}">新建</a>

    <table class="table table-striped">
        <thead>
        <tr>
            <th>#</th>
            <th>Title</th>
            <th>最後修改時間</th>
            <th><i class="icon-cog"></i></th>
        </tr>
        </thead>
        <tbody>
        @foreach($pages as $page)
            <tr>
                <td>{{ $page->id }}</td>
                <td>
                    <a href="{{ URL::route('admin.pages.show', $page->id) }}">
                        {{ $page->title }}
                    </a>
                </td>
                <td>{{ $page->updated_at }}</td>
                <td>
                    <a class="btn btn-success btn-mini pull-left"
                       href="{{ URL::route('admin.pages.edit', $page->id) }}">編輯</a>
                    {{ Form::open([
                        'route' => ['admin.pages.destroy', $page->id],
                        'method' => 'delete',
                        'data-confirm'  => '您確定嗎？'
                    ]) }}
                    <button class="btn btn-danger btn-mini" type="submit">刪除</button>
                    {{ Form::close() }}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>

@stop
