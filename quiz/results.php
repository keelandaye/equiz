<?php 

	require("../methods/spellcheck.php");
	error_reporting(0);

 ?>

<h1>Results</h1>

<h3>Question 1</h3>
<p>You answered <strong><?php echo $_GET['1']; ?></strong> <?php if(checkSpell($_GET['1'], "Paris")) { $score = $score + 1; echo '<img src="https://upload.wikimedia.org/wikipedia/en/e/e4/Green_tick.png" height="20px">'; } else { echo '<img src="http://www.rsc.org/learn-chemistry/wiki/images/a/a5/X.png" height="20px">'; }?></p>
<p>The correct answer is <strong>Paris</strong></p>

<h3>Question 2</h3>
<p>You answered <strong><?php echo $_GET['2']; ?></strong> <?php if(checkSpell($_GET['2'], "Madrid")) { $score = $score + 1; echo '<img src="https://upload.wikimedia.org/wikipedia/en/e/e4/Green_tick.png" height="20px">'; } else { echo '<img src="http://www.rsc.org/learn-chemistry/wiki/images/a/a5/X.png" height="20px">'; }?></p>
<p>The correct answer is <strong>Madrid</strong></p>

<h3>Question 3</h3>
<p>You answered <strong><?php echo $_GET['3']; ?></strong> <?php if(checkSpell($_GET['3'], "amylase")) { $score = $score + 1; echo '<img src="https://upload.wikimedia.org/wikipedia/en/e/e4/Green_tick.png" height="20px">'; } else { echo '<img src="http://www.rsc.org/learn-chemistry/wiki/images/a/a5/X.png" height="20px">'; }?></p>
<p>The correct answer is <strong>amylase</strong></p>

<h3>Question 4</h3>
<p>You answered <strong><?php echo $_GET['4']; ?></strong> <?php if(checkSpell($_GET['4'], "reaction")) { $score = $score + 1; echo '<img src="https://upload.wikimedia.org/wikipedia/en/e/e4/Green_tick.png" height="20px">'; } else { echo '<img src="http://www.rsc.org/learn-chemistry/wiki/images/a/a5/X.png" height="20px">'; }?></p>
<p>The correct answer is <strong>reaction</strong></p>

<h3>Question 5</h3>
<p>You answered <strong><?php echo $_GET['5']; ?></strong> <?php if(checkSpell($_GET['5'], "pi")) { $score = $score + 1; echo '<img src="https://upload.wikimedia.org/wikipedia/en/e/e4/Green_tick.png" height="20px">'; } else { echo '<img src="http://www.rsc.org/learn-chemistry/wiki/images/a/a5/X.png" height="20px">'; }?></p>
<p>The correct answer is <strong>pi</strong></p>

<h3>Question 6</h3>
<p>You answered <strong><?php echo $_GET['6']; ?></strong> <?php if(checkSpell($_GET['6'], "Sahel")) { $score = $score + 1; echo '<img src="https://upload.wikimedia.org/wikipedia/en/e/e4/Green_tick.png" height="20px">'; } else { echo '<img src="http://www.rsc.org/learn-chemistry/wiki/images/a/a5/X.png" height="20px">'; }?></p>
<p>The correct answer is <strong>Sahel</strong></p>

<h3>Question 7</h3>
<p>You answered <strong><?php echo $_GET['7']; ?></strong> <?php if(checkSpell($_GET['7'], "Many farmers have walked through the streets to the theatre. Many Pompeians have watched the farmers.")) { $score = $score + 1; echo '<img src="https://upload.wikimedia.org/wikipedia/en/e/e4/Green_tick.png" height="20px">'; } else { echo '<img src="http://www.rsc.org/learn-chemistry/wiki/images/a/a5/X.png" height="20px">'; }?></p>
<p>The correct answer is <strong>Many farmers have walked through the streets to the theatre. Many Pompeians have watched the farmers.</strong></p>

<h3>Question 8</h3>
<p>You answered <strong><?php echo $_GET['8']; ?></strong> <?php if(checkSpell($_GET['8'], "Catholic")) { $score = $score + 1; echo '<img src="https://upload.wikimedia.org/wikipedia/en/e/e4/Green_tick.png" height="20px">'; } else { echo '<img src="http://www.rsc.org/learn-chemistry/wiki/images/a/a5/X.png" height="20px">'; }?></p>
<p>The correct answer is <strong>Catholic</strong></p>

<h3>Question 9</h3>
<p>You answered <strong><?php echo $_GET['9']; ?></strong> <?php if(checkSpell($_GET['9'], "Lancaster")) { $score = $score + 1; echo '<img src="https://upload.wikimedia.org/wikipedia/en/e/e4/Green_tick.png" height="20px">'; } else { echo '<img src="http://www.rsc.org/learn-chemistry/wiki/images/a/a5/X.png" height="20px">'; }?></p>
<p>The correct answer is <strong>Lancaster</strong></p>

<h3>Question 10</h3>
<p>You answered <strong><?php echo $_GET['10']; ?></strong> <?php if(checkSpell($_GET['10'], "leaching")) { $score = $score + 1; echo '<img src="https://upload.wikimedia.org/wikipedia/en/e/e4/Green_tick.png" height="20px">'; } else { echo '<img src="http://www.rsc.org/learn-chemistry/wiki/images/a/a5/X.png" height="20px">'; }?></p>
<p>The correct answer is <strong>leaching</strong></p>

<?php
$percentage = $score / 10;
$percentage = $percentage * 100;
$percentage = $percentage . "%";
?>