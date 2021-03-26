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
        $params['user_id'] = 1;
        Tweet::create($params);

        return redirect()->route('top');
    }

    public function show($tweet_id)
    {
        $tweet = Tweet::findOrFail($tweet_id);

        return view('tweets.show', ['tweet' => $tweet]);
    }
    
    public function edit($tweet_id)
    {
        $tweet = Tweet::findOrFail($tweet_id);

        return view('tweets.edit', ['tweet' => $tweet,]);
    }

    public function update($tweet_id, Request $request)
    {
        $params = $request->validate([
            'body' => 'required|max:144',
        ]);
        $params['user_id'] = 1;
        $tweet = Tweet::findOrFail($tweet_id);
        $tweet->fill($params)->save();

        return redirect()->route('tweets.show', ['tweet' => $tweet]);
    }

    public function destroy($tweet_id)
    {
    }
}
