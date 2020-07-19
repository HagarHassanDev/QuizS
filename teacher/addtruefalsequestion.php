<?php session_start()?>

<?php include 'connection.php' ?>
<?php include 'menu.php' ?>
<?php

$question = $_POST['question'];
$level = $_POST['level'];
$grade = $_POST['hours'];
$subject = $_POST['subject'];


$Ans = $_POST['q'];



/*
$q1 = "select qi_id from qi_questions order by qi_id  desc limit 1";
$test = mysqli_query($con , $q1);  
$q_id = mysqli_fetch_array($test);
 $q_id =  $q_id['qi_id'];
*/




$q1 = "select qi_id from qi_levels where qi_level = '$level' ";
$test = mysqli_query($con , $q1);  
$level_id = mysqli_fetch_array($test);
 $level_id =  $level_id['qi_id'];

/*
$q1 = "select qi_id from qi_levels where qi_level = '$level' ";
$test = mysqli_query($con , $q1);  
$level_id = mysqli_fetch_array($test);
 $level_id =  $level_id['qi_id'];
*/

$q1 = "select qi_id from qi_subjects where qi_subject = '$subject' ";
$test = mysqli_query($con , $q1);  
$subject_id = mysqli_fetch_array($test);
 $subject_id =  $subject_id['qi_id'];



//$hi = $mcqAns-1;


$teacherId=$_SESSION['teacher_id'];
$q = "insert into qi_questions (qi_question ,qi_answer,qi_level_id,qi_grade,qi_type_id,qi_subject_id,qi_teacher_id) 
values ( '$question' ,'$Ans', '$level_id' , '$grade' ,2,'$subject_id' ,$teacherId )";

$test = mysqli_query($con , $q);  





if($test)
{
    header('location:teacherprofile.php');
}
else
{
    echo mysqli_error($con);
}
/*
$q_id = $q_id+1;
for ($i = 0 ; $i<4 ; $i++)
{

$q1= "insert into qi_mcq_ans (qi_answer , qi_q_id) values ('$ansss[$i]','$q_id')";
    
    $x  = mysqli_query($con , $q1);
    if(!$x)
    {
        echo mysqli_error($con);
    }
}
*/


?>