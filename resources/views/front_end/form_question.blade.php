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
                <fieldset id="group1" style="display: flex;flex-direction:row; flex-wrap: wrap;justify-content: center; margin-bottom: 10px;">
                    <div><img style="max-width: 200px; height:200px; border-radius:20px;" src="assets/img/blog/blog-1.jpg" alt="" ></div>
                    <div class="form-control item answers">

                        <label>
                            Would you recommed GeeksforGeeks
                            to a friend?Would you recommed GeeksforGeeks
                            to a friend?
                        </label>

                        <!-- Input Type Radio Button -->
                        <label class = "boiXanh" for="recommed-1">
                            <input type="radio"
                                   id="recommed-1"
                                   name="group1" value="a"/><span>HTML</span>
                        </label>
                        <label class = "boiXanh" for="recommed-2">
                            <input  type="radio"
                                    id="recommed-2"
                                    name="group1" value="b"/><span>css</span>
                        </label>
                        <label class = "boiXanh" for="recommed-3">
                            <input  type="radio"
                                    id="recommed-3"
                                    name="group1" value="c"/><span>js</span>
                        </label>
                    </div>

                </fieldset>

                <fieldset id="group2" style="display: flex;flex-direction:row; flex-flow: wrap;justify-content: center;">
                    <div><img style="width: 200px; height:200px; border-radius:20px;" src="assets/img/blog/blog-1.jpg" alt="" ></div>
                    <div class="form-control item answers">
                        <label>
                            Would you recommed GeeksforGeeks
                            to a friend?
                        </label>

                        <!-- Input Type Radio Button -->
                        <label class = "boiXanh" for="recommed-4">
                            <input type="radio"
                                   id="recommed-4"
                                   name="group2" value="a"/><span>HTML</span>
                        </label>
                        <label class = "boiXanh" for="recommed-5">
                            <input  type="radio"
                                    id="recommed-5"
                                    name="group2" value="b"/><span>css</span>
                        </label>
                        <label class = "boiXanh" for="recommed-6">
                            <input  type="radio"
                                    id="recommed-6"
                                    name="group2" value="c"/><span>js</span>
                        </label>
                    </div>
                </fieldset>
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
<script src="assets/js/list_cau_hoi.js"></script>
</body>

</html>
