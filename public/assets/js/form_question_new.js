const myQuestions = @json($questions);
function showResults(){
    const quizContainer = document.getElementById('form');
    // gather answer containers from our quiz
    const answerContainers = quizContainer.querySelectorAll('.answers');
    let numCorrect = 0;

    // for each question...
    for (let questionNumber = 0; questionNumber < myQuestions.length; questionNumber++) {
        const currentQuestion = myQuestions[questionNumber];

        // Find selected answer
        const answerContainer = answerContainers[questionNumber];
        const selector = `input[name=group${currentQuestion['group_id']}]:checked`;
        const selector2 = `input[name=group${currentQuestion['group_id']}]`;
        const userAnswer = (answerContainer.querySelector(selector) || {});
        const userAnswer2 = (answerContainer.querySelectorAll(selector2) || {});
        for (let u = 0; u < userAnswer2.length; u++) {
            if (userAnswer2[u].value === currentQuestion.correctOption) {
                console.log(userAnswer2[u])
                userAnswer2[u].parentElement.style.backgroundColor = 'blue';
            }
        }

        // Check if the answer is correct
        if (userAnswer.value === currentQuestion.correctOption) {
            numCorrect++;
            answerContainers[questionNumber].style.color = 'Blue'; // Color the answers black
        } else {
            answerContainers[questionNumber].style.color = 'red'; // Color the answers red
        }

        document.querySelector('#resultsContainer').innerHTML = 'Đúng: ' + numCorrect + '/ ' + myQuestions.length;
    }
    handleEndGame(numCorrect)
}
const submitButton = document.getElementById('submit');
submitButton.addEventListener('click', showResults);
//function to close warning modal
function closeOptionModal() {
    document.getElementById('score-modal').style.display = "none"
    document.getElementById('submit').disabled = true
}

function handleEndGame(numCorrect) {
    document.getElementById('grade-percentage').innerHTML = numCorrect/myQuestions.length*100
    document.getElementById('soCauDaHoc').innerHTML = myQuestions.length
    document.getElementById('wrong-answers').innerHTML = (myQuestions.length)-numCorrect
    document.getElementById('right-answers').innerHTML = numCorrect
    document.getElementById('score-modal').style.display = "flex"
}
const cauHoiDapAn = document.querySelector('.cauHoiDapAn');
const radioButtons = cauHoiDapAn.querySelectorAll('input[type="radio"]');
radioButtons.forEach(radioButton => {
    radioButton.checked = false;
});
const clearFormButton = document.getElementById('clear_form');
clearFormButton.addEventListener('click', () => {
    const cauHoiDapAn = document.querySelector('.cauHoiDapAn');
    const radioButtons = cauHoiDapAn.querySelectorAll('input[type="radio"]');
    radioButtons.forEach(radioButton => {
        radioButton.checked = false;
    });
});
const questions = @json($questions);
const get_chu_de_id = window.location.href;
const url = new URL(get_chu_de_id);
const path = url.pathname;
const parts = path.split('/');
const ids = parts[parts.length - 1];
const actionEndElement = document.querySelectorAll('.actionEnd');

// Add a click event listener to the element
actionEndElement[0].addEventListener('click', () => {
    location.reload();
});
actionEndElement[1].addEventListener('click', function () {
    window.location.href = "/next_test_type/" + ids;
});
// actionEndElement[2].addEventListener('click', function () {
//     window.location.href = "/next_test_type/" + ids;
// });
document.getElementById('go_back_home').addEventListener('click', function(event) {
    event.preventDefault(); // Prevent the default behavior of the link

    // Display the confirmation message
    var confirmed = confirm("Bạn có muốn kết thúc BAIF TEST hay không?");

    if (confirmed) {
        window.location.href = this.href; // Go to the specified URL (route)
    }
});

