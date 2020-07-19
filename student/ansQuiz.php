<?php include 'header.php'?>
<?php include 'connection.php' ?>





<div class="container ">
    <div class="row">
                <div class="col-xl-9 col-lg-9 col-md-9 col-sm-12 col-xs-12  " >

<form method="post" action="scores.php">

    <?php
        $quizId= $_GET['qId'];


$q = "select * from qi_quizes where id ='$quizId'";

$result = mysqli_query($con , $q);

$quizInfo = mysqli_fetch_array($result);

echo '<div class="text-center" >';
echo '<h4 class="text-info ">QuizName : '. $quizInfo['name'].' <span class="ml-5"> </span > Grade : '. $quizInfo['qi_grade'].'</h4>';
echo'</div>';

        

$q2 = "select * from quizezq where quiz_id ='$quizId'";

$result2 = mysqli_query($con , $q2);
    
    $counter=0; 
    while($quizQuestions = mysqli_fetch_array($result2)){

    $question_id = $quizQuestions['q_id'];

    $q3= "select * from qi_questions where qi_id = '$question_id'";
    $test3 = mysqli_query($con , $q3);


    while($ques = mysqli_fetch_array($test3))
    {


        
        if($ques['qi_type_id'] == 2)
        {

 
               $counter = $counter+1;
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
         
                          //  $rightAns = $ques['qi_answer'];     
        
        /*if($ques['qi_type_id'] == 2)
        {

            echo '<span class="text-info">TRUE/FALSE</span>';    
            echo '<h4 class="mb-3">'.$ques['qi_question'].'( )</h4>';        
        }
        
        */
        
     
        }
        else
        {

            
            
               $counter = $counter+1;
        echo '  <div class="questionsResult">
         <div class="questionResult-header">
                <div class="questionResult-num">Question '.$counter.'</div>      
            </div> <h4 class="ml-3">'.$ques['qi_question'].'</h4>';
        echo ' <div class="questionResult-divider"> <div class="divider-text">answer choices </div></div>';
            
 

            $q4="select * from qi_mcq_ans where qi_q_id = '$question_id'";

            $test4 = mysqli_query($con,$q4);
            while($mcq_ans = mysqli_fetch_array($test4))
            {
                //echo '<p class="pl-3">'.$test4['qi_answer'].'</p>';
           echo '    
          <div class="input-group form-group">
        <div class="input-group-prepend">
          <div class="">';
                $rightAns = $ques['qi_answer'];

                if($rightAns == $mcq_ans['qi_answer'])
                {

            
            
              echo '<div class="options-holder" > <div class="options"> <div class="option-maker"> <input type="radio" name="'.$ques['qi_id'].'" value="true" /></div></div></div>';                }
                else
                {
                    echo'
   <div class="options"> <div class="option-maker"> <input type="radio" name="'.$ques['qi_id'].'" value="false" /> </div> </div >'    ;
                    
                                }


                echo'       
            </div>
        </div>
<label>'.$mcq_ans['qi_answer'].'</label>
    </div>';


            }



        }

   }
      echo'</div>';
} 


      echo' <div class="clearfix"></div>';


        echo '<button name="submit" type="submit" class="btn btn-info float-right">save</button>

';
echo'</form>';


?>
  </div>  

        </div></div>

    <?php include 'footer.php' ?>