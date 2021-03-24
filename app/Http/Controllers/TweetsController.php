<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tweet;

class TweetsController extends Controller
{
    public function index()
    {
        $tweets = Tweet::orderBy('created_at', 'desc')->get();

        return view('tweets.index', ['tweets' => $tweets]);
    }

    public function create()
    {
        return view('tweets.create');
    }

    public function store(Request $request)
    {
        $params = $request->validate([
            'body' => 'required|max:144',
        ]);
        Tweet::create($params);

        return redirect()->route('top');
    }

    public function show($tweet_id)
    {
    }
    
    public function edit($tweet_id)
    {
    }

    public function update($tweet_id, Request $request)
    {
    }

    public function destroy($tweet_id)
    {
    }
}
