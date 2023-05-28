<x-HeadComponent css="all_course.css"></x-HeadComponent>
<x-HeadComponent css="home_header.css"></x-HeadComponent>
<x-HeadComponent css="dien_tu_.css"></x-HeadComponent>
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
    <div class="mainContent classOut">
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
        <div class="signup">
            <div class="signup-classic">
                <div id="scoreQuestion">
                    <p>
                        Score: <span id="scoreGet"></span>
                    </p>
                    <p>
                        Question: <span id="cauThu"></span>\<span id="totalQuestion"></span>
                    </p>
                </div>
                <h2 id="cauHoi"></h2>
                <div class="blog-img" style="display:flex; justify-content: flex-start; flex-wrap: wrap;">
                    <div><img src="assets/img/blog/blog-1.jpg" alt="" style="max-width:100%;"></div>
                    <div class="" style="width:500px;">
                        <label class="dXQZrX">Tiếng anh</label>
                        <h2 class="jPETsr newWords"></h2>
                        <label class="" style="margin-top: 10px;">Từ loại: <span class=""></span></label>
                    </div>
                </div>
                <form class="form">
                    <fieldset class="username">
                        <input type="text" placeholder="" value="" id="dapAn"/>
                        <input type="text" placeholder="" style="display:none" value="" id="dapAnSai"/>
                    </fieldset>
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-11 col-sm-12">
                                <div class="row" style="text-align:center;">
                                    <div class="col-sm-12 goiY">

                                    </div>
                                    <div class="col-sm-12 goiY" id="whiteSpace" >
                                        <button class="btn space_button" onclick="whiteSpace()" type="button">_____</button>
                                        <button class="btn space_button" onclick="backSpace()" type="button"><i class="fa-solid fa-delete-left">Xóa</i></button>
                                    </div>
                                    <div class="col-sm-12 goiY" id="backSpace" >

                                    </div>
                                </div>
                            </div>
                            <div class="col-md-1 col-sm-12" id="outMyBTN">
                                <button type="button" class="btn btnNExt" id="myBtn" onclick="next_Button()"><i
                                        class="fa fa-angle-double-right fa-2x" aria-hidden="true"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="ad-r ad-r-in-all">
        @include('front_end.layouts.ad_r')
    </div>
</div>


@include('front_end.layouts.footer')

<script src="assets/alertifyjs/alertify.min.js"></script>
<link rel="stylesheet" href="assets/alertifyjs/css/alertify.min.css"/>
<link rel="stylesheet" href="assets/alertifyjs/css/themes/default.min.css"/>
<script src="assets/js/dien_tu_2.js"></script>
</body>

</html>
