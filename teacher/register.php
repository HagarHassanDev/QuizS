<?php include 'connection.php'; ?>
<?php include 'header.php';?>
<?php  session_start();?>

    <div class="row">
        <div class="col-xl-8 col-lg-8 col-md-8 col-sm-8 col-xs-12 fake-body"> 

            <div class="signform text-center">
                <h2 >Teacher Sign Up!</h2>
                <small class=" text-muted mb-2">It's 100% free. No credit card required.
                </small>
                <br/>
<i class="fas fa-angle-double-down text-primary  mt-2"></i>



                <form     action="<?php echo $_SERVER['PHP_SELF'] ?>"    method="post"   enctype="multipart/form-data">
                    <div class="form-group" >
                        <input class="form-control fc" name="username" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder=" Enter username *">
                    </div>

                    <div class="form-group">
                        <input type="email" class="form-control fc" name="usermail" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder=" Email *" required/>
                    </div>

                    <div class="form-group">
                        <input type="password" class="form-control fc" name="userpassword" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="
Password *" required />
                    </div>

                    <div class="form-group">
                        <input type="password" class="form-control fc" name="userrepassword" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Re-password *" required/>
                    </div>

                    <div class="form-group">
                        <input type="file" class="form-control fc" name="userpp" />
                    </div>

                                        
                    <button name="action" class="float-right btn reg-btn btn-primary " type="submit">register now!</button>
                </form>


            </div>
        </div>

        
        
            <!-- Slider -->

            <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 col-xs-12"> 
                <div id="slider">
                    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                        <ol class="carousel-indicators">
                            <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"      >                                             <!-- Error ! 
                                <div class="centered">

                                “Formative allows me to get the data/feedback I need to make informed decisions to help guide and support student learning. It allows for inclusiveness, student voice, differentiation, and risk taking.”
                                </div> -->
                                    
                            </li>
                            <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                            <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                        </ol>
                        <div class="carousel-inner">

                            <div class="carousel-item active">
                                <img class="d-block w-100" src="../assets/images/teacher-slid2.jpg" alt="Second slide">



                            </div>
                            <div class="carousel-item ">
                                <img class="d-block w-100" src="../assets/images/teacher-slid2.jpg" alt="First slide">
                            </div>
                            <div class="carousel-item ">
                                <img class="d-block w-100" src="../assets/images/teacher-slid2.jpg" alt="First slide">
                            </div>

                        </div>
                    </div>        
                </div>
            </div>
            <!-- End slider -->
    </div>
<?php
    ob_start();

    if(isset($_POST['action']))
{
    $username = $_POST['username'];
    $usermail =$_POST['usermail'];
    $userpassword = $_POST['userpassword'];
    $userrepassword = $_POST['userrepassword'];

    $fileName =$_FILES['userpp']['name'];
    $fileSize =$_FILES['userpp']['size'];
    $fileType =$_FILES['userpp']['type'];
    $fileTmp  =$_FILES['userpp']['tmp_name'];

    $validTypes =["image/jpeg" , "image/jpg", "image/png", "image/gif"];

    if(in_array($fileType , $validTypes) && $userpassword == $userrepassword )
    {
        $imgPath="../uploads/teachers/".$fileName ;
        move_uploaded_file($fileTmp ,$imgPath );


        $q= "insert into qi_teachers(qi_username , qi_mail , qi_password , qi_pp ) values ('$username' , '$usermail' , '$userpassword' , '$imgPath' )";
      mysqli_query($con , $q);
        
        
        $q1 = "select qi_id from qi_teachers order by qi_id  desc limit 1";
$test = mysqli_query($con , $q1);  
$q_id = mysqli_fetch_array($test);
 $q_id =  $q_id['qi_id'];
$_SESSION['teacherId']= $q_id;

        
        $_SESSION['isLogin']=true;  

                    ?><script><?php echo("location.href ='teacherprofile.php';");?></script><?php 

     //   echo("<script>location.href = '".studentprofile.php."/index.php?msg=$msg';</script>");
      // header('location:studentprofile.php');  ....this line have an error "headers already sent " !!

    }
    else
    { //echo "Wrong image extention " ;
    }

    

}?>


        <?php include 'footer.php'?>