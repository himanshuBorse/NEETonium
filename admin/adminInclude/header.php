<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <title>Dashboard</title>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
       
    <!--font awesome css-->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">

    <!--Google Font-->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Ubuntu:wght@700&display=swap" rel="stylesheet">

    <!--Custom CSS-->
    <link rel="stylesheet" href="../resources/css/custom.css">
    
</head>
<body>
    <!--top navbar-->
    <nav class="navbar navbar-dark fixed-top p-0
     shadow" style="background-color: #225470;">
    <a class="navbar-brand col-sm-3 col-md-2 mr-0"
    href="adminDashboard.php">NEETonium <small
    class="text-white ">   Admin area</small></a>
    </nav>

    
    <!--sidebar-->
    <div class="container-fluid mb-5"
    style="margin-top: 80px;">
        <div class="row">
            <nav class="col-sm-3 col-md-2 bg-light sidebar py-5
            d-print-none ">
                <div class="sidebar-sticky">
                    <ul class="nav flex-column">
                        <li class= "nav-item">
                            <a class="nav-link" href="adminDashboard.php">
                                <i class="fas fa-tachometer-alt"></i>
                                DashBoard
                            </a>
                        </li>
                        <li class= "nav-item">
                            <a class="nav-link" href="courses.php">
                                <i class="fab fa-accessible-icon"></i>
                                Reports
                            </a>
                        </li>
                        
                        <li class= "nav-item">
                            <a class="nav-link" href="./adminInclude/studentDetails.php">
                                <i class="  "></i>
                                Students
                            </a>
                        </li>
                        <li class= "nav-item">
                            <a class="nav-link" href="#">
                                <i class="fa fa-comments"></i>
                                Messages
                            </a>
                        </li>
                        <li class= "nav-item">
                            <a class="nav-link" href="#">
                                <i class="fa fa-key"></i>
                                Change Password
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
    
</body>
</html>