<x-HeadComponent css="all_course.css"></x-HeadComponent>
<x-HeadComponent css="home_header.css"></x-HeadComponent>
<x-HeadComponent css="styleQuestion.css"></x-HeadComponent>

<body onload="NextQuestion(0)">
    @include('front_end.layouts.header')
    <!-- thoát về trang chủ -->
    <div class="" style="background-color:#74D8C1">
        <div class="container" style="display:flex; padding:10px;justify-content: space-between;">
            <h3>
                <a href="#">Tiếng Anh (600 từ toeic)</a>
                . Hợp Đồng (agreement).
            </h3>
            <a>
                <i class="fa fa-close fa-2x "
                   style="align-self: center; margin-top: 5px; padding-bottom: 0; padding-top: 0; cursor: pointer;">
                </i>
            </a>
        </div>
    </div>
    <div class="all">
        <div class="ad-l ad-l-in-all">
            @include('front_end.layouts.ad_l')
        </div>
        <div class="mainContent">
            <div style="display:flex;justify-content: center;">
                <!-- creating a modal for when quiz ends -->
                <div class="modal-container" id="score-modal">
                    <div class="modal-button-container">
                        <button  style="background-color: rgb(122, 112, 112);" onclick="closeOptionModal()"><i class="fa fa-times"></i></button>
                    </div>
                    <div class="modal-content-container">

                        <h1 style="margin-left:10px; margin-right:10px;">Congratulations,Quiz Completed.</h1>

                        <div class="grade-details">
                            <p>Attempts : <span id="soCauDaHoc"></span></p>
                            <p>Wrong Answers : <span id="wrong-answers"></span></p>
                            <p>Right Answers : <span id="right-answers"></span></p>
                            <p>Grade : <span id="grade-percentage"></span>%</p>
                            <p><span id="remarks"></span></p>
                        </div>
                        <div class="buttonPopUp" style="display:flex; flex-direction:row; justify-content:space-around;background-color:#F1F1F1; width: 100%;border-top: 5px solid red;  border-bottom-left-radius: 25px;border-bottom-right-radius: 25px;">
                            <div class="actionEnd" >
                                <div class="dot"><i class="fa fa-repeat fa-3x "  aria-hidden="true" style="color: #e21f1f;"></i></div>
                                <p>Test Lại</p>
                            </div>
                            <div class="actionEnd">
                                <div class="dot"><i class="fa fa-arrow-circle-right fa-3x" aria-hidden="true" style="color: #e21f1f;"></i></div>
                                <p>Tiếp Tục</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="game-quiz-container">
                    <div class="imgQuestion"><img id="str_imgQuestion" src="" alt="" srcset=""></div>
                    <div class="game-details-container">
                        <h1>Score : <span id="player-score"></span></h1>
                        <h1> Question : <span id="question-number"></span>
                            <span id=questionID></span></h1>
                    </div>
                    <div class="game-question-container">
                        <h1 style="color:black;font-weight: bolder;" id="display-question"></h1>
                    </div>
                    <div class="game-options-container">
                        <div class="modal-container" id="option-modal">
                            <div class="modal-content-container">
                                <h1>Please Pick An Option</h1>
                                <div class="modal-button-container">
                                    <button onclick="closeOptionModal()">Continue</button>
                                </div>
                            </div>
                        </div>
                        <span>
                            <input type="radio" id="option-one" name="option" class="radio chontungcau" value="optionA" />
                            <label for="option-one" class="option" id="option-one-label"></label>
                        </span>
                        <span>
                            <input type="radio" id="option-two" name="option" class="radio chontungcau" value="optionB" />
                            <label for="option-two" class="option" id="option-two-label"></label>
                        </span>
                        <span>
                            <input type="radio" id="option-three" name="option" class="radio chontungcau" value="optionC" />
                            <label for="option-three" class="option" id="option-three-label"></label>
                        </span>
                        <span>
                            <input type="radio" id="option-four" name="option" class="radio chontungcau" value="optionD" />
                            <label for="option-four" class="option" id="option-four-label"></label>
                        </span>
                    </div>
                    <div class="buttonDH">
                        <div class="next-button-container">
                            <button id="back" onclick="handleBackQuestion()">Back</button>
                        </div>
                        <div class="next-button-container">
                            <button id="next" onclick="handleNextQuestion()">Next</button>
                        </div>
                    </div>

                </div>
            </div>
        </div>
        <div class="ad-r ad-r-in-all">
            @include('front_end.layouts.ad_r')
        </div>
    </div>
    @include('front_end.layouts.footer')
