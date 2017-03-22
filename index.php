<?php

require_once "bootstrap.php";
require_once "UserTweets.php";

(new UserTweets)->getTweetsByUsername('ilove_eiyoj', 5);
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

    y[1] = "17:34:24";
    y[19] = "15:21:10";

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
