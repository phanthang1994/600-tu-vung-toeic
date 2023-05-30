<x-HeadComponent css="home_header.css"></x-HeadComponent>
<x-HeadComponent css="new_words.css"></x-HeadComponent>
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
            href="#">

            <i class="fa fa-close fa-2x "
               style="align-self: center; margin-top: 5px; padding-bottom: 0; padding-top: 0; cursor: pointer;">
            </i>
        </a>
    </div>
</div>
<!-- phần body -->
<div class="container event-area pb-15" id="changeContainerToContainerFluid"
     style="padding-top: 2%; max-width: 1024px;">
    <div class="row">
        <!-- thanh progress ảnh và nội dung dùng chung-->
        <div class="col-lg-10 one">
            <!-- thanh progess dùng chung -->
            <div class="container-fluid">
                <div class="honey-bee">
                    <div class="row">
                        <div class="col-lg-12 col-8" style="padding-right: 0;">
                            <div id="progress">
                                <div class="bar" id="bar"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- ảnh và nội dung dùng chung cái được đưa vào slide-->
            <div class="container-fluid pt-2 provideNewWords-active mySlides" id="provideNewWords_1">
                <div class="row">
                    <div class="col-lg-5 col-md-6">
                        <div class="single-event mb-55 event-gray-bg">
                            <div class="event-img">
                                <div href="event-details.html">
                                    <img style="max-width: 348px;height: 289px;border-radius: 2rem;" src="" alt=""
                                         class="imagNewWords">
                                </div>

                            </div>
                        </div>
                    </div>
                    <div class="col-lg-7 col-md-6">
                        <div class="row">
                            <div class="text_right boder3D">
                                <label class="dXQZrX">Tiếng anh</label>
                                <h2 class="jPETsr newWords"></h2>
                                <label class="dXQZrX" style="margin-top: 10px;">Từ loại: <span
                                        class="attributes"></span></label>
                                <h3 class="jDSKR meaningWords" style="margin-bottom: 10px;"></h3>
                            </div>
                        </div>
                        <div class="row"
                             style="text-align: left; border-bottom:#030303 solid 4px; margin-top: 5px;">
                            <p style=" color: black;">
                                    <span style="text-decoration: line-through;">
                                        Ví dụ:
                                    </span>
                                <span class="exp">

                                    </span> <br>
                                <span style="padding-left: 2rem;">
                                        <spans tyle="padding-left: 1rem;" class="expMeaning"></spans>
                                    </span>
                            </p>
                        </div>
                        <div class="row text_right flexCustom">
                            <audio id="myAudio">
                                <source src="" type="audio/mpeg">
                                Your browser does not support the audio element.
                            </audio>
                            <button class="displayButtonAccordion button_play_audio" id="1" onclick="playAudio()"
                                    type="button">Nghe<i class="fa fa-bullhorn fa-2x" aria-hidden="true"></i></button>
                            <div>
                                <button class="displayButtonAccordion buttonCheTu">Chế từ và cấu trúc</button>
                                <div id="closeButtonCheTu01" class="modal">
                                    <div class="modal-content animate">
                                        <div class="">
                                            <span class="closeButtonCheTu">&times;</span>
                                        </div>
                                        <div class="cheTu">
                                            <div>
                                                <h3 class="" style="border-bottom:black solid 3px">
                                                    Chế từ
                                                </h3>
                                                <div>
                                                    Today now in this post i will show you How to json response from
                                                    controller in Laravel ? If we are working with REST API then we
                                                    have always need to return json data in response that way the
                                                    front-end developer can handle it easily.So here i will created
                                                </div>
                                            </div>
                                            <button type="button" class="cheTuVaCauTruc" data-toggle="modal"
                                                    data-target="#exampleModalCenter">
                                                <div>Trộn ngôn ngữ</div>
                                            </button>
                                        </div>
                                        <div class="cheTu">
                                            <div>
                                                <h3 class="" style="border-bottom:black solid 3px">
                                                    Cấu trúc câu
                                                </h3>
                                                <div>
                                                    Today now in this post i will show you How to json response from
                                                    controller in Laravel ? If we are working with REST API then we
                                                    have always need to return json data in response that way the
                                                    front-end developer can handle it easily.So here i will created
                                                </div>
                                            </div>
                                            <button type="button" class="cheTuVaCauTruc" data-toggle="modal"
                                                    data-target="#exampleModalCenter">
                                                <div>Ngữ Pháp Hay</div>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>

            </div>
        </div>
        <!-- nút điều hướng web, nút tiếp web, thanh phần trăm web-->
        <div id="mobileHiddenWeb" class="col-lg-2 two box-right" style="text-align: center">
            <!-- thanh phần trăm -->
            <div class="box mobileHiddenWebDisplay">
                <div class="mobileHiddenWebRemove boxPercent" value="0" style="width:90px;">
                    0
                </div>
            </div>
            <!-- nút tiếp web -->
            <button id="button" class="btn boder3D tiep"
                    style="width: 86px;margin-top: 5px;min-height: 112px; padding-top: 16px;padding-bottom: 16px;padding-right: 8px;padding-left: 8px;height: 114px;background-color: yellow;">
                <i class="fa fa-forward fa-4x" style="position: relative; bottom: 8px;"></i>
                <p class="" style="position: relative; bottom: 8px;">Tiếp</p>
            </button>
            <!-- nút xem tiếp web -->
            <button id="xemTiepWeb" class="btn boder3D xemTiep"
                    style="width: 86px;margin-top: 5px;min-height: 112px; padding-top: 16px;padding-bottom: 16px;padding-right: 8px;padding-left: 8px;height: 114px;background-color: yellow;">
                <i class="fa fa-forward fa-4x" style="position: relative; bottom: 8px;"></i>
                <p class="" style="position: relative; bottom: 8px;"></p>
            </button>
            <button  class="previousBtn btnSmallThan991px btn  btnBiggerThan991px"
                     style="margin-top: 5px; border-radius:100%;  background-color: yellow;"  onclick="plusSlides()" disabled>
                <i class="fa fa-backward fa-2x"></i>
            </button>
{{--            <button id="buttonXong" class="btnSmallThan991px btn  btnBiggerThan991px finishAll"--}}
{{--                    style="margin-top: 5px; border-radius:100%;  background-color: yellow;">--}}
{{--                <i class="fa fa-check" aria-hidden="true"></i>--}}
{{--                <p class="statusButton">Xong</p>--}}
{{--            </button>--}}

