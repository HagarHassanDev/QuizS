
<?php include 'header.php' ?>
 <body style="padding-top: 0px!important;">
<?php include 'connection.php' ?>
     




    

    
<div id="my-body" style="height:100%!important;">
    <!--
     <nav class=" fixed-top navbar-expand-lg navbar-light bg-light mt-0" id="navbar1" style="background-color: inherit;">
    <a class="navbar-brand"href="../index.php">Quizes</a>
    </nav>
    -->
<section>

    
    <h2 id="h21">Sign in as <strong>a Student !</strong></h2>




<div id="container" style="border-radius:4px !important;
     max-width:600px !important; padding-bottom:80px">

        <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post" enctype="multipart/form-data">
    
    <div class="form-group">
    <label>mail :</label>    
    <input type="email" class="form-control" name="usermail" />
    </div>
    
    
    
    <div class="form-group">
    <label>password :</label>    
    <input type="password" class="form-control" name="userpassword" />
    </div>
    
            
            
              <div class="create-btn float-left">
             <button name="action" class="float-right btn btn-info mt-3" type="submit"><strong>login</strong></button></div> 
                    
                
            <div class="reg float-right ml-5 " >
            
            <a href="register.php"> Create new Account ? </a></div>
            </div>
        
            
            
            
            
            
            
    </form>
    <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post" enctype="multipart/form-data">

                

    
    </form>

</div>
    
</section>

</div>






<?php session_start();?>

<?php
    
    
       if(isset($_POST['action']))
       {
    $usermail =  $_POST['usermail'];
    $userpassword =  $_POST['userpassword'];

           
$q ="select * from qi_students where qi_mail = '$usermail' and qi_password = '$userpassword' ";
    $result   = mysqli_query($con , $q);
         
           
 $result1 = mysqli_fetch_array($result);
$student_id =  $result1['qi_id'];
           
           
    $num =  mysqli_num_rows( $result);
           
    if($num > 0)
    {
        
    $_SESSION['isLogin']=true;
    $_SESSION['student_id']=$student_id;

        
header('location:studentprofile.php');       
    }
    else
    {
        
        echo "test";
header('location:login.php');    
        
    }
           
        
        

  
           
           
       }
    

?>


<?php include 'footer.php' ?>