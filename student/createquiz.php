



<?php session_start();?>

<?php include 'connection.php' ?>
<?php include 'header.php' ?>
<?php //include 'navbar.php' ?>
<?php include 'menu.php'?>


<br/>
<br/>
<br/>
<div class="container text-center">



    <form method="post" action="scores.php" >

        <?php
    /*    

    echo '<h2>Quiz Name :</h2>';
   $quizName = $_POST['quizname'];    
    echo '<p>'.$quizName.'</p>'; 

    echo '<h2>Quiz Grade :</h2>';

 $quizGrade = $_POST['quizgrade'];  
        echo '<p>'.$quizGrade.'</p>'; 



echo '<br/>
<br/>';

$subject_id = $_SESSION['subject'];
$teacher_id =  $_SESSION['teacher_id'];
*/  

    
 $student_id=$_SESSION['studentId'];
$partvalu = 0;


    $result="";
    $quizDuration = $_POST['hours'];
//$quizLevel = $_POST['level'];
//$qNum = $_POST['q_num'];
$qLevel = $_POST['qLevel'];
$qName = $_POST['Name'];


echo '<div class="quiz-header border-bottom d-inline pb-2 ">';
echo '       <i class="fas fa-bookmark  text-info "></i>
<h4 class="d-inline  mr-5"> Name:'. $qName.'</h4> ';

echo '<i class="fas fa-bolt text-info ml-5"></i>
<h4 class="d-inline mr-5"> Level:'.$qLevel  .'</h4>';


echo '   <i class=" far fa-clock text-info ml-5"></i>
<h4 class="d-inline "> Time: '. $quizDuration.'Hours</h4>';
echo'</div > ';

 $ScoreSum=0;
$temp = 0;
//$Qdegree =0 ;


$PartValue = 0 ;

