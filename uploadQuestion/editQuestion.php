
<?php
include "../student/studentInclude/studentHeader.php";
include "../resources/mainInclude/dbConnection.php";

if (!isset($_SESSION['is_login']))
{
    echo "<script> location.href = '../index.php';</script>";
}
else
{
    $stuLogID = $_SESSION['stuLogID'];
    $mcq_id = $_GET['q'];
    
    
}
    
?>


<div class="col-sm-8 mt-5  mx-3 jumbotron">
    <h3 class=" text-center">Edit Question</h3>
    <hr />

    <?php
        if(isset($_REQUEST['edit'])){ 
            // $sql = "SELECT * FROM mcq WHERE mcq_id = $mcq_id";
            // $result = $conn->query($sql);
            // $row = $result->fetch_assoc();

            $sql = "SELECT * FROM mcq WHERE mcq_id = ? ";
            $stmt= $conn->prepare($sql);
            $stmt->bind_param("i", $mcq_id);
            $stmt->execute();
            $result = $stmt->get_result();
            $row = $result->fetch_assoc();

        }
    ?>

    <form action="" method="POST" enctype="multipart/form-data">
        <div class="form-group">

            <span id="uploadFailedStatus"></span>
        </div>

        <div class="row">
            <?php
          if(isset($_REQUEST['edit'])){
            $mcq_id = $_REQUEST['id'];
       
            $chapter_sql = "SELECT * FROM chapter WHERE chap_id = ?";
            $stmt  = $conn->prepare($chapter_sql);
            $stmt->bind_param("i", $row['chap_id']);
            $stmt->execute();
            $chapter_result  = $stmt->get_result();
            $chapter_row = $chapter_result->fetch_assoc();
           
          }  
        ?>
            <div class="col">
                <div class="form-group">
                    <input type="text" class="form-control text-center font-weight-bold" id="chapter" name="chapter" value="<?php
                                if(isset($chapter_row['chap_id'])){
                                    $standard = $chapter_row['class_id'];
                                    if($standard == 1){
                                        echo '11th';
                                    }
                                    else{
                                        echo '12th';
                                    }
                                }
                            ?>" readonly>
                </div>
            </div>
            <div class="col">
                <div class="form-group">
                    <input type="text" class="form-control text-center font-weight-bold" id="chapter" name="chapter" value="<?php
                                if(isset($chapter_row['sub_id'])){
                                    $subject = $chapter_row['sub_id'];
                                    if($subject == 1){
                                        echo 'Physics';
                                    }
                                    elseif($subject == 2){
                                        echo 'Chemistry';
                                    }
                                    else{
                                        echo 'Biology';
                                    }
                                }
                            ?>" readonly>
                </div>
            </div>
            <div class="col">
                <div class="form-group">
                    <input type="text" class="form-control text-center font-weight-bold" name="chapter" value="<?php
                                if(isset($chapter_row['chap_name'])){ 
                                    echo $chapter_row['chap_name'];
                                }
                            ?>" readonly>
                </div>
            </div>
        </div>
        <!--<div class="form-group">
        
                <input type="text" class="form-control text-center font-weight-bold" id="chapter" name="chapter"
                value = "<?php
                                /*if(isset($row['chap_id'])){
                                    $chapter_sql = "SELECT * FROM chapter WHERE chap_id = {$_REQUEST['id']}";
                                    $chapter_result = $conn->query($chapter_sql);
                                    $chapter_row = $chapter_result->fetch_assoc();
                                    echo $chapter_row['chap_name'];
                                }*/
                            ?>"
                readonly >
            
        </div>-->
        <div class="form-group">
            <div class="input-group-prepend">
                <span class="input-group-text" for="ques_desc">Question</span>
                <textarea name="ques_desc" id="ques_desc" class="form-control" row="4"><?php if(isset($row['question'])){ echo $row['question']; } ?>
                </textarea>
            </div>
        </div>
        <div class="form-group">
            <div class="input-group-prepend">
                <span class="input-group-text" for="ques_op1">Option 1</span>
                <input type="text" class="form-control" id="ques_op1" name="ques_op1" value="<?php
                                if(isset($row['option_1'])){
                                    echo $row['option_1'];
                                }
                            ?>">
            </div>
        </div>
        <div class="form-group">
            <div class="input-group-prepend">
                <span class="input-group-text" for="ques_op2">Option 2</span>
                <input type="text" class="form-control" id="ques_op2" name="ques_op2" value="<?php
                                if(isset($row['option_2'])){
                                    echo $row['option_2'];
                                }
                            ?>">
            </div>
        </div>
        <div class="form-group">
            <div class="input-group-prepend">
                <span class="input-group-text" for="ques_op3">Option 3</span>
                <input type="text" class="form-control" id="ques_op3" name="ques_op3" value="<?php
                                if(isset($row['option_3'])){
                                    echo $row['option_3'];
                                }
                            ?>">
            </div>
        </div>
        <div class="form-group">
            <div class="input-group-prepend">
                <span class="input-group-text" for="ques_op4">Option 4 </span>
                <input type="text" class="form-control" id="ques_op4" name="ques_op4" value="<?php
                                if(isset($row['option_4'])){
                                    echo $row['option_4'];
                                }
                            ?>">
            </div>
        </div><br />

        <div class="form-group">
            <div class="input-group-prepend justify-content-center  ">
                <span class="input-group-text" for="ques_op4"><b>Answer</b> </span>
            </div>
            <div class="row">
                <div class="col">
                    <div class="form-gourp">
                        <div class="text-center">
                            <span>Option 1</span>
                        </div>
                        <input type="checkbox" class="form-control" id="answer" name="answer" value="1" <?php
                                if(isset($row['answer'])){
                                    if($row['answer'] == 1){
                                        echo 'checked';
                                    }
                                }
                            ?>>
                    </div>
                </div>
                <div class="col">
                    <div class="form-gourp">
                        <div class="text-center">
                            <span>Option 2</span>
                        </div>
                        <input type="checkbox" class="form-control" id="answer" name="answer" value="2" <?php
                                if(isset($row['answer'])){                                 
                                    if($row['answer'] == 2){
                                        echo 'checked';
                                    }
                                }
                            ?>>
                    </div>
                </div>
                <div class="col">
                    <div class="form-gourp">
                        <div class="text-center">
                            <span>Option 3</span>
                        </div>
                        <input type="checkbox" id="answer" class="form-control" value="3" name="answer" <?php
                                if(isset($row['answer'])){                                 
                                    if($row['answer'] == 3){
                                        echo 'checked';
                                    }
                                }
                            ?>>
                    </div>
                </div>
                <div class="col">
                    <div class="form-gourp">
                        <div class="text-center">
                            <span>Option 4</span>
                        </div>
                        <input type="checkbox" id="answer" class="form-control" value="4" name="answer" <?php
                                if(isset($row['answer'])){                                 
                                    if($row['answer'] == 4){
                                        echo 'checked';
                                    }
                                }
                            ?>>
                    </div>
                </div>

            </div>
        </div>
        <div class="form-group">
            <div class="input-group-prepend">
                <span class="input-group-text" for="ques_desc">Solution</span>
                <textarea name="solution" id="solution" class="form-control" row="4">
                    <?php 
                    if(isset($row['solution'])){
                         echo $row['solution'];
                          } 
                    ?>
                
                </textarea>
            </div>
        </div>


        <div class="text-center" style="padding: 10px;">

            <button type="submit" class="btn btn-danger" name="editQuesBtn" id="editQuesBtn">Upload</button>
            <a href="#" class="btn btn-secondary">Close</a>
        </div>
