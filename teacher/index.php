

<?php include 'connection.php' ?>
<?php include 'header.php' ?>
<?php include 'navbar.php' ?>

<br/>
<br/>
<br/>

<section id="add-mcq" >

    <div class="container">
        <form method="post" action="addquestion.php">
            
    <input name="question" placeholder="Type your question here" type="text" class="form-control "/>
            
      
            
            
            
            
        
        <div class="row">
        <div class="col-sm-4">
        <input placeholder="grade" type="number" class="mb-2 mt-2 form-control" name="grade" />  
        </div> 
        <div class="col-sm-4">

          <select name="level" class="custom-select mt-2" >

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
  <select name="subject" class="custom-select mt-2" >

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
          <div class="input-group-text">
                <input type="radio" name="q" value="1" />
            </div>
        </div>
<input type="text" class="form-control" name="ans1"  placeholder="Add option here">
      </div>
    
    
          <div class="input-group form-group">
        <div class="input-group-prepend">
          <div class="input-group-text">
                <input type="radio" name="q" value="2" />
            </div>
        </div>
<input type="text" class="form-control"  name="ans2"  placeholder="Add option here">
      </div>
    
      <div class="input-group form-group">
        <div class="input-group-prepend">
          <div class="input-group-text">
                <input type="radio" name="q" value="3"/>
            </div>
        </div>
<input type="text" class="form-control"  name="ans3"  placeholder="Add option here">
      </div>
    
          <div class="input-group form-group">
        <div class="input-group-prepend">
          <div class="input-group-text">
                <input type="radio" name="q" value="4" />
            </div>
        </div>
<input type="text" class="form-control" name="ans4"  placeholder="Add option here">
      </div>

     
        <button type="submit" class="btn btn-info float-right">save</button>
        <div class="clearfix"></div>
    
</div> <!-- answers end -->       

            
            
            
            
        </form>
    </div>
</section>

<?php include 'footer.php' ?>