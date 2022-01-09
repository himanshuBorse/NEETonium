$(document).ready(function() {


    //ajax  call form already exists email verifacation
    $("#stuemail").on("blur", function() {
        var reg = /^[A-Z0-9._%+-]+@([A-Z0-9-]+\.)+[A-Z]{2,4}$/i;
        var stuemail = $("#stuemail").val();
        $.ajax({
            url: "./Student/addStudent.php",
            method: "POST",
            data: {
                checkemail: "checkmail",
                stuemail: stuemail,
            },
            success: function(data) {
                console.log(data);
                if (data != 0) {
                    $("#statusMsg2").html('<small style="color:red;">Email ID alreay used !</small>');
                    $("#registration").attr("disabled", true);
                } else if (data == 0 && reg.test(stuemail)) {
                    $("#statusMsg2").html('<small style="color:green;">There You Go !</small>');
                    $("#registration").attr("disabled", false);
                } else if (!reg.test(stuemail)) {
                    $("#statusMsg2").html('<small style="color:red;">Please Enter Email In Appropriate Format e.g. example@mail.com !</small>');
                    $("#registration").attr("disabled", true);
                }
                if (stuemail == "") {
                    $("#statusMsg2").html('<small style="color:red;">Please Enter Email</small>');
                }
            },
        });
    });



    //ajax call for inserting student registration data
    const regi_btn = document.querySelector("#registration");
    regi_btn.onclick = () => {

        var reg = /^[A-Z0-9._%+-]+@([A-Z0-9-]+\.)+[A-Z]{2,4}$/i;
        var stuname = $("#stuname").val();
        var stuemail = $("#stuemail").val();
        var stupass = $("#stupass").val();

        //Checking form field on form submission
        if (stuname.trim() == "") {
            $("#statusMsg1").html("<small style= 'color: red;'>Please Enter Name !</small>");
            $("#stuname").focus();
            return false;
        } else if (stuemail.trim() == "") {
            $("#statusMsg2").html("<small style= 'color: red;'>Please Enter Email !</small>");
            $("#stuemail").focus();
            return false;
        } else if (stuemail.trim() != "" && !reg.test(stuemail)) {
            $("#statusMsg2").html("<br/><small style= 'color: red;'>Please Enter Email In Appropriate Format e.g. example@mail.com </small>");
            $("#stuemail").focus();
            return false;

        } else if (stupass.trim() == "") {
            $("#statusMsg3").html("<small style= 'color: red;'>Please Enter Password !</small>");
            $("#stupass").focus();
            return false;
        } else {
            $.ajax({
                url: './student/addStudent.php',
                method: 'post',
                dataType: "json",

                data: {
                    stuname: stuname,
                    stuemail: stuemail,
                    stupass: stupass
                },
                success: function(data) {
                    console.log(data);
                    if (data == "OK") {
                        $("#successmsg").html("<span class='alert alert-success'>Registration Successfull ! </span>");
                        clearStuRegField();
                    } else if (data == "FAILED") {
                        $("#successmsg").html("<span class='alert alert-dnager'>Unable to Register ! </span>");
                    }

                }
            });
        }

    }

    //Empty all fiels
    function clearStuRegField() {

        $("#stuRegForm").trigger("reset");
        $("#statusMsg1").remove("");
        $("#statusMsg2").remove("");
        $("#statusMsg3").remove("");
    }


    //ajax call for student login varfication
    const login_btn = document.querySelector("#stuLoginBtn");
    login_btn.onclick = () => {
        var stuLogEmail = $("#stuLogemail").val();
        var stuLogPass = $("#stuLogpass").val();
        $.ajax({
            url: "./student/addStudent.php",
            method: "POST",
            data: {
                checkLogemail: "checklogmail",
                stuLogEmail: stuLogEmail,
                stuLogPass: stuLogPass,
            },
            success: function(data) {
                if (data == 0) {
                    $("#statusLogMsg").html('<small class="alert alert-danger">Invalid Email ID or Password ! </small>');
                } else if (data == 1) {
                    $("#statusLogMsg").html('<small class="spinner-grow text-success" role="status"></small>');
                    setTimeout(() => {
                        window.location.href = "index.php";
                    }, 1000);
                }
            },
        });
    }




});


//ajax call for adding chapters name in uploadQuestion.php
$(document).ready(function() {

    
    
    

    //////////////////////////////////////////
      //jquery for changing bahaviour of checkbox into radio button
    $('input[type="checkbox"],[name="answer"] ').on('change', function() {
        $('input[type="checkbox"],[name="answer"]').each(function() {
            $(this).prop('checked', false);
        });
        $(this).prop('checked', true);

    });

    //ajax call for getting the selected answer for the given question 
    $("input[type='radio'],[name='standard']").on('change', function() {
        var standard = $("input[name='standard']:checked").val();
        var subject = $("input[name='subject']:checked").val();

        $.ajax({
            url: "./upload.php",
            method: "POST",
            data: {
                checkChapter: "checkChapter",
                subject: subject,
                standard: standard,
            },
            success: function(response) {

                $('#subjectChapters').html(response);


            },

        });

    });



    /// getting the selected id of the option for chapters
    $("#subjectChapters").on('change', function() {
        var subchap = document.getElementById("subjectChapters");
        window.chap_id = subchap.options[subchap.selectedIndex].id;

        //getting the value to selected checkbox for answer
        $('#answer').click(function() {
            var answer = $('input[type="checkbox"]:checked').val(); // $(':checkbox:checked')
            console.log(answer); // $(this).val()

        }); 




    });


    $("#chapterTabs").on('click', '#chapTabs a',function (){
        var txt = $(this).text();
        console.log(this);
        //$(this).toggleClass("bg-danger");
        //$(this).css("background-color", "red");
       // $(this).addClass("bg-primary");
      //  showChapter(event, txt);
        
    });
    
   
   
   //function to show the chpater tabs  on selecting startand
    function showChapter(evt, chapter) {
        //console.log(chapter);
        
        var chapterTab = chapter+"Standard";
         //console.log(chapterTab);
        var standardTab = document.getElementById(chapterTab);  

        var i, tabcontent, tablinks;
        tabcontent = document.getElementsByClassName("tabcontent");
        for (i = 0; i < tabcontent.length; i++) {
          tabcontent[i].style.display = "none";
        }
        tablinks = document.getElementsByClassName("tablinks");
        for (i = 0; i < tablinks.length; i++) {
          tablinks[i].className = tablinks[i].className.replace(" active ", "");
          //standardTab.classList.remove("bg-warning");
          
        }
        document.getElementById(chapter).style.display = "block";
        
        evt.currentTarget.className += " active ";
        //evt.currentTarget.className.replace("", " active ");
         
        
        //console.log(standardTab);
        //standardTab.classList.add("bg-warning");
        //$(this).addClass("bg-info");
        //console.log(this);
      }

    //   function showChapter(standard) {
    //     console.log(standard);
    //     var standardTab = document.getElementById(standard);
    //     standardTab.setAttribute("class", "btn-warning");
        

    //   }



    // set content on click
$('.tablinks').click(function(e) {
    e.preventDefault();
    setContent($(this));
});

// set content on load
$('.tablinks.active').length && setContent($('.tablinks.active'));

function setContent($el) {
    $('.tablinks').removeClass('active bg-warning');
    $('.container').hide();

    $el.addClass('active');
    $el.addClass(" bg-warning")
    $($el.data('rel')).show();
}   

    
});

