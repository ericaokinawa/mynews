<?php

namespace App\Http\Controllers\Admin;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Profiles;
use App\Profilehitsory;
use Carbon\Carbon;

class ProfileController extends Controller
{
  
public function add()
    {
      return view('admin.profile.create');
    }
    
public function create(Request $request)
    {
        // Varidationをかける
      $this->validate($request, Profiles::$rules);
       // Profile Modelからデータを取得
      $profile = new Profiles;
      $form = $request->all();
    
      $profile->fill($form);
      $profile->save();
    
      return redirect('admin/profile/create');
    }
    
public function index(Request $request)
    {
      $cond_title = $request->cond_title;
      if ($cond_title != '') {
        $posts = Profiles::where('title', $cond_title)->get();
      } else {
        $posts = Profiles::all();
      }
       return view('admin.profile.index', ['posts' => $posts, 'cond_title' => $cond_title]);
    }
    
public function edit(Request $request)
    {
      $profile = Profiles::find($request->id);
      if (empty($profile)) {
        abort(404);
      }
      return view('admin.profile.edit', ['profile_form' => $profile]);
    }
    
public function update(Request $request)
    {
        // Varidationをかける
      $this->validate($request, Profiles::$rules);
      
       // Profile Modelからデータを取得
      $profile = Profiles::find($request->id);
      
        // 送信されてきたフォームデータを格納
      $profile_form = $request->all();
      
       // 該当するデータを上書きして保存
      $profile->fill($profile_form)->save();
      
      $profilehistory = new Profilehistory;
      $profilehistory->profiles_id = $profile->id;
      
        //corbon日時を扱うライブラリ 
      $profilehistory->edited_at = Carbon::now();
      $profilehistory->save();
      
      return redirect('admin/profile');
    }
    
public function delete(Request $request)
    {
      $profile = Profiles::find($request->id);
      $profile->delete();
      return redirect('admin/profile');
    }
}
