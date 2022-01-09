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
                    <!-- <a class="btn text-white far fa-eye fa-2x" id="viewIncorrectAttemptBtn" href="../student/viewIncorrectAttempt.php"></a> -->
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
    <!--    <p class="bg-dark text-white p-2"> Course Ordered</p>
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
                    <th scope="col">Action </th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <th scope="row">22</th>
                    <td>100</td>
                    <td>sonam@gmail.com</td>
                    <td>20/10/2020</td>
                    <td>2000</td>
                    <td>
                        <button type="submit" class="btn btn-secondary" name="delete" value="delete">
                            <i class="fas fa-trash-alt"></i>
                        </button>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>-->
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