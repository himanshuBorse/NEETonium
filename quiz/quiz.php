
<?php


//start header
include "../resources/mainInclude/header.php";

//end header
?>

 
<?php
if (!isset($_SESSION['is_login']))
{
 
     echo '<script>
     
            alert("Login is required");
            location.href = "http://localhost:8080/NEETonium/index.php";
            
            </script>';
}
else
{
    $stuLogID = $_SESSION['stuLogID'];
    $chapter = $_GET['q'];
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">

    <title>Quiz</title>
    <link rel="stylesheet" href="style.css">

</head>
<body>
    <!-- start Quiz button -->
    <div class="start_btn"><button>Start Quiz</button></div>

    <!-- Info Box -->
    <div class="info_box">
        <div class="info-title"><span>Some Rules of this Quiz</span></div>
        <div class="info-list">
            <div class="info">1. You will have only <span>15 seconds</span> per each question.</div>
            <div class="info">2. Once you select your answer, it can't be undone.</div>
            <div class="info">3. You can't select any option once time goes off.</div>
            <div class="info">4. You can't exit from the Quiz while you're playing.</div>
            <div class="info">5. You'll get points on the basis of your correct answers.</div>
        </div>
        <div class="buttons">
            <button class="quit">Exit Quiz</button>
            <button class="restart">Continue</button>
        </div>
    </div>

    <!-- Quiz Box -->
    <div class="quiz_box">
        <header>
            
                <div class="chap_text" ><?php echo $chapter;?></div>
                <div>Questions~ 15</div>
            
            <div class="timer">
                <div class="time_left_txt">Time Left</div>
                <div class="timer_sec">20</div>
            </div>
            <form>
                <input type="button" class="report btn btn-danger"  value="Report"></button>
            </form>
            <div class="time_line"></div>
        </header>
        <section>
            <div class="que_text">
                <!-- Here I've inserted question from JavaScript -->
            </div>
            <div class="option_list">
                <!-- Here I've inserted options from JavaScript -->
            </div>
        </section>

        <!-- footer of Quiz Box -->
        <footer>
           <!-- <div class="total_que">
                 Here I've inserted Question Count Number from JavaScript 
            </div>-->
            
           <span class="stu_name"></span>
            
            
            <button class="next_btn">Next Que</button>
            <button class="end_btn">Finish</button>

            
        </footer>
    </div>

    <!-- Result Box -->
    <div class="result_box">
        <div class="icon">
            <i class="fas fa-crown"></i>
        </div>
        <div class="complete_text">You've Finised the Quiz!</div>
        <div class="score_text">
            <!-- Here I've inserted Score Result from JavaScript -->
        </div>
        <div class="buttons">
            <button class="restart">Replay Quiz</button>

            <button class="quit">Quit Quiz</button>
        </div>
    </div>

    <!-- Inside this JavaScript file I've inserted Questions and Options only -->
    <!--<script src="js/questions.js"></script>-->

    <!-- Inside this JavaScript file I've coded all Quiz Codes -->
    <script src="js/script2.js"></script>

</body>
</html>

<!-- //include "../resources/mainInclude/footer.php";
<script src = "https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script> -->  
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="http://localhost:8080/NEETonium/resources/js/adminAjaxRequest.js"></script>
        <script src="http://localhost:8080/NEETonium/resources/js/ajaxRequest.js"></script>
        
         
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
