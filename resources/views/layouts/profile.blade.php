
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">
    <title>{{$user->name}} Twitter Clone</title>
    <link rel="stylesheet" href="{{asset('assets/bootstrap/css/bootstrap.css')}}">
    <link href="https://unpkg.com/tailwindcss@^1.0/dist/tailwind.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/GrayGrids/LineIcons/LineIcons.css">
    <link rel="stylesheet" href="{{asset('assets/css/stylesheets/screen.css')}}">
</head>

<body class="bg-white">

<!-- wrapper start -->
<div class="">


    <!-- container start -->
    <div class="container mx-auto">

        <div class="flex md:flex-no-wrap flex-wrap">



        @include('inc/leftbar')

        <!-- left colulmn start -->
            <div class="w-full py-0 border border-t-0 border-b-0 ">

                <!-- middle column header start -->
                <div id="homeNavbar" class="middle-column-header border border-t-0 border-r-0 bg-white border-l-0">
                    <div class="inner px-3 py-3">
                        <div class="flex">
                            <div class="w-1/2">
                                <div class="inner">
                                    <a href="" class="text-xl font-bold text-black">Profile</a>
                                </div>
                            </div>
                            <div class="w-1/2">
                                <div class="inner text-right relative">
                                        <span class="magic-icon w-10 twitter-color right-0 top-0 absolute rounded-full cursor-pointer p-2 transition-3 twitter-light-blue-on-hover">
                                            <svg viewBox="0 0 24 24" class="r-13gxpu9 r-4qtqp9 r-yyyyoo r-1q142lx r-50lct3 r-dnmrzs r-bnwqim r-1plcrui r-lrvibr"><g><path d="M22.772 10.506l-5.618-2.192-2.16-6.5c-.102-.307-.39-.514-.712-.514s-.61.207-.712.513l-2.16 6.5-5.62 2.192c-.287.112-.477.39-.477.7s.19.585.478.698l5.62 2.192 2.16 6.5c.102.306.39.513.712.513s.61-.207.712-.513l2.16-6.5 5.62-2.192c.287-.112.477-.39.477-.7s-.19-.585-.478-.697zm-6.49 2.32c-.208.08-.37.25-.44.46l-1.56 4.695-1.56-4.693c-.07-.21-.23-.38-.438-.462l-4.155-1.62 4.154-1.622c.208-.08.37-.25.44-.462l1.56-4.693 1.56 4.694c.07.212.23.382.438.463l4.155 1.62-4.155 1.622zM6.663 3.812h-1.88V2.05c0-.414-.337-.75-.75-.75s-.75.336-.75.75v1.762H1.5c-.414 0-.75.336-.75.75s.336.75.75.75h1.782v1.762c0 .414.336.75.75.75s.75-.336.75-.75V5.312h1.88c.415 0 .75-.336.75-.75s-.335-.75-.75-.75zm2.535 15.622h-1.1v-1.016c0-.414-.335-.75-.75-.75s-.75.336-.75.75v1.016H5.57c-.414 0-.75.336-.75.75s.336.75.75.75H6.6v1.016c0 .414.335.75.75.75s.75-.336.75-.75v-1.016h1.098c.414 0 .75-.336.75-.75s-.336-.75-.75-.75z"></path></g></svg>
                                        </span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- middle column header end -->



                <!-- new tweet textarea start -->
                <div class="new-tweet-textarea p-3 pb-0">
                    <div class="flex">

                        <div class="w-16">
                            <div class="inner">
                                <img class="rounded-full block w-full" src="{{asset('assets/images/default_profile_400x400.png')}}" alt="profile image">
                            </div>
                        </div>
                        <a href="#" class="hover:underline text-gray-900 font-bold text-base mr-1">   {{$user->name}}</a>
                        @if(auth()->id() !=$user->id)
                            @if(count($user_follow)>0)
                                <a style="text-align: center; width: 250px;"  href="{{route('unfollow',$user->id)}}" class="p-3 twitter-bg text-white w-full rounded-full font-bold tracking-wide">Takibi B??rak</a>

                            @else
                                <a style="text-align: center; width: 250px;" href="{{route('follow',$user->id)}}" class="p-3 twitter-bg text-white w-full rounded-full font-bold tracking-wide">Takip Et</a>
                            @endif
                        @endif


                    </div>
                </div>
                <!-- new tweet textarea end -->


                <div class="hr-bar">
                    <hr class="block h-3 w-full">
                </div>



                <!-- tweets wrapper start -->
                <div class="tweets-wrapper">
                    <div class="innner">
                    @foreach($posts as $post)
                        <!-- tweet start -->
                            <div class="tweet cursor-pointer hover:bg-gray-100 transition-3 border border-l-0 border-r-0 border-t-0 p-4 pb-0">
                                <div class="flex">
                                    <div class="w-auto">
                                        <!-- tweet user img start -->
                                        <div class="tweet-user-img">
                                            <span class="w-12 rounded-full overflow-hidden mr-2">
                                                <img src="{{asset('assets/images/default_profile_400x400.png')}}" alt="tweet user image">
                                            </span>
                                        </div>
                                        <!-- tweet user img end -->
                                    </div>
                                    <div class="w-full">
                                        <!-- tweet tweet start -->
                                        <div class="tweet-tweet">
                                            <!-- tweet info bar start -->
                                            @if($post->tweet)
                                                <div class="tweet-info-bar flex items-center ">
                                                    <!-- twet username start -->
                                                    <span class="tweet-username relative block">
                                                    <a href="{{route('profile',$post->user->id)}}" class="hover:underline text-gray-900 font-bold text-base mr-1">{{$post->user->name}}</a>
                                                    <span class="w-4 inline-block twitter-color verified">
                                                        <svg viewBox="0 0 24 24" aria-label="Verified account" class="r-13gxpu9 r-4qtqp9 r-yyyyoo r-1xvli5t r-9cviqr r-dnmrzs r-bnwqim r-1plcrui r-lrvibr"><g><path d="M22.5 12.5c0-1.58-.875-2.95-2.148-3.6.154-.435.238-.905.238-1.4 0-2.21-1.71-3.998-3.818-3.998-.47 0-.92.084-1.336.25C14.818 2.415 13.51 1.5 12 1.5s-2.816.917-3.437 2.25c-.415-.165-.866-.25-1.336-.25-2.11 0-3.818 1.79-3.818 4 0 .494.083.964.237 1.4-1.272.65-2.147 2.018-2.147 3.6 0 1.495.782 2.798 1.942 3.486-.02.17-.032.34-.032.514 0 2.21 1.708 4 3.818 4 .47 0 .92-.086 1.335-.25.62 1.334 1.926 2.25 3.437 2.25 1.512 0 2.818-.916 3.437-2.25.415.163.865.248 1.336.248 2.11 0 3.818-1.79 3.818-4 0-.174-.012-.344-.033-.513 1.158-.687 1.943-1.99 1.943-3.484zm-6.616-3.334l-4.334 6.5c-.145.217-.382.334-.625.334-.143 0-.288-.04-.416-.126l-.115-.094-2.415-2.415c-.293-.293-.293-.768 0-1.06s.768-.294 1.06 0l1.77 1.767 3.825-5.74c.23-.345.696-.436 1.04-.207.346.23.44.696.21 1.04z"></path></g></svg>
                                                    </span>

                                                </span>
                                                    <!-- twet username end -->

                                                    {{-- <span class="text-gray-600 text-base font-light tracking-wide inline-block ml-1">@shellywalia</span>
                                                     <span class="inline-block ml-1">??</span>--}}
                                                    <span class="text-gray-600 text-base font-light tracking-wide inline-block ml-1">{{date("d-m-Y H:m", strtotime($post->tweet->created_at))  }}</span>
                                                </div>
                                                <!-- tweet info bar end -->
                                                <!-- tweet detail start -->
                                                <div class="tweet-detail">
                                                    <p>
                                                        {{$post->tweet->content}}{{-- <a class="font-semibold" href="##MondayMotivation">#MondayMotivation</a>--}}
                                                    </p>
                                                </div>
                                                <!-- tweet detail end -->
                                                <!-- tweet footer start -->
                                                <div class="tweet-footer">
                                                    <div class="inner flex">

                                                        <div class="inline-block w-full">
                                                            <div class="inline-flex ficon-wrapper comment text-gray-600">
                                                            <span class="ficon comment rounded-full">
                                                                <svg viewBox="0 0 24 24" class="r-4qtqp9 r-yyyyoo r-1xvli5t r-dnmrzs r-bnwqim r-1plcrui r-lrvibr r-1hdv0qi"><g><path d="M14.046 2.242l-4.148-.01h-.002c-4.374 0-7.8 3.427-7.8 7.802 0 4.098 3.186 7.206 7.465 7.37v3.828c0 .108.044.286.12.403.142.225.384.347.632.347.138 0 .277-.038.402-.118.264-.168 6.473-4.14 8.088-5.506 1.902-1.61 3.04-3.97 3.043-6.312v-.017c-.006-4.367-3.43-7.787-7.8-7.788zm3.787 12.972c-1.134.96-4.862 3.405-6.772 4.643V16.67c0-.414-.335-.75-.75-.75h-.396c-3.66 0-6.318-2.476-6.318-5.886 0-3.534 2.768-6.302 6.3-6.302l4.147.01h.002c3.532 0 6.3 2.766 6.302 6.296-.003 1.91-.942 3.844-2.514 5.176z"></path></g></svg>
                                                            </span>
                                                                <span class="px-1 inline-block ficon-text font-normal"> 29 </span>
                                                            </div>
                                                        </div>

                                                        <div class="inline-block w-full">
                                                            @if(check_retweet_user($post->tweet->retweet_users))
                                                                <a href="{{route('unretweet',check_retweet_user($post->tweet->retweet_users)['retweet_id'])}}">
                                                                    <div class="inline-flex ficon-wrapper retweet text-gray-600 retweet_active">
                                                                <span class="ficon retweet rounded-full">
                                                                    <svg viewBox="0 0 24 24" class="r-4qtqp9 r-yyyyoo r-1xvli5t r-dnmrzs r-bnwqim r-1plcrui r-lrvibr r-1hdv0qi"><g><path d="M23.77 15.67c-.292-.293-.767-.293-1.06 0l-2.22 2.22V7.65c0-2.068-1.683-3.75-3.75-3.75h-5.85c-.414 0-.75.336-.75.75s.336.75.75.75h5.85c1.24 0 2.25 1.01 2.25 2.25v10.24l-2.22-2.22c-.293-.293-.768-.293-1.06 0s-.294.768 0 1.06l3.5 3.5c.145.147.337.22.53.22s.383-.072.53-.22l3.5-3.5c.294-.292.294-.767 0-1.06zm-10.66 3.28H7.26c-1.24 0-2.25-1.01-2.25-2.25V6.46l2.22 2.22c.148.147.34.22.532.22s.384-.073.53-.22c.293-.293.293-.768 0-1.06l-3.5-3.5c-.293-.294-.768-.294-1.06 0l-3.5 3.5c-.294.292-.294.767 0 1.06s.767.293 1.06 0l2.22-2.22V16.7c0 2.068 1.683 3.75 3.75 3.75h5.85c.414 0 .75-.336.75-.75s-.337-.75-.75-.75z"></path></g></svg>
                                                                </span>
                                                                        <span class="px-1 inline-block ficon-text font-normal"> @if(count($post->tweet->retweet_users) >0) {{count($post->tweet->retweet_users)}} @endif </span>
                                                                    </div>
                                                                </a>
                                                            @else
                                                                <a href="{{route('retweet',$post->tweet->id)}}">
                                                                    <div class="inline-flex ficon-wrapper retweet text-gray-600">
                                                                <span class="ficon retweet rounded-full">
                                                                    <svg viewBox="0 0 24 24" class="r-4qtqp9 r-yyyyoo r-1xvli5t r-dnmrzs r-bnwqim r-1plcrui r-lrvibr r-1hdv0qi"><g><path d="M23.77 15.67c-.292-.293-.767-.293-1.06 0l-2.22 2.22V7.65c0-2.068-1.683-3.75-3.75-3.75h-5.85c-.414 0-.75.336-.75.75s.336.75.75.75h5.85c1.24 0 2.25 1.01 2.25 2.25v10.24l-2.22-2.22c-.293-.293-.768-.293-1.06 0s-.294.768 0 1.06l3.5 3.5c.145.147.337.22.53.22s.383-.072.53-.22l3.5-3.5c.294-.292.294-.767 0-1.06zm-10.66 3.28H7.26c-1.24 0-2.25-1.01-2.25-2.25V6.46l2.22 2.22c.148.147.34.22.532.22s.384-.073.53-.22c.293-.293.293-.768 0-1.06l-3.5-3.5c-.293-.294-.768-.294-1.06 0l-3.5 3.5c-.294.292-.294.767 0 1.06s.767.293 1.06 0l2.22-2.22V16.7c0 2.068 1.683 3.75 3.75 3.75h5.85c.414 0 .75-.336.75-.75s-.337-.75-.75-.75z"></path></g></svg>
                                                                </span>
                                                                        <span class="px-1 inline-block ficon-text font-normal"> @if(count($post->tweet->retweet_users) >0) {{count($post->tweet->retweet_users)}} @endif </span>
                                                                    </div>
                                                                </a>
                                                            @endif
                                                        </div>

                                                        <div class="inline-block w-full">
                                                            <a href="{{route('fav_tweet',$post->id)}}">
                                                                <div class="inline-flex ficon-wrapper like text-gray-600">
                                                                <span class="ficon like rounded-full">
                                                                    <svg viewBox="0 0 24 24" class="r-4qtqp9 r-yyyyoo r-1xvli5t r-dnmrzs r-bnwqim r-1plcrui r-lrvibr r-1hdv0qi"><g><path d="M12 21.638h-.014C9.403 21.59 1.95 14.856 1.95 8.478c0-3.064 2.525-5.754 5.403-5.754 2.29 0 3.83 1.58 4.646 2.73.814-1.148 2.354-2.73 4.645-2.73 2.88 0 5.404 2.69 5.404 5.755 0 6.376-7.454 13.11-10.037 13.157H12zM7.354 4.225c-2.08 0-3.903 1.988-3.903 4.255 0 5.74 7.034 11.596 8.55 11.658 1.518-.062 8.55-5.917 8.55-11.658 0-2.267-1.823-4.255-3.903-4.255-2.528 0-3.94 2.936-3.952 2.965-.23.562-1.156.562-1.387 0-.014-.03-1.425-2.965-3.954-2.965z"></path></g></svg>
                                                                </span>
                                                                    <span class="px-1 inline-block ficon-text font-normal">@if(count($post->tweetfav) >0) {{count($post->tweetfav)}} @endif </span>
                                                                </div>
                                                            </a>
                                                        </div>

                                                        <div class="inline-block w-full">
                                                            <a href="javascript:" onclick="mention_form('{{route('get_tweet',$post->tweet->id)}}')">
                                                                <div class="inline-flex ficon-wrapper send text-gray-600">
                                                            <span class="ficon send rounded-full">
                                                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z" />
                                                                    </svg>
                                                            </span>
                                                                    <!-- <span class="px-1 inline-block ficon-text font-normal"> 3 </span> -->
                                                                </div>
                                                            </a>

                                                        </div>


                                                    </div>
                                                </div>
                                                <!-- tweet footer end -->

                                            @elseif($post->retweet)
                                                <div class="tweet-info-bar flex items-center ">
                                                    <!-- twet username start -->
                                                    <span class="tweet-username relative block">
                                                    <a href="{{route('profile',$post->user->id)}}" class="hover:underline text-gray-900 font-bold text-base mr-1">{{$post->user->name}}</a>
                                                    <span class="w-4 inline-block twitter-color verified">
                                                        <svg viewBox="0 0 24 24" aria-label="Verified account" class="r-13gxpu9 r-4qtqp9 r-yyyyoo r-1xvli5t r-9cviqr r-dnmrzs r-bnwqim r-1plcrui r-lrvibr"><g><path d="M22.5 12.5c0-1.58-.875-2.95-2.148-3.6.154-.435.238-.905.238-1.4 0-2.21-1.71-3.998-3.818-3.998-.47 0-.92.084-1.336.25C14.818 2.415 13.51 1.5 12 1.5s-2.816.917-3.437 2.25c-.415-.165-.866-.25-1.336-.25-2.11 0-3.818 1.79-3.818 4 0 .494.083.964.237 1.4-1.272.65-2.147 2.018-2.147 3.6 0 1.495.782 2.798 1.942 3.486-.02.17-.032.34-.032.514 0 2.21 1.708 4 3.818 4 .47 0 .92-.086 1.335-.25.62 1.334 1.926 2.25 3.437 2.25 1.512 0 2.818-.916 3.437-2.25.415.163.865.248 1.336.248 2.11 0 3.818-1.79 3.818-4 0-.174-.012-.344-.033-.513 1.158-.687 1.943-1.99 1.943-3.484zm-6.616-3.334l-4.334 6.5c-.145.217-.382.334-.625.334-.143 0-.288-.04-.416-.126l-.115-.094-2.415-2.415c-.293-.293-.293-.768 0-1.06s.768-.294 1.06 0l1.77 1.767 3.825-5.74c.23-.345.696-.436 1.04-.207.346.23.44.696.21 1.04z"></path></g></svg>
                                                    </span>

                                                </span>
                                                    <!-- twet username end -->

                                                    {{-- <span class="text-gray-600 text-base font-light tracking-wide inline-block ml-1">@shellywalia</span>
                                                     <span class="inline-block ml-1">??</span>--}}
                                                    <span class="text-gray-600 text-base font-light tracking-wide inline-block ml-1">{{date("d-m-Y H:m", strtotime($post->retweet->created_at))  }}</span>
                                                    <span class="ficon retweet rounded-full">
                                            <svg viewBox="0 0 24 24" class="r-4qtqp9 r-yyyyoo r-1xvli5t r-dnmrzs r-bnwqim r-1plcrui r-lrvibr r-1hdv0qi"><g><path d="M23.77 15.67c-.292-.293-.767-.293-1.06 0l-2.22 2.22V7.65c0-2.068-1.683-3.75-3.75-3.75h-5.85c-.414 0-.75.336-.75.75s.336.75.75.75h5.85c1.24 0 2.25 1.01 2.25 2.25v10.24l-2.22-2.22c-.293-.293-.768-.293-1.06 0s-.294.768 0 1.06l3.5 3.5c.145.147.337.22.53.22s.383-.072.53-.22l3.5-3.5c.294-.292.294-.767 0-1.06zm-10.66 3.28H7.26c-1.24 0-2.25-1.01-2.25-2.25V6.46l2.22 2.22c.148.147.34.22.532.22s.384-.073.53-.22c.293-.293.293-.768 0-1.06l-3.5-3.5c-.293-.294-.768-.294-1.06 0l-3.5 3.5c-.294.292-.294.767 0 1.06s.767.293 1.06 0l2.22-2.22V16.7c0 2.068 1.683 3.75 3.75 3.75h5.85c.414 0 .75-.336.75-.75s-.337-.75-.75-.75z"></path></g></svg>
                                        </span>
                                                </div>
                                                <!-- tweet info bar end -->
                                                <!-- tweet detail start -->
                                                <div class="tweet-detail retweet-detail">
                                                    <div class="tweet-info-bar flex items-center ">
                                                        <!-- twet username start -->
                                                        <span class="tweet-username relative block">
                                                    <a href="{{route('profile',$post->retweet->get_tweet->get_user->user->id)}}" class="hover:underline text-gray-900 font-bold text-base mr-1">{{$post->retweet->get_tweet->get_user->user->name}}</a>
                                                    <span class="w-4 inline-block twitter-color verified">
                                                        <svg viewBox="0 0 24 24" aria-label="Verified account" class="r-13gxpu9 r-4qtqp9 r-yyyyoo r-1xvli5t r-9cviqr r-dnmrzs r-bnwqim r-1plcrui r-lrvibr"><g><path d="M22.5 12.5c0-1.58-.875-2.95-2.148-3.6.154-.435.238-.905.238-1.4 0-2.21-1.71-3.998-3.818-3.998-.47 0-.92.084-1.336.25C14.818 2.415 13.51 1.5 12 1.5s-2.816.917-3.437 2.25c-.415-.165-.866-.25-1.336-.25-2.11 0-3.818 1.79-3.818 4 0 .494.083.964.237 1.4-1.272.65-2.147 2.018-2.147 3.6 0 1.495.782 2.798 1.942 3.486-.02.17-.032.34-.032.514 0 2.21 1.708 4 3.818 4 .47 0 .92-.086 1.335-.25.62 1.334 1.926 2.25 3.437 2.25 1.512 0 2.818-.916 3.437-2.25.415.163.865.248 1.336.248 2.11 0 3.818-1.79 3.818-4 0-.174-.012-.344-.033-.513 1.158-.687 1.943-1.99 1.943-3.484zm-6.616-3.334l-4.334 6.5c-.145.217-.382.334-.625.334-.143 0-.288-.04-.416-.126l-.115-.094-2.415-2.415c-.293-.293-.293-.768 0-1.06s.768-.294 1.06 0l1.77 1.767 3.825-5.74c.23-.345.696-.436 1.04-.207.346.23.44.696.21 1.04z"></path></g></svg>
                                                    </span>

                                                </span>
                                                        <!-- twet username end -->

                                                        {{-- <span class="text-gray-600 text-base font-light tracking-wide inline-block ml-1">@shellywalia</span>
                                                         <span class="inline-block ml-1">??</span>--}}
                                                        <span class="text-gray-600 text-base font-light tracking-wide inline-block ml-1">{{date("d-m-Y H:m", strtotime($post->retweet->created_at))  }}</span>
                                                    </div>
                                                    <p>
                                                        {{$post->retweet->get_tweet->content}}{{-- <a class="font-semibold" href="##MondayMotivation">#MondayMotivation</a>--}}
                                                    </p>
                                                </div>
                                                <!-- tweet detail end -->

                                                <!-- tweet footer start -->
                                                <div class="tweet-footer">
                                                    <div class="inner flex">

                                                        <div class="inline-block w-full">
                                                            <div class="inline-flex ficon-wrapper comment text-gray-600">
                                                            <span class="ficon comment rounded-full">
                                                                <svg viewBox="0 0 24 24" class="r-4qtqp9 r-yyyyoo r-1xvli5t r-dnmrzs r-bnwqim r-1plcrui r-lrvibr r-1hdv0qi"><g><path d="M14.046 2.242l-4.148-.01h-.002c-4.374 0-7.8 3.427-7.8 7.802 0 4.098 3.186 7.206 7.465 7.37v3.828c0 .108.044.286.12.403.142.225.384.347.632.347.138 0 .277-.038.402-.118.264-.168 6.473-4.14 8.088-5.506 1.902-1.61 3.04-3.97 3.043-6.312v-.017c-.006-4.367-3.43-7.787-7.8-7.788zm3.787 12.972c-1.134.96-4.862 3.405-6.772 4.643V16.67c0-.414-.335-.75-.75-.75h-.396c-3.66 0-6.318-2.476-6.318-5.886 0-3.534 2.768-6.302 6.3-6.302l4.147.01h.002c3.532 0 6.3 2.766 6.302 6.296-.003 1.91-.942 3.844-2.514 5.176z"></path></g></svg>
                                                            </span>
                                                                <span class="px-1 inline-block ficon-text font-normal"> 29 </span>
                                                            </div>
                                                        </div>

                                                        <div class="inline-block w-full">
                                                            @if($post->user->id != auth()->id())
                                                                <a href="{{route('retweet',$post->retweet->get_tweet->id)}}">
                                                                    <div class="inline-flex ficon-wrapper retweet text-gray-600">
                                                                <span class="ficon retweet rounded-full">
                                                                    <svg viewBox="0 0 24 24" class="r-4qtqp9 r-yyyyoo r-1xvli5t r-dnmrzs r-bnwqim r-1plcrui r-lrvibr r-1hdv0qi"><g><path d="M23.77 15.67c-.292-.293-.767-.293-1.06 0l-2.22 2.22V7.65c0-2.068-1.683-3.75-3.75-3.75h-5.85c-.414 0-.75.336-.75.75s.336.75.75.75h5.85c1.24 0 2.25 1.01 2.25 2.25v10.24l-2.22-2.22c-.293-.293-.768-.293-1.06 0s-.294.768 0 1.06l3.5 3.5c.145.147.337.22.53.22s.383-.072.53-.22l3.5-3.5c.294-.292.294-.767 0-1.06zm-10.66 3.28H7.26c-1.24 0-2.25-1.01-2.25-2.25V6.46l2.22 2.22c.148.147.34.22.532.22s.384-.073.53-.22c.293-.293.293-.768 0-1.06l-3.5-3.5c-.293-.294-.768-.294-1.06 0l-3.5 3.5c-.294.292-.294.767 0 1.06s.767.293 1.06 0l2.22-2.22V16.7c0 2.068 1.683 3.75 3.75 3.75h5.85c.414 0 .75-.336.75-.75s-.337-.75-.75-.75z"></path></g></svg>
                                                                </span>
                                                                        <span class="px-1 inline-block ficon-text font-normal"> @if(count($post->retweet->get_tweet->retweet_users) >0) {{count($post->retweet->get_tweet->retweet_users)}} @endif </span>
                                                                    </div>
                                                                </a>
                                                            @else
                                                                <a href="{{route('unretweet',$post->retweet->id)}}">
                                                                    <div class="inline-flex ficon-wrapper retweet text-gray-600 retweet_active">
                                                                <span class="ficon retweet rounded-full">
                                                                    <svg viewBox="0 0 24 24" class="r-4qtqp9 r-yyyyoo r-1xvli5t r-dnmrzs r-bnwqim r-1plcrui r-lrvibr r-1hdv0qi"><g><path d="M23.77 15.67c-.292-.293-.767-.293-1.06 0l-2.22 2.22V7.65c0-2.068-1.683-3.75-3.75-3.75h-5.85c-.414 0-.75.336-.75.75s.336.75.75.75h5.85c1.24 0 2.25 1.01 2.25 2.25v10.24l-2.22-2.22c-.293-.293-.768-.293-1.06 0s-.294.768 0 1.06l3.5 3.5c.145.147.337.22.53.22s.383-.072.53-.22l3.5-3.5c.294-.292.294-.767 0-1.06zm-10.66 3.28H7.26c-1.24 0-2.25-1.01-2.25-2.25V6.46l2.22 2.22c.148.147.34.22.532.22s.384-.073.53-.22c.293-.293.293-.768 0-1.06l-3.5-3.5c-.293-.294-.768-.294-1.06 0l-3.5 3.5c-.294.292-.294.767 0 1.06s.767.293 1.06 0l2.22-2.22V16.7c0 2.068 1.683 3.75 3.75 3.75h5.85c.414 0 .75-.336.75-.75s-.337-.75-.75-.75z"></path></g></svg>
                                                                </span>
                                                                        <span class="px-1 inline-block ficon-text font-normal"> @if(count($post->retweet->get_tweet->retweet_users) >0) {{count($post->retweet->get_tweet->retweet_users)}} @endif </span>
                                                                    </div>
                                                                </a>
                                                            @endif
                                                        </div>

                                                        <div class="inline-block w-full">
                                                            <a href="{{route('fav_tweet',$post->retweet->get_tweet->post_id)}}">
                                                                <div class="inline-flex ficon-wrapper like text-gray-600">
                                                                <span class="ficon like rounded-full">
                                                                    <svg viewBox="0 0 24 24" class="r-4qtqp9 r-yyyyoo r-1xvli5t r-dnmrzs r-bnwqim r-1plcrui r-lrvibr r-1hdv0qi"><g><path d="M12 21.638h-.014C9.403 21.59 1.95 14.856 1.95 8.478c0-3.064 2.525-5.754 5.403-5.754 2.29 0 3.83 1.58 4.646 2.73.814-1.148 2.354-2.73 4.645-2.73 2.88 0 5.404 2.69 5.404 5.755 0 6.376-7.454 13.11-10.037 13.157H12zM7.354 4.225c-2.08 0-3.903 1.988-3.903 4.255 0 5.74 7.034 11.596 8.55 11.658 1.518-.062 8.55-5.917 8.55-11.658 0-2.267-1.823-4.255-3.903-4.255-2.528 0-3.94 2.936-3.952 2.965-.23.562-1.156.562-1.387 0-.014-.03-1.425-2.965-3.954-2.965z"></path></g></svg>
                                                                </span>
                                                                    <span class="px-1 inline-block ficon-text font-normal">@if(count($post->retweet->get_tweet->tweetfav) >0) {{count($post->retweet->get_tweet->tweetfav)}} @endif </span>
                                                                </div>
                                                            </a>
                                                        </div>

                                                        <div class="inline-block w-full">
                                                            <a href="javascript:" onclick="mention_form('{{route('get_tweet',$post->retweet->get_tweet->id)}}')">
                                                                <div class="inline-flex ficon-wrapper send text-gray-600">
                                                            <span class="ficon send rounded-full">
                                                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z" />
                                                                    </svg>
                                                            </span>
                                                                    <!-- <span class="px-1 inline-block ficon-text font-normal"> 3 </span> -->
                                                                </div>
                                                            </a>
                                                        </div>


                                                    </div>
                                                </div>
                                                <!-- tweet footer end -->
                                            @elseif($post->mentions)

                                                <div class="tweet-info-bar flex items-center ">
                                                    <!-- twet username start -->
                                                    <span class="tweet-username relative block">
                                                    <a href="{{route('profile',$post->user->id)}}" class="hover:underline text-gray-900 font-bold text-base mr-1">{{$post->user->name}}</a>
                                                    <span class="w-4 inline-block twitter-color verified">
                                                        <svg viewBox="0 0 24 24" aria-label="Verified account" class="r-13gxpu9 r-4qtqp9 r-yyyyoo r-1xvli5t r-9cviqr r-dnmrzs r-bnwqim r-1plcrui r-lrvibr"><g><path d="M22.5 12.5c0-1.58-.875-2.95-2.148-3.6.154-.435.238-.905.238-1.4 0-2.21-1.71-3.998-3.818-3.998-.47 0-.92.084-1.336.25C14.818 2.415 13.51 1.5 12 1.5s-2.816.917-3.437 2.25c-.415-.165-.866-.25-1.336-.25-2.11 0-3.818 1.79-3.818 4 0 .494.083.964.237 1.4-1.272.65-2.147 2.018-2.147 3.6 0 1.495.782 2.798 1.942 3.486-.02.17-.032.34-.032.514 0 2.21 1.708 4 3.818 4 .47 0 .92-.086 1.335-.25.62 1.334 1.926 2.25 3.437 2.25 1.512 0 2.818-.916 3.437-2.25.415.163.865.248 1.336.248 2.11 0 3.818-1.79 3.818-4 0-.174-.012-.344-.033-.513 1.158-.687 1.943-1.99 1.943-3.484zm-6.616-3.334l-4.334 6.5c-.145.217-.382.334-.625.334-.143 0-.288-.04-.416-.126l-.115-.094-2.415-2.415c-.293-.293-.293-.768 0-1.06s.768-.294 1.06 0l1.77 1.767 3.825-5.74c.23-.345.696-.436 1.04-.207.346.23.44.696.21 1.04z"></path></g></svg>
                                                    </span>

                                                </span>
                                                    <span class="text-gray-600 text-base font-light tracking-wide inline-block ml-1">{{date("d-m-Y H:m", strtotime($post->mentions->created_at))  }}</span>
                                                    <span class="ficon send rounded-full">
                                                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z" />
                                                                    </svg>
                                                            </span>
                                                </div>



                                                <div class="tweet-detail retweet-detail">
                                                    <p>
                                                        {{$post->mentions->mention_content}}
                                                    </p>
                                                    <div class="tweet-info-bar flex items-center ">
                                                        <!-- twet username start -->
                                                        <span class="tweet-username relative block">
                                                    <a href="{{route('profile',$post->mentions->get_tweet->get_user->user->id)}}" class="hover:underline text-gray-900 font-bold text-base mr-1">{{$post->mentions->get_tweet->get_user->user->name}}</a>
                                                    <span class="w-4 inline-block twitter-color verified">
                                                        <svg viewBox="0 0 24 24" aria-label="Verified account" class="r-13gxpu9 r-4qtqp9 r-yyyyoo r-1xvli5t r-9cviqr r-dnmrzs r-bnwqim r-1plcrui r-lrvibr"><g><path d="M22.5 12.5c0-1.58-.875-2.95-2.148-3.6.154-.435.238-.905.238-1.4 0-2.21-1.71-3.998-3.818-3.998-.47 0-.92.084-1.336.25C14.818 2.415 13.51 1.5 12 1.5s-2.816.917-3.437 2.25c-.415-.165-.866-.25-1.336-.25-2.11 0-3.818 1.79-3.818 4 0 .494.083.964.237 1.4-1.272.65-2.147 2.018-2.147 3.6 0 1.495.782 2.798 1.942 3.486-.02.17-.032.34-.032.514 0 2.21 1.708 4 3.818 4 .47 0 .92-.086 1.335-.25.62 1.334 1.926 2.25 3.437 2.25 1.512 0 2.818-.916 3.437-2.25.415.163.865.248 1.336.248 2.11 0 3.818-1.79 3.818-4 0-.174-.012-.344-.033-.513 1.158-.687 1.943-1.99 1.943-3.484zm-6.616-3.334l-4.334 6.5c-.145.217-.382.334-.625.334-.143 0-.288-.04-.416-.126l-.115-.094-2.415-2.415c-.293-.293-.293-.768 0-1.06s.768-.294 1.06 0l1.77 1.767 3.825-5.74c.23-.345.696-.436 1.04-.207.346.23.44.696.21 1.04z"></path></g></svg>
                                                    </span>

                                                </span>
                                                        <!-- twet username end -->

                                                        {{-- <span class="text-gray-600 text-base font-light tracking-wide inline-block ml-1">@shellywalia</span>
                                                         <span class="inline-block ml-1">??</span>--}}
                                                        <span class="text-gray-600 text-base font-light tracking-wide inline-block ml-1">{{date("d-m-Y H:m", strtotime($post->mentions->created_at))  }}</span>
                                                    </div>
                                                    <p>
                                                        {{$post->mentions->get_tweet->content}}{{-- <a class="font-semibold" href="##MondayMotivation">#MondayMotivation</a>--}}
                                                    </p>
                                                </div>

                                                <div class="tweet-footer">
                                                    <div class="inner flex">

                                                        <div class="inline-block w-full">
                                                            <div class="inline-flex ficon-wrapper comment text-gray-600">
                                                            <span class="ficon comment rounded-full">
                                                                <svg viewBox="0 0 24 24" class="r-4qtqp9 r-yyyyoo r-1xvli5t r-dnmrzs r-bnwqim r-1plcrui r-lrvibr r-1hdv0qi"><g><path d="M14.046 2.242l-4.148-.01h-.002c-4.374 0-7.8 3.427-7.8 7.802 0 4.098 3.186 7.206 7.465 7.37v3.828c0 .108.044.286.12.403.142.225.384.347.632.347.138 0 .277-.038.402-.118.264-.168 6.473-4.14 8.088-5.506 1.902-1.61 3.04-3.97 3.043-6.312v-.017c-.006-4.367-3.43-7.787-7.8-7.788zm3.787 12.972c-1.134.96-4.862 3.405-6.772 4.643V16.67c0-.414-.335-.75-.75-.75h-.396c-3.66 0-6.318-2.476-6.318-5.886 0-3.534 2.768-6.302 6.3-6.302l4.147.01h.002c3.532 0 6.3 2.766 6.302 6.296-.003 1.91-.942 3.844-2.514 5.176z"></path></g></svg>
                                                            </span>
                                                                <span class="px-1 inline-block ficon-text font-normal"> 29 </span>
                                                            </div>
                                                        </div>

                                                        <div class="inline-block w-full">
                                                            @if(check_retweet_user($post->mentions->get_tweet->retweet_users))
                                                                <a href="{{route('unretweet',check_retweet_user($post->mentions->get_tweet->retweet_users)['retweet_id'])}}">
                                                                    <div class="inline-flex ficon-wrapper retweet text-gray-600 retweet_active">
                                                                <span class="ficon retweet rounded-full">
                                                                    <svg viewBox="0 0 24 24" class="r-4qtqp9 r-yyyyoo r-1xvli5t r-dnmrzs r-bnwqim r-1plcrui r-lrvibr r-1hdv0qi"><g><path d="M23.77 15.67c-.292-.293-.767-.293-1.06 0l-2.22 2.22V7.65c0-2.068-1.683-3.75-3.75-3.75h-5.85c-.414 0-.75.336-.75.75s.336.75.75.75h5.85c1.24 0 2.25 1.01 2.25 2.25v10.24l-2.22-2.22c-.293-.293-.768-.293-1.06 0s-.294.768 0 1.06l3.5 3.5c.145.147.337.22.53.22s.383-.072.53-.22l3.5-3.5c.294-.292.294-.767 0-1.06zm-10.66 3.28H7.26c-1.24 0-2.25-1.01-2.25-2.25V6.46l2.22 2.22c.148.147.34.22.532.22s.384-.073.53-.22c.293-.293.293-.768 0-1.06l-3.5-3.5c-.293-.294-.768-.294-1.06 0l-3.5 3.5c-.294.292-.294.767 0 1.06s.767.293 1.06 0l2.22-2.22V16.7c0 2.068 1.683 3.75 3.75 3.75h5.85c.414 0 .75-.336.75-.75s-.337-.75-.75-.75z"></path></g></svg>
                                                                </span>
                                                                        <span class="px-1 inline-block ficon-text font-normal"> @if(count($post->mentions->get_tweet->retweet_users) >0) {{count($post->mentions->get_tweet->retweet_users)}} @endif </span>
                                                                    </div>
                                                                </a>
                                                            @else
                                                                <a href="{{route('retweet',$post->mentions->get_tweet->id)}}">
                                                                    <div class="inline-flex ficon-wrapper retweet text-gray-600">
                                                                <span class="ficon retweet rounded-full">
                                                                    <svg viewBox="0 0 24 24" class="r-4qtqp9 r-yyyyoo r-1xvli5t r-dnmrzs r-bnwqim r-1plcrui r-lrvibr r-1hdv0qi"><g><path d="M23.77 15.67c-.292-.293-.767-.293-1.06 0l-2.22 2.22V7.65c0-2.068-1.683-3.75-3.75-3.75h-5.85c-.414 0-.75.336-.75.75s.336.75.75.75h5.85c1.24 0 2.25 1.01 2.25 2.25v10.24l-2.22-2.22c-.293-.293-.768-.293-1.06 0s-.294.768 0 1.06l3.5 3.5c.145.147.337.22.53.22s.383-.072.53-.22l3.5-3.5c.294-.292.294-.767 0-1.06zm-10.66 3.28H7.26c-1.24 0-2.25-1.01-2.25-2.25V6.46l2.22 2.22c.148.147.34.22.532.22s.384-.073.53-.22c.293-.293.293-.768 0-1.06l-3.5-3.5c-.293-.294-.768-.294-1.06 0l-3.5 3.5c-.294.292-.294.767 0 1.06s.767.293 1.06 0l2.22-2.22V16.7c0 2.068 1.683 3.75 3.75 3.75h5.85c.414 0 .75-.336.75-.75s-.337-.75-.75-.75z"></path></g></svg>
                                                                </span>
                                                                        <span class="px-1 inline-block ficon-text font-normal"> @if(count($post->mentions->get_tweet->retweet_users) >0) {{count($post->mentions->get_tweet->retweet_users)}} @endif </span>
                                                                    </div>
                                                                </a>
                                                            @endif
                                                        </div>

                                                        <div class="inline-block w-full">
                                                            <a href="{{route('fav_tweet',$post->mentions->get_tweet->post_id)}}">
                                                                <div class="inline-flex ficon-wrapper like text-gray-600">
                                                                <span class="ficon like rounded-full">
                                                                    <svg viewBox="0 0 24 24" class="r-4qtqp9 r-yyyyoo r-1xvli5t r-dnmrzs r-bnwqim r-1plcrui r-lrvibr r-1hdv0qi"><g><path d="M12 21.638h-.014C9.403 21.59 1.95 14.856 1.95 8.478c0-3.064 2.525-5.754 5.403-5.754 2.29 0 3.83 1.58 4.646 2.73.814-1.148 2.354-2.73 4.645-2.73 2.88 0 5.404 2.69 5.404 5.755 0 6.376-7.454 13.11-10.037 13.157H12zM7.354 4.225c-2.08 0-3.903 1.988-3.903 4.255 0 5.74 7.034 11.596 8.55 11.658 1.518-.062 8.55-5.917 8.55-11.658 0-2.267-1.823-4.255-3.903-4.255-2.528 0-3.94 2.936-3.952 2.965-.23.562-1.156.562-1.387 0-.014-.03-1.425-2.965-3.954-2.965z"></path></g></svg>
                                                                </span>
                                                                    <span class="px-1 inline-block ficon-text font-normal">@if(count($post->mentions->get_tweet->tweetfav) >0) {{count($post->mentions->get_tweet->tweetfav)}} @endif </span>
                                                                </div>
                                                            </a>
                                                        </div>

                                                        <div class="inline-block w-full">
                                                            <a href="javascript:" onclick="mention_form('{{route('get_tweet',$post->mentions->get_tweet->id)}}')">
                                                                <div class="inline-flex ficon-wrapper send text-gray-600">
                                                            <span class="ficon send rounded-full">
                                                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z" />
                                                                    </svg>
                                                            </span>
                                                                    <!-- <span class="px-1 inline-block ficon-text font-normal"> 3 </span> -->
                                                                </div>
                                                            </a>
                                                        </div>


                                                    </div>
                                                </div>
                                            @endif

                                        </div>
                                        <!-- tweet tweet end -->
                                    </div>
                                </div>
                            </div>
                            <!-- tweet end -->
                        @endforeach

                    </div>
                </div>
                <!-- tweets wrapper end -->



            </div>
            <!-- middle colulmn end -->

            @include('inc/rightbar')


        </div>

    </div>
    <!-- container end -->


</div>
<!-- wrapper end-->
<div class="modal fade mentions_form" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">

                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{route('create_mention')}}" method="post" style="width: 100%">
                    @csrf
                    <div class="w-full">
                        <div class="textarea px-2 mt-4">
                            <input type="hidden" name="tweet_id" id="mention_tweet_id">
                            <textarea maxlength="280" name="mention_content" class="w-full h-10 focus:outline-none" placeholder="What's happening?" rows="2"></textarea>
                        </div>
                    </div>
                    <div class="tweet-info-bar flex items-center ">
                        <!-- twet username start -->
                        <span class="tweet-username relative block">
                                                    <a href="" class="hover:underline text-gray-900 font-bold text-base mr-1 tweet_user_name "> Bilal YILDIRIM</a>
                                                    <span class="w-4 inline-block twitter-color verified">
                                                        <svg viewBox="0 0 24 24" aria-label="Verified account" class="r-13gxpu9 r-4qtqp9 r-yyyyoo r-1xvli5t r-9cviqr r-dnmrzs r-bnwqim r-1plcrui r-lrvibr"><g><path d="M22.5 12.5c0-1.58-.875-2.95-2.148-3.6.154-.435.238-.905.238-1.4 0-2.21-1.71-3.998-3.818-3.998-.47 0-.92.084-1.336.25C14.818 2.415 13.51 1.5 12 1.5s-2.816.917-3.437 2.25c-.415-.165-.866-.25-1.336-.25-2.11 0-3.818 1.79-3.818 4 0 .494.083.964.237 1.4-1.272.65-2.147 2.018-2.147 3.6 0 1.495.782 2.798 1.942 3.486-.02.17-.032.34-.032.514 0 2.21 1.708 4 3.818 4 .47 0 .92-.086 1.335-.25.62 1.334 1.926 2.25 3.437 2.25 1.512 0 2.818-.916 3.437-2.25.415.163.865.248 1.336.248 2.11 0 3.818-1.79 3.818-4 0-.174-.012-.344-.033-.513 1.158-.687 1.943-1.99 1.943-3.484zm-6.616-3.334l-4.334 6.5c-.145.217-.382.334-.625.334-.143 0-.288-.04-.416-.126l-.115-.094-2.415-2.415c-.293-.293-.293-.768 0-1.06s.768-.294 1.06 0l1.77 1.767 3.825-5.74c.23-.345.696-.436 1.04-.207.346.23.44.696.21 1.04z"></path></g></svg>
                                                    </span>

                                                </span>
                        <!-- twet username end -->

                    </div>
                    <!-- tweet info bar end -->
                    <!-- tweet detail start -->
                    <div class="tweet-detail">
                        <p class="tweet_content">
                            Test
                        </p>
                    </div>
                    <!-- tweet detail end -->




                    <div class="modal-footer">
                        <button type="submit" class="btn btn-secondary" data-dismiss="modal">??ptal</button>
                        <button  class="btn btn-primary">Tweetle</button>
                    </div>
                </form>




            </div>

        </div>
    </div>
</div>
<script src="{{asset('assets/js/lib/jquery.min.js')}}"></script>
<script src="{{asset('assets/bootstrap/js/bootstrap.min.js')}}"></script>
<script src="{{asset('assets/js/lib/jquery.sticky.js')}}"></script>
<script src="{{asset('assets/js/script.js')}}"></script>
<script>
    function mention_form(url){
        $.ajax({
            url :url,
            success(result){
                console.log(result.content);
                $('.tweet_content').text(result.content);
                $('.tweet_user_name').text(result.get_user.user.name);
                $('#mention_tweet_id').val(result.id);

            }
        });
        $('.mentions_form').modal('show');
    }
</script>

</body>

</html>
