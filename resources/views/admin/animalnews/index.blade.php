@extends('layouts.admin')
@section('title', '登録済み動物関連ニュースの一覧')

@section('content')
    <div class="container">
        <div class="row">
            <h2>動物関連ニュース一覧</h2>
        </div>
        <div class="row">
            <div class="col-md-4">
                <a href="{{ route('admin.animalnews.add') }}" role="button" class="btn btn-primary">新規作成</a>
            </div>
            <div class="col-md-8">
                <form action="{{ route('admin.animalnews.index') }}" method="get">
                    <div class="form-group row">
                        <label class="col-md-2">タイトル</label>
                        <div class="col-md-8">
                            <input type="text" class="form-control" name="cond_title" value="{{ $cond_title }}">
                        </div>
                        <div class="col-md-2">
                            @csrf
                            <input type="submit" class="btn btn-primary" value="検索">
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <div class="row">
            <div class="list-news col-md-12 mx-auto">
                <div class="row">
                    <table class="table table-dark">
                        <thead>
                            <tr>
                                <th width="10%">ID</th>
                                <th width="20%">タイトル</th>
                                <th width="50%">本文</th>
                                <th width="10%">操作</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($posts as $animalnews)
                                <tr>
                                    <th>{{ $animalnews->id }}</th>
                                    <td>{{ Str::limit($animalnews->title, 100) }}</td>
                                    <td>{{ Str::limit($animalnews->body, 250) }}</td>
                                    <td>
                                        <div>
                                            <a href="{{route('admin.animalnews.edit', ['id' => $animalnews->id]) }}">編集</a>
                                        </div>
                                        <div>
                                            <a href="{{route('admin.animalnews.delete', ['id' => $animalnews->id]) }}">削除</a>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection