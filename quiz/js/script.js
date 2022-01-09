
//selecting all required elements
const start_btn = document.querySelector(".start_btn button");
const info_box = document.querySelector(".info_box");
const exit_btn = info_box.querySelector(".buttons .quit");
const continue_btn = info_box.querySelector(".buttons .restart");
const quiz_box = document.querySelector(".quiz_box");
const result_box = document.querySelector(".result_box");
const option_list = document.querySelector(".option_list");
const time_line = document.querySelector("header .time_line");
const timeText = document.querySelector(".timer .time_left_txt");
const timeCount = document.querySelector(".timer .timer_sec");

// if startQuiz button clicked
start_btn.onclick = ()=>{
    info_box.classList.add("activeInfo"); //show info box
}

// if exitQuiz button clicked
exit_btn.onclick = ()=>{
    info_box.classList.remove("activeInfo"); //hide info box
}

// if continueQuiz button clicked
continue_btn.onclick = ()=>{
    info_box.classList.remove("activeInfo"); //hide info box
    quiz_box.classList.add("activeQuiz"); //show quiz box
    showQuetions(0); //calling showQestions function
    //queCounter(1); //passing 1 parameter to queCounter
    startTimer(20); //calling startTimer function
    startTimerLine(0); //calling startTimerLine function
}

let timeValue =  20;
let que_count = 0;
let que_numb = -1;
let userScore = 0; 
let counter;
let counterLine;
let widthValue = 0;

let correct_count = 0;
let incorrect_count = 0;


const restart_quiz = result_box.querySelector(".buttons .restart");
const quit_quiz = result_box.querySelector(".buttons .quit");



// if restartQuiz button clicked
restart_quiz.onclick = ()=>{
    quiz_box.classList.add("activeQuiz"); //show quiz box
    result_box.classList.remove("activeResult"); //hide result box
    timeValue = 20; 
    que_count = 0;
    que_numb = 1;
    userScore = 0;
    widthValue = 0;
    showQuetions(); //calling showQestions function
    //queCounter(que_numb); //passing que_numb value to queCounter
    clearInterval(counter); //clear counter
    clearInterval(counterLine); //clear counterLine
    startTimer(timeValue); //calling startTimer function
    startTimerLine(widthValue); //calling startTimerLine function
    timeText.textContent = "Time Left"; //change the text of timeText to Time Left
    next_btn.classList.remove("show"); //hide the next button
    end_btn.classList.remove("show"); //hide the finish button
}

// if quitQuiz button clicked
quit_quiz.onclick = ()=>{
    window.location.reload(); //reload the current window
}

const next_btn = document.querySelector("footer .next_btn");
const end_btn = document.querySelector("footer .end_btn");
const bottom_ques_counter = document.querySelector("footer .total_que");


// if End button clicked show result
end_btn.onclick = ()=>{
    showResult();
}

// if Next Que button clicked
next_btn.onclick = ()=>{
    /*if(que_count < questions.length - 1){ *///if question count is less than total question length
        que_count++; //increment the que_count value
        que_numb++; //increment the que_numb value
        showQuetions(); //calling showQestions function
        //queCounter(que_numb); //passing que_numb value to queCounter
        clearInterval(counter); //clear counter
        clearInterval(counterLine); //clear counterLine
        startTimer(timeValue); //calling startTimer function
        startTimerLine(widthValue); //calling startTimerLine function
        timeText.textContent = "Time Left"; //change the timeText to Time Left
        next_btn.classList.remove("show"); //hide the next button
        end_btn.classList.remove("show");
    /*}else{
        clearInterval(counter); //clear counter
        clearInterval(counterLine); //clear counterLine
        showResult(); //calling showResult function
    }*/
}

// getting questions and options from array
function showQuetions(){
    const que_text = document.querySelector(".que_text");

    var ajax = new XMLHttpRequest();
    var method = "get";
    var url = "../quiz/data.php";
    var asynchronous = true;

    ajax.open(method, url, asynchronous);

    ajax.send();

    ajax.onreadystatechange = function(){
        if(this.readyState == 4 && this.status == 200){
            var data = JSON.parse(this.responseText);
            

            var html = "";

            for(var a=0; a<data.length; a++)
            {
               // var id = data[a].id;
                var question = data[a].question;
                var option1 = data [a].option_1;
                var option2 = data [a].option_2;
                var option3 = data [a].option_3;
                var option4 = data [a].option_4;
                window.ans = data[a].answer;

                let que_tag = '<span>'+ question +'</span>';

                let option_tag = '<div class="option" value="1"><span>'+ option1 +'</span></div>'
                                + '<div class="option" value="2"><span>'+ option2 +'</span></div>'
                                + '<div class="option" value="3"><span>'+ option3 +'</span></div>'
                                + '<div class="option" value="4"><span>'+ option4 +'</span></div>';

             que_text.innerHTML = que_tag;
             option_list.innerHTML = option_tag; 

             const option = option_list.querySelectorAll(".option");

    // set onclick attribute to all available options
    for(i=0; i < option.length; i++){
        option[i].setAttribute("onclick", "optionSelected(this)");
    }
                           
            }
            //document.getElementsByClassName("que_text").innerHTML = que_tag; 
           //adding new span tag inside que_tag
           //adding new div tag inside option_tag
                       
        }
    
    }

    //creating a new span and div tag for question and option and passing the value using array index
 
}
// creating the new div tags which for icons
let tickIconTag = '<div class="icon tick"><i class="fas fa-check"></i></div>';
let crossIconTag = '<div class="icon cross"><i class="fas fa-times"></i></div>';

