<!DOCTYPE html>
<html lang="en">
<head>
  <title>Baby Blog</title>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- CSS -->
  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
  <link href='http://fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>
  <link rel="stylesheet" href="style.css">
  <style>
    body {
    background: url('http://i.imgur.com/Eor57Ae.jpg') no-repeat fixed center center;
    background-size: cover;
    font-family: Montserrat;
    }
  </style>
</head>
<body>
          <h1 style="color:white; margin-left: 525px">Baby Blog</h1>
          <div class="login-block">
            <FORM role="form" method="post" action="doLogin.php" >
              <INPUT TYPE="hidden" NAME="id" value="<?php echo $id?>">  
                <h1>Login</h1>
                <input type="text" value="" placeholder="Username" id="username" name="username" />
                <input type="password" value="" placeholder="Password" id="password" name="password" />
                <button>submit</button>
            </FORM>
          </div>
    </body>
    </html>