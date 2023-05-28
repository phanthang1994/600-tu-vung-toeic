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
                                <div class="dot"><img src="fertilize (64).png" style="width: 72%;" alt="" srcset=""></div>
                                <p>Test Lại</p>
                            </div>
                            <div class="actionEnd">
                                <div class="dot"><img src="test (64).png" style="width: 72%;" alt="" srcset=""></div>
                                <p>Tiếp Tục</p>
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
                <div class="game-quiz-container">
                    <div class="imgQuestion"><img src="assets/img/event/event-1.jpg" alt="" srcset=""></div>
                    <div class="game-details-container">
                        <h1>Score : <span id="player-score"></span></h1>
                        <h1> Question : <span id="question-number"></span><span id=questionID></span></h1>
                    </div>

                    <div class="game-question-container">
                        <h1 id="display-question"></h1>
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
{{--                        <div class="next-button-container">--}}
{{--                            <button onclick="handleRememberQuestion()">Đã thuộc</button>--}}
{{--                        </div>--}}
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
    <script src="{{url('assets/js/scriptQuestion.js')}}"></script>
</body>
</html>
