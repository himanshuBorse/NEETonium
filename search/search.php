<?php

$conn = mysqli_connect("localhost", "root", "", "neetmania");

?>


<?php


if (isset($_POST['btnsearch'])) {
    $searchValue = $_POST['search'];
    $con = new mysqli("localhost", "root", "", "neetmania");
    if ($con->connect_error) {
        echo "connection Failed: " . $con->connect_error;
    } else {
        $sql = "SELECT * FROM mcq WHERE ques LIKE '%$searchValue%' OR op1 LIKE '%$searchValue%' OR op2 LIKE '%$searchValue%' OR op3 LIKE '%$searchValue%' OR op4 LIKE '%$searchValue%'";

        $result = $con->query($sql);
        while ($row = $result->fetch_assoc()) {
            echo $row['ques'] . "<br>";
            
        }

      
    }   
}

    if(isset($_POST["btn"])){
        $searchValue= $_POST['btn']; 
        $con = new mysqli("localhost", "root", "", "neetmania");
            if ($con->connect_error) {
                echo "connection Failed: " . $con->connect_error;
            } else {
                $sql = "SELECT * FROM mcq WHERE ques LIKE '%$searchValue%' OR op1 LIKE '%$searchValue%' OR op2 LIKE '%$searchValue%' OR op3 LIKE '%$searchValue%' OR op4 LIKE '%$searchValue%'";

                $result = $con->query($sql);
                while ($row = $result->fetch_assoc()) {
                    
                    ?>
                    <script>
                  // que_text.innerHTML= '<span>+<?php// echo $row['ques']; ?>+</span>';
                   //document.getElementById('questionText').innerHTML= '<span>+<?php// echo $row['ques']; ?>+</span>';
                    
                   let que_tag = '<span>'+ <?php  $row['ques']; ?> +'</span>';
                   que_text.innerHTML = que_tag;
                    option_list.innerHTML = <?php echo $row['op1'];?>
                    
                    </script>
                    <?php
                    
                }

            
    }  
    }



?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../quiz/style.css">
    <title>sreach functionality</title>
</head>
<body>
<form action="" method="POST">
   
    <input type="submit" value="Name" name="btn"><br/>
    <input type="submit" value="Sir" name="btn"><br/>
    <input type="submit" value="Fish" name="btn"><br/>
    <input type="submit" value="Dracula" name="btn"><br/>
    <input type="text" name="search" placeholder="Enter Keyword">
    <input type="submit" value="Search" name="btnsearch"><br/>
    
    
</form>

     <!--start quiz box-->
     <div class="quiz_box">
        <header>
            <div class="title"> The Keyword quiz</div>
        </header>
        <section>
            <div class="que_text"  id="questionText">
            
            </div>
            <div class="option_list">
            
            </div>
        </section>

        <footer>
            <div class="total_que">
            
            </div>
            <button class="next_btn">Next</button>
        </footer>
    </div>


    <!--End quiz box-->
    
</body>
</html>
