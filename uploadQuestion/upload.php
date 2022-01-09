 <?php
 include "../resources/mainInclude/dbConnection.php";
  //fetching the chapters with selected standard and subject...request is coming from ajaxRequest.js
  if(isset($_POST['checkChapter']) && isset($_POST['standard']) && isset($_POST['subject'])){
    $standard = $_POST['standard'];
    $subject = $_POST['subject'];

    $sql = "SELECT * FROM chapter WHERE class_id = '".$standard."' AND sub_id= '".$subject."' ";
    $result = $conn->query($sql);
    ?> 
    $(#subjectChapters).html("<option disabled selected>Select</option>");
    <?php
    while($row = $result->fetch_assoc()){
      ?>

      <option name="chap_id" value="<?php  echo $row['chap_id']  ?>" > <?php  echo $row['chap_name']  ?></option>

      <?php
      
    }
  }

//inserting the question
/*if(isset($_POST['question'])){
  $question = $_post['question'];
  echo $question;
  echo "blameingg hardlyy with those who believe me in";
}*/

/*
if(isset($_POST['uploadQuestion']) && isset($_POST['question']) && 
isset($_POST['op1']) && isset($_POST['op2']) && 
isset($_POST['op3']) &&  isset($_POST['op4']) && 
isset($_POST['answer']) &&  isset($_POST['chap_id'])){


    print "ho raha hai";
   /* $chap_id = $_POST['chap_id'];
    $question = $_POST['question'];
    $option1 = $_POST['op1'];
    $option2 = $_POST['op2'];
    $option3 = $_POST['op3'];
    $option4 = $_POST['op4'];
    $answer = $_POST['answer'];
    $solution = $_POST['solution'];
    
    echo $stuLogID;
    echo $chap_id;
    echo $question;
    echo $option1;
    echo $option2;
    echo $option3;
    echo $option4;
    echo $answer;
    echo $solution;
    $sql = ("INSERT INTO mcq (stu_id,chap_id,question,option_1,option_2,option_3,option_4,answer,solution)
    VALUES ('$stuLogID','$chap_id','$question','$option1','$option2','$option3','$option4','$answer','$solution')");

    if($conn->query($sql) == TRUE){
        echo json_encode("OK");
    }else{
        echo json_encode("FAILED");
    }*/


?>