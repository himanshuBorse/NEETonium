<?php
if(!isset($_SESSION)){
session_start();
}
if (!isset($_SESSION['is_login']))
{
    echo "<script> location.href = '../index.php';</script>";
}
else
{
    $stuLogID = $_SESSION['stuLogID'];
}
    include "../student/studentInclude/studentHeader.php";
    
?> 


<div class="col-sm-9 mt-5">
<div class="row mx-5 text-center">
        <div class="col-sm-4 mt-5">
            <div class="card text-white bg-danger mb-3" style="max-width: 18rem;">
                <div class="card-header"><b>Incorrect Attempts</b></div>
                <div class="card-body">
                    <h4 class="card-title">
                    <?php
                                $sql = "SELECT * FROM  incorrectattempt WHERE stu_id = '$stuLogID' ";
                                $result = $conn->query($sql);
                                $incorrectAttemptCount = $result->num_rows;
                                echo $incorrectAttemptCount;
                    ?>
                    </h4>
                    <a class="btn text-white" id="viewIncorrectAttemptBtn" href="../student/viewIncorrectAttempt.php">View</a>
                </div>
            </div>
        </div>
        <div class="col-sm-4 mt-5">
            <div class="card text-white bg-success mb-3" style="max-width: 18rem;">
                <div class="card-header"><b>Correct Attempts</b></div>
                <div class="card-body">
                    <h4 class="card-title">
                    <?php
                                $sql = "SELECT * FROM  correctattempt WHERE stu_id = '$stuLogID' ";
                                $result = $conn->query($sql);
                                $correctAttemptCount = $result->num_rows;
                                echo $correctAttemptCount;
                    ?>

                    </h4>
                    <a class="btn text-white" id="viewCorrectAttemptBtn" href="../student/viewCorrectAttempt.php">View</a>
                </div>
            </div>
        </div>
        <div class="col-sm-4 mt-5">
            <div class="card text-white bg-info mb-3" style="max-width: 18rem;">
                <div class="card-header"><b>Question Uploaded</b></div>
                <div class="card-body">
                    <h4 class="card-title">
                    <?php
                                $sql = "SELECT * FROM  mcq WHERE stu_id = '$stuLogID' ";
                                $result = $conn->query($sql);
                                $uploadCount = $result->num_rows;
                                echo $uploadCount;
                    ?>
                    </h4>
                    <a class="btn text-white" id="viewUploadedQuestionBtn" href="../student/viewUploadedQuestion.php">View</a>
                </div>
            </div>
        </div>
    </div>  
    <div class="mx-5 mt-5 text-center">
        <!--table-->
        <p class="bg-success text-white p-2">Correct Attempts</p>
        <?php
        $sql = "SELECT * FROM mcq INNER JOIN correctattempt ON mcq.mcq_id=correctattempt.mcq_id WHERE correctattempt.stu_id ='".$stuLogID."' ";
        $result = $conn->query($sql);
        if($result->num_rows > 0){

        ?>
        <div class="tableScrollbar"><!--adding scroll bar to table from custom css-->
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">Question ID</th>
                    <th scope="col">Chapter</th>
                    <th scope="col">Question</th>
                    <th scope="col">Option 1</th>
                    <th scope="col">Option 2</th>
                    <th scope="col">Option 3</th>
                    <th scope="col">Option 4</th>
                    <th scope="col">Answer</th>
                    <th scope="col">Solution</th>
                    
                </tr>
            </thead>
            <tbody>
            <?php
            while($row = $result->fetch_assoc()){
            echo'   <tr style="font-size: 13px">';
            echo'        <td scope="row"><b>'.$row['mcq_id'].'</b></td>';
            echo'        <td>'.$row['chap_id'].'</td>';
            echo'        <td>'.$row['question'].'</td>';
            echo'        <td>'.$row['option_1'].'</td>';
            echo'        <td>'.$row['option_2'].'</td>';
            echo'        <td>'.$row['option_3'].'</td>';
            echo'        <td>'.$row['option_4'].'</td>';
            echo'        <td>'.$row['answer'].'</td>';
            echo'        <td>'.$row['solution'].'</td>';             
            echo'        </tr>';
            }?>
            </tbody>
        </table>
        </div>
        <?php 
        }else {
            echo '<form method="POST" action="../chapters.php">';
            echo "Opps! You haven't attempted any question yet.<br/>";
            echo '<input type="submit" class="btn btn-success" value="Attempt Now."></input>';
            echo '</form>';
        } ?>
    </div>
</div>
</div>
</div>
</div>
<!--div row close from header-->
</div>
<!--div container-fluid close from header-->





<!--Start footer-->
<?php
    include "../student/studentInclude/studentFooter.php";
?> 

<!--End footer-->