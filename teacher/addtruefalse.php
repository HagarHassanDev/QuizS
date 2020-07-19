<?php include 'connection.php' ?>
<?php include 'header.php' ?>
<?php include 'menu.php' ?>
<!--<link rel="stylesheet" href="../assets/css/questions_style.css">-->
<body>


<br/>
<br/>
<br/>

       <div class="question_design">
<section id="add-mcq" >
    
   

    <div class="container pt-4" style="background-color:#fff; ">
        <form method="post" action="addtruefalsequestion.php">
            
            
     <i class="fas fa-bookmark text-info"></i>
<h5 class="d-inline mb-5 mt-3"> Enter Question : </h5>
    <input type="text" placeholder="Type your question here .."   class="form-control mt-1" name="question"/>
            
      
        <div class="row mt-3">
       <div class="col-sm-4">
       <i class="far fa-clock text-info"></i>
      <h5 class="d-inline mb-5 ">Expected time : </h5>
    <input type="text" placeholder="minutes"  class="form-control mt-1" name="hours"/>
        </div >

        <div class="col-sm-4">
<i class="fas fa-bolt text-info"></i>
<h5 class=" d-inline mb-5" >Difficulity :</h5>

          <select name="level" class="custom-select mt-1" >

      <?php
    $q= "select * from qi_levels";
    $result = mysqli_query($con,$q);

while($levels = mysqli_fetch_array($result))
{
    echo '<option value="'.$levels['qi_level'].'">'.$levels['qi_level'].'</option>';
}
    
    ?>
      
  </select>    
            
        
            
        </div> 
            
            <div class="col-sm-4">
     <i class="fas fa-bookmark text-info"></i>
<h5 class="d-inline mb-5  "> Subject : </h5>
  <select name="subject" class="custom-select mt-1 " >

      <?php
    $q= "select * from qi_subjects";
    $result = mysqli_query($con,$q);

while($subject = mysqli_fetch_array($result))
{
    echo '<option value="'.$subject['qi_subject'].'">'.$subject['qi_subject'].'</option>';
}
    
    ?>
      
  </select>
            
            </div>         
       
            
        </div>  
<div class="answers">
        
    
    <div class="input-group form-group">
        <div class="input-group-prepend">
          <div class="input-group-text" style="background-color:#17a2b8;">
                <input type="radio" name="q" value="true" />
            </div>
        </div>
        <h4 class="pl-2">True </h4> 
        
      </div>
    
    
          <div class="input-group form-group">
        <div class="input-group-prepend">
          <div class="input-group-text" style="background-color:#17a2b8;">
                <input type="radio" name="q" value="false" />
            </div>
        </div>
        <h4 class="pl-2">False </h4>  
              
      </div>
    
  
  
     
        <button type="submit" class="btn btn-info float-right" id="buttons">save</button>
    
        <div class="clearfix"></div>
    
</div> <!-- answers end -->       

            
            
            
            
        </form>
    </div>
        
</section>
</div>
<?php include 'footer.php' ?>