foreach($_POST['topics'] as $topicID) 
{

    $topicID =$topicID;
    $topicQNumPre =  $_POST[$topicID];
    $QNum =  $_POST['questionNum']; // 3add as2lt elemt7an
    $Qdegree=  $_POST['totalDegree'];
    
    
    $quziQcurrent=[];
    
    
    
    $topicQNum = $topicQNumPre/100 *  $QNum;
    echo $topicQNum;
    
    
    
    
    /*
    $q="select * from qi_questions where qi_subject_id='$topicID' and qi_level_id = '$qLevel' limit  $topicQNum " ;
    $result= mysqli_query($con , $q);
*/
    
 /****** The hard Part *******/    
    $HardQNum3= 70/100 * $topicQNum;
    $MediumQNum3= 20/100 * $topicQNum;
    $EasyQNum3= 10/100 * $topicQNum;
    
  /*  echo $hardQNum ;
    echo  $MediumQNum ;
    echo $EasyQNum ;
    */
    
    $MediumQNumRound3= round($MediumQNum3 , 0 , PHP_ROUND_HALF_DOWN);
    $EasyQNumRound3 = round($EasyQNum3 , 0 , PHP_ROUND_HALF_DOWN);
    $HardQNumRound3 = round($HardQNum3 , 0 , PHP_ROUND_HALF_UP);
    echo "<br/>";
    echo $MediumQNumRound3;
    echo $EasyQNumRound3;
    echo $HardQNumRound3;
        echo "<br/>";

    
    $MediumScore = $MediumQNumRound3*2 ;
    $HardScore = $HardQNumRound3 *4 ;
    $EasyScore = $EasyQNumRound3*1 ;
 
    $ScoreSum =  $MediumScore + $HardScore + $EasyScore ;
    $temp = $temp +$ScoreSum;

    
   if($qLevel == 3){
      $q=" (select * from qi_questions where qi_subject_id='$topicID' and qi_level_id = '$qLevel'  limit $HardQNumRound3 ) UNION ( select * from qi_questions where qi_subject_id='$topicID' and qi_level_id ='2' limit $MediumQNumRound3 ) UNION (select * from qi_questions where qi_subject_id='$topicID' and qi_level_id ='1' limit $EasyQNumRound3)";
   
  
       
       /* limit $HardQNumRound3  */
       /*    limit $MediumQNumRound3 
      UNION 
    select * from qi_questions where qi_subject_id='$topicID' and qi_level_id='1' limit $EasyQNumRound3" ;
       */
       if (mysqli_connect_errno()){
      echo'Fail'.mysqli_connect_error();
    }
       
    $result= mysqli_query($con , $q);

    $counter = 0;
        $Qtime= 0;
    while( $ques= mysqli_fetch_array($result))
    {  
        /*
        echo $ques['qi_question'];
        echo "<br/>";
  */
        $counter = $counter+1;

        if($ques['qi_type_id'] == 2)
        {
            /*
    echo '<span class="text-info">TRUE/FALSE</span>';    
    echo '<h4 class="mb-3">'.$ques['qi_question'].'( )</h4>'; 
         */
   
             echo '  <div class="questionsResult">
         <div class="questionResult-header">
            <div class="questionResult-num">Question '.$counter.'</div>      
        </div> 
            <h4 class="ml-3">'.$ques['qi_question'].'</h4>';
        echo ' <div class="questionResult-divider"> 
                    <div class="divider-text"> answer </div>
                </div>';  
            
                     echo ' 
                  <div class="input-group form-group">
        <div class="input-group-prepend">
          <div class="">             
        
        
        <div class="options-holder" >
        <div class="options"> 
        <div class="option-maker">
        <input type="radio"  name="t/f" value="true" />
        </div></div></div>
        </div></div>
<label>True</label>
</div>' ;
            
            
echo ' 
                  <div class="input-group form-group">
        <div class="input-group-prepend">
          <div class="">             
        
        
        <div class="options-holder" >
        <div class="options"> 
        <div class="option-maker">
        <input type="radio"  name="t/f" value="false" />
        </div></div></div>
        </div></div>
<label>False</label>
</div>' ;               
         
            echo'</div >';
            echo' <div class="clearfix"></div>';
            
            
            
            
            
            
            
            
            
            
            
            
            $Qtime = $Qtime + $ques['qi_grade'];  // Time
        
            
            
           // echo ' <div class="questionResult-divider"> <div class="divider-text">answer choices </div></div>';


        }



        else
                { 
            /*
            echo '<span class="text-info">MCQ </span>';     
            echo '<h4 class="mt-5 mb-3">'.$ques['qi_question'].'</h4>';        
*/
    echo '  <div class="questionsResult">
         <div class="questionResult-header">
         <div class="questionResult-num">Question '.$counter.'</div>
         
            </div> <h4 class="ml-3">'.$ques['qi_question'].'</h4>';
    echo ' <div class="questionResult-divider"> <div class="divider-text">answer choices </div></div>';
            
            
          $Qtime = $Qtime + $ques['qi_grade'];  // Time

            
            $q_id = $ques['qi_id'];
            $q="select * from qi_mcq_ans where qi_q_id = ' $q_id'";
           $test2 =mysqli_query($con,$q);
            while( $mcq_ans= mysqli_fetch_array($test2))
            {
                    //'<p>'.$mcq_ans['qi_answer'].'</p>';

                /*
                echo '<p class="pl-3">'.$test['qi_answer'].'</p>';
                */    
                
                echo '    
          <div class="input-group form-group">
        <div class="input-group-prepend">
          <div class="">';
                $rightAns = $ques['qi_answer'];

                if($rightAns == $mcq_ans['qi_answer'])
                {

                    echo '<div class="options-holder" > <div class="options"> <div class="option-maker"> <input type="radio" name="'.$ques['qi_id'].'" value="true" /></div></div></div>'; 

                }
                else
                {
                    echo'
   <div class="options"> <div class="option-maker"> <input type="radio" name="'.$ques['qi_id'].'" value="false" /> </div> </div >'    ;
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
}// while 
   
   
       
       
       
       
    $PartValue = $Qdegree /$temp;
       $partvalu = $PartValue;
   // echo'Part'.$PartValue ;

    $Mediumdegree =$MediumScore * $PartValue  ;
    $Harddegree =$HardScore* $PartValue  ;
    $Easydegree =$EasyScore* $PartValue  ;

    $Total = $Easydegree +$Harddegree +$Mediumdegree;
    echo 'Total :'.$Total;
    
    

echo'<br/>';
    
echo 'quiz Time :'.$Qtime;



       
       
   
   }




    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    /**************************Meduim Part *************/
    
    
    
    $HardQNum2= 10/100 * $topicQNum;
    $MediumQNum2= 70/100 * $topicQNum;
    $EasyQNum2= 20/100 * $topicQNum;
    
  /*  echo $hardQNum ;
    echo  $MediumQNum ;
    echo $EasyQNum ;
    */
    
    $EasyQNumRound2= round($EasyQNum2 , 0 , PHP_ROUND_HALF_DOWN);
    $HardQNumRound2 = round($HardQNum2 , 0 , PHP_ROUND_HALF_DOWN);
    $MediumQNumRound2 = round($MediumQNum2 , 0 , PHP_ROUND_HALF_UP);
    
    
  //  $int = fliter_var($str , FILTER_SANITIZE_NUMBER_INT);
    
    
   if($qLevel == 2){
       $q="select * from qi_questions where qi_subject_id='$topicID' and qi_level_id = '$qLevel' limit $MediumQNumRound2 
      UNION
    select * from qi_questions where qi_subject_id='$topicID' and qi_level_id ='3' limit $HardQNumRound2 
      UNION 
    select * from qi_questions where qi_subject_id='$topicID' and qi_level_id='1' limit $EasyQNumRound2" ;
    
       
       /*
       if (mysqli_connect_errno()){
      echo'Fail'.mysqli_connect_error();
    }
       */
       
    $result= mysqli_query($con , $q);

    $counter = 0;
    while( $ques= mysqli_fetch_array($result))
    {  
        echo $ques['qi_question'];
        echo "<br/>";
  
        $counter = $counter+1;
        $Qtime = 0 ;
        if($ques['qi_type_id'] == 2)
        {
            /*
    echo '<span class="text-info">TRUE/FALSE</span>';    
    echo '<h4 class="mb-3">'.$ques['qi_question'].'( )</h4>'; 
         */

            echo '  <div class="questionsResult">
         <div class="questionResult-header">
                <div class="questionResult-num">Question '.$counter.'</div>
                          <div class="questionResult-num">TRUE/FALSE</div> 

            </div> <h3 class="ml-3">'.$ques['qi_question'].' (T/F)</h3>';
           // echo ' <div class="questionResult-divider"> <div class="divider-text">answer choices </div></div>';
            $Qtime = $Qtime + $ques['qi_grade'];  // Time


        }



        else
        {    /*
            echo '<span class="text-info">MCQ </span>';     
            echo '<h4 class="mt-5 mb-3">'.$ques['qi_question'].'</h4>';        
*/
    echo '  <div class="questionsResult">
         <div class="questionResult-header">
         <div class="questionResult-num">Question '.$counter.'</div>
         
            </div> <h3 class="ml-3">'.$ques['qi_question'].'</h3>';
    echo ' <div class="questionResult-divider"> <div class="divider-text">answer choices </div></div>';
            
                      $Qtime = $Qtime + $ques['qi_grade'];  // Time

            
            $q_id = $ques['qi_id'];
            $q="select * from qi_mcq_ans where qi_q_id = ' $q_id'";
           $test2 =mysqli_query($con,$q);
            while( $mcq_ans= mysqli_fetch_array($test2))
            {
                    //'<p>'.$mcq_ans['qi_answer'].'</p>';

                /*
                echo '<p class="pl-3">'.$test['qi_answer'].'</p>';
                */    
                
                echo '    
          <div class="input-group form-group">
        <div class="input-group-prepend">
          <div class="">';
                $rightAns = $ques['qi_answer'];

                if($rightAns == $mcq_ans['qi_answer'])
                {

                    echo '<div class="options-holder" > <div class="options"> <div class="option-maker"> <input type="radio" name="'.$ques['qi_id'].'" value="true" /></div></div></div>'; 

                }
                else
                {
                    echo'
   <div class="options"> <div class="option-maker"> <input type="radio" name="'.$ques['qi_id'].'" value="false" /> </div> </div >'    ;
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
}  }

/*************************Easy Part ****************/
    
    $HardQNum1= 10/100 * $topicQNum;
    $MediumQNum1= 20/100 * $topicQNum;
    $EasyQNum1= 70/100 * $topicQNum;
    
  /*  echo $hardQNum ;
    echo  $MediumQNum ;
    echo $EasyQNum ;
    */
    
    $MediumQNumRound1= round($MediumQNum1 , 0 , PHP_ROUND_HALF_DOWN);
    $HardQNumRound1 = round($HardQNum1 , 0 , PHP_ROUND_HALF_DOWN);
    $EasyQNumRound1 = round($EasyQNum1 , 0 , PHP_ROUND_HALF_UP);
    
    
  //  $int = fliter_var($str , FILTER_SANITIZE_NUMBER_INT);
    
    
   if($qLevel == 1){
       $q="select * from qi_questions where qi_subject_id='$topicID' and qi_level_id = '$qLevel' limit  $EasyQNumRound1  
      UNION
    select * from qi_questions where qi_subject_id='$topicID' and qi_level_id ='3' limit $HardQNumRound1 
      UNION 
    select * from qi_questions where qi_subject_id='$topicID' and qi_level_id='2' limit $MediumQNumRound1" ;
    
       
       /*
       if (mysqli_connect_errno()){
      echo'Fail'.mysqli_connect_error();
    }
       */
       
    $result= mysqli_query($con , $q);
       
       $quziQcurrent  = $result;

    $counter = 0;
       $Qtime = 0 ;
    while( $ques= mysqli_fetch_array($result))
    {  
        echo $ques['qi_question'];
        echo "<br/>";
  
        $counter = $counter+1;

        if($ques['qi_type_id'] == 2)
        {
            /*
    echo '<span class="text-info">TRUE/FALSE</span>';    
    echo '<h4 class="mb-3">'.$ques['qi_question'].'( )</h4>'; 
         */

            echo '  <div class="questionsResult">
         <div class="questionResult-header">
                <div class="questionResult-num">Question '.$counter.'</div>
                          <div class="questionResult-num">TRUE/FALSE</div> 

            </div> <h3 class="ml-3">'.$ques['qi_question'].' (T/F)</h3>';
           // echo ' <div class="questionResult-divider"> <div class="divider-text">answer choices </div></div>';
            
                      $Qtime = $Qtime + $ques['qi_grade'];  // Time



        }



        else
        {    /*
            echo '<span class="text-info">MCQ </span>';     
            echo '<h4 class="mt-5 mb-3">'.$ques['qi_question'].'</h4>';        
*/
    echo '  <div class="questionsResult">
         <div class="questionResult-header">
         <div class="questionResult-num">Question '.$counter.'</div>
         
            </div> <h3 class="ml-3">'.$ques['qi_question'].'</h3>';
    echo ' <div class="questionResult-divider"> <div class="divider-text">answer choices </div></div>';
            
                      $Qtime = $Qtime + $ques['qi_grade'];  // Time

            
            $q_id = $ques['qi_id'];
            $q="select * from qi_mcq_ans where qi_q_id = ' $q_id'";
           $test2 =mysqli_query($con,$q);
            while( $mcq_ans= mysqli_fetch_array($test2))
            {
                    //'<p>'.$mcq_ans['qi_answer'].'</p>';

                /*
                echo '<p class="pl-3">'.$test['qi_answer'].'</p>';
                */    
                
                echo '    
          <div class="input-group form-group">
        <div class="input-group-prepend">
          <div class="">';
                $rightAns = $ques['qi_answer'];

                if($rightAns == $mcq_ans['qi_answer'])
                {

                    echo '<div class="options-holder" > <div class="options"> <div class="option-maker"> <input type="radio" name="'.$ques['qi_id'].'" value="true" /></div></div></div>'; 

                }
                else
                {
                    echo'
   <div class="options"> <div class="option-maker"> <input type="radio" name="'.$ques['qi_id'].'" value="false" /> </div> </div >'    ;
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
}  }

    



    
// Required Time convert to minutes then compare !     
    



echo'<br/>';





}  // while ???????????????
    



        //echo $_POST['question'][0];


    $PartValue = $Qdegree /$temp;

    echo'Part'.$PartValue ;

    $Mediumdegree =$MediumScore * $PartValue  ;
    $Harddegree =$HardScore* $PartValue  ;
    $Easydegree =$EasyScore* $PartValue  ;

    $Total = $Easydegree +$Harddegree +$Mediumdegree;
    echo 'Total :'.$Total;
    
    
// another loop !! 


echo'<br/>';
    
echo 'quiz Time :'.$Qtime;











$teacherId = '7';

        ?>
        </div>
    <?php
  
$q20 = "insert into qi_quizes (qi_subject_id , qi_grade , qi_teacher_id  , name , level ,qi_q_num, qi_studnet_id) values ('1' ,'5' ,'20' ,'$qName' ,' $qLevel', '$counter', '1')";    //??????

mysqli_query($con , $q20);

//echo'<h1>'.$counter.'</h1>';

$lastId = "select id from qi_quizes order by id  desc limit 1";

$lastID = mysqli_query($con , $lastId);

$id = mysqli_fetch_array($lastID);
$ids = $id['id']-1;


echo "test test".$ids ;

$xx=$ids-5;
    /*
foreach($quziQcurrent['qi_id'] as $qu) // ???????????
{
    
    echo $qu;

    
    echo'hello';
$q6 = "insert into quizezq (q_id , quiz_id , part_value ) values ($qu , '$ids' , '$PartValue')";
 $result = mysqli_query($con , $q6);
if($result)
    {
    echo "true";
}
    else
        {
        echo "error".mysqli_error($con);
    }
}*/

    ?>


    <?php include 'footer.php' ?>