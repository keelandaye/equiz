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
    <script>
    $( document ).ready(function() {
      swal({   title: "New updates!",   text: "We've revamped our design and added a new Quiz Quiz feature! Just go into your quiz page and click \"Quick Quiz\"!",   type: "info"});
    })
    </script>
    <script src="http://code.jquery.com/jquery-1.11.3.min.js"></script>
<script src="js/jquery-momentum-scroll.j"></script>
  <div id="shell">
<div class="textbox"><div class="container" align="center">
         <img id="logo" src="img/logo.png" style="margin-top:-70px;" height="150px">
       </div><h2 align="center"><b>The online quiz platform for teachers</b></h2>
       <div align="center">
      <a href="register?type=teacher"><button class="btn btn-primary" style="display: inline-block;">Register as Teacher</button></a>
      <a href="register?type=student"><button class="btn btn-info" style="display: inline-block;">Register as Student</button></a>
    </div>

    <div align="center" style="margin-top: 50px; margin-bottom: -20px;">
      <a href="#info"><button class="btn btn-default"><span class="glyphicon glyphicon-chevron-down" aria-hidden="true"></span>
      <p style="font-size:10px; margin-bottom: 0px;">Scroll down</p></button></a>
    </div>
     </div>

<div class="parallaxbox" id="pb0" style="background-image: url('img/1.jpg');"></div>

<div class="parallaxbox" id="pb1" style="background-image: url('img/2.jpeg');"></div>

<div class="parallaxbox" id="pb2" style="background-image: url('img/3.JPG');"></div>

<div class="parallaxbox" id="pb3" style="background-image: url('img/4.jpg');"></div>

<div class="textbox"><div align="center"><h2 >Have we convinced you?</h2>
  <a name="info" id="info">
      <a href="register?type=teacher"><button class="btn btn-primary" style="display: inline-block;">Register as Teacher</button></a>
      <a href="register?type=student"><button class="btn btn-info" style="display: inline-block;">Register as Student</button></a>
    </div>
      <a href="#top" style="float: right;"><button class="btn btn-default"><span class="glyphicon glyphicon-chevron-up" aria-hidden="true"></span>
      <p style="font-size:10px; margin-bottom: 0px;">Back to top</p></button></a>
  </div></a>
<style type="text/css">body{
    position: absolute;
    top: 0;
    right: 0;
    bottom: 0;
    left: 0;
}
.textbox {
    position: relative;
    height: auto;
    
    background: white;
    padding: 50px;
    margin-top: -1px;
    margin-bottom: -1px;
    
    z-index: 99;
    box-shadow: 0 0 18px rgba( 80, 80, 80, 0.8);
}
.parallaxbox {
    position: relative;
    height: 80%;
    
    background: #444;
    background-size: cover;
    background-attachment: fixed;
    background-repeat: no-repeat;
    background-position: center center;
    
    border-top: 1px solid black;
    border-bottom: 1px solid black;
    
    z-index: 9;
}

a, a:visited{
    color: blue;
    text-decoration: none;
}
a:hover{
    text-decoration:underline;
}</style>
<script type="text/javascript">
function parallax() {
    setpos("#pb0");
    setpos("#pb1");
    setpos("#pb2";
    setpos("#pb3", 100);
}



function setpos(element, factor) {
    factor = factor || 2;
    
    var offset = $(element).offset();
    var w = $(window);
    
    var posx = (offset.left - w.scrollLeft()) / factor;
    var posy = (offset.top - w.scrollTop()) / factor;
    
    $(element).css('background-position', '50% '+posy+'px');
    
    // use this to have parralax scrolling vertical and horizontal
    //$(element).css('background-position', posx+'px '+posy+'px');
}

$(document).ready(function () {
    parallax();
}).scroll(function () {
    parallax();
});</script>
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