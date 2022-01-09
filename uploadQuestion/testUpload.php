<?php
 
    session_start();
    if(!isset($_SESSION['is_login'])){
        echo "<script> location.href = '../index.php';</script>";
    }else {
        $stuLogID = $_SESSION['stuLogID'];       
    }
    
 include "../student/studentInclude/studentHeader.php";
    
?>
<div class="col-sm-8 mt-5  mx-3 jumbotron">
    <h3 class=" text-center">Add New Question</h3><hr/>
    <form action="" method="POST" id="myform" enctype="multipart/form-data">
        <div class="row"> 
            <div class="col">
                <div class="form-gourp">
                    <div class="text-center">
                        <span class="h5">11th</span>
                    </div>
                    <input type="radio" class="form-control" name="standard0" id="standard0" value="1">
                </div>
            </div>
            <div class="col">
                <div class="text-center">
                    <span class="h5">12th</span>
                </div>
                <input type="radio" class="form-control" name="standard0" id="standard0" value="2">
            </div>
        </div>
        <div class="row">
            <div class="col">
                <div class="form-gourp">
                    <div class="text-center">
                        <span class="h6">Physics</span>
                    </div>
                    <input type="radio" class="form-control" name="subject0" id="subject0" value="1">
                </div>
            </div>
            <div class="col">
                <div class="form-gourp">
                    <div class="text-center">
                        <span class="h6">Chemistry</span>
                    </div>
                    <input type="radio" class="form-control" name="subject0" id="subject0" value="2">
                </div>
            </div>
            <div class="col">
                <div class="form-gourp">
                <div class="text-center">
                    <span class="h6">Biology</span>
                </div>
                <input type="radio" class="form-control" name="subject0" id="subject0" value="3">
                </div>
            </div>
        </div>
        <div class="form-group" style="padding-top: 10px;">
            <div class="input-group-prepend">
                <span class="input-group-text" for="chapter0"> Chapter </span>

                <select name="chapter0" class="form-control" id="subjectChapters0">

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
                            <input type="radio" class="form-control" value="1" name="answer0">
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-gourp">
                            <div class="text-center">
                                <span >Option 2</span>
                            </div>
                            <input type="radio" class="form-control" value="2"  name="answer0">
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-gourp">
                            <div class="text-center">
                                <span >Option 3</span>
                            </div>
                            <input type="radio" class="form-control" value="3" name="answer0">
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-gourp">
                            <div class="text-center">
                                <span >Option 4</span>
                            </div>
                            <input type="radio" class="form-control" value="4" name="answer0">
                        </div>
                    </div>
                </div>            
        </div>
        <div class="form-group">
            <div class="input-group-prepend">
                <span class="input-group-text" for="ques_desc">Solution</span>
                <textarea name="solution0" id="solution0" class="form-control" row="4"></textarea>
            </div>
        </div>
        <div class="form-group">
        <span  id="uploadSuccessStatus"></span>
        <span  id="uploadFailedStatus"></span>
        <div class="text-center" style="padding: 10px;">
                    
                    <button type="submit" class="btn btn-danger"  name="uploadBtn" id="uploadBtn">Upload</button>
                    
                    <a href="#" class="btn btn-secondary">Close</a>
        </div>
        </div>    
</div>
    
    </form>    

            

</div><!--div row close from header-->

</div><!--div container fluid close from header-->







<!--Start footer-->

<?php
    

if(isset($_POST['uploadBtn'])){
    echo "<script>alert('sdfsdfsd')</script>";

   /* $chap_id = $_POST['chap_id'];
    $question = $_POST['ques_desc'];
    $option1 = $_POST['ques_op1'];
    $option2 = $_POST['ques_op2'];
    $option3 = $_POST['ques_op3'];
    $option4 = $_POST['ques_op4'];
    $answer0 = $_POST['answer0'];
    $solution = $_POST['solution0'];
    
   // echo $chap_id;
    echo $question;
    echo $option1;
    echo $option2;
    echo $option3;*/
}
 