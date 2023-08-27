<x-HeadComponent css="all_course.css"></x-HeadComponent>
<x-HeadComponent css="home_header.css"></x-HeadComponent>
<x-HeadComponent css="list_cau_hoi.css"></x-HeadComponent>
<x-HeadComponent css="new_words.css"></x-HeadComponent>
<x-HeadComponent css="styleQuestion.css"></x-HeadComponent>

<body style="background-color:#FCFAF2;">
@include('front_end.layouts.header')

<!-- thoát về trang chủ -->
<div class="" style="background-color:#74D8C1">
    <div class="container" style="display:flex; padding:10px;justify-content: space-between;">
        <h3>
            <a
                href="{{route('home')}}">
                600tutoeic.com
            </a>

        </h3>
        <a
            href="{{route('home')}}" id = "go_back_home">

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
    <div class="mainContent centerForm">
        <form onsubmit="return false" class="container_thang_list_question" id="form">
            @foreach ($chu_de_image as $img)
            <img style="max-width:100%; align-self:center;border-radius: 8px;" src="{{ asset($img->image) }}"/>
            <div style="display:flex; flex-direction:row;justify-content:space-between;margin-top: 20px;align-self:center; max-width:100%; border-top: 15px solid red;border-top-left-radius: 8px;border-top-right-radius: 8px;" class="form-control">
                <div class="">
                    Chủ đề: <span style="color: red; font-weight: bolder; font-size: 30px;"> {{$img->chu_de_name}}</span>
                </div>
                @endforeach
                <div id="resultsContainer"></div>
            </div>
            <div class="cauHoiDapAn">
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
                            <div class="actionEnd"  onclick="closeOptionModal()" >
                                <div class="dot"><i style="color: #52ff67" class="fa fa-angellist fa-3x" aria-hidden="true"></i></div>
                                <p>Xem câu trả lời</p>
                            </div>
                        </div>


                    </div>
                </div>
                @foreach ($questions as $question)
                    <fieldset id="group{{ $question['group_id'] }}" style="display: flex;flex-direction:row; flex-wrap: wrap;justify-content: center; margin-bottom: 10px;">
                        <div>
                            <img style="max-width: 200px; height:200px; border-radius:20px;" class="str_image_tu_moi" src="{{ asset($question['image']) }}" alt="" >
                        </div>
                        <div class="form-control item answers">

                            <div>
                                <span style="color: black; font-weight: bolder;">{{ $question['question'] }}</span>
                                <span style="color: red; font-weight: bolder">
                                     {{ $question['phien_am'] }}
                                </span>

                            </div>

                            <!-- Input Type Radio Button -->
                            <label class = "boiXanh" for="recommed-{{ $question['a_id'] }}">
                                <input type="radio"
                                       id="recommed-{{ $question['a_id']}}"
                                       name="group{{ $question['group_id'] }}" value="a"/><span>{{ $question['a'] }}</span>
                            </label>
                            <label class = "boiXanh" for="recommed-{{ $question['b_id'] }}">
                                <input  type="radio"
                                        id="recommed-{{ $question['b_id'] }}"
                                        name="group{{ $question['group_id'] }}" value="b"/><span>{{ $question['b'] }}</span>
                            </label>
                            <label class = "boiXanh" for="recommed-{{ $question['c_id'] }}">
                                <input  type="radio"
                                        id="recommed-{{ $question['c_id'] }}"
                                        name="group{{ $question['group_id'] }}" value="c"/><span>{{ $question['c'] }}</span>
                            </label>
                            <label class = "boiXanh" for="recommed-{{ $question['d_id'] }}">
                                <input  type="radio"
                                        id="recommed-{{ $question['d_id'] }}"
                                        name="group{{ $question['group_id'] }}" value="d"/><span>{{ $question['d'] }}</span>
                            </label>
                        </div>

                    </fieldset>
                @endforeach
            </div>

            <!-- Multi-line Text Input Control -->
            <div class="submitAndClear" style="margin-top: 10px">
                <button  type="submit" value="submit" style=""  id="submit">
                    Nộp Bài
                </button>
                <span id="clear_form" style="align-self: flex-end;">Xóa Đáp Án</span>
            </div>
        </form>
    </div>
    <div class="ad-r ad-r-in-all">
        @include('front_end.layouts.ad_r')
    </div>
</div>

@include('front_end.layouts.footer')
<script>
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

        // Get the parent element
        var parentElement = document.querySelector('.submitAndClear');

        // Remove all child elements
        while (parentElement.firstChild) {
            parentElement.removeChild(parentElement.firstChild);
        }

        // Create and add the "Test Lại" <div> element
        var testAgainDiv = document.createElement('div');
        testAgainDiv.className = 'actionEnd';
        testAgainDiv.innerHTML = `
        <div class="dot"><i class="fa fa-repeat fa-3x" aria-hidden="true" style="color: #e21f1f;"></i></div>
        <p>Test Lại</p>
    `;
        testAgainDiv.setAttribute('onclick', 'location.reload()');

        // Create and add the "Tiếp Tục" <div> element
        var continueDiv = document.createElement('div');
        continueDiv.className = 'actionEnd';
        continueDiv.innerHTML = `
        <div class="dot"><i class="fa fa-arrow-circle-right fa-3x" aria-hidden="true" style="color: #e21f1f;"></i></div>
        <p>Tiếp Tục</p>
    `;
        var ids = "your_ids_here"; // Replace with actual ids
        continueDiv.setAttribute('onclick', `window.location.href = "/next_test_type/${ids}"`);

        // Append the new <div> elements
        parentElement.appendChild(testAgainDiv);
        parentElement.appendChild(continueDiv);

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

</script>
</body>

</html>
