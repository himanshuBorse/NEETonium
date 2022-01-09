//re structuring the code and implementation

//selecting start button
const start_btn = document.querySelector(".start_btn ");
const info_box = document.querySelector(".info_box");
const exit_btn = document.querySelector(".buttons .quit");
const continue_btn = document.querySelector(".buttons .restart")
const quiz_box = document.querySelector(".quiz_box");
const option_list = document.querySelector(".option_list");
const report_btn = document.querySelector(".report");

const next_btn = document.querySelector("footer .next_btn");

// if startQuiz button  clicked
start_btn.onclick = () => {
    console.log("clicked");
    info_box.classList.add("activeInfo"); //show info box
}

//if exitQuiz button clicked
exit_btn.onclick = () => {
    console.log("exit clicked");
    info_box.classList.remove("activeInfo"); //hide info Box
}

//if continueQuiz button clicked
continue_btn.onclick = () => {
    console.log("continue clicked");
    info_box.classList.remove("activeInfo"); //hide info box
    quiz_box.classList.add("activeQuiz"); //show quiz box
    showQuestion(); //calling showQuestion function to display question
}

//if report button clicked
report_btn.onclick = () => {
    console.log("report clicked");
    // report_btn.classList.add("disabled");
    report_btn.setAttribute("disabled", true);
    //report_btn.classList.remove("btn-danger");
    //report_btn.classList.add("btn-success");
    report_btn.setAttribute("value", "Reported");
    reportQuestion(window.mcq_id);

}

//if next button clicked showQuestioni function is called
next_btn.onclick = () => {
    report_btn.setAttribute("value", "Report");
    //report_btn.classList.remove("btn-success");
    //report_btn.classList.remove("disabled");
    report_btn.removeAttribute("disabled", false);
    report_btn.classList.add("btn-danger");
    showQuestion();
}



//getting question from database
function showQuestion() {
    const que_text = document.querySelector(".que_text");
    const chap_text = document.querySelector(".chap_text").textContent;
    console.log(chap_text);

    $.ajax({
        url: "../quiz/data.php",
        method: "POST",
        dataType: 'json',
        data: {
            chapter: chap_text
        },
        success: function(data) {

            console.log(data.length);
            if (data.length > 0) {
                for (var a = 0; a < data.length; a++) {
                    window.mcq_id = data[a].mcq_id;
                    var mcq_stu_id = data[a].stu_id;

                    var question = data[a].question;
                    var option1 = data[a].option_1;
                    var option2 = data[a].option_2;
                    var option3 = data[a].option_3;
                    var option4 = data[a].option_4;
                    window.answer = data[a].answer;
                    console.log(answer);


                    let que_tag = '<span>' + question + '</span>';

                    let option_tag = '<div class="option" value="1"><span>' + option1 + '</span></div>' +
                        '<div class="option" value="2"><span>' + option2 + '</span></div>' +
                        '<div class="option" value="3"><span>' + option3 + '</span></div>' +
                        '<div class="option" value="4"><span>' + option4 + '</span></div>';

                    que_text.innerHTML = que_tag;
                    option_list.innerHTML = option_tag;
                    showStudentName(mcq_stu_id);

                    const option = option_list.querySelectorAll(".option");

                    //setting onclick attribute to all avialable option

                    for (i = 0; i < option.length; i++) {
                        option[i].setAttribute("onclick", "optionSelected(this)");
                    }
                }
            } else {
                let que_tag = "Opps NO question is uploaded for this chapter";
                que_text.innerHTML = que_tag;
            }
        }

    });

}
//displaying the name of the student who have uploaded the question in footer
function showStudentName(id) {
    $.ajax({
        url: "quizAjax.php",
        method: "POST",
        data: {

            mcq_stu_id: id

        },
        success: function(data) {
            var html = "";
            var stu_name = data;
            const footer_stu_name = document.querySelector(".stu_name");
            let name_tag = '<span>' + stu_name + '</span>';
            footer_stu_name.innerHTML = name_tag;

        }
    });


}

//creating the new div tags for coreect incorrect icons in option
let tickIconTag = '<div class="icon tick"><i class="fas fa-check"></i></div>';
let crossIconTag = '<div class="icon cross"><i class="fas fa-times"></i></div>'


//if user clicked on any option
function optionSelected(selectedAnswer) {
    let userAns = selectedAnswer.getAttribute("value", "optionSelected(this)"); //getting the user selected option
    let correctAns = window.answer; //getting the correct answer from database

    const allOptions = option_list.children.length; //getting all option items

    if (userAns == correctAns) { //checking user answer and correct answer
        console.log("correct answer");
        selectedAnswer.classList.add("correct"); //adding green color to correct selected answer
        selectedAnswer.insertAdjacentHTML("beforeend", tickIconTag); //adding tick icon to the correct selected option
        updateCorrectAttempt(window.mcq_id); // calling function for storing the correct attempt in database
    } else {
        console.log("incorrect Attempt");
        selectedAnswer.classList.add("incorrect"); //adding red color to incorrect selected answer
        selectedAnswer.insertAdjacentHTML("beforeend", crossIconTag); //adding cross icon to the incorrect selected option
        updateIncorrectAttempt(window.mcq_id); // calling function for storing the Incorrect attempt in database
        for (i = 0; i < allOptions; i++) {
            if (option_list.children[i].getAttribute("value") == correctAns) {
                option_list.children[i].setAttribute("class", "option correct"); //adding green color to matched option
                option_list.children[i].insertAdjacentHTML("beforeend", tickIconTag); //adding tick icon to mathced option
                console.log("Auto selected correct answer");
            }
        }

    }
    for (i = 0; i < allOptions; i++) {
        option_list.children[i].classList.add("disabled"); //once user select one option all other option get disabled            
    }
    next_btn.classList.add("show"); //show next button after user attempts the question
}


//if attempt is correct then adding its details in database
function updateCorrectAttempt(mcq_id) {

    $.ajax({

        url: "quizAjax.php",
        method: "POST",
        data: {
            correct_attempt_mcq_id: mcq_id
        },
        success: function(data) {
            console.log(data);

        }
    });
}

//if attempt is incorrect then adding its details in database
function updateIncorrectAttempt(mcq_id) {

    $.ajax({

        url: "quizAjax.php",
        method: "POST",
        data: {
            incorrect_attempt_mcq_id: mcq_id
        },
        success: function(data) {
            console.log(data);

        }
    });


}
//if report button is clicked then updating the details in reportquestion detail
function reportQuestion(mcq_id) {
    console.log("are bhai report karega tu abh");
    $.ajax({
        url: "quizAjax.php",
        method: "POST",
        data: {
            report_mcq_id: mcq_id
        },
        success: function(response) {
            console.log(response);
        }
    });
}

//get the count of total question and append to chapter card
function countChapterQuestion(name){
    console.log(name);
}