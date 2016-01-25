<?php

showTweets("GeekyTheory",5);
                    
function getJsonTweets($query,$num_tweets){
        ini_set('display_errors', 1);
        require_once('TwitterAPIExchange.php');
 
        /** Set access tokens here - see: https://dev.twitter.com/apps/ **/
        $settings = array(
            'oauth_access_token' => "393499833-zI2PEXL3RAiW4lFjvwzvxvNlxhf51jp5vZlmkfEQ",
            'oauth_access_token_secret' => "yMTfG5C1KC2w7eIzf6uJXIrgwaisbHgvAZqEm1w0IYTD3",
            'consumer_key' => "lqoSEkKOUuJllQ86N2M6HKPlw",
            'consumer_secret' => "gL8iSowsZJq9DEMU3oP3rmsJWEeROBIFBjwgdD3nJXPaBakl8U"
        );
        
        if($num_tweets>100) $num_tweets = 100;
       
        $url = 'https://api.twitter.com/1.1/search/tweets.json';
        $getfield = '?q='.$query.'&count='.$num_tweets;
 
        $requestMethod = 'GET';
        $twitter = new TwitterAPIExchange($settings);
        $json =  $twitter->setGetfield($getfield)
                     ->buildOauth($url, $requestMethod)
                     ->performRequest();
        return $json;
}

