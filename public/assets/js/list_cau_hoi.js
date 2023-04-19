function showResults(){
    const quizContainer = document.getElementById('form');
    // gather answer containers from our quiz
    const answerContainers = quizContainer.querySelectorAll('.answers');
    const boiXanh = document.querySelectorAll('.boiXanh')
    const boiXanhInInput = document.querySelectorAll('.boiXanh input')
    // for(u =0;u<boiXanh.length;u++){
    //
    //     if(boiXanhInInput[u].value===myQuestions[u].correctOption)
    //     {
    //         alert(boiXanhInInputZ[u].value)
    //         boiXanh[u].style.backgroundColor='black'
    //
    //     }
    // }
    // keep track of user's answers
    let numCorrect = 0;

    // for each question...
    myQuestions.forEach( (currentQuestion, questionNumber) => {

        // find selected answer
        const answerContainer = answerContainers[questionNumber];
        const selector = `input[name=group${questionNumber+1}]:checked`;
        const selector2 = `input[name=group${questionNumber+1}]`;
        const userAnswer = (answerContainer.querySelector(selector) || {});
        const userAnswer2 = (answerContainer.querySelectorAll(selector2) || {});
        for(u =0;u<userAnswer2.length;u++){
            if (userAnswer2[u].value===currentQuestion.correctOption)
            {
                // alert(userAnswer2[u].value)
                userAnswer2[u].parentElement.style.backgroundColor = 'blue'
            }
        }
        // if answer is correct
        if(userAnswer.value === currentQuestion.correctOption){
            // add to the number of correct answers
            numCorrect++;

            // color the answers green
            answerContainers[questionNumber].style.color = 'lightgreen';
        }
        // if answer is wrong or blank
        else{
            // color the answers red
            answerContainers[questionNumber].style.color = 'red';

        }
        document.querySelector('#resultsContainer').innerHTML = 'Đúng: '+numCorrect + "/ " + myQuestions.length
    });
    handleEndGame(numCorrect)
    // show number of correct answers out of total
    // resultsContainer.innerHTML = `${numCorrect} out of ${myQuestions.length}`;
}
const myQuestions = [
    {
        question: "How many days makes a week ?",
        suggestion: ["phan", "xuan", "tha", "ng1"," "],
        correctOption: "a",
        optionChoiced: '',
        trueOrFlase: 0,
        valueChoiced: '',
        remeber: 0
    },

    {
        question: "How many players are allowed on a soccer pitch ?",
        suggestion: ["phan", "xuan", "tha", "ng2"," "],
        correctOption: "b",
        optionChoiced: '',
        trueOrFlase: 0,
        valueChoiced: '',
        remeber: 0
    }
    ]
const submitButton = document.getElementById('submit');
submitButton.addEventListener('click', showResults);
//function to close warning modal
function closeOptionModal() {
    document.getElementById('score-modal').style.display = "none"
    document.getElementById('submit').disabled = true
}

function handleEndGame(numCorrect) {
    // let remark = null
    // let remarkColor = null
    //
    // // condition check for player remark and remark color
    // if (playerScore <= 3) {
    //     remark = ""
    //     remarkColor = "red"
    // }
    // else if (playerScore >= 4 && playerScore < 7) {
    //     remark = ""
    //     remarkColor = "orange"
    // }
    // else if (playerScore >= 7) {
    //     remark = ""
    //     remarkColor = "green"
    // }
    // const playerGrade = (countPlayerScore() / 10) * 100
    //
    // //data to display to score board
    // document.getElementById('remarks').innerHTML = remark
    // document.getElementById('remarks').style.color = remarkColor
    document.getElementById('grade-percentage').innerHTML = numCorrect/myQuestions.length*100
    document.getElementById('soCauDaHoc').innerHTML = myQuestions.length
    document.getElementById('wrong-answers').innerHTML = (myQuestions.length)-numCorrect
    document.getElementById('right-answers').innerHTML = numCorrect
    document.getElementById('score-modal').style.display = "flex"
}