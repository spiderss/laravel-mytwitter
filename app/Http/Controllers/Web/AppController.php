<?php

namespace App\Http\Controllers\Web;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AppController extends Controller
{
    //
    public function getApp()
    {
        return view('web.app');
    }

    public function getLogin()
    {
        return view("web.login");
    }
}
