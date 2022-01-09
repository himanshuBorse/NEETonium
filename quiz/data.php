<?php
    $conn = mysqli_connect("localhost", "root", "", "lms_db");

     
if(isset($_POST['chapter'])){
  $chapter_text = $_POST['chapter'];
  //$result = mysqli_query ($conn,"SELECT * FROM mcq WHERE chap_id ='1' order by rand() limit 1");
  $result = mysqli_query ($conn, "SELECT * FROM mcq join chapter on chapter.chap_id = mcq.chap_id where chapter.chap_name = '".$chapter_text."'  order by rand() limit 1 ");
    $data = array();
    while($row = mysqli_fetch_assoc($result)){
        $data[] = $row;
    }
echo json_encode($data); 
  
}

  //SELECT mcq_question.question_id, mcq_question.question_title, mcq_option.option_title FROM mcq_question inner join mcq_option on mcq_question.question_id = mcq_option.question_id  order by rand() limit 1"




?>