<?php

namespace App\Http\Controllers\Account;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function index()
    {
        $user = \Auth::user();
        return view('account.index', ['user' => $user]);
    }
}
