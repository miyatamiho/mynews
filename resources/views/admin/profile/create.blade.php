    @extends('layouts.profile')
    @section('title', 'プロフィールの新規作成')
    
    @section('content')
        <div class="container">
            <div class="row">
                <div class="col-md-8 mx-auto">
                    <h3>プロフィール新規作成</h3>
                    <form action={{route('admin.profile.create') }} method="post" enctype="multipart/form-data">
                        
                    @if (count($errors) > 0)
                        <ul>
                            @foreach($errors->all() as $e)
                                <li>{{ $e }}</li>
                                @endforeach
                        </ul>
                    @endif
                    <div class="form-group row">
                        <label class="col-md-2">氏名</label>
                        <div class="col-md-10">
                            <input type="text" class="form-control" name="name" value="{{ old('name') }}">
                        </div>
                    </div>
                        <div class="form-group row">
                            <label class="col-md-2">性別</label>
                            <div class="col-md-10">
                                <input type="radio" name="gender" id="male" value="male" {{ old('gender') == 'male' ? 'checked' : '' }}>
                                <label for="male">男性</label>
                            </div>
                            <div>
                                <input type="radio" name="gender" id="female" value="female" {{ old('gender') == 'female' ? 'checked' : '' }}>
                                <label for="female">女性</label>
                            </div>
                        </div>
                            <div class="form-group row">
                                <label class="col-md-2">自己紹介欄</label>
                                <div class="col-md-10">
                                    <textarea class="form-control" name="introduction" rows="20">{{ old('introduction') }}</textarea>
                                </div>
                            </div>
                            @csrf
                            <input type="submit" class="btn btn-primary" value="送信">
                    </form>
                </div>
            </div>
        </div>
    @endsection
    