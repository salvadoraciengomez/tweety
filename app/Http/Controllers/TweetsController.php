<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Tweet;
use App\User;

class TweetsController extends Controller
{
    public function index()
    {
        $tweets = Tweet::latest()->get();
        return view('tweets.index', [
            'tweets' => auth()->user()->timeline()
        ]);
    }
    public function store(){
        $attributes = request()->validate(['body' => 'required|max:255']);
        Tweet::create([
            'user_id' => auth()->user()->id,
            // 'user_id' => auth()->id() 
            'body' => $attributes['body']
        ]);

        return redirect()->route('home');
    }
    
    public function logout(){
        Auth::logout();
        return redirect()->route('home');
    }
}
