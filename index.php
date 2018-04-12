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
<?php 
$number = (int) $_GET['n'];
$query = "SELECT * FROM questions
                ";
$results = $mysqli->query($query) or die($mysqli->error.__LINE__);
$total = $results->num_rows
?>

<body>

    <header>
        <div class="container">
<h1>The Best Quiz</h1>
</div>
    </header>
<main>
<div class="container">
<h2>Test your PHP knowledge</h2>
<p>This is a multiple choice quiz to test your knowledge of PHP</p>
<strong>Number of questions: </strong><?php echo $total ?><br>
<strong>Estimated Time: </strong><?php echo $total * 0.5 ?> minutes<br>

<a href='questions.php?n=1' class='questions start'>Start Quiz</a>
</div>
</main>

<footer>
<div class="container">
Copyright &copy long time ago-<?php echo date("Y"); ?>, PHP Quiz 
</div>
</footer>
</body>
<html>