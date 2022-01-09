<?php
try{
session_start();
session_destroy();
echo "<script> location.href = 'http://localhost:8080/NEETonium/index.php';</script>";
}
catch(Exception $ex){
    throw new Exception("Opps! something went wrong.", $ex);
}
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

?>