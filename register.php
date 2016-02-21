<?php session_start(); ?>
<html>
<head>
   <title>Register - eQuiz</title>
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
      <h1 align="center">Register</h1>
      <ul class="nav nav-tabs">
        <li role="presentation" <?php if(!isset($_GET['type']) || $_GET['type'] != "teacher") { echo 'class="active"'; }?>><a href="?type=student">Student</a></li>
        <li role="presentation" <?php if(isset($_GET['type']) && $_GET['type'] == "teacher") { echo 'class="active"'; }?>><a href="?type=teacher">Teacher</a></li>
      </ul>
      <?php if (isset($_GET['error'])) {
        echo '
      <div class="alert alert-danger alert-dismissible" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <strong>Error!</strong> Please enter your email address, password and name.
      </div>
      '; } else if (isset($_GET['emailerror'])) {
        echo '
      <div class="alert alert-danger alert-dismissible" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <strong>Error!</strong> That email address is already in use. Please use a different one.
      </div>
      '; } ?>
      <br>
      <form action="methods/register.php" method="POST">
        <input type="text" class="form-control" name="name" placeholder="Full Name">
        <input type="hidden" class="form-control" name="type" value="<?php if (isset($_GET['type']) && $_GET['type'] == "teacher") {
          echo "teacher"; } else { echo "student"; }?>">
        <br>
        <input type="email" class="form-control" name="email" placeholder="Email address">
        <br>
        <input type="password" class="form-control" name="password" placeholder="Password">
        <br>
        <input type="submit" class="form-control btn btn-default" value="Sign up">
      </form>
    </div>
    <div class="col-md-4"></div>
    </div>

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
   <script src="sweetalert-master/dist/sweetalert-dev.js"></script> 
</body>
</html>