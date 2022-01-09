<?php
    $db_host = "localhost";
    $db_user = "root";
    $db_password = "";
    $db_name = "lms_db";

    //Create Connection
    try{
        $conn = new mysqli( $db_host, $db_user, $db_password, $db_name);
    }
    catch(mysqli_sql_exception $ex){
      throw new Exception("something went wrong ", $ex);
    }

    //Check Connection
    if($conn->connect_error){
        die("Connection Failed");
    }



?>