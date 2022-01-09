<?php
include "../resources/mainInclude/dbConnection.php";
try{
   if(!isset($_SESSION)){
       session_start();
   }
}
catch(Exception $ex){
    throw new Exception("Opps! Something went wrong.", $ex);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
       
       
        <link rel="preconnect" href="https://fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css2?family=Ubuntu:wght@700&display=swap" rel="stylesheet">

        <link rel="stylesheet" href="http://localhost:8080/NEETonium/resources/css/custom.css">
        
        
         
    </head>
<body>
    <!--top navbar-->
    <nav class="navbar navbar-dark fixed-top p-0
     shadow" style="background-color: #225470;">
    <a class="navbar-brand col-sm-3 col-md-2 mr-0"
    href="../index.php">NEETonium<small
    class="text-white"></small></a>
    </nav>

    <!--sidebar-->
    <div class="container-fluid mb-5"
    style="margin-top: 40px;">
        <div class="row">
            <nav class="col-sm-3 col-md-2 bg-light sidebar py-5
            d-print-none ">
                <div class="sidebar-sticky">
                    <ul class="nav flex-column">
                        <li class= "nav-item">
                            <a class="nav-link" href="http://localhost:8080/NEETonium/index.php">
                                <i class="fas fa-home"></i>
                                Home
                            </a>
                        </li>
                        <li class= "nav-item">
                            <a class="nav-link" href="../student/studentDashboard.php">
                                <i class="fas fa-tachometer-alt"></i>
                                DashBoard
                            </a>
                        </li>
                        
                        <li class= "nav-item">
                            <a class="nav-link" href="../uploadQuestion/uploadQuestion.php">
                                <i class="fas fa-plus-circle"></i>
                                Add Question
                            </a>
                        </li>
                        
                        <li class= "nav-item">
                            <a class="nav-link" href="#">
                            <i class="fab fa-expeditedssl"></i>
                                Change Password
                            </a>
                        </li>
                        <li class= "nav-item">
                            <a class="nav-link" href="../student/reportedQuestion.php">
                            <i class="fas fa-exclamation-circle"></i>
                                Question Report
                                <span class="badge badge-danger">
                                    <!-- the count of total question reported of the student -->
                                    <?php
                                    
                                        //taking count of reported question of the logined user from the database
                                        $sql = "SELECT * FROM questionreport INNER JOIN mcq ON mcq.mcq_id=questionreport.mcq_id WHERE mcq.stu_id = ? ";
                                        $stmt = $conn->prepare($sql);
                                        $stmt ->bind_param("i", $stuLogID);
                                        $stmt->execute();
                                        $result = $stmt->get_result();
                                        $reportedQuestionCount = $result->num_rows;
                                        echo $reportedQuestionCount;
  
                                    ?>
                                </span>
                            </a>
                        </li>
                        <li class= "nav-item">
                            <a class="nav-link" href="../logout.php">
                                <i class="fas fa-sign-out-alt"></i>
                                Logout
                            </a>
                        </li>
                        
                    </ul>
                </div>
            </nav>