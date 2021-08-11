<?php

if(!function_exists('check_retweet_user')){
    function check_retweet_user($array){

        foreach ($array as $item){
            if($item->get_user->user_id == auth()->id()){
                return ['check' => true,'retweet_id'=>$item->id];
            }

        }
    }

}
