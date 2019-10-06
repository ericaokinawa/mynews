@extends('layouts.profile')
@section('title','プロフィールの編集')
@section('content')
<div class="content">
    <div class="row">
      <div class="col-md-8 mx-auto">
        <h2>プロフィールの編集</h2>
          <form action="{{ action('Admin\ProfileController@update') }}" method="post" enctype="multipart/form-data">
            @if (count($errors) > 0)
              <ul>
                @foreach($errors->all() as $e)
                  <li>{{ $e }}</li>
                @endforeach
              </ul>
            @endif
          <div class="form-group row">
            <label class="col-md-2" for="name">名前</label>
              <div class="col-md-10">
                <input type="text" class="form-control" name="name" value="{{ old('name'), $profile_form->name }}">
              </div>
          </div>
          
          <div class="form-group row">
            <label class="col-md-2" for="gender">性別</label>
              <div class="col-md-10">
                <label class="col-md-2" for="male">男性
                  <input type="radio" class="form-control" name="gender" value="male" {{ old('gender', $profile_form->gender) == 'male' ? 'checked' : ''}}>
                </label>
                <label class="col-md-2" for="female">女性
                  <input type="radio" class="form-control" name="gender" value="female" {{ old('gender', $profile_form->gender) === 'female' ? 'checked' : ''}}>
                </label>
              </div>
          </div>
          
          <div class="form-group row">
            <label class="col-md-2" for="hobby">趣味</label>
              <div class="col-md-10">
                <textarea type="text" class="form-control" name="hobby" rows="20">{{ old('hobby', $profile_form->hobby) }}</textarea>
              </div>
          </div>
          
          <div class="form-group row">
            <label class="col-md-2" for="introduction">自己紹介</label>
              <div class="col-md-10">
                <textarea type="text" class="form-control" name="introduction" rows="20">{{ old('introduction', $profile_form->introduction) }}</textarea>
              </div>
          </div>
            
            <div class="form-group row">
              <div class="col-md-10">
                <input type="hidden" name="id" value="{{ $profile_form->id }}">
                {{ csrf_field() }}
                <input type="submit" class="btn btn-primary" value="更新">
            </div>
            </div>
            
            <div class="row mt-5">
              <div class="col-md-4 mx-auto">
                <h2>編集履歴</h2>
                <ul class="list-group">
                  @if ($profile_form->profilehistories !=NULL)
                    @foreach ($profile_form->profilehistories as $profilehistory)
                      <li class="list-group-item">{{ $profilehistory->edited_at }}</li>
                    @endforeach
                  @endif
                </ul>
              </div>
            </div>
          
        </form>
      </div>
    </div>
  </div>
</div>
@endsection