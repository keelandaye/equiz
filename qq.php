<?php session_start(); ?>
<html>
<head>
   <title>Quick Quiz - eQuiz</title>
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

    <?php
    include "methods/mysql.php";
    $q = $_GET['q'];
    $getcode = mysql_query("SELECT `code` FROM `quickquizzes` WHERE `quizid` = '$q'");
    $code = mysql_fetch_array($getcode)[0];
    ?>

    <div class="container" style="margin-top: 50px;">
    <div class="col-md-4"></div>
    <div id="loginform" class="col-md-4">
      <h2 align="center">Go to <strong>www.equiz.me.pn/quick</strong></h2>
      <h1 align="center">Quick Quiz Code: <strong><?php echo $code; ?>
      <br><br><br>
      <div align="center"><a href="/methods/delquickquiz.php?q=<?php echo $_GET['q']; ?>"><button class="btn btn-danger">Stop Quick Quiz</button></a></div><br>
      <div align="center"><a target="_blank" href="/viewquiz?q=<?php echo $_GET['q']; ?>"><button class="btn btn-primary">View Quiz & Results</button></a></div>
      <p><div align="center" style="font-size: 20px;">Warning: Shows answers.</div></p>
      <br>
      <p><div align="center" style="font-size: 15px;">Come back to this page to turn off Quick Quiz mode.</div></p>
    </div>
    <div class="col-md-4"></div>
    </div>

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
   <script src="sweetalert-master/dist/sweetalert-dev.js"></script> 
</body>
</html>