<script>

    const questions = @json($questions);
    const get_chu_de_id = window.location.href;
    const url = new URL(get_chu_de_id);
    const baseUrl = `${url.protocol}//${url.host}`;
    let shuffledQuestions = questions
    shuffledQuestionsBackUp = questions
    // console.log(shuffledQuestionsBackUp)

    document.getElementById('questionID').innerHTML = "/" + String(shuffledQuestionsBackUp.length)
    let questionNumber = 1
    let indexNumber = 0
    remeberIndex = 0
    status_questions = Array()
    // function for displaying next question in the array to dom
    function NextQuestion(index) {
        const currentQuestion = shuffledQuestionsBackUp[index]
        document.getElementById("question-number").innerHTML = index+1;
        document.getElementById("player-score").innerHTML = countPlayerScore();
        document.querySelector('#str_imgQuestion').src = baseUrl+ currentQuestion.image
        document.getElementById("display-question").innerHTML = currentQuestion.question+currentQuestion.phien_am;
        document.getElementById("option-one-label").innerHTML = currentQuestion.optionA;
        document.getElementById("option-two-label").innerHTML = currentQuestion.optionB;
        document.getElementById("option-three-label").innerHTML = currentQuestion.optionC;
        document.getElementById("option-four-label").innerHTML = currentQuestion.optionD;
    }


    function checkForAnswer(backOrNext) {
        const currentQuestion = shuffledQuestionsBackUp[indexNumber] //gets current Question
        const currentQuestionAnswer = currentQuestion.correctOption //gets current Question's answer
        const options = document.getElementsByName("option"); //gets all elements in dom with name of 'option' (in this the radio inputs)
        let correctOption = null
        options.forEach((option) => {
            if (option.value === currentQuestionAnswer) {
                //get's correct's radio input with correct answer
                correctOption = option.labels[0].id
            }
        })

        //checking to make sure a radio input has been checked or an option being chosen
        if (options[0].checked === false && options[1].checked === false && options[2].checked === false && options[3].checked === false) {
            if (backOrNext === 1) {
                indexNumber++
                remeberIndex ++
                questionNumber = indexNumber+1
            }
            else {
                questionNumber = indexNumber-1
            }
            if (indexNumber <= questions.length-1) { saveStatusQuestion("", 0, "") }
        } else {
            options.forEach((option) => {
                if (option.checked === true && option.value === currentQuestionAnswer) {
                    document.getElementById(correctOption).style.backgroundColor = "green"
                    saveStatusQuestion(correctOption, 1, option.value)
                    if (backOrNext === 1) {
                        indexNumber++
                        remeberIndex++
                        //set to delay question number till when next question loads
                        // setTimeout(() => {
                            questionNumber = indexNumber+1
                        // }, 1000)
                    } else {
                        questionNumber = indexNumber-1
                    }
                }
                else if (option.checked && option.value !== currentQuestionAnswer) {
                    const wrongLabelId = option.labels[0].id
                    document.getElementById(wrongLabelId).style.backgroundColor = "red"
                    document.getElementById(correctOption).style.backgroundColor = "green"
                    saveStatusQuestion(wrongLabelId, 0, option.value)
                    if (backOrNext === 1) {
                        indexNumber++;
                        remeberIndex++
                        // setTimeout(() => {
                            questionNumber = indexNumber+1
                        // }, 1000)
                    } else {
                        questionNumber= indexNumber-1;
                    }
                }
            })
        }
    }
    // viết cho đếm câu đúng
    function countPlayerScore() {
        playerScore = 0
        for (i = 0; i < shuffledQuestions.length; i++) {
            const currentQuestion = shuffledQuestions[i]
            if (currentQuestion.trueOrFlase === 1) {
                playerScore++;
            }
        }
        return playerScore;
    }

    // save status question
    function saveStatusQuestion(optionChoicedd, trueOrFlased, valueChoiced) {
        // addMore = indexNumber
        shuffledQuestions[indexNumber]["optionChoiced"] = optionChoicedd;
        shuffledQuestions[indexNumber]["trueOrFlase"] = trueOrFlased;
        shuffledQuestions[indexNumber]["valueChoiced"] = valueChoiced;
        // console.log(shuffledQuestions);
    }

    // hidden back button when start
    prohibitButton = document.getElementById('back')
    prohibitButton.style.backgroundColor = "black";
    prohibitButton.disabled = true;
    //called when the next button is called
    function handleNextQuestion() {

        prohibitButton.style.backgroundColor = "#D3D3D3";
        prohibitButton.disabled = false;

        if (indexNumber < shuffledQuestions.length - 1) {
            const currentQuestion = shuffledQuestions[indexNumber + 1]
            choiced_option_id = currentQuestion.optionChoiced
            choiced_option_value = currentQuestion.valueChoiced
        }
        checkForAnswer(1)
        unCheckRadioButtons()
        CheckRadioButtons(choiced_option_value)
        //delays next question displaying for a second
        // setTimeout(() => {
            if (indexNumber <= (shuffledQuestionsBackUp.length-1)) {
                countPlayerScore();
                NextQuestion(indexNumber)
            }
            else {
                document.getElementById("player-score").innerHTML = countPlayerScore();
                countPlayerScore();
                handleEndGame();

            }
            resetOptionBackground()
        // }, 1000);
    }

    // called when back button is called
    backButton = 0;
    backQuestion = 0;
    function handleBackQuestion() {
        if (indexNumber <= 1) // hidden back button when start
        {
            document.getElementById('back').disabled = true;
            prohibitButton.style.backgroundColor = "black";
        }
        const currentQuestion = shuffledQuestions[indexNumber - 1]
        choiced_option_id = currentQuestion.optionChoiced
        choiced_option_value = currentQuestion.valueChoiced
        checkForAnswer(0)
        unCheckRadioButtons()
        CheckRadioButtons(choiced_option_value)
        backQuestion++;
        backButton = indexNumber - 1;
        indexNumber--;
        // setTimeout(() => {
            if (backButton <= shuffledQuestionsBackUp.length) {

                NextQuestion(backButton);

            }
            else {
                handleEndGame()
            }
            resetOptionBackground()
        // }, 1000);

    }


    //sets options background back to null after display the right/wrong colors
    function resetOptionBackground() {
        const options = document.getElementsByName("option");
        options.forEach((option) => {
            document.getElementById(option.labels[0].id).style.backgroundColor = ""
        })
    }

    // unchecking all radio buttons for next question(can be done with map or foreach loop also)
    function unCheckRadioButtons() {
        const options = document.getElementsByName("option");
        for (let i = 0; i < options.length; i++) {
            options[i].checked = false;
        }
    }
    function CheckRadioButtons(choiced_option_value) {
        const options = document.getElementsByName("option");
        for (let i = 0; i < options.length; i++) {
            if (options[i].value === choiced_option_value) {
                options[i].checked = true;
                break;
            }

            // options[i].checked = false;
        }
    }
    // function for when all questions being answered
    function handleEndGame() {
        let remark = null
        let remarkColor = null

        // condition check for player remark and remark color
        if (playerScore <= 3) {
            remark = ""
            remarkColor = "red"
        }
        else if (playerScore >= 4 && playerScore < 7) {
            remark = ""
            remarkColor = "orange"
        }
        else if (playerScore >= 7) {
            remark = ""
            remarkColor = "green"
        }
        const playerGrade = (countPlayerScore() / 10) * 100

        //data to display to score board
        document.getElementById('remarks').innerHTML = remark
        document.getElementById('remarks').style.color = remarkColor
        document.getElementById('soCauDaHoc').innerHTML = shuffledQuestions.length
        document.getElementById('grade-percentage').innerHTML = playerGrade
        document.getElementById('wrong-answers').innerHTML = (shuffledQuestions.length)-playerScore
        document.getElementById('right-answers').innerHTML = playerScore
        document.getElementById('score-modal').style.display = "flex"
        remeberIndex= 0
        indexNumber = (shuffledQuestions.length)-1
    }

    //closes score modal and resets game
    function closeScoreModal() {
        location.reload();
    }

    //function to close warning modal
    function closeOptionModal() {
        document.getElementById('score-modal').style.display = "none"
    }
    // viết cho Học tiếp từ mới, học lại, ôn tập, kiểm tra
    const actionEndElement = document.querySelectorAll('.actionEnd');

    // Add a click event listener to the element
    actionEndElement[0].addEventListener('click', () => {
        // Reload the page
        location.reload();
    });
</script>
</body>
</html>
