<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">
        <meta lang="em">
        <meta name="viewport" content="initial-scale=1, minimum-scale=1, width=device-width">
        <title>NEETonium: Free NEET preparation platform</title>
        <meta property="name" content="NEETonium: Free NEET preparation platform">
        <meta  property="description" content="Start your prepartion todya itself with NEETonium. Initial start with the MCQ's.">

        
        <link rel="preconnect" href="https://fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css2?family=Ubuntu:wght@700&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="http://localhost:8080/NEETonium/resources/css/custom.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">      
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
        
    </head>
    <body>
<!--start navigation-->
    <nav class="navbar navbar-expand-lg ">
        <a class="navbar-brand" href="http://localhost:8080/NEETonium/index.php">NEETonium</a>
        <span class="navbar-text">The best is yet to come!</span>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbartogglerDemo" aria-controls="navbarTogglerDemo" aria-expanded="false" aria-;abe;="toggle navigation">
        <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbartogglerDemo">
            <!-- <ul class="nav navbar-nav navbar-center  mr-auto mt-2 mt-lg-0"> -->
            <ul class="nav  navbar-nav  mr-auto mt-2 mt-lg-0">
                
                <li class="nav-item active"><a class="nav-link" href="http://localhost:8080/NEETonium/index.php">Home</a></li>
                <li class="nav-item"><a class="nav-link" href="http://localhost:8080/NEETonium/chapters/physicsChapters.php">Physics</a></li>
                <li class="nav-item"><a class="nav-link" href="http://localhost:8080/NEETonium/chapters/chemistryChapters.php">Chemistry</a></li>
                <li class="nav-item"><a class="nav-link" href="http://localhost:8080/NEETonium/chapters/biologyChapters.php">Biology</a></li>
                <li class="nav-item"><a class="nav-link" href="http://localhost:8080/NEETonium/index.php#contactUs">Contact Us</a></li>
                
            </ul>
            <div class="form-inline my-2 my-lg-0">
            <ul class="nav navbar-nav navbar-right">
        <?php
            try{
                session_start();
            }catch(Exception  $ex){
                throw new Exception("Opps! Something Went Wrong", $ex);
            }
           
            if(isset($_SESSION['is_login'])){
                echo '<li class="nav-item custom-nav-item"><a href="http://localhost:8080/NEETonium//student/studentDashboard.php" class="nav-link">My Profile</a></li>';
                echo '<li class="nav-item custom-nav-item"><a href="http://localhost:8080/NEETonium/logout.php" class="nav-link">Logout</a></li>';
            }else{
                $link = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ?
                "https" : "http") . "://" . $_SERVER['HTTP_HOST'] . 
                $_SERVER['REQUEST_URI'];
                if($link == 'http://localhost:8080/NEETonium/index.php' || $link == 'http://localhost:8080/NEETonium/' ){
                echo '<li class="nav-item"><a class="nav-link" href="#" data-toggle="modal" data-target="#stuRegModalCenter"><span class="fa fa-user"></span> Sign Up</a></li>';
                echo '<li class="nav-item"><a class="nav-link" href="#" id="stuLoginModalBtn" data-toggle="modal" data-target="#stuLoginModalCenter"><span class="fa fa-key"></span> Login</a></li>';
                }
            }


        ?>
        
        
        </ul> 
            </div></div>
        </div>
    </nav>


    <!--Start navigation-->
    <!-- <nav class="navbar navbar-expand-sm bg-dark navbar-dark">
    <div class="container-fluid">

        
        <a class="navbar-brand" href="index.php">NEETonium</a>
        <span class="navbar-text">The best is yet to come!</span>
        
        <ul class="nav navbar-nav">
        <li class="nav-item active"><a class="nav-link" href="http://localhost:8080/NEETonium/index.php">Home</a></li>
        <li class="nav-item"><a class="nav-link" href="http://localhost:8080/NEETonium/chapters.php">Physics</a></li>
        <li class="nav-item"><a class="nav-link" href="http://localhost:8080/NEETonium/chapters.php">Chemistry</a></li>
        <li class="nav-item"><a class="nav-link" href="http://localhost:8080/NEETonium/chapters.php">Biology</a></li>
        <li class="nav-item"><a class="nav-link" href="http://localhost:8080/NEETonium/index.php#contactUs">Contact Us</a></li>
        </ul>
        <ul class="nav navbar-nav navbar-right">
        <?php
            // session_start();
            // if(isset($_SESSION['is_login'])){
            //     echo '<li class="nav-item custom-nav-item"><a href="http://localhost:8080/NEETonium//student/studentDashboard.php" class="nav-link">My Profile</a></li>';
            //     echo '<li class="nav-item custom-nav-item"><a href="http://localhost:8080/NEETonium/logout.php" class="nav-link">Logout</a></li>';
            // }else{
            //     echo '<li class="nav-item"><a class="nav-link" href="#" data-toggle="modal" data-target="#stuRegModalCenter"><span class="fa fa-user"></span> Sign Up</a></li>';
            //     echo '<li class="nav-item"><a class="nav-link" href="http://localhost:8080/NEETonium/loginMoadal.php" id="stuLoginModalBtn" data-toggle="modal" data-target="#stuLoginModalCenter"><span class="fa fa-key"></span> Login</a></li>';
            // }

            // session_start();
            // if(isset($_SESSION['is_login'])){
            //     echo '<li class="nav-item custom-nav-item"><a href="http://localhost:8080/NEETonium//student/studentDashboard.php" class="nav-link">My Profile</a></li>';
            //     echo '<li class="nav-item custom-nav-item"><a href="http://localhost:8080/NEETonium/logout.php" class="nav-link">Logout</a></li>';
            // }else{
            //     $link = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ?
            //     "https" : "http") . "://" . $_SERVER['HTTP_HOST'] . 
            //     $_SERVER['REQUEST_URI'];
            //     if($link == 'http://localhost:8080/NEETonium/index.php'){
            //     echo '<li class="nav-item"><a class="nav-link" href="#" data-toggle="modal" data-target="#stuRegModalCenter"><span class="fa fa-user"></span> Sign Up</a></li>';
            //     echo '<li class="nav-item"><a class="nav-link" href="#" id="stuLoginModalBtn" data-toggle="modal" data-target="#stuLoginModalCenter"><span class="fa fa-key"></span> Login</a></li>';
            //     }
            // }


        ?>
        
        
        </ul>
       
        
    </div>
    </nav> -->
    <!--End navigation-->
