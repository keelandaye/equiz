<?php session_start(); ?>
<html>
<head>
   <title>Login - eQuiz</title>
   <link href="css/bootstrap.min.css" rel="stylesheet">
   <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
</head>
<body>
    <div id="navigationbar">
      <nav class="navbar navbar-default">
        <div class="container-fluid">
          <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
              <span class="sr-only">Toggle navigation</span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="/">eQuiz</a>
          </div>

         <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
           <ul class="nav navbar-nav">
              <li><a href="/">Home</a></li>
            </ul>
         </div><!-- /.navbar-collapse -->
        </div><!-- /.container-fluid -->
      </nav>
    </div>

    <div class="container" style="margin-top: 50px;">
    <div class="col-md-4"></div>
    <div id="loginform" class="col-md-4">
      <h1 align="center">Login</h1>
      <?php if (isset($_GET['error'])) {
        echo '
      <div class="alert alert-danger alert-dismissible" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <strong>Error!</strong> Please enter your email address and password.
      </div>
      '; } else if (isset($_GET['passworderror'])) {
        echo '
      <div class="alert alert-danger alert-dismissible" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <strong>Error!</strong> Incorrect email/passsword.
      </div>
      '; } ?>
      <br>
      <form action="methods/login.php" method="POST">
        <input type="email" class="form-control" name="email" placeholder="Email address">
        <br>
        <input type="password" class="form-control" name="password" placeholder="Password">
        <br>
        <input type="submit" class="form-control btn btn-default" value="Log in">
      </form>
    </div>
    <div class="col-md-4"></div>
    </div>

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
   <script src="sweetalert-master/dist/sweetalert-dev.js"></script> 
</body>
</html>