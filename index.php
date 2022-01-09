<!--Start Header-->
<?php
        include "./resources/mainInclude/header.php";
        include "./resources/mainInclude/dbConnection.php";
    ?>

<!--End header-->
<?php
if(isset($_SESSION['is_login'])){
    // $stu_email = $_SESSION['stuLogEmail'];
    // $sql= "SELECT * FROM student WHERE stu_email = '".$stu_email."' ";
    // $result=$conn->query($sql);
    // $data =  mysqli_fetch_array($result);
    // $stuLogID = $data['stu_id'];
    // $_SESSION['stuLogID'] = $stuLogID;
    try{
        $stu_email = $_SESSION['stuLogEmail'];
        $sql = "SELECT * FROM student WHERE stu_email = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("s", $stu_email);
        $stmt->execute();
        $result = $stmt->get_result();
        $data =  mysqli_fetch_array($result);
        $stuLogID = $data['stu_id'];
        $_SESSION['stuLogID'] = $stuLogID;
    }
    catch(Exception $ex){
        throw new Exception($ex);
    }

}

    
?>



    <!--Start Central Banner-->
    <div class="container-fluid content">
        <h1 class="my-content">Welcome To NEETonium</h1>
        <small class="my-content">Freely practice 1000s of questions and upload them for NEET examination</small><br/>
       <?php
        if(!isset($_SESSION['is_login'])){
            echo ' <button class="btn btn-danger mt-3" id="stuRegModalBtn" data-toggle="modal" data-target="#stuRegModalCenter">Start Practicing</button>'; 
         }
         else{
             echo '<a href="./student/studentDashboard.php" class="btn btn-primary mt-3">My Profile</a> ';
             echo '<a href="./uploadQuestion/uploadQuestion.php" class="btn btn-primary mt-3 ">Upload Question</a>';
         }
       ?>
       
    </div>
    <!--End Central Banner-->

    <!--Start Text Banner-->
    <div class="container-fluid text-center text-banner">
        <div class="row bottom-banner">
            <div class="col-sm">
                <h5><i class="fas fa-book-open mr-3 ">Chapter wise Questions.</i></h5>
            </div>
            <div class="col-sm">
                <h5><i class="fas fa-user mr-3 ">Student feeds.</i></h5>
            </div>
            <div class="col-sm">
                <h5><i class="fas fa-keyboard mr-3 ">Lifetime Access.</i></h5>
            </div>
            <div class="col-sm">
                <h5><i class="fas fa-dollar-sign mr-3 ">No Charges.</i></h5>
            </div>
        </div>
    </div>
    <!--End Text Banner-->

    <!--Start Subject cards-->
        <?php
            include "./subjects.php";
        ?>
    <!--End Subject cards-->
    
<!--Start contact us-->
<?php
        include "./contactUs/index.php";
    ?>
<!--Start contact us-->

    <!--Start Social banner-->
    <div class="container-fluid bg-info">
        <div class="row text-white text-center p-1">
            <div class="col-sm">
                <i class="fab fa-twitter"></i>Twitter
            </div>
            <div class="col-sm">
                <i class="fab fa-instagram"></i>Instagram
            </div>
            <div class="col-sm">
                <i class="fab fa-whatsapp"></i>Whatsapp
            </div>
        </div>
    </div>
    <!--End Social banner-->

    <!--Start About Section-->
        <div class="container-fluid p-4"style="background-color: #E9ECEF">
            <div class="container" style="background-color: #E9ECEF">
                <div class="row text-center">
                    <div class="col-sm">
                        <h5>About Us</h5>
                        <p>
                            NEETonium, in its beta version we're providing the Multiple choice question practice for the NEET exam prepration.
                        </p>
                    </div>
                    <div class="col-sm">
                        <h5>Category</h5>
                        <a class="text-dark" href="#">Daily Dose</a><br>
                        <a class="text-dark" href="#">Physics</a><br>
                        <a class="text-dark" href="#">Chemistry</a><br>
                        <a class="text-dark" href="#">Biology</a>
                    </div>
                    <div class="col-sm">
                        <h5>Contact us</h5>
                        <p>www.neetonium.com<br/>neetonium@gmail.com</br>9924133876</p>

                    </div>
                </div>
            </div>
        </div>
    <!--End About Section-->
    



<!--Start Footer-->
<?php
        include "./resources/mainInclude/footer.php";
    ?>
<!--Start Footer-->



  <!--Start Student Regitration Modal-->
        <?php
            include "./student/studentRegistrationForm.php";
        ?>
        <!--End Student Regitration Modal-->


<!--Start Student Login Modal-->
        <!-- Modal -->
        <div class="modal fade" id="stuLoginModalCenter" tabindex="-1" role="dialog" aria-labelledby="stuLoginModalCenterLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="stuLoginsModalCenterLabel">Student Login</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span> 
                </button>
            </div>
            <div class="modal-body">
            <!--Start Student Login Form-->    
            <form id="stuLoginForm">
                <div class="form-group">
                    <i class="fas fa-envelope"></i>
                    <label for="stuLogemail" class="pl-2 font-weight-bold">Email</label>
                    <input type="email" class="form-control" placeholder="Email" name="stuLogemail" id="stuLogemail">
                </div>
                <div class="form-group">
                    <i class="fas fa-key"></i>
                    <label for="stuLogpass" class="pl-2 font-weight-bold"> Password</label>
                    <input type="password" class="form-control" placeholder="Password" name="stuLogpass" id="stuLogpass">
                </div>
            </form>
            <!--End Student Login Form-->
            </div>
            <div class="modal-footer">
                <small id="statusLogMsg"></small>
                <button type="button" id="stuLoginBtn" class="btn btn-primary" >Login</button>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>                
            </div>
            </div>
        </div>
        </div>
        <!--End Student Login Modal-->

           <!--Start Admin Login Modal-->
        <!-- Modal -->
        <div class="modal fade" id="adminLoginModalCenter" tabindex="-1" role="dialog" aria-labelledby="stuLoginModalCenterLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="adminLoginsModalCenterLabel">Admin Login</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
            <!--Start Admin Login Form-->    
            <form id="adminLoginForm">
                <div class="form-group">
                    <i class="fas fa-envelope"></i>
                    <label for="adminLogemail" class="pl-2 font-weight-bold">Email</label>
                    <input type="email" class="form-control" placeholder="Email" name="adminLogemail" id="adminLogemail">
                </div>
                <div class="form-group">
                    <i class="fas fa-key"></i>
                    <label for="adminLogpass" class="pl-2 font-weight-bold"> Password</label>
                    <input type="password" class="form-control" placeholder="Password" name="adminLogpass" id="adminLogpass">
                </div>
            </form>
            <!--End Admin Login Form-->
            </div>
            <div class="modal-footer">
            <small id="statusAdminLogMsg"></small>
                <button type="button" id="adminLoginBtn" class="btn btn-primary">Login</button>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>                
            </div>
            </div>
        </div>
        </div>
        <!--End Admin Login Modal-->