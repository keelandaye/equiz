<?php session_start(); ?>
<html>
<head>
   <title>Teachers' Survey - eQuiz</title>
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
    <div class="col-md-3"></div>
    <div id="surveyform" class="col-md-6">
      <h1 align="center">Teachers' Survey</h1>
      <h4 align="center">This is a survey that will help us to tailor the website to your needs.</h4>
      <br>
      <form action="methods/survey.php" method="GET">
        Name
        <input type="text" class="form-control" name="name">
        <br>
        Email (optional)
        <input type="email" class="form-control" name="email">
        <br>
        Would you consider using an online quiz platform for your students?
        <input type="text" class="form-control" name="1">
        <br>
        Have you used an online quiz platform before. If so, which one(s)?
        <input type="text" class="form-control" name="2">
        <br>
        What were some positives of this service?
        <input type="text" class="form-control" name="3">
        <br>
        What were some negatives of this service?
        <input type="text" class="form-control" name="4">
        <br>
        If making a quiz, which types of questions would you prefer to use?
        <input type="text" class="form-control" name="5" placeholder="E.g. multiple choice, text, essay etc.">
        <br>
        <input type="submit" class="form-control btn btn-default" value="Submit">
      </form>
    </div>
    <div class="col-md-3"></div>
    </div>

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
   <script src="sweetalert-master/dist/sweetalert-dev.js"></script> 
</body>
</html>