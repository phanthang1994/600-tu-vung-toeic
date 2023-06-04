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
            <a href="#">Tiếng Anh (600 từ toeic)</a>
            . Hợp Đồng (agreement).
        </h3>
        <a
            href="file:///E:/template/My%20Web%20Sites/glaxdu/demo.hasthemes.com/glaxdu-v1/glaxdu/index_chuan_2.html">

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
            <img style="max-width:100%; align-self:center;border-radius: 8px;" src="assets/img/slider/slider-1.jpg"/>
            <div style="display:flex; flex-direction:row;justify-content:space-between;margin-top: 20px;align-self:center; max-width:100%; border-top: 15px solid red;border-top-left-radius: 8px;border-top-right-radius: 8px;" class="form-control">
                <div class="">DAY 20- Chinh phục part 5 (Nopain Nogain)</div>
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
                                <div class="dot"><img src="fertilize (64).png" style="width: 72%;" alt="" srcset=""></div>
                                <p>Test Lại</p>
                            </div>
                            <div class="actionEnd">
                                <div class="dot"><img src="test (64).png" style="width: 72%;" alt="" srcset=""></div>
                                <p>Tiếp Tục</p>
                            </div>
                            <div class="actionEnd"  onclick="closeOptionModal()" >
                                <div class="dot"><img src="watering-can (64).png" style="width: 72%;" alt="" srcset=""></div>
                                <p>Xem câu trả lời</p>
                            </div>
                            <!--                                <div class="modal-button-container">-->
                            <!--                                    <button onclick="closeScoreModal()"> Test lại</button>-->
                            <!--                                </div>-->
                            <!--                                <div class="modal-button-container">-->
                            <!--                                    <button><a href="#">Test tiếp</a> </button>-->
                            <!--                                </div>-->
                        </div>


                    </div>
                </div>
                @foreach ($questions as $question)
                    <fieldset id="group{{ $question['group_id'] }}" style="display: flex;flex-direction:row; flex-wrap: wrap;justify-content: center; margin-bottom: 10px;">
                        <div><img style="max-width: 200px; height:200px; border-radius:20px;" src="assets/img/blog/blog-1.jpg" alt="" ></div>
                        <div class="form-control item answers">

                            <label>
                                {{ $question['question'] }}
                            </label>

                            <!-- Input Type Radio Button -->
                            <label class = "boiXanh" for="recommed-{{ $question['a_id'] }}">
                                <input type="radio"
                                       id="recommed-{{ $question['a_id'] }}"
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
                    Submit
                </button>
                <span style="align-self: flex-end;">
            Clear form
        </span>
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
    console.log(myQuestions)
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
</script>
</body>

</html>
