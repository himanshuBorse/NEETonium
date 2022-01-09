<?php
session_start();
if (!isset($_SESSION['is_login']))
{
    echo "<script> location.href = '../index.php';</script>";
}
else
{
    $stuLogID = $_SESSION['stuLogID'];
}

include "../student/studentInclude/studentHeader.php";
include "../resources/mainInclude/dbConnection.php";

?>


<div class="col-sm-8 mt-5  mx-3 jumbotron">
    <h3 class=" text-center">Add New Question</h3><hr/>
    <form action="" method="POST" id="myform" name="uploadForm" enctype="multipart/form-data">
    <div class="form-group">
        
        <span  id="uploadFailedStatus"></span>
        </div>
        <div class="row"> 
            <div class="col">
                <div class="form-gourp">
                    <div class="text-center">
                        <span class="h5">11th</span>
                    </div>
                    <input type="radio" class="form-control" name="standard" id="standard" value="1">
                </div>
            </div>
            <div class="col">
                <div class="text-center">
                    <span class="h5">12th</span>
                </div>
                <input type="radio" class="form-control" name="standard" id="standard" value="2">
            </div>
        </div>
        <div class="row">
            <div class="col">
                <div class="form-gourp">
                    <div class="text-center">
                        <span class="h6">Physics</span>
                    </div>
                    <input type="radio" class="form-control" name="subject" id="subject" value="1">
                </div>
            </div>
            <div class="col">
                <div class="form-gourp">
                    <div class="text-center">
                        <span class="h6">Chemistry</span>
                    </div>
                    <input type="radio" class="form-control" name="subject" id="subject" value="2">
                </div>
            </div>
            <div class="col">
                <div class="form-gourp">
                <div class="text-center">
                    <span class="h6">Biology</span>
                </div>
                <input type="radio" class="form-control" name="subject" id="subject" value="3">
                </div>
            </div>
        </div>
        <div class="form-group" style="padding-top: 10px;">
            <div class="input-group-prepend">
                <span class="input-group-text" for="chapter"> Chapter </span>

                <select name="chapter" class="form-control" id="subjectChapters">
                   <option value="chap_id" name='chap_id'>Select Class and Subject</option>
                    <!--option will be added from database..form ajaxRequest.js-->
                </select>
            </div>
        </div>
        <div class="form-group">
            <div class="input-group-prepend">
                <span class="input-group-text" for="ques_desc">Question</span>
                <textarea name="ques_desc" id="ques_desc" class="form-control" row="4"></textarea>
            </div>
        </div>
        <div class="form-group">
            <div class="input-group-prepend">
                <span class="input-group-text" for="ques_op1">Option 1</span>
                <input type="text" class="form-control" id="ques_op1" name="ques_op1">
            </div>
        </div>
        <div class="form-group">
            <div class="input-group-prepend">
                <span class="input-group-text" for="ques_op2">Option 2</span>
                <input type="text" class="form-control" id="ques_op2" name="ques_op2">
            </div>
        </div>
        <div class="form-group">
            <div class="input-group-prepend">
                <span class="input-group-text" for="ques_op3">Option 3</span>
                <input type="text" class="form-control" id="ques_op3" name="ques_op3">
            </div>
        </div>
        <div class="form-group">
            <div class="input-group-prepend">
                <span class="input-group-text" for="ques_op4">Option 4 </span>
                <input type="text" class="form-control" id="ques_op4" name="ques_op4">
            </div>
        </div><br/>
        
                <div class="form-group">
            <div class="input-group-prepend justify-content-center  ">
                <span class="input-group-text" for="ques_op4"><b>Answer</b> </span> 
                </div>
                <div class="row">
                    <div class="col">
                        <div class="form-gourp">
                            <div class="text-center">
                                <span >Option 1</span>
                            </div>
                            <input type="checkbox" class="form-control"   id="answer"  name="answer" value="1" checked>
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-gourp">
                            <div class="text-center">
                                <span >Option 2</span>
                            </div>
                            <input type="checkbox" class="form-control" id="answer"  name="answer" value="2"   >
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-gourp">
                            <div class="text-center">
                                <span >Option 3</span>
                            </div>
                            <input type="checkbox" id="answer" class="form-control" value="3" name="answer">
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-gourp">
                            <div class="text-center">
                                <span >Option 4</span>
                            </div>
                            <input type="checkbox" id="answer" class="form-control" value="4" name="answer">
                        </div>
                    </div>
                    
                </div>          
        </div>
        <div class="form-group">
            <div class="input-group-prepend">
                <span class="input-group-text" for="ques_desc">Solution</span>
                <textarea name="solution" id="solution" class="form-control" row="4"></textarea>
            </div>
        </div>
        
        
        <div class="text-center" style="padding: 10px;">
        
                    <button type="submit" class="btn btn-danger" name="uploadQuesBtn" id="uploadQuesBtn">Upload</button>
                    <a href="#" class="btn btn-secondary">Close</a>
        </div>
        </div>    
</div>
    
    </form>     

            


</div><!--div row close from header-->

</div><!--div container fluid close from header-->







<!--uplosd question-->


<?php
if (isset($_POST['uploadQuesBtn']))
{
    if (empty($_POST['chapter']) || empty($_POST['ques_desc']) || empty($_POST['ques_op1']) || empty($_POST['ques_op2']) || empty($_POST['ques_op3']) || empty($_POST['ques_op4']) || empty($_POST['answer']))
    {
?><script> 
        document.getElementById("uploadFailedStatus").innerHTML += 
          "<div class='alert alert-danger'><h3>All fields are Mandotary! Except Solution</h3></div>";
        </script><?php
    }
    else
    {
        $chap_id = $_POST['chapter'];
        $question = $_POST['ques_desc'];
        $option1 = $_POST['ques_op1'];
        $option2 = $_POST['ques_op2'];
        $option3 = $_POST['ques_op3'];
        $option4 = $_POST['ques_op4'];
        $answer = $_POST['answer'];
        $solution = $_POST['solution'];

        $sql = ("INSERT INTO mcq (stu_id,chap_id,question,option_1,option_2,option_3,option_4,answer,solution)
    VALUES ('$stuLogID','$chap_id','$question','$option1','$option2','$option3','$option4','$answer','$solution')");

        if ($conn->query($sql) == true)
        {
?><script> 
           
            alert("Questioin Uploaded Successfully!");
             window.location.href = "../uploadQuestion/uploadQuestion.php";

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
//end footere\
?>



