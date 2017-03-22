<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Hard to Find Exam</title>
        <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
        <script src="https://cdn.plot.ly/plotly-latest.min.js"></script>
    </head>
    <body>

<div class="container">

  <form class="form-signin">
      <h2 class="form-signin-heading">Please Enter Twitter Username</h2>
      <label for="username" class="sr-only">Username</label>
      <input type="username" id="username" class="form-control" placeholder="Username" required autofocus>
      <div>&nbsp;</div>
      <button class="btn btn-lg btn-primary btn-block" type="button" id="submitUsername">Submit</button>

      <div id="myDiv"></div>

  </form>

</div>
<script
  src="https://code.jquery.com/jquery-3.2.1.min.js"
  integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4="
  crossorigin="anonymous"></script>
<script type="text/javascript">

    $(document).ready(function(){

        $('#submitUsername').click(function(){

            $.post('get-tweets.php', {'username' :   $('#username').val()}).then(
              (result) => {
                  if (result.success == 'false') {
                      $('#myDiv').html('');
                      alert(result.errors);
                  } else {

                    var tweetTime=[];

                    for (var index = 0; index < result.data.length; index++) {
                        tweetTime[index] = result.data[index];
                    }

                    var data = [
                        {
                            x: tweetTime,
                            type: 'histogram',
                            marker: {color: 'rgba(0,0,0,0.7)'},
                        }
                    ];
                    Plotly.newPlot('myDiv', data);
                  }
              }
            )
        });
    });
</script>
</body>
</html>
