<?php

namespace App\Http\Controllers\Web;

use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;

class AuthenticationController extends Controller
{
    //
    public function getSocialRedirect($account)
    {
       try{
           return Socialite::with($account)->redirect();
       }catch (\InvalidArgumentException $e){
           return redirect("/web/login");
       }
    }

    public function getSocialCallback($account)
    {
      //  dd($account);
        //从第三方oAuth回调获取用户信息
        $socialUser = Socialite::with($account)->user();
        $user  = User::where("provider_id","=",$socialUser->id)
                 ->where("provider","=",$account)->first();
        if($user==null&&!$this->hasEmailUser($socialUser->getEmail()))
        {
            // 如果该用户不存在则将其保存到 users 表
            $newUser = new User();

            $newUser->name        = $socialUser->getName();
            $newUser->email       = $socialUser->getEmail() == '' ? '' : $socialUser->getEmail();
            $newUser->avatar      = $socialUser->getAvatar();
            $newUser->password    = '';
            $newUser->provider    = $account;
            $newUser->provider_id = $socialUser->getId();

            $newUser->save();
            $user = $newUser;
        }else{
            $newUser = User::where("email","=",$socialUser->getEmail())->first();
            $newUser->avatar      = $socialUser->getAvatar();
            $newUser->provider    = $account;
            $newUser->provider_id = $socialUser->getId();

            $newUser->save();
            $user = $newUser;
        }
        // 手动登录该用户
        Auth::login($user);
        // 登录成功后将用户重定向到首页
        return redirect('/web');
    }

    public function hasEmailUser($email='')
    {
       if(empty($email)) return false;
       $user = User::where("email","=",$email)->first();
       return $user==null?false:true;
    }
}
