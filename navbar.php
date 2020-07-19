
<?php session_start(); ?>
<?php include 'connection.php' ?>


<nav class="navbar fixed-top navbar-expand-lg nav-back">
    <a class="navbar-brand" href="#">QuizS</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav ml-auto">

            <li class="nav-item">
                <a class="nav-link active" style="color:#fff " href="#gallery">Home </a>
            </li>

            <li class="nav-item">
                <a class="nav-link" style="color:#fff " href="#services">SERVICES</a>
            </li>


            <li class="nav-item">
                <a class="nav-link" style="color:#fff " href="#testi">TESTIMONIALS</a>
            </li>


            <li class="nav-item">
                <a class="nav-link" style="color:#fff " href="#work">WORK</a>
            </li>    
        </ul>




        <!------ for Student login ------> 
        <form  class="form-inline my-2 my-lg-0">
   <a href="teacher/login.php">  <button type="button" class="btn btn-primary btn-outline-info  my-2 my-sm-0 signBtn" data-toggle="modal" data-target="#exampleModal"> <!-- target takes id for what will pop up -->
                Teacher LogIn 
       </button></a>



            <!-- Trigger Button -->

          <a href="student/login.php">  <button type="button" class="btn btn-primary btn-outline-info  my-2 my-sm-0 signBtn" data-toggle="modal" data-target="#exampleModal"> <!-- target takes id for what will pop up -->
                Student LogIn 
            </button> </a>
                                   </form>
                            <!-- End the form -->




                            <?php
    if(isset($_POST['action']))
{
    $usermail =  $_POST['usermail'];
    $userpassword =  $_POST['userpassword'];

    $q7 ="select * from qi_students where qi_mail='$usermail' and qi_password='$userpassword' ";
    $result7   = mysqli_query($con , $q7);

    $result8= mysqli_fetch_array($result7);
    $student_id = $result1['qi_id'];

    $num =  mysqli_num_rows( $result7);

    if($num > 0)
    {
        $_SESSION['isLogin']=true;        

        $_SESSION['studentId']=$student_id;
        header('location:student/studentprofile.php'); 
    }
    else
    {
        header('location:login.php');    
    }
}
                            ?>



                        </div>
                    </div>
                </div>
            </div>
            </div>
        </form>
</nav>





