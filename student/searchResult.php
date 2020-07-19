
<?php include 'header.php'?>
<?php include 'connection.php' ?>
<?php include 'menu.php';?>
<div class="container text-center">
    <?php

$level = $_POST['level'];
$subject = $_POST['subject'];


$q1 = "select qi_id from qi_subjects where qi_subject = '$subject' ";
$test = mysqli_query($con , $q1);  
$subject_id = mysqli_fetch_array($test);
$subject_id =  $subject_id['qi_id'];




$q2 = "select qi_id from qi_levels where qi_level = '$level' ";
$test2 = mysqli_query($con , $q2);  
if(! $test2)
{

    echo mysql_error($con);
}
$level_id = mysqli_fetch_array($test2);
$level_id =  $level_id['qi_id'];


$q3= "select * from qi_questions where qi_level_id = '$level_id' and qi_subject_id = '$subject_id' ";
$test3 = mysqli_query($con , $q3);
    ?>
    
    
    <h3 class=" text-center pt-5">Your<strong class="text-info animated flash"> Search </strong> Result</h3>
    
    
    <form method="post" action="scores.php" >

        <?php    
$counter=0;
while($searchResult = mysqli_fetch_array($test3))
{
    $counter = $counter+1;
    echo '  <div class="questionsResult">
         <div class="questionResult-header">
                <div class="questionResult-num">Question '.$counter.'</div>      
            </div> <h4 class="ml-3">'.$searchResult['qi_question'].'</h4>';
    echo ' <div class="questionResult-divider"> <div class="divider-text">answer choices </div></div>';



    $q_id = $searchResult['qi_id'];

    $q4= "select * from qi_mcq_ans where qi_q_id = '$q_id'";
    $test4 = mysqli_query($con , $q4);


    while($mcq_ans = mysqli_fetch_array($test4))
    {
        //echo '<p>'.$mcq_ans['qi_answer'].'</p>';

        echo '    
          <div class="input-group form-group">
        <div class="input-group-prepend">
          <div class="">';
        $rightAns = $searchResult['qi_answer'];

        if($rightAns == $mcq_ans['qi_answer'])
        {

            echo '<div class="options-holder" > <div class="options"> <div class="option-maker"> <input type="radio" name="'.$searchResult['qi_id'].'" value="true" /></div></div></div>'; 

        }
        else
        {
            echo'
   <div class="options"> <div class="option-maker"> <input type="radio" name="'.$searchResult['qi_id'].'" value="false" /> </div> </div >'    ;
        }


        echo'       
            </div>
        </div>
<label>'.$mcq_ans['qi_answer'].'</label>

    </div> ';
    }
echo'</div>
';
          echo' <div class="clearfix"></div>';

    echo'</form>'; 

}


echo '  </div> <button name="submit" type="submit" class="btn btn-info float-right">save</button>
        </div>
</form>
';




        ?>
        <table>

            <?php 


if(isset ($_POST['submit'])  )
{


    $questionsNumber= sizeof($_POST)-1;

    $trueCounter=0;    
    foreach ($_POST as $key => $value) {
        echo "<tr>";
        echo "<td>";
        echo $key;
        echo "</td>";
        echo "<td>";
        echo $value;
        if($value == "true")
        {
            $trueCounter++;
        }
        echo "</td>";
        echo "</tr>";
    }

    $finalResult = ($trueCounter/ $questionsNumber)*100;
    echo $finalResult."%";    

}
            ?>
        </table>




        <?php include 'footer.php' ?>

