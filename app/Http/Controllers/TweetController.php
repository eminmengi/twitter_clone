<?php

namespace App\Http\Controllers;

use App\Http\Requests\TweetStoreRequest;
use App\Models\TweetFav;
use App\Models\Follow;
use App\Models\Post;
use App\Models\Retweet;
use App\Models\Tweet;

use App\Models\User;
use Illuminate\Http\Request;

class TweetController extends Controller
{
    //

    public function index()
    {
        $user_follow = Follow::where('follower_id',auth()->id())->get();
        $users = array();
        foreach ($user_follow as $follow){
            $users[] = $follow->following_id;
        }
        $users[] = auth()->id();


        $posts = Post::whereIn('user_id', $users)
            ->with(['tweet','user','tweetfav','retweet'])

            ->latest()->get();
      //return $posts;
        return view('layouts.master')->with(['posts'=>$posts]);
    }
    public function get_tweets()
    {
        return 'test';
    }

    public function createTweet(TweetStoreRequest $request)
    {
        $post = new Post();
        $post->user_id = auth()->id();
        $post->save();
        $tweet = new Tweet();
        $tweet->post_id = $post->id;
        $tweet->content = $request->tweet;
        $tweet->save();

        return back()
            ->with('message','Tweet eklendi.');

    }

    public function favTweet($id)
    {
        $check_fav = TweetFav::where('user_id', auth()->id())->where('post_id',$id)->count();
        if($check_fav < 1){
            $fav = new TweetFav();
            $fav->user_id = auth()->id();
            $fav->post_id = $id;
            $fav->save();
            return back();
        }else{
            $fav = TweetFav::where('user_id', auth()->id())->where('post_id',$id);
            $fav->delete();
            return back();
        }

    }

    public function retweet($id)
    {
        // Burası düzenlenecek
        $post = new Post();
        $post->user_id = auth()->id();
        $post->save();
        $retweet = new Retweet();
        $retweet->post_id =$post->id;
        $retweet->tweet_id = $id;
        $retweet->save();

        return back();


    }

    public function unretweet($id)
    {


        $retweet = Retweet::find($id);

        $post = Post::find($retweet->post_id);

        $retweet->delete();
        $post->delete();
        return back();
    }

    public function profile($id)
    {
        $tweets = Post::where('user_id','=', $id)
            ->with(['tweet','user','tweetfav'])
            ->orderBy('created_at', 'desc')->get();
        $user = User::find($id);
        $user_follow = Follow::where('follower_id',auth()->id())->where('following_id',$id)->get();

        return view('layouts.profile')->with(['tweets'=>$tweets,'user'=>$user,'user_follow'=>$user_follow]);
    }

    public function follow($id)
    {
        $follow = new Follow();
        $follow->follower_id = auth()->id();
        $follow->following_id = $id;
        $follow->save();
        return back();
    }

    public function unfollow($id)
    {
        $follow = Follow::where('follower_id',auth()->id())->where('following_id',$id);
        $follow->delete();

        return back();
    }
}
