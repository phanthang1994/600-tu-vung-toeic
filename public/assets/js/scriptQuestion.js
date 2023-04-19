const questions = [
    {
        question: "How many days makes a week ?",
        optionA: "10 days",
        optionB: "14 days",
        optionC: "5 days",
        optionD: "7 days",
        correctOption: "optionD",
        optionChoiced: '',
        trueOrFlase: 0,
        valueChoiced: '',
        remeber: 0
    },

    {
        question: "How many players are allowed on a soccer pitch ?",
        optionA: "10 players",
        optionB: "11 players",
        optionC: "9 players",
        optionD: "12 players",
        correctOption: "optionB",
        optionChoiced: '',
        trueOrFlase: 0,
        valueChoiced: '',
        remeber: 0
    },

    {
        question: "Who was the first President of USA ?",
        optionA: "Donald Trump",
        optionB: "Barack Obama",
        optionC: "Abraham Lincoln",
        optionD: "George Washington",
        correctOption: "optionD",
        optionChoiced: '',
        trueOrFlase: 0,
        valueChoiced: '',
        remeber: 0
    },

    {
        question: "30 days has ______ ?",
        optionA: "January",
        optionB: "December",
        optionC: "June",
        optionD: "August",
        correctOption: "optionC",
        optionChoiced: '',
        trueOrFlase: 0,
        valueChoiced: '',
        remeber: 0
    },

    {
        question: "How manay hours can be found in a day ?",
        optionA: "30 hours",
        optionB: "38 hours",
        optionC: "48 hours",
        optionD: "24 hours",
        correctOption: "optionD",
        optionChoiced: '',
        trueOrFlase: 0,
        valueChoiced: '',
        remeber: 0
    },

    {
        question: "Which is the longest river in the world ?",
        optionA: "River Nile",
        optionB: "Long River",
        optionC: "River Niger",
        optionD: "Lake Chad",
        correctOption: "optionA",
        optionChoiced: '',
        trueOrFlase: 0,
        valueChoiced: '',
        remeber: 0
    },

    {
        question: "_____ is the hottest Continent on Earth ?",
        optionA: "Oceania",
        optionB: "Antarctica",
        optionC: "Africa",
        optionD: "North America",
        correctOption: "optionC",
        optionChoiced: '',
        trueOrFlase: 0,
        valueChoiced: '',
        remeber: 0
    },

    {
        question: "Which country is the largest in the world ?",
        optionA: "Russia",
        optionB: "Canada",
        optionC: "Africa",
        optionD: "Egypt",
        correctOption: "optionA",
        optionChoiced: '',
        trueOrFlase: 0,
        valueChoiced: '',
        remeber: 0
    },

    {
        question: "Which of these numbers is an odd number ?",
        optionA: "Ten",
        optionB: "Twelve",
        optionC: "Eight",
        optionD: "Eleven",
        correctOption: "optionD",
        optionChoiced: '',
        trueOrFlase: 0,
        valueChoiced: '',
        remeber: 0
    },

    {
        question: `"You Can't see me" is a popular saying by`,
        optionA: "Eminem",
        optionB: "Bill Gates",
        optionC: "Chris Brown",
        optionD: "John Cena",
        correctOption: "optionD",
        optionChoiced: '',
        trueOrFlase: 0,
        valueChoiced: '',
        remeber: 0
    },

    // {
    //     question: "Where is the world tallest building located ?",
    //     optionA: "Africa",
    //     optionB: "California",
    //     optionC: "Dubai",
    //     optionD: "Italy",
    //     correctOption: "optionC",
    //     optionChoiced: '',
    //     trueOrFlase: 0,
    //     valueChoiced: ''
    // },

    // {
    //     question: "The longest river in the United Kingdom is ?",
    //     optionA: "River Severn",
    //     optionB: "River Mersey",
    //     optionC: "River Trent",
    //     optionD: "River Tweed",
    //     correctOption: "optionA",
    //     optionChoiced: '',
    //     trueOrFlase: 0,
    //     valueChoiced: ''
    // },


    // {
    //     question: "How many permanent teeth does a dog have ?",
    //     optionA: "38",
    //     optionB: "42",
    //     optionC: "40",
    //     optionD: "36",
    //     correctOption: "optionB",
    //     optionChoiced: '',
    //     trueOrFlase: 0,
    //     valueChoiced: ''
    // },

    // {
    //     question: "Which national team won the football World cup in 2018 ?",
    //     optionA: "England",
    //     optionB: "Brazil",
    //     optionC: "Germany",
    //     optionD: "France",
    //     correctOption: "optionD",
    //     optionChoiced: '',
    //     trueOrFlase: 0,
    //     valueChoiced: ''
    // },

    // {
    //     question: "Which US state was Donald Trump Born ?",
    //     optionA: "New York",
    //     optionB: "California",
    //     optionC: "New Jersey",
    //     optionD: "Los Angeles",
    //     correctOption: "optionA",
    //     optionChoiced: '',
    //     trueOrFlase: 0,
    //     valueChoiced: ''
    // },

    // {
    //     question: "How man states does Nigeria have ?",
    //     optionA: "24",
    //     optionB: "30",
    //     optionC: "36",
    //     optionD: "37",
    //     correctOption: "optionC",
    //     optionChoiced: '',
    //     trueOrFlase: 0,
    //     valueChoiced: ''
    // },

    // {
    //     question: "____ is the capital of Nigeria ?",
    //     optionA: "Abuja",
    //     optionB: "Lagos",
    //     optionC: "Calabar",
    //     optionD: "Kano",
    //     correctOption: "optionA",
    //     optionChoiced: '',
    //     trueOrFlase: 0,
    //     valueChoiced: ''
    // },

    // {
    //     question: "Los Angeles is also known as ?",
    //     optionA: " Angels City Angels City Angels City Angels City Angels City",
    //     optionB: "Shining city",
    //     optionC: "City of Angels",
    //     optionD: "Lost Angels",
    //     correctOption: "optionC",
    //     optionChoiced: '',
    //     trueOrFlase: 0,
    //     valueChoiced: ''
    // },

    // {
    //     question: "What is the capital of Germany ?",
    //     optionA: "Georgia",
    //     optionB: "Missouri",
    //     optionC: "Oklahoma",
    //     optionD: "Berlin",
    //     correctOption: "optionD",
    //     optionChoiced: '',
    //     trueOrFlase: 0,
    //     valueChoiced: ''
    // },

    // {
    //     question: "How many sides does an hexagon have ?",
    //     optionA: "Six",
    //     optionB: "Sevene",
    //     optionC: "Four",
    //     optionD: "Five",
    //     correctOption: "optionA",
    //     optionChoiced: '',
    //     trueOrFlase: 0,
    //     valueChoiced: ''
    // },

    // {
    //     question: "How many planets are currently in the solar system ?",
    //     optionA: "Eleven",
    //     optionB: "Seven",
    //     optionC: "Nine",
    //     optionD: "Eight",
    //     correctOption: "optionD",
    //     optionChoiced: '',
    //     trueOrFlase: 0,
    //     valueChoiced: ''
    // },

    // {
    //     question: "Which Planet is the hottest ?",
    //     optionA: "Jupitar",
    //     optionB: "Mercury",
    //     optionC: "Earth",
    //     optionD: "Venus",
    //     correctOption: "optionB",
    //     optionChoiced: '',
    //     trueOrFlase: 0,
    //     valueChoiced: ''
    // },

    // {
    //     question: "where is the smallest bone in human body located?",
    //     optionA: "Toes",
    //     optionB: "Ears",
    //     optionC: "Fingers",
    //     optionD: "Nose",
    //     correctOption: "optionB",
    //     optionChoiced: '',
    //     trueOrFlase: 0,
    //     valueChoiced: ''
    // },

    // {
    //     question: "How many hearts does an Octopus have ?",
    //     optionA: "One",
    //     optionB: "Two",
    //     optionC: "Three",
    //     optionD: "Four",
    //     correctOption: "optionC",
    //     optionChoiced: '',
    //     trueOrFlase: 0,
    //     valueChoiced: ''
    // },

    // {
    //     question: "How many teeth does an adult human have ?",
    //     optionA: "28",
    //     optionB: "30",
    //     optionC: "32",
    //     optionD: "36",
    //     correctOption: "optionC",
    //     optionChoiced: '',
    //     trueOrFlase: 0,
    //     valueChoiced: ''
    // }

]


