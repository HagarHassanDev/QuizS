<?php session_start(); ?>
<?php include 'header.php'?>
<?php include 'connection.php' ?>


<?php
    // $_SESSION['student_id']=$student_id;

    
    $student_id=$_SESSION['student_id'];  /*============ NEW ============*/

$q ="select * from qi_students where qi_id=' $student_id' ";
$result   = mysqli_query($con , $q);


$result1 = mysqli_fetch_array($result);   


$username =$result1['qi_username'];
$usermail= $result1['qi_mail'];
$imgPath = $result1['qi_pp'];


if(!isset($_SESSION['isLogin']) and !isset($_SESSION['isSignup']))    /*===== Session for security ===== */
{
    header('location:login.php');       
}

?>

<!---------------------------------->

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
                            <h1><?php echo $username ?>
                                <i class="text-info fas fa-graduation-cap"></i>
                            </h1>

                            <p><?php echo $usermail ?>
                            </p>

                            <span class="student-label">student</span>

                        </div>
                        <div class="col-sm-2 ">
                            <button class="btn btn-edit-profile mr-auto">
                                <img src="../assets/images/edit_icon.png">Edit profile
                            </button>
                        </div>
                    </div>

                    <nav class="tabs">
                        <div class="nav nav-tabs " id="nav-tab" role="tablist">
                            <a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true">Questions</a>
                            <a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab" aria-controls="nav-profile" aria-selected="false">Quizes </a>
                            <a class="nav-item nav-link" id="nav-contact-tab" data-toggle="tab" href="#nav-contact" role="tab" aria-controls="nav-contact" aria-selected="false">Scores</a>
                        </div>

                        <span class="tab-line"> </span>
                    </nav>



                </section>

            </div>





<div class="tab-content" id="nav-tabContent">

    <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
        <div class="container text-center">
        Put on your thinking cap ! <br/>
Search about your teachers' questions, or from our question bank to solve problems and practice more your subjects! 
    <a href="HomePage.php" ><div class="qSearch-btn" >Question Search</div></a>
            </div>
    </div>
 


 <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">

     <div class="container">
         <div class="col-sm-12">
        Put on your thinking cap ! <br/>
Search about your teachers' questions, or from our question bank to solve problems and practice more your subjects! 
         </div>
         <a href="quizesHome.php" ><div class="qSearch-btn" >Quizes Search</div></a>
        
    <a href="quiz_add.php" ><div class="qSearch-btn" >Create your Quiz</div></a>
     </div>
    
    </div>

               
    <div class="tab-pane fade" id="nav-contact" role="tabpanel" aria-labelledby="nav-contact-tab">
        Your Scores !
    
    </div>
            </div>
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            

        </div> <!-- end of container -->


    </div>

</section>

<?php include 'footer.php' ?>




