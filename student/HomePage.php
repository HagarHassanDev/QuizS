<?php include 'header.php'?>
<?php include 'connection.php' ?>

<div class="container-fluid " >

    <div class="cont">
    <div class="row" >
                    <!-- Sidebar -->
        <div class="col-xl-1 col-lg-1 col-md-1 col-sm-12 col-xs-12 pl-0 " >
          <?php include'menu.php'?>
        </div>
        

        <!-- Search && Questions Holder -->
        
        <div class="col-xl-8 col-lg-8 col-md-8 col-sm-12 col-xs-12">
            <!-- Search Part -->
            <!-- ===============NEW LAST SESSION ===== -->
            <form action="searchResult.php" method="post">
                <div class="form-group search">    

                    <h5 class="text-info ">question level :</h5>    
                    <ul>
                        <li>
                            <!-- ??? --> 
                            <input type="radio" id="f-option" name="level" value="easy"><label for="f-option"> Easy</label>
                            <div class="check"></div>
                        </li>
                        <li>
                            <input type="radio" name="level" id="f-option2" value="medium"><label for="f-option2"> Medium</label>                                <div class="check"></div>
                        </li>
                        <li>
                            <input type="radio" name="level" id="f-option3" value="hard"><label for="f-option3"> Hard</label>                                <div class="check"></div>
                        </li>
                    </ul>
                    <br/>
                    <br/>
                    <br/>
                    
                    <h5 class="text-info ">question subject :</h5>    
                    <select name="subject" class="custom-select mt-2" >
                        <?php
    $q= "select * from qi_subjects";
$result = mysqli_query($con,$q);

while($levels = mysqli_fetch_array($result))
{
    echo '<option value="'.$levels['qi_subject'].'">'.$levels['qi_subject'].'</option>';
}
                        ?>
                    </select>    
                </div>        

                <button class="btn btn-info float-right " type="submit" >search</button>  
            </form>
        <!-- End Search part -->
                            
            <!-------  Questions Part ------->
            <h2 class="font-weight-bold popular">Popular Questions</h2>

                <?php
$q="select * from qi_questions" ;
$test= mysqli_query($con , $q);
$counter = 0 ; 

while ( $result = mysqli_fetch_array($test)){
    $counter = $counter+1;
    // DEsign         
    echo'
        <div class="questions">
            <div class="question-header">
                <div class="question-num">Question '.$counter.'
                </div>      
            </div> 
            <h3 class="ml-3">'.$result['qi_question'].'</h3>
          <div class="questionResult-divider"> <div class="divider-text">about the question</div></div>';


    $qi_subject_id =$result['qi_subject_id'];
    $q2 ="select * from qi_subjects where qi_id =$qi_subject_id ";
    $test2=mysqli_query($con, $q2);
    while($result2=mysqli_fetch_array($test2)){
        echo' <span><i class="fas fa-book pr-1 text-secondary"></i>'.$result2['qi_subject'].'</span>';
    }

    $qi_level_id =$result['qi_level_id'];
    $q3="select * from qi_levels where qi_id= $qi_level_id";
    $test3 = mysqli_query($con,$q3);
    while ($result3=mysqli_fetch_array($test3)){
        echo' <span class="ml-5"><i class="fas fa-bolt pr-1 text-secondary"></i>'. $result3['qi_level'].' </span>';
    }

    $qi_type_id =$result['qi_type_id'];
    $q4="select * from qi_questions_types where qi_id =$qi_type_id";
    $test4=mysqli_query($con, $q4);
    while ($result4=mysqli_fetch_array($test4)){
        echo' <span class="ml-5"><i class="fas fa-question-circle pr-1 text-secondary"></i>'. $result4['qi_type'].' </span> ' ;
    } 


    $qi_teacher_id = $result['qi_teacher_id'];
    $q5="select * from qi_teachers where qi_id =$qi_teacher_id";
    $test5=mysqli_query($con, $q5);
    while ($result5=mysqli_fetch_array($test5)){    
        // link >>> go to the teacher profile ??! 
        echo'   
            <div class="signature">
	<label>Made by <a href="../teacher/teacherprofile.php?id='.$result5['qi_id'].'">'. $result5['qi_username'] .'</a></label> 
            </div>';}
    echo'</div>';
}
echo'</div>'; ?>
           
       
            
        </div>
        

            <!-- End Questions Part -->
        
             
        
    </div>
</div>


</div>






<?php include'footer.php' ?>