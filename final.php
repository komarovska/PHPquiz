<?php include 'database.php'; ?>
<?php session_start(); ?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>QUIZ</title>
    <!--link rel="shortcut icon" type="image/png" href="favicon.png"/-->
    <link rel="stylesheet" type="text/css" href="css/main.css">
</head>
<body>

    <header>
        <div class="container">
<h1>The Best Quiz</h1>
</div>
    </header>
<main>
<div class="container">
<h2>You're done</h2>
    <p>Congrats! You've completed the test!</p>
    <p>Final score: <?php echo $_SESSION['score']?></p>
    <a href='questions.php?n=1' class='start btn-submit'>Take again</a>
</div>
</main>

<footer>
<div class="container">
Copyright &copy long time ago-<?php echo date("Y"); ?>, PHP Quiz 
</div>
</footer>
<?php
// remove all session variables
session_unset(); 

// destroy the session 
session_destroy(); 
?>
</body>
<html>