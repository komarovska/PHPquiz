<?php include 'database.php'; ?>
<?php 
    if(isset($_POST['submit'])){
        $question_number = $_POST['question_number'];
        $question_text = $_POST['question_text'];
        $correct_choice = $_POST['correct_choice'];
        $choices = array();
        $choices[1] = $_POST['choice1'];
        $choices[2] = $_POST['choice2'];
        $choices[3] = $_POST['choice3'];
        $choices[4] = $_POST['choice4'];
        $choices[5] = $_POST['choice5'];
        
        //$correct_choice = $_POST['correct_choice'];

        $query = "INSERT INTO `questions` (question_number, text)
                    VALUES( '$question_number' , '$question_text')";


        $insert_row = $mysqli->query($query) or die($mysqli->error.__LINE__);

        if($insert_row) {
            foreach($choices as $choice=>$value) {
                if($value != '') {
                    if($correct_choice == $choice) {
                        $is_correct = 1;
                    }
                    else {
                        $is_correct = 0;
                    }
                    $query = "INSERT INTO `choices` (question_number, is_correct, text)
                                VALUES ('$question_number', '$is_correct' , '$value' )";

                    $insert_row = $mysqli->query($query) or die($mysqli->error.__LINE__);

                    if($insert_row) {
                        continue;
                    }
                    else {
                        die('Error: ('.$mysqli->errno .') '. $mysqli->error);
                    }
                }
            }
            $msg = "Question has been added";
        }


    }
    $query = "SELECT * FROM questions";
    $results = $mysqli->query($query) or die($mysqli->error.__LINE__);
    $total = $results->num_rows;
    $next = $total+1


?>

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
<h2>Add a question</h2>
<?php 
if(isset($msg)){
echo '<p>'.$msg.'</p>';

} ?>
<form class='vertical' method='post' action='admin.php'>
<label>add a question</label>
<input type='number' value='<?php echo $next; ?>' name='question_number' size="10">
<label>question text</label>
<input type='text' name='question_text'>
<label>choice 1</label>
<input type='text' name='choice1'>
<label>choice 2</label>
<input type='text' name='choice2'>
<label>choice 3</label>
<input type='text' name='choice3'>
<label>choice 4</label>
<input type='text' name='choice4'>
<label>choice 5</label>
<input type='text' name='choice5'>
<label>correct choice number</label>
<input type='number' name='correct_choice'>

<input class='btn-submit' type='submit' name='submit' value='submit'>
</form>
</div>
</main>

<footer>
<div class="container">
Copyright &copy long time ago-<?php echo date("Y"); ?>, PHP Quiz 
</div>
</footer>
</body>
<html>