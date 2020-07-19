<?php session_start(); ?>
<?php include 'connection.php';?>
<?php include 'header.php';?>
<?php include 'menu.php'?>

<table>
    <?php

    $student_id=$_SESSION['studentId'];

if(isset ($_POST['submit'])  )
{
    $questionsNumber= sizeof($_POST)-1;

    $trueCounter=0;    
    foreach ($_POST as $key => $value) {
        echo "<tr>";
            echo "<td>";
             $key;
            echo "</td>";
        
            echo "<td>";
            $value;
            if($value == "true")
            {
                $trueCounter++;
            }
            echo "</td>";
        echo "</tr>";
    }
    
    $finalResult = ($trueCounter/ $questionsNumber)*100;
    //echo $student_id .'<br/>';
        echo'<h1>Your Score : '. $finalResult."%".'</h1>';
     $q = " insert into qi_scores( 'qi_score', 'qi_student_id') values ('$finalResult','$student_id')";

    $result= mysqli_query ($con , $q);

    $q2= "select * from qi_scores";
    $result2 =mysqli_query($con , $q2);
    $sco =mysqli_fetch_array($result2);
    echo '<h3>'.$sco['qi_score'].'</h3>' ;
    
}




    ?>
</table>

<?php include 'footer.php'?>