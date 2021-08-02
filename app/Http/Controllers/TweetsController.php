<?php

namespace App\Http\Controllers;

use App\Http\Requests\TweetRequest;
use App\Models\FavTweetModel;
use App\Models\FollowModel;
use App\Models\PostsModel;
use App\Models\RetweetsModel;
use App\Models\TweetsModel;

use App\Models\User;
use Illuminate\Http\Request;

class TweetsController extends Controller
{
    //

    public function index()
    {


        $tweets = PostsModel::where('user_id','=', auth()->id())
            ->with('tweets')
            ->with('users')
            ->with('fav_tweet')
            ->orderBy('created_at', 'desc')->get();

        return $tweets;
        return view('layouts.master')->with(['tweets'=>$tweets]);
    }
    public function get_tweets()
    {
        return 'test';
    }

    public function create_tweets(TweetRequest $request)
    {
        $post = new PostsModel();
        $post->user_id = auth()->id();
        $post->save();
        $tweet = new TweetsModel();
        $tweet->post_id = $post->id;
        $tweet->content = $request->tweet;
        $tweet->save();

        return back()
            ->with('message','Tweet eklendi.');

    }

    public function fav_tweet($id)
    {
        $check_fav = FavTweetModel::where('user_id', auth()->id())->where('post_id',$id)->count();
        if($check_fav < 1){
            $fav = new FavTweetModel();
            $fav->user_id = auth()->id();
            $fav->post_id = $id;
            $fav->save();
            return back();
        }else{
            $fav = FavTweetModel::where('user_id', auth()->id())->where('post_id',$id);
            $fav->delete();
            return back();
        }

    }

    public function retweet($id)
    {



    }

    public function profile($id)
    {
        $tweets = PostsModel::where('user_id','=', $id)
            ->with('tweets')
            ->with('users')
            ->with('fav_tweet')
            ->orderBy('created_at', 'desc')->get();
        $user = User::find($id);
        $user_follow = FollowModel::where('follower_id',auth()->id())->where('following_id',$id)->get();

        return view('layouts.profile')->with(['tweets'=>$tweets,'user'=>$user,'user_follow'=>$user_follow]);
    }

    public function follow($id)
    {
        $follow = new FollowModel();
        $follow->follower_id = auth()->id();
        $follow->following_id = $id;
        $follow->save();
        return back();
    }

    public function unfollow($id)
    {
        $follow = FollowModel::where('follower_id',auth()->id())->where('following_id',$id);
        $follow->delete();

        return back();
    }
}
