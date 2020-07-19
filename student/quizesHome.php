
<?php include 'header.php'?>
<?php include 'connection.php' ?>
<?php session_start();?>

<?php
    $con = mysqli_connect("localhost","root","","quizez");


$q="select * from qi_quizes ";

$result = mysqli_query($con , $q);



while ($allQ = mysqli_fetch_array($result))
{
    $qid=$allQ['id'];

}

?>




<div class="container-fluid " >

    <div class="row" >
        <!-- Sidebar -->
        <div class="col-xl-1 col-lg-1 col-md-1 col-sm-12 col-xs-12 pl-0 " >
            <?php include'menu.php'?>
        </div>

        <!-- Search && Questions Holder -->

        <div class="col-xl-9 col-lg-9 col-md-9 col-sm-12 col-xs-12">
            <!-- Search Part -->
                        <form action="quizes_search_result.php" method="post">
                            <h3 class=" text-center pt-5">What do u want to <strong class="text-info animated flash">learn</strong> Today ?</h3>
                            <div class="container">
                            <div class=" text-center search-bar">
                            <i class="fas fa-search text-info"></i>
            <input type="text" name="searchInput" value="" class=" searchInput " placeholder="Search by topic"/>
                            
                            </div></div>
        <!-- End Search part    -->



        <!-------  Quizes Part ------->
        <h2 class="font-weight-bold popular">Popular Quizes</h2>

        <?php
$q="select * from qi_quizes" ;
$test= mysqli_query($con , $q);
$counter = 0 ; 

while ( $result = mysqli_fetch_array($test)){
    $counter = $counter+1;
    // DEsign         
    echo'
    <a href="ansQuiz.php?qId='.$qid.'" >
        <div class="questions">
            <div class="question-header">
                <div class="question-num">Quiz '.$counter.'
                </div>      
            </div> 
            <h4 class="ml-3">'.$result['name'].'</h4>
          <div class="questionResult-divider"> <div class="divider-text">about the quiz</div></div>';


    $qi_subject_id =$result['qi_subject_id'];
    $q2 ="select * from qi_subjects where qi_id =$qi_subject_id ";
    $test2=mysqli_query($con, $q2);
    while($result2=mysqli_fetch_array($test2)){
        echo' <span><i class="fas fa-book pr-1 text-secondary"></i>'.$result2['qi_subject'].'</span>';
    }



    $qi_grade =$result['qi_grade'];

    echo' <span class="ml-5"><i class="fas fa-question-circle pr-1 text-secondary"></i>'. $qi_grade .' </span> ' ;



    $qi_teacher_id = $result['qi_teacher_id'];
    $q5="select * from qi_teachers where qi_id =$qi_teacher_id";
    $test5=mysqli_query($con, $q5);
    while ($result5=mysqli_fetch_array($test5)){    
        // link >>> go to the teacher profile ??! 

        echo'   
            <div class="signature">
	<label>Made by<a href="../teacher/teacherprofile.php" >'. $result5['qi_username'] .'</a></label> 
            </div>';}
    echo'</div>';
}
echo'</div>'; 
            
            ?>

            
            </form>     
        
    </div>


    <!-- End Questions Part -->


</div>
</div>







<?php include'footer.php' ?>