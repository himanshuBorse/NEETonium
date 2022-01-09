
       <!-- <script src = "https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script> -->  
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="http://localhost:8080/NEETonium/resources/js/adminAjaxRequest.js"></script>
        <script src="http://localhost:8080/NEETonium/resources/js/ajaxRequest.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>

    <!--Start Footer-->
    <footer class="container-fluid p-2 text-center  bg-dark text-white " id="footer">
        <small > Copyright &copy 2021 || Designed by Shanj Technologies ||
        <?php
        if(!isset($_SESSION['is_login'])){
        echo '<button class="btn btn-primary" data-toggle="modal" data-target="#adminLoginModalCenter" >Admin</button>'; 
        } 
       ?>
        || All rihgts are reserved under the name of Shanj Educations.</small>
    </footer>
    <!--End Footer-->

    </body>
</html>