//if user clicked on option
function optionSelected(answer){
    
    
    clearInterval(counter); //clear counter
    clearInterval(counterLine); //clear counterLine
    let userAns = answer.getAttribute("value", "optionSelected(this)"); //getting user selected options
    console.log(userAns);
    let correcAns = window.ans; //getting correct answer from array
    const allOptions = option_list.children.length; //getting all option items
    
    if(userAns == correcAns){ //if user selected option is equal to array's correct answer
        correct_count += 1;//counting correct attempts
        
        userScore += 1; //upgrading score value with 1
        answer.classList.add("correct"); //adding green color to correct selected option
        answer.insertAdjacentHTML("beforeend", tickIconTag); //adding tick icon to correct selected option
       // console.log("Correct Answer");
        console.log("Correct count" + correct_count);
      //  console.log("Your correct answers = " + userScore);
    }else{
        incorrect_count += 1;//counting incorrect attempts
        answer.classList.add("incorrect"); //adding red color to correct selected option
        answer.insertAdjacentHTML("beforeend", crossIconTag); //adding cross icon to correct selected option
        //console.log("Wrong Answer");
        console.log("InCorrect count" + incorrect_count);
        

        for(i=0; i < allOptions; i++){
           // if(option_list.children[i].getAttribute("value", "optionSelected(this)") == correcAns){ //if there is an option which is matched to an array answer 
           if(option == correcAns){ 
                option_list.children[i].setAttribute("class", "option correct"); //adding green color to matched option
                option_list.children[i].insertAdjacentHTML("beforeend", tickIconTag); //adding tick icon to matched option
                console.log("Auto selected correct answer.");
            }
        }
    }
    for(i=0; i < allOptions; i++){
        option_list.children[i].classList.add("disabled"); //once user select an option then disabled all options
    }
    next_btn.classList.add("show"); //show the next button if user selected any option
    end_btn.classList.add("show");
}

function showResult(){
    info_box.classList.remove("activeInfo"); //hide info box
    quiz_box.classList.remove("activeQuiz"); //hide quiz box
    result_box.classList.add("activeResult"); //show result box
    const scoreText = result_box.querySelector(".score_text");
    if (userScore > 3){ // if user scored more than 3
        //creating a new span tag and passing the user score number and total question number
        let scoreTag = '<span>and congrats! 🎉, You got <p>'+ correct_count +'</p> out of <p>'+ incorrect_count +'</p></span>';
        scoreText.innerHTML = scoreTag;  //adding new span tag inside score_Text
    }
    else if(userScore > 1){ // if user scored more than 1
        let scoreTag = '<span>and nice 😎, You got <p>'+ correct_count +'</p> out of <p>'+ incorrect_count +'</p></span>';
        scoreText.innerHTML = scoreTag;
    }
    else{ // if user scored less than 1
        let scoreTag = '<span>and sorry 😐, You got only <p>'+ correct_count +'</p> out of <p>'+ incorrect_count +'</p></span>';
        scoreText.innerHTML = scoreTag;
    }
}

function startTimer(time){
    counter = setInterval(timer, 1000);
    function timer(){
        timeCount.textContent = time; //changing the value of timeCount with time value
        time--; //decrement the time value
        if(time < 9){ //if timer is less than 9
            let addZero = timeCount.textContent; 
            timeCount.textContent = "0" + addZero; //add a 0 before time value
        }
        if(time < 0){ //if timer is less than 0
            clearInterval(counter); //clear counter
            timeText.textContent = "Time Off"; //change the time text to time off
            const allOptions = option_list.children.length; //getting all option items
            let correcAns = window.ans; //getting correct answer from array
            for(i=0; i < allOptions; i++){
                if(option_list.children[i].textContent == correcAns){ //if there is an option which is matched to an array answer
                    option_list.children[i].setAttribute("class", "option correct"); //adding green color to matched option
                    option_list.children[i].insertAdjacentHTML("beforeend", tickIconTag); //adding tick icon to matched option
                    console.log("Time Off: Auto selected correct answer.");
                }
            }
            for(i=0; i < allOptions; i++){
                option_list.children[i].classList.add("disabled"); //once user select an option then disabled all options
            }
            next_btn.classList.add("show"); //show the next button if user selected any option
            end_btn.classList.add("show");
        }
    }
}
function startTimerLine(time){
    counterLine = setInterval(timer, 40);
    function timer(){
        time += 3; //upgrading time value with 1
        time_line.style.width = time + "px"; //increasing width of time_line with px by time value
        if(time > 1000){ //if time value is greater than 549
            clearInterval(counterLine); //clear counterLine
        }
    }
}

/*
function queCounter(index){
    //creating a new span tag and passing the question number and total question
    let totalQueCounTag = '<span><p>'+ index +'</p> of <p>'+ questions.length +'</p> Questions</span>';
    bottom_ques_counter.innerHTML = totalQueCounTag;  //adding new span tag inside bottom_ques_counter
}*/