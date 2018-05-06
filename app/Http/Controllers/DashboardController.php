<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class DashboardController extends Controller
{

    public function __construct(){
        $this->middleware('auth');
    }

    public function show(){
        $user=auth()->user();
        $favorites=$user->favorites->count();
        $recents=$user->recents->count();
        $searches=$user->searches->count();
        $subscriptions=$user->subscriptions->count();
       
        return view('dashboard.show', compact('favorites','recents','searches','subscriptions'));
    }
}
