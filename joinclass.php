<?php session_start(); ?>
<html>
<head>
  <?php
   if (isset($_SESSION['name']) && $_SESSION['name'] != null) {
      $name = $_SESSION['name'];
   } else {
      $name = "nobody";
   } ?>
    <?php if (isset($_SESSION['type']) && $_SESSION['type'] == "teacher") { header("Location: ../?teachererror"); return; }?>
     <?php if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] == null) { header("Location: ../?loginerror"); return; }?>
   <title>Join Class - eQuiz</title>
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
              <?php if (isset($_SESSION['type']) && $_SESSION['type'] == "teacher") { echo '<li><a href="/myclasses">My Classes</a></li>'; }?>
              <?php if (isset($_SESSION['type']) && $_SESSION['type'] == "student") { echo '<li><a href="/myclass">My Classes</a></li>'; }?>
        <?php if (isset($_SESSION['type']) && $_SESSION['type'] == "teacher") { echo '<li><a href="/myquizzes">My Quizzes</a></li>'; }?>
              <li><a href="#">Public Quizzes</a></li>
            </ul>
            <ul class="nav navbar-nav navbar-right">
              <p class="navbar-text"><?php 
              if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
                echo 'Logged in as <a href="methods/logout" class="navbar-link">' . $name . '</a>';
              } else {
                echo '<a style="padding: 0px;" class="btn btn-info btn-xs" type="button" href="../login">Login</a>   ';
                echo '<a style="padding: 0px;" class="btn btn-info btn-xs" type="button" href="../register">Register</a>';
              }?></p>
            </ul>
         </div><!-- /.navbar-collapse -->
        </div><!-- /.container-fluid -->
      </nav>
    </div>

    <div class="container" style="margin-top: 50px;">
    <div class="col-md-4"></div>
    <div id="loginform" class="col-md-4">
      <h1 align="center">Join Class</h1>
      <?php if (isset($_GET['error'])) {
        echo '
      <div class="alert alert-danger alert-dismissible" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <strong>Error!</strong> Please enter a class password.
      </div>
      '; } else if (isset($_GET['passworderror'])) {
        echo '
      <div class="alert alert-danger alert-dismissible" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <strong>Error!</strong> Invalid password. Ask your teacher for the class password.
      </div>
      '; }?>
      <br>
      <form action="methods/joinclass.php" method="POST">
        <input type="text" class="form-control" name="password" placeholder="Class Password">
        <br>
        <input type="submit" class="form-control btn btn-default" value="Join Class">
      </form>
    </div>
    <div class="col-md-4"></div>
    </div>

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
   <script src="sweetalert-master/dist/sweetalert-dev.js"></script> 
</body>
</html>