
<!-- The question criteria -->

<?php session_start();?>


<?php include 'connection.php' ?>
<?php include 'header.php' ?>
<?php //include 'navbar.php' ?>
<?php include 'menu.php' ?> 
<div class="cont">
<form action="createquiz.php" method="post">


    <?php 
 



    $q ="select * from qi_subjects  ";
$result16   = mysqli_query($con , $q);

echo '<div class="container criteria  ">
    

        <div class="row ">
  <div class="mt-5 mb-4 col-md-12" >
  <h3 class="text-center"> What will you <strong class="text-info">Build</strong> today ? </h3>
  </div>
   <div class="col-sm-4     ">
   <i class="fas fa-bookmark text-info"></i>
<h5 class="d-inline mb-5 ">Quiz Name : </h5>
    <input type="text" placeholder="name"   class="form-control" name="Name"/>
        </div>


 <div class="col-sm-4">
       <i class="far fa-clock text-info"></i>
      <h5 class="d-inline mb-5 ">Quiz Time : </h5>
    <input type="text" placeholder="hours"  class="form-control" name="hours"/>
        </div >

        <div class="col-sm-4 ">

<i class="fas fa-bolt text-info"></i>
<h5 class=" d-inline">Quiz difficulity :</h5>
<select name="qLevel" class="form-control">';
$q= "select * from qi_levels";
$result = mysqli_query($con,$q);

while($levels = mysqli_fetch_array($result))
{
    echo '<option  value="'.$levels['qi_id'].'">'.$levels['qi_level'].'</option>';
}
echo '</select>
</div >

    

<br>
   <div class="col-md-4">   
<i class=" text-info fas fa-align-center"></i>
<h5 class=" d-inline">Number of questions :</h5>
<input type="text" placeholder="number of questions" class="form-control topics" name="questionNum" value=""/>        

        </div>


<div class="col-md-4">   
<i class="far fa-circle text-info"></i><h5 class=" d-inline">Total degree :</h5>
<input type="text" placeholder="degree" class="form-control topics" name="totalDegree" value=""/>        

        </div>




        <div class="col-sm-12">
        <p class="border-bottom border-info mt-3"></P > 
        </div>
</div >';
echo'


<i class="fas fa-caret-right text-info"></i>

<h4 class="d-inline">Choose  your topics :</h4>





<i class="fas fa-caret-right text-info ml-4 pl-5"></i>
<h4 class="d-inline ">Weight of the topic (by percentage %):  </h4>
<div class="row ">    


    ';



while ($result15 = mysqli_fetch_array($result16))
{
    echo '        
        <div class="col-md-3 topics">
    <p><input type="checkbox" name="topics[]" class="m-2" value="'.$result15['qi_id'].'"/>'.$result15['qi_subject'].'   </p>    
        </div>


        <div class="col-md-9">
<input type="text" class="form-control topics" name="'.$result15['qi_id'].'" value=""/>        

        </div>';
    
      
}








    ?>


    <br/>
      </div>
</form>
  

<div class="float-right col-sm-12">
<button class=" create-quiz float-right btn-lg btn-info " type="submit">create quiz </button>
</div >

</div>













<?php include 'footer.php' ?>