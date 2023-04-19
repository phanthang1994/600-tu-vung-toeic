const questions = [
    {
        question: "How many days makes a week ?",
        suggestion: ["phan", "xuan", "tha", "ng1"],
        correctOption: "phan xuan thang1",
        optionChoiced: '',
        trueOrFlase: 0,
        valueChoiced: '',
        remeber: 0
    },

    {
        question: "How many players are allowed on a soccer pitch ?",
        suggestion: ["phan", "xuan", "tha", "ng2"],
        correctOption: "phan xuan thang2",
        optionChoiced: '',
        trueOrFlase: 0,
        valueChoiced: '',
        remeber: 0
    },

    {
        question: "Who was the first President of USA ?",
        suggestion: ["phan", "xuan", "tha", "ng"],
        correctOption: "phan xuan thang",
        optionChoiced: '',
        trueOrFlase: 0,
        valueChoiced: '',
        remeber: 0
    }
    ,

    {
        question: "30 days has ______ ?",
        suggestion: ["phan", "xuan", "tha", "ng"],
        correctOption: "June",
        optionChoiced: '',
        trueOrFlase: 0,
        valueChoiced: '',
        remeber: 0
    },

    {
        question: "How manay hours can be found in a day ?",
        suggestion: ["phan", "xuan", "tha", "ng"],
        correctOption: "24 hours",
        optionChoiced: '',
        trueOrFlase: 0,
        valueChoiced: '',
        remeber: 0
    },

    {
        question: "Which is the longest river in the world ?",
        suggestion: ["phan", "xuan", "tha", "ng"],
        correctOption: "River Nile",
        optionChoiced: '',
        trueOrFlase: 0,
        valueChoiced: '',
        remeber: 0
    },

    {
        question: "_____ is the hottest Continent on Earth ?",
        ssuggestion: ["phan", "xuan", "tha", "ng"],
        optionD: "North America",
        correctOption: "Africa",
        optionChoiced: '',
        trueOrFlase: 0,
        valueChoiced: '',
        remeber: 0
    },

    {
        question: "Which of these numbers is an odd number ?",
        suggestion: ["phan", "xuan", "tha", "ng"],
        correctOption: "Eleven",
        optionChoiced: '',
        trueOrFlase: 0,
        valueChoiced: '',
        remeber: 0
    },

    {
        question: `"You Can't see me" is a popular saying by`,
        suggestion: ["phan", "xuan", "tha", "ng"],
        correctOption: "John Cena",
        optionChoiced: '',
        trueOrFlase: 0,
        valueChoiced: '',
        remeber: 0
    }
    ,
    {
        question: `"You Can't see me" is a popular saying by`,
        suggestion: ["phan", "xuan", "tha", "ng"],
        correctOption: "John Cena",
        optionChoiced: '',
        trueOrFlase: 0,
        valueChoiced: '',
        remeber: 0
    }

]

let shuffledQuestions = [] //empty array to hold shuffled selected questions
indexNumber = 0
score = 0
//function to shuffle and push 10 questions to shuffledQuestions array
while (shuffledQuestions.length <= 9) {
    shuffledQuestions = questions
    const random = questions[Math.floor(Math.random() * questions.length)]
    if (!shuffledQuestions.includes(random)) {
        shuffledQuestions.push(random)
    }
}
shuffledQuestionsBackUp = shuffledQuestions.slice()
// viết cho phần gợi ý câu hỏi
dispalySuggession(0)
function dispalySuggession(orderQuestion) {
    //xóa hêt phần tử hiện tại
    document.querySelector('.goiY').innerHTML=''
    document.getElementById('dapAn').value=''
    document.getElementById('scoreGet').innerHTML = score
    document.getElementById('cauThu').innerHTML = indexNumber+1
    document.getElementById('totalQuestion').innerHTML = shuffledQuestions.length
    // gen ra phần tử mới
    for (let suggestion of questions[orderQuestion].suggestion) {
        inpuNhap = document.getElementById('dapAn')
        inpuNhap.style.backgroundColor = '#FFFFFF'
        inpuNhap.style.color = 'black'
        inpuNhap.value=''
        document.querySelector('#dapAnSai').style.display = 'none'
        var button_ = document.createElement('button');
        button_.classList.add('btn', 'goiYTu')
        button_.setAttribute('type', 'button')
        if(suggestion===' ')
        {
            button_.classList.add('space_button')
        }
        button_.innerHTML = suggestion
        // get data for input
        button_.onclick = function() {
            currrentValue = inpuNhap.value
            inpuNhap.value = currrentValue + suggestion
        }
        document.querySelector('.goiY').appendChild(button_)
    }
}
// viết cho nút cách
function whiteSpace()
{
    hien_tai = document.getElementById('dapAn').value
    document.getElementById('dapAn').value=hien_tai+' '
}
//viết cho phím xóa trước
function backSpace()
{
    var textbox = document.getElementById('dapAn');
    var ss = textbox.selectionStart;
    var se = textbox.selectionEnd;
    var ln  = textbox.value.length;

    var textbefore = textbox.value.substring( 0, ss );    //text in front of selected text
    var textselected = textbox.value.substring( ss, se ); //selected text
    var textafter = textbox.value.substring( se, ln );    //text following selected text

    if(ss===se) // if no text is selected
    {
        textbox.value = textbox.value.substring(0, ss-1 ) + textbox.value.substring(se, ln );
        textbox.focus();
        textbox.selectionStart = ss-1;
        textbox.selectionEnd = ss-1;
    }
    else // if some text is selected
    {
        textbox.value = textbefore + textafter ;
        textbox.focus();
        textbox.selectionStart = ss;
        textbox.selectionEnd = ss;
    }
}
// viết cho nút next

function next_Button() {
    currrentValue = inpuNhap.value
    currrentValue = currrentValue.replace(/^\s+|\s+$/gm,'');
    checkAnsewr(indexNumber)

}

function checkAnsewr(index)
{
    if(indexNumber<shuffledQuestionsBackUp.length-1)
    {
        if (shuffledQuestionsBackUp[index].correctOption === currrentValue) {
            alertify.success('chính xác');
            score++;
            indexNumber++;
            dispalySuggession(indexNumber)
        }
        else if(currrentValue.includes('đáp án đúng ( '))
        {
            indexNumber++;
            dispalySuggession(indexNumber)
        }else if(shuffledQuestionsBackUp[index].correctOption !== currrentValue)
        {
            inpuNhap.value='đáp án đúng ( ' + shuffledQuestionsBackUp[index].correctOption + ' )'
            inpuNhap.style.backgroundColor = 'blue'
            inpuNhap.style.color='white'
            dap_an_sai = document.querySelector('#dapAnSai')
            dap_an_sai.style.display = 'block';
            dap_an_sai.value='đáp án của bạn ( ' + currrentValue + ')';
        }
    }
   else
    {
        handleEndGame()
    }

}
//function to close warning modal
function closeOptionModal() {
    document.getElementById('score-modal').style.display = "none"
}

function handleEndGame() {
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
    document.getElementById('grade-percentage').innerHTML = score/shuffledQuestions.length*100
    document.getElementById('soCauDaHoc').innerHTML = shuffledQuestions.length
    document.getElementById('wrong-answers').innerHTML = (shuffledQuestions.length)-score
    document.getElementById('right-answers').innerHTML = score
    document.getElementById('score-modal').style.display = "flex"
}