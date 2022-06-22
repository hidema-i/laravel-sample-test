<?php

namespace App\Http\Controllers\Tweet;

use App\Http\Controllers\Controller;
use App\Services\TweetService;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request, TweetService $tweetService)
    {
        //マジックメソッド__invokeのtest
        // return view('tweet.index', ['name' => 'laravel']);

        $tweets = $tweetService->getTweets();
//        dump($tweets);
//        app(\App\Exceptions\Handler::class)->render(request(), throw new \Error('dump report.'));
        // $tweets = Tweet::orderBy('created_at', 'DESC')->get();
        //dd($tweets);
        return view('tweet.index')
            ->with('tweets', $tweets);
    }
}
