<?php session_start(); ?>
<html>
<head>
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
   <?php
   if (isset($_SESSION['name']) && $_SESSION['name'] != null) {
      $name = $_SESSION['name'];
   } else {
      $name = "nobody";
   } 

   if (isset($_SESSION['id']) && $_SESSION['id'] != null) {
      $id = $_SESSION['id'];
   }?>
    <?php if (isset($_SESSION['type']) && $_SESSION['type'] == "student") { header("Location: ../?studenterror"); return; }?>
     <?php if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] == null) { header("Location: ../?loginerror"); return; }?>
   <title>My Classes - eQuiz</title>
   <link href="css/bootstrap.min.css" rel="stylesheet">
   <link rel="stylesheet" href="sweetalert-master/dist/sweetalert.css">
</head>
<body>
   <div id="navigationbar">
      <nav class="navbar navbar-default">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="/">eQuiz</a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
        <li><a href="/">Home</a></li>
        <li class="active"><a href="/myclasses">My Classes</a></li>
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

  <div align="center"><h1>My Classes</h1><a href="/newclass"><button class="btn btn-primary">Add Class</button></a></div><br>

  <div class="col-md-3"></div>
  <div class="col-md-6">
  <table style="text-align: center;" class="table table-striped table-hover table-bordered table-responsive">
  <?php

  include("methods/mysql.php");

  $query = mysql_query("SELECT * FROM `classes` WHERE `owner` = '$id'");

  while($row = mysql_fetch_array($query)) {
    echo "<tr><td><a href=\"class?c=" . $row['id'] . "\">" . $row['class'] . "</a></td></tr>";
  }

  ?>
  </table>
  </div>
  <div class="col-md-3"></div>

   <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
   <script src="js/bootstrap.min.js"></script>
   <script src="sweetalert-master/dist/sweetalert-dev.js"></script> 
  <?php if(isset($_GET['success'])) {
    echo "<script>$( document ).ready(function() {
    console.log( \"ready!\" );
    swal(\"Class created\", \"The class was successfully created.\", \"success\");
});</script>";
  }
  ?>
</body>
</html>