</div>
</div>

</form>




</div>
<!--div row close from header-->

</div>
<!--div container fluid close from header-->

<!--upload edited question-->
<?php

if(isset($_POST['editQuesBtn'])){
    
    if (empty($_POST['chapter']) || empty($_POST['ques_desc']) || empty($_POST['ques_op1']) || empty($_POST['ques_op2']) || empty($_POST['ques_op3']) || empty($_POST['ques_op4']) || empty($_POST['answer']))
    {
    ?><script>
    document.getElementById("uploadFailedStatus").innerHTML +=
        "<div class='alert alert-danger'><small class='spinner-border text-danger' role='status'></small><h3>All fields are Mandotary! Except Solution</h3></div>";
        setTimeout(()=>{    
                    window.location.href = "../student/viewUploadedQuestion.php";
                }, 1500);
       
</script><?php
    }
    else
    {
        $question = $_POST['ques_desc'];
        $option1 = $_POST['ques_op1'];
        $option2 = $_POST['ques_op2'];
        $option3 = $_POST['ques_op3'];
        $option4 = $_POST['ques_op4'];
        $answer = $_POST['answer'];
        $solution = $_POST['solution'];
      
        $sql= "UPDATE mcq SET question = '$question',
                                option_1 = '$option1',
                                option_2 = '$option2',
                                option_3 = '$option3',
                                option_4 = '$option4',
                                answer = '$answer',
                                solution = '$solution'
                                WHERE mcq_id = '$mcq_id'";
                if ($conn->query($sql) == true)
                {
                    ?><script>
                        alert("Questioin Edited Successfully!");
                        window.location.href = "../student/viewUploadedQuestion.php";
                    </script><?php
                                exit;

                }

                else
                {
                    ?><script>
                        document.getElementById("uploadFailedStatus").innerHTML +=
                           "<div class='alert alert-danger'><h3>Opps! Something went wrong. Try agian later.</h3></div>";
                        
                    </script><?php
                }
    
    
    }
}
//start footer 
include "../student/studentInclude/studentFooter.php";
//end footer
?>