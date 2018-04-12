<?php include 'database.php'; ?>
<?php session_start(); ?>
<?php 

$number = (int) $_GET['n'];

$query = "SELECT * FROM questions
                WHERE question_number = $number";
$result = $mysqli->query($query) or die($mysqli->error.__LINE__);

$question = $result->fetch_assoc();

$query = "SELECT * FROM choices
                WHERE question_number = $number";
$choices = $mysqli->query($query) or die($mysqli->error.__LINE__);

?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>QUIZ</title>
    <script   src="https://code.jquery.com/jquery-3.1.0.min.js"   integrity="sha256-cCueBR6CsyA4/9szpPfrX3s49M9vUU5BgtiJj06wt/s="   crossorigin="anonymous"></script>
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
<div class="quiz">

<div dlass=' container current '>Question <?php echo $number ?> of <?php echo $total ?></div>
<p class='question container'>
    <?php echo $question['text'];?>
    
</p>
<form method='post' action='process.php'>

<div class='buttons'>
<?php while($row = $choices->fetch_assoc()): ?>
<label class="label">
<input class='labelRadio'name='choice' type='radio' value='<?php echo $row['id'];?>' />
<?php echo $row['text'];?>
</label>
<?php endwhile; ?>
    
</div>
<input class='btn-submit' type='submit' value='submit'/>
<input type='hidden' name='number' value='<?php echo $number;?>'/>
</form>
</div>
</main>

<footer>
<div class="container">
Copyright &copy long time ago-<?php echo date("Y"); ?>, PHP Quiz 
</div>
</footer>
<script src="js/index.js"></script>
</body>
<html>