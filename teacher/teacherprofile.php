
<?php session_start() ?>
<?php include 'header.php'?>
<?php include 'connection.php' ?>
<?php include 'menu.php'?>
<?php

    $teacherId=$_SESSION['teacher_id'];

if(isset($_SESSION['teacherId']))
{
    $teacherId=$_SESSION['teacherId'];
}




$q ="select * from qi_teachers where qi_id=' $teacherId' ";
$result   = mysqli_query($con , $q);

$result1 = mysqli_fetch_array($result);


$username =$result1['qi_username'];
$usermail= $result1['qi_mail'];
$imgPath = $result1['qi_pp'];






if(! isset($_SESSION['isLogin']))
{
    header('location:login.php');       

}

?>

<section  style="background-color:#f2f2f2">
    <div class="row" >

        <div class="col-xl-1 col-lg-1 col-md-1 col-sm-12 col-xs-12 pl-0 " >
            <?php include 'menu.php'?>
        </div>

        <div class="col-xl-9 col-lg-9 col-md-9 col-sm-12 col-xs-12 pl-0 " >    

            <div class="container-fluid mt-5">
                <section  class="student-profile" id="student-label">

                    <div class="row">
                        <div class="col-sm-3">
                            <img class="img-fluid rounded-circle" src="<?php echo $imgPath ?>" />
                        </div>


                        <div class="col-sm-7">
                           <!-- <i class="far fa-user text-info"  ></i> -->
                            <h1><?php echo $username ?>
                                
                            </h1>
                         <!--  <i class="far fa-envelope text-info"  ></i> -->
                            <p><?php echo $usermail ?>
                            </p>

                            <span class="student-label">teacher</span>

                        </div>
                        <div class="col-sm-2 ">
                            <button class="btn btn-edit-profile mr-auto">
                                <img src="../assets/images/edit_icon.png">Edit profile
                            </button>
                        </div>
                    </div>

                    <nav class="tabs">
                        <div class="nav nav-tabs " id="nav-tab" role="tablist">
                            <a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true">Create</a>
                            <a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab" aria-controls="nav-profile" aria-selected="false">My questions </a>
                            <a class="nav-item nav-link" id="nav-contact-tab" data-toggle="tab" href="#nav-contact" role="tab" aria-controls="nav-contact" aria-selected="false">My quizes</a>
                        </div>

                    </nav>



                </section>

            </div>



            <div class="tab-content" id="nav-tabContent">

                <!-- Create -->
                <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
                    <div class="row ">   
                    <div class="qi-btn">  
                        <!-- Button trigger modal -->
                        <button type="button" class="mb-5 btn btn-primary btn-info" data-toggle="modal" data-target="#exampleModal">
                            <i class="fas fa-question-circle"></i>  Add Question
                        </button>
                    </div>
                        
                    <div class="qi-btn">   
                        <a href="quiz_add.php">
                            <button type="button" class="btn btn-info btn-lg"> <i class="fas fa-file-alt"></i>  Add Quiz</button>
                        </a>

                        
    <!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
     
      <div class="modal-body">
          <div class="row">
          
          <div class="col-md-6">
        <a href="addtruefalse.php">      
    <button class="btn btn-info btn-block">Add True/False</button>      
    </a>
        </div>
              
            <div class="col-md-6">
    <a  href="addmcq.php">          
    <button class="btn btn-warning btn-block">
    Add MCQ
        </button>
    </a>
        </div>          
          
          </div>
        
        
    </div>
    </div>
  </div>
</div>
        
</div>
              </div>  
                </div>

            <!-- My questions -->
                 <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
    
     <div class="container">

    <table class="table" id="table">
    
    
        <thead>
            <th>Question</th>
            <th>Answer</th>
            <th>Level</th>
            
            <th>Type</th>
            <th>Subject</th>
        </thead>
        
        <tbody>
<?php
    
    
$q ="select * from qi_questions where qi_teacher_id=' $teacherId' ";
 $result   = mysqli_query($con , $q);
     
     
 while($result5 = mysqli_fetch_array($result))
       {
           
    echo '  <tr>
                <td>'.$result5['qi_question'].'</td> 
                <td>'.$result5['qi_answer'].'</td>';
                
     $qId=$result5['qi_level_id'];

   $q ="select * from qi_levels where qi_id='$qId' ";
   $result3   = mysqli_query($con , $q);
   $result3 = mysqli_fetch_array($result3);       
     
     echo '<td>'.$result3['qi_level'].'</td>';
     //echo '<td>'.$result5['qi_grade'].'</td>';
     
     $qTypeId=$result5['qi_type_id'];
     
   $q ="select * from qi_questions_types where qi_id='$qTypeId' ";
   $result4   = mysqli_query($con , $q);
   $result4 = mysqli_fetch_array($result4);       
    
     
     echo '<td>'.$result4['qi_type'].'</td>';
     

   
     $qSubjectId=$result5['qi_subject_id'];
     
   $q ="select * from qi_subjects where qi_id='$qSubjectId' ";
   $result14   = mysqli_query($con , $q);
   $result14 = mysqli_fetch_array($result14);       
         
     echo '<td>'.$result14['qi_subject'].'</td>';

     echo '</tr>';
           
       }

    
?>
            
            
            
          
        
        
        </tbody>
        
        
    </table>

</div>

       

    
    </div>
        





                     <div class="tab-pane fade" id="nav-contact" role="tabpanel" aria-labelledby="nav-contact-tab"> 
        
         <div class="container">

    <table class="table" id="table">
    
    
        <thead>
            <th>Quiz Name</th>
            
            <th>Level</th>
            <th>Subject</th>
        </thead>
        
        <tbody>
<?php
    
    
$q ="select * from qi_quizes where qi_teacher_id=' $teacherId' ";
 $result   = mysqli_query($con , $q);
     
     
 while($result5 = mysqli_fetch_array($result))
       {
   
           
    echo '<tr>
     <td><a style="text-decoration: none ; color: #000;"   href="../student/ansQuiz.php?$ID='.$result5['id'].'">'.$result5['name'].' </a></td> ' ;
                
                
     $qId=$result5['level'];

   $q ="select * from qi_levels where qi_id='$qId' ";
   $result3   = mysqli_query($con , $q);
   $result3 = mysqli_fetch_array($result3);       
     
     echo '<td>'.$result3['qi_level'].'</td>';
     //echo '<td>'.$result5['qi_grade'].'</td>';
     
     /******* type = wanna be time *********/
    /* $qTypeId=$result5['qi_type_id'];
     
   $q ="select * from qi_quizes where qi_id='$qTypeId' ";
   $result4   = mysqli_query($con , $q);
   $result4 = mysqli_fetch_array($result4);       
    
     
     echo '<td>'.$result4['qi_type'].'</td>';*/
     

   
     $qSubjectId=$result5['qi_subject_id'];
     
   $q ="select * from qi_subjects where qi_id='$qSubjectId' ";
   $result14   = mysqli_query($con , $q);
   $result14 = mysqli_fetch_array($result14);       
         
     echo '<td>'.$result14['qi_subject'].'</td>';

     echo '</tr>';
           
       }

    
?>
            
            
            
          
        
        
        </tbody>
        
        
    </table>

</div>

       
        
        
        </div>
  
    </div>
    

  
    
    </div> 
    
    
    
    
 
















            </div> <!-- end of container -->


        </div>

        </section>





    <?php include 'footer.php' ?>