let shuffledQuestions = [] //empty array to hold shuffled selected questions

//function to shuffle and push 10 questions to shuffledQuestions array
while (shuffledQuestions.length <= 9) {
    shuffledQuestions = questions
    const random = questions[Math.floor(Math.random() * questions.length)]
    if (!shuffledQuestions.includes(random)) {
        shuffledQuestions.push(random)
    }
}
shuffledQuestionsBackUp = shuffledQuestions.slice()

document.getElementById('questionID').innerHTML = "/" + String(shuffledQuestionsBackUp.length)
let questionNumber = 1
let indexNumber = 0
remeberIndex = 0
status_questions = Array()
// function for displaying next question in the array to dom
function NextQuestion(index) {
    const currentQuestion = shuffledQuestionsBackUp[index]
    document.getElementById("question-number").innerHTML = questionNumber;
    document.getElementById("player-score").innerHTML = countPlayerScore();
    document.getElementById("display-question").innerHTML = currentQuestion.question;
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
    if (options[0].checked === false && options[1].checked === false && options[2].checked === false && options[3].checked == false) {
        if (backOrNext == 1) {
            indexNumber++
            remeberIndex ++
            questionNumber = indexNumber+1
        }
        else {
            questionNumber = indexNumber-1
        }
        if (indexNumber <= 9) { saveStatusQuestion("", 0, "") }
    } else {
        options.forEach((option) => {
            if (option.checked === true && option.value === currentQuestionAnswer) {
                document.getElementById(correctOption).style.backgroundColor = "green"
                saveStatusQuestion(correctOption, 1, option.value)
                if (backOrNext == 1) {
                    indexNumber++
                    remeberIndex++
                    //set to delay question number till when next question loads
                    setTimeout(() => {
                        questionNumber = indexNumber+1
                    }, 1000)
                } else {
                    questionNumber = indexNumber-1
                }
            }
            else if (option.checked && option.value !== currentQuestionAnswer) {
                const wrongLabelId = option.labels[0].id
                document.getElementById(wrongLabelId).style.backgroundColor = "red"
                document.getElementById(correctOption).style.backgroundColor = "green"
                saveStatusQuestion(wrongLabelId, 0, option.value)
                if (backOrNext == 1) {
                    indexNumber++;
                    remeberIndex++
                    setTimeout(() => {
                        questionNumber = indexNumber+1
                    }, 1000)
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
        if (currentQuestion.trueOrFlase == 1) {
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
    else {

    }
    checkForAnswer(1)
    unCheckRadioButtons()
    CheckRadioButtons(choiced_option_value)
    // console.log(choiced_option_value)
    // console.log(indexNumber)
    //delays next question displaying for a second
    setTimeout(() => {
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
    }, 1000);
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
    console.log(backButton)
    setTimeout(() => {
        if (backButton <= shuffledQuestionsBackUp.length) {

            NextQuestion(backButton);

        }
        else {
            handleEndGame()
        }
        resetOptionBackground()
    }, 1000);

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
        if (options[i].value == choiced_option_value) {
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

// call to remember
function handleRememberQuestion() {
    console.log(remeberIndex)
    shuffledQuestions[remeberIndex]["remember"] = 1;
    saveStatusQuestion(shuffledQuestions[remeberIndex]["correctOption"], 1, "")
    shuffledQuestionsBackUp.splice(indexNumber, 1);
    document.getElementById('questionID').innerHTML = "/" + String(shuffledQuestionsBackUp.length)
    // console.log(shuffledQuestionsBackUp)
    console.log(shuffledQuestions)
    if (shuffledQuestionsBackUp.length > 0) { 
        NextQuestion(indexNumber);
         remeberIndex++
        }
    else
    {   
        handleEndGame()
        shuffledQuestionsBackUp = shuffledQuestions.slice()
        document.getElementById('questionID').innerHTML = "/" + String(shuffledQuestionsBackUp.length)
        console.log(shuffledQuestions)
        resetOptionBackground()
       
    }
}