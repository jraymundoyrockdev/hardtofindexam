<?php

require_once "bootstrap.php";

class CreateTwitterHistogram
{

    public function handle()
    {
      $settings = array(
          'oauth_access_token' => "724428917134630913-dwcK73XpPIwi6hmS5kVC6ID1HCSWYKf",
          'oauth_access_token_secret' => "TWI5XG0JmVB8zyf3hBKb1lYmuW74pwn1KeBmolqmo2Q8Z",
          'consumer_key' => "yzgCtLGl3dDWykRwj7TvX8Ib1",
          'consumer_secret' => "1nciVYpCDB2hKynr89oUeteQRNQCdZQWARIeCRQHgKgvwwxnYP"
      );

        $twitter = new TwitterAPIExchange($settings);

        $url = "https://api.twitter.com/1.1/statuses/user_timeline.json";
        $requestMethod = "GET";
        $getfield = '?screen_name=JeremuelR&count=3';

          try {
            $result = $twitter->setGetfield($getfield)
       ->buildOauth($url, $requestMethod)
       ->performRequest();
          }catch (Exception $e) {
            echo $e->getMessage();
          }


echo '<pre>';
print_r($result);
        echo 'test';
    }

}

(new CreateTwitterHistogram)->handle();
?>

<head>
<!-- Plotly.js -->
        <script src="https://cdn.plot.ly/plotly-latest.min.js"></script>
        </head>
        <body>
        <!-- Plotly chart will be drawn inside this DIV -->
        <div id="myDiv"></div>
        <script>
        var y = [];

    y[1] = "1PM";
    y[19] = "2PM";
    y[20] = "3PM";
    y[22] = "4PM";

y[10] = "5PM";
y[11] = "6PM";
y[12] = "7PM";
y[13] = "7PM";
y[14] = "8PM";
y[15] = "9PM";
y[16] = "10PM";
y[17] = "11PM";

var data = [
  {
    y: y,
    type: 'histogram',
      marker: {
    color: 'rgba(0,0,0,0.7)',
    },
  }
];
Plotly.newPlot('myDiv', data);
        </script>
        </body>
