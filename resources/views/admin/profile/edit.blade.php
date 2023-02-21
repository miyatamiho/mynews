@extends('layouts.profile')
@section('title', 'プロフィールの編集')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 mx-auto">
                <h3>プロフィール編集</h3>
                <form action="{{ route('admin.profile.update') }}" method="post" enctype="multipart/form-data">
                     @if (count($errors) > 0)
                        <ul>
                            @foreach($errors->all() as $e)
                                <li>{{ $e }}</li>
                            @endforeach
                        </ul>
                    @endif
                    <div class="form-group row">
                        <label class="col-md-2" for="name">氏名</label>
                        <div class="col-md-10">
                            <input type="text" class="form-control" name="introduction" value="name">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-2" for="gender">性別</label>
                        <div class="col-md-10">
                            <label class="radio-inline">
                                <input type="radio" class="form-control "name="gender" value="male">男性
                            </label>
                            <label class="radio-inline">
                                <input type="radio" class="form-control "name="gender" value="female">女性
                            </label>
                        </div>
                    </div>
                    <div class="form-group row">
                            <label class="col-md-2" for="hobby">趣味</label>
                        <div class="col-md-10">
                            <input type="text" class="form-control" name="hobby" value="hobby">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-2" for="body">自己紹介</label>
                        <div class="col-md-10">
                            <textarea class="form-control" name="body" rows="20"></textarea>
                        </div>
                    </div>
                </form>
            </div>
             <div class="form-group row">
                        <div class="col-md-10">
                            <input type="hidden" name="id" value="id">
                            @csrf
                            <input type="submit" class="btn btn-primary" value="更新">
                        </div>
                    </div>
        </div>
    </div>