<!--start header and sidebar-->
<?php
    include 'header.php';
    include ('dbConnection.php');
?>
<!--End header and sidebar-->

<div class="col-sm-9 mt-5">
<!--table-->
    <p class="bg-dark text-white p-2">List of Couses</p>
    <?php
        $sql = "SELECT * FROM  student";
        $result = $conn->query($sql);
        if($result->num_rows > 0){

    ?>
    <table class="table">
        <thead>
            <tr>
                <th scope="col">Studnet ID</th>
                <th scope="col">Name</th>
                <th scope="col">Email</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
        <?php
        while($row = $result->fetch_assoc()){
            
         echo '  <tr>';
         echo '     <th scope="row">'.$row['stu_id'].'</th>';
         echo '     <td>'.$row['stu_name'].'</td>';
         echo '     <td>'.$row['stu_email'].'</td>';
         echo '    <td>
                   <form method="POST" action="editCourse.php" class="d-inline">
                   <input type="hidden" name="id" value='.$row["stu_id"].'> 
                    <button
                    type="submit"
                    class="btn btn-info mr-3"
                    name="view"
                    value="View"
                   >
                   <i class="fas fa-pen"></i>
                   </button> 
                    </form>

                   <form method="POST" class="d-inline" >
                   <input type="hidden" name="id" value='.$row["stu_id"].'> 
                   <button
                    type="submit"
                    class="btn btn-secondary"
                    name="delete"
                    value="Delete"
                   >
                   <i class="far fa-trash-alt"></i>
                   </button>
                   </form>
                </td>
            </tr>';
           }?>
        </tbody>
    </table>
    <?php
        }else{
            echo "0 Result";
        }

        if(isset($_REQUEST['delete'])){
            $sql = "DELETE FROM course WHERE course_id = {$_REQUEST['id']}";
            if($conn->query($sql) == TRUE){
                echo '<meta http-equiv="refresh" content = "0;URL=?deleted"/>';
        }else{
            echo "Unable to Delete Data";
            }
        }
    ?>

</div>
</div>

<!--div row close from header-->
<div>
    <a class="btn btn-danger box" href="./addCourse.php">
        <i class="fas fa-plus fa-2x"></i>
    </a>
</div>
</div>
<!--div container-fluid close from header-->


<!--start footer-->
<?php
    include 'footer.php';
?>
<!--End footer-->