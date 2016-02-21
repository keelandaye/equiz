<?php session_start(); ?>
<html>
<head>
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
   <?php 
   if (isset($_SESSION['name']) && $_SESSION['name'] != null) {
      $name = $_SESSION['name'];
   } else {
      $name = "nobody";
   } ?>
   <title>Home - eQuiz</title>
   <link href="css/bootstrap.min.css" rel="stylesheet">
   <link rel="stylesheet" href="sweetalert-master/dist/sweetalert.css">
   
</head>
<body>

  <a name="top" id="top"></a>
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
        <li class="active"><a href="/">Home</a></li>
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

   <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
   <script src="js/bootstrap.min.js"></script>
   <script src="sweetalert-master/dist/sweetalert-dev.js"></script>
   <script>
    $(function (){
  $('a[href*=#]:not([href=#])').click(function() {
    if (location.pathname.replace(/^\//,'') == this.pathname.replace(/^\//,'') && location.hostname == this.hostname) {
      var target = $(this.hash);
      target = target.length ? target : $('[name=' + this.hash.slice(1) +']');
      if (target.length) {
        $('html,body').animate({
          scrollTop: target.offset().top
        }, 10000);
        return false;
      }
    }
  });
});
   </script>
   <div id="warnings">
    <?php

    if(isset($_GET['loginerror'])) {
      echo "<script>$( document ).ready(function() {
    console.log( \"ready!\" );
    swal(\"Login required\", \"You need to be logged in to access this page.\", \"error\");
});</script>";
    } else if(isset($_GET['studenterror'])) {
      echo "<script>$( document ).ready(function() {
    console.log( \"ready!\" );
    swal(\"Teacher required\", \"You need to have a teacher account to access this page.\", \"error\");
});</script>";
    } else if(isset($_GET['teachererror'])) {
      echo "<script>$( document ).ready(function() {
    console.log( \"ready!\" );
    swal(\"Student required\", \"You need to have a student account to access this page.\", \"error\");
});</script>";
    } else if(isset($_GET['survey'])) {
      echo "<script>$( document ).ready(function() {
    console.log( \"ready!\" );
    swal(\"Thank you!\", \"Your survey was submitted successfully.\", \"success\");
});</script>";
    }

    ?>
    <script src="http://code.jquery.com/jquery-1.11.3.min.js"></script>
<script src="js/jquery-momentum-scroll.j"></script>
  <div style="margin: 20px;">
<h1>eQuiz Cookie Policy</h1>
<br>

<h2>What Are Cookies?</h2>


As is common practice with almost all professional websites this site uses cookies, which are tiny files that are downloaded to your computer, to improve your experience. This page describes what information they gather, how we use it and why we sometimes need to store these cookies. We will also share how you can prevent these cookies from being stored however this may downgrade or 'break' certain elements of the sites functionality.

For more general information on cookies see the <a href="https://en.wikipedia.org/wiki/HTTP_cookie">Wikipedia article on HTTP Cookies</a>.

<h2>How We Use Cookies</h2>


We use cookies for a variety of reasons detailed below. Unfortunately is most cases there are no industry standard options for disabling cookies without completely disabling the functionality and features they add to this site. It is recommended that you leave on all cookies if you are not sure whether you need them or not in case they are used to provide a service that you use.

<h2>Disabling Cookies</h2>


You can prevent the setting of cookies by adjusting the settings on your browser (see your browser Help for how to do this). Be aware that disabling cookies will affect the functionality of this and many other websites that you visit. Disabling cookies will usually result in also disabling certain functionality and features of the this site. Therefore it is recommended that you do not disable cookies.

<h2>The Cookies We Set</h2>


If you create an account with us then we will use cookies for the management of the signup process and general administration. These cookies will usually be deleted when you log out however in some cases they may remain afterwards to remember your site preferences when logged out.

We use cookies when you are logged in so that we can remember this fact. This prevents you from having to log in every single time you visit a new page. These cookies are typically removed or cleared when you log out to ensure that you can only access restricted features and areas when logged in.

When you submit data to through a form such as those found on contact pages or comment forms cookies may be set to remember your user details for future correspondence.

<h4>If you have any issues with our policy, please <a href="mailto:keelan.daye@gmail.com?Subject=Cookie%20Policy">contact us</a>.</h4>

  </div>
  <script type="text/javascript">
    window.cookieconsent_options = {"message":"This website uses cookies to ensure you get the best experience on our website","dismiss":"Got it!","learnMore":"More info","link":"/cookies","theme":"dark-bottom"};
  </script>
  <script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/cookieconsent2/1.0.9/cookieconsent.min.js"></script>

  <script src="js/jquery.nicescroll.js"></script>
  <script>$(document).ready(

  function() { 

    $("html").niceScroll();

  }

);</script>
</body>
</html>