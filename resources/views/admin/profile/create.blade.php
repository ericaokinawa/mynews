@extends('layouts.profile')
@section('title','Myプロフィール')
@section('content')
<div class="container">
  <div class="row">
    <div class="col-md-8 mx-auto">
      <h2>Myプロフィール</h2>
      <form action="{{ action('Admin\ProfileController@create') }}" method="post" enctype="multipart/form-data">
     
        @if (count($errors) > 0)
          <ul>
            @foreach($errors->all() as $e)
              <li>{{ $e }}</li>
            @endforeach
          </ul>
        @endif
          <br>
              <div class="form-rtop row">
                <label class="col-md-2" for="name">氏名</label>
                <div class="col-md-10">
                  <input type="text" class="form-control" name="name" value="{{ old('name') }}">
                </div>
              </div>
          <br>
              <div class="form-rtop row">
                <label class="col-md-2" for="gender">性別</label>
                <div class="col-md-10">
                    <label class="col-md-2" for="male">男性
                      <input type="radio" class="form-control" name="gender" value="{{ old('gender', 'male') == 'male' ? 'checked' : ''}}">
 
                    </label>
                    <label class="col-md-2" for="female">女性
                    <input type="radio" class="form-control" name="gender" value="{{ old('gender', 'female') == 'female' ? 'checked' : ''}}">
                    </label>
                </div>
               </div>
          <br>
              <div class="form-rtop row">
                <label class="col-md-2" for="hobby">趣味</label>
                <div class="col-md-10">
                  <textarea type="text" class="form-control" name="hobby" value="{{ old('hobby') }}">
                  </textarea>
                </div>
              </div>
          <br>
              <div class="form-rtop row">
                <label class="col-md-2" for="introduction">自己紹介欄</label>
                <div class="col-md-10">
                  <textarea type="text" class="form-control" name="introduction" value="{{ old('introduction') }}">
                  </textarea>
                </div>
              </div>
          <br>    
               {{ csrf_field() }}
              <input type="submit" class="btn btn-primary" value="更新">
      </form>
    </div>
  </div>
</div>
@endsection