{{--            <button id="buttonKho" class="btnSmallThan991px btn btnBiggerThan991px khoBtt"--}}
{{--                    style=" margin-top: 5px;border-radius:100%;  background-color: yellow;">--}}
{{--                <i class="fa fa-bolt"></i>--}}
{{--                <p class="statusButton">Khó</p>--}}
{{--            </button>--}}

{{--            <button id="buttonThuoc" class="btnSmallThan991px btn  btnBiggerThan991px thuocSTT"--}}
{{--                    style="margin-top: 5px; border-radius:100%;  background-color: yellow;">--}}
{{--                <i class="fa fa-minus"></i>--}}
{{--                <p class="statusButton">Thuộc</p>--}}
{{--            </button>--}}

        </div>
        <!-- thanh điều hướng mobile -->
        <div class="col-lg-1 col-4" id="progressMobile">
            <div class="row ">
                <div class="box progressMobileDisplay">
                    <div class="progressMobileHidden boxPercent" id="" value="0" style="width:auto;">
                        0%</div>
                </div>
{{--                <button id="buttonKhoMobile" class="col-2 button khoBtt" style=" width: 100%;--}}
{{--                    height: 35px; padding-top: -10px;"> <i class="fa fa-bolt"></i> </button>--}}
{{--                <button id="buttonThuocMobile" class="col-2 button thuocSTT" style=" width: 100%;--}}
{{--                    height: 35px;"><i class="fa fa-minus"></i></button>--}}
{{--                <button id="buttonXongMobile" class="col-2 button finishAll" style=" width: 100%;--}}
{{--                    height: 35px;">--}}
{{--                    <i class="fa fa-check" aria-hidden="true"></i>--}}
{{--                </button>--}}
            </div>
        </div>

        <button  class="previousBtn nextButtonMobile boder3D" onclick="plusSlidesMobile()">
            <i class="fa fa-backward fa-3x"></i>
        </button>
        <!-- nút next mobile -->
        <button id="buttonTiepMobile" class="nextButtonMobile boder3D tiep">
            <i class="fa fa-forward fa-3x"></i>
            <p class="nextButton">Tiếp</p>
        </button>
        <!--        xem tiếp mobile-->
        <button id="xemTiepMobile" class="nextButtonMobile boder3D xemTiep xemTiepMobile xemTiepDeActive">
            <i class="fa fa-forward fa-3x" ></i>
            <p class="nextButton">Tiếp</p>
        </button>
    </div>
</div>
<!-- Newsletter Popup Start -->
<div id="id01" class="modal">
    <div class="modal-content animate">
        <div class="imgcontainer">
            <span onclick="closeButton()" class="close" title="Close Modal">&times;</span>
        </div>
        <div class="chosingButton">
            <button type="button" class="continueStudying" data-toggle="modal" data-target="#exampleModalCenter">
                <img src="seed (64).png" style="height:4rem;" alt="" srcset="">
                <div> Học tiếp từ mới</div>
            </button>
            <div class="outlineDot">
                <div class="actionEnd">
                    <div class="dot"><img src="fertilize (64).png" style="width: 72%;" alt="" srcset=""></div>
                    <p>Học lại</p>
                </div>
                <div class="actionEnd">
                    <div class="dot"><img src="watering-can (64).png" style="width: 72%;" alt="" srcset=""></div>
                    <p>Ôn tập</p>
                </div>
                <div class="actionEnd">
                    <div class="dot"><img src="test (64).png" style="width: 72%;" alt="" srcset=""></div>
                    <p>Kiểm tra</p>
                </div>
            </div>
        </div>
    </div>
</div>

@include('front_end.layouts.footer')
<script src="assets/js/new_words.js"></script>

</body>

</html>
