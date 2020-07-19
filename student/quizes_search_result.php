
<?php include 'header.php'?>
<?php include 'connection.php' ?>

<div class="container text-center">
   <h3 class=" text-center pt-5">Your<strong class="text-info animated flash"> Quiz Search </strong> Result</h3>
    
    
    
    <?php

$searchInput = $_POST['searchInput'];
    
    $q2 ="select * from qi_subjects where qi_subject = '$searchInput'";
    $test2=mysqli_query($con, $q2);
    while($result2=mysqli_fetch_array($test2)){
      $subjectId = $result2['qi_id'];  

   $q="select * from qi_quizes where qi_subject_id = $subjectId" ; 


$test= mysqli_query($con , $q);
$counter =0 ;
while($result = mysqli_fetch_array($test)){

    
  //  echo $result['name'];
    
$counter = $counter +1 ;
    
        // DEsign         
    echo'
    <a href="ansQuiz.php?qId='.$result['id'].'" >
        <div class="questions">
            <div class="question-header">
                <div class="question-num">Quiz '.$counter.'
                </div>      
            </div> 
            <h3 class="ml-3">'.$result['name'].'</h3>
          <div class="questionResult-divider"> <div class="divider-text">about the quiz</div></div>';

        echo' <span><i class="fas fa-book pr-1 text-secondary"></i>'.$result2['qi_subject'].'</span>';
  

    $qi_grade =$result['qi_grade'];
    echo' <span class="ml-5"><i class="fas fa-question-circle pr-1 text-secondary"></i>'. $qi_grade .' </span> ' ;



    $qi_teacher_id = $result['qi_teacher_id'];
    $q5="select * from qi_teachers where qi_id =$qi_teacher_id";
    $test5=mysqli_query($con, $q5);
    while ($result5=mysqli_fetch_array($test5)){    
        // link >>> go to the teacher profile ??! 

        echo'<div class="signature">
	<label>Made by <a href="../teacher/teacherprofile.php?id='.$result5['qi_id'].'">'. $result5['qi_username'].'</a></label> 
            </div>
            
            
            
            
            
            ';}
    echo'</div></a>';
}
echo'</div>';
    
    

    
}





?>
    
    
    
    