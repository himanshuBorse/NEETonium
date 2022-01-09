<?php
session_start();
$conn = mysqli_connect("localhost", "root", "", "lms_db"); 
//get the name of the student who have uploaded the question for quiz footer
if( isset($_POST['mcq_stu_id']) ){
  $stu_id = $_POST['mcq_stu_id'];

    $sql = "SELECT * FROM student WHERE stu_id = '".$stu_id."'";
  //$sql = "SELECT * FROM student ";
  $result = $conn->query($sql);
  $data = $result->fetch_assoc();
    $stu_name = $data['stu_name'];   
    echo json_encode($stu_name);

}

//adding the status of the question attempted correctly in database
if(isset($_POST['correct_attempt_mcq_id'])){
  $mcq_id = $_POST['correct_attempt_mcq_id'];
  $stuLogID = $_SESSION['stuLogID'];
  
  $sql ="INSERT INTO correctattempt (mcq_id , stu_id , attempt_time) VALUES ('$mcq_id', '$stuLogID', now()) ";
  if($conn ->query($sql) == TRUE){
    echo json_encode("OK");
  }
  else{
    echo json_encode("FAILED");
  }
}

//adding the status of the question attempted incorrectly in database
if(isset($_POST['incorrect_attempt_mcq_id'])){
  $mcq_id = $_POST['incorrect_attempt_mcq_id'];
  $stuLogID = $_SESSION['stuLogID'];
  
  $sql ="INSERT INTO  incorrectattempt (mcq_id , stu_id , attempt_time) VALUES ('$mcq_id', '$stuLogID', now()) ";
  if($conn ->query($sql) == TRUE){
    echo json_encode("OK");
  }
  else{
    echo json_encode("FAILED");
  }
}

//adding the  report question details
if(isset($_POST['report_mcq_id'])){
  $mcq_id = $_POST['report_mcq_id'];
  $stuLogID = $_SESSION['stuLogID'];
  
  $sql ="INSERT INTO  questionreport (mcq_id , stu_id , report_time) VALUES ('$mcq_id', '$stuLogID', now()) ";
  if($conn ->query($sql) == TRUE){
    echo json_encode("OK");
  }
  else{
    echo json_encode("FAILED");
  }
}

?>  