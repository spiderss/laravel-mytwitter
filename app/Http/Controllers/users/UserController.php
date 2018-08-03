<?php

namespace App\Http\Controllers\users;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
class UserController extends Controller
{
    //
    public function show(User $user)
    {

        return view('user', compact('user'));
    }

    public function follow(Request $request,User $user)
    {
        if($request->user()->canFollow($user))
        {
            $request->user()->following()->attach($user);
        }
        return redirect()->back();
    }

    public function unFollow(Request $request, User $user)
    {
        if($request->user()->canUnFollow($user)) {
            $request->user()->following()->detach($user);
        }
        return redirect()->back();
    }

    public function focuses(Request $request,User $user)
    {
       return "ok";
    }
}
