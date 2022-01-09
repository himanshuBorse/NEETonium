
//ajax call for admin login varfication
$(document).ready(function() {


const login_admin_btn = document.querySelector("#adminLoginBtn");
login_admin_btn.onclick = () => {
    
    var adminLogEmail = $("#adminLogemail").val();
    var adminLogPass = $("#adminLogpass").val();
    $.ajax({
            url: "./admin/admin.php",
            method: "POST",
            data: {
                checkLogemail: "checklogmail",
                adminLogEmail: adminLogEmail,
                adminLogPass: adminLogPass,
            },
            success: function(data){
            if(data == 0){
                $("#statusAdminLogMsg").html('<small class="alert alert-danger">Invalid Email ID or Password ! </small>');
            }
            else if(data == 1){
                $("#statusAdminLogMsg").html('<small class="spinner-grow text-success" role="status"></small>');
                setTimeout(()=>{
                    window.location.href = "./admin/adminDashboard.php";
                }, 1000);
            }
        },
    });
}
});