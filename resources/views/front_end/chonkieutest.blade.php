<x-HeadComponent css="all_course.css"></x-HeadComponent>
<x-HeadComponent css="home_header.css"></x-HeadComponent>
<x-HeadComponent css="slide_home.css"></x-HeadComponent>
<x-HeadComponent css="pagination.css"></x-HeadComponent>
<x-HeadComponent css="page_test.css"></x-HeadComponent>
<body style="background-color:#FCFAF2;">
@include('front_end.layouts.header')
<div class="">
    <div class="" style="background-color: #2B3648;border-top: 3px solid red; padding:1rem 1rem; ">
        <div class="container">
            <div class="rowFlexTest">
                <div class="rowFlexTestInnerLeft">
                    <div class="imgLeft" style="border:white solid 1px; border-radius:8px;"><img style="border-radius:8px;max-width: 200px;max-height: 200px;" src="assets/img/event/event-6.jpg" alt="" srcset=""></div>

                    <div style="text-align:left; margin-left: 10px;">
                        <p style="color:white; border-bottom: white solid 2px;">Khóa học &gt; Languages &gt; European &gt; English</p>
                        <p style="color:white">600 từ vựng TOEIC<span>
                        </span> <br> 1Tự giới thiệu bản thân, khám phá xung quanh</p>
                    </div>
                </div>
                <div>
                    <div class="rowFlexTestInnerRight" style="display:flex; justify-content:center; margin-top: 10px;">
                        <a style="align-self: center;"><img style="max-width: 100px;" alt="" src="assets/img/logo/logo.png"></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="">
    <div class="" style="background-color: #FFFFFF;border-bottom: #1b1e21 1px solid;">
        <div class="container" style="padding: 0 10px; text-align:left;">



            <div class="" style="width:100%;height:58px;display: flex;justify-content: flex-start; align-items: center;">

                <div>
                    <a style="font-weight:bolder;display:block; width:100px; padding-top: 5%; height:38px; background-color:#b2d3e0;border-radius: 15px; text-align:center;" href="/course/1658724/tieng-anh-anh-quoc-1/difficult-items/" class="">
                        <i class="fa fa-list-ul"></i>
                        Độ khó (9)
                    </a>
                </div>
                <div>
                    <a id="tuKho" style="font-weight:bolder;display:block; width:100px; padding-top: 5%; height:38px; border-radius: 15px; text-align:center;" href="/course/1658724/tieng-anh-anh-quoc-1/difficult-items/"class="">
                        <i class="fa fa-bolt"></i>
                        Từ khó
                    </a>
                </div>

            </div>



        </div>
    </div>
</div>
<div class="all" style="display: flex;justify-content: center; min-height: 100px; box-sizing: content-box;">
    <div class="ad-l ad-l-in-all" >
        @include('front_end.layouts.ad_l')
    </div>
    <div class="mainContent" style="display:flex;flex-direction:column;">
{{--        <div class="thongTinDaHoc" style="padding-right: 15px; padding-left: 15px; margin: 3rem 0;">--}}
{{--            <div class="" style="background-color: #FFFFFF; border-radius: 8px;" >--}}
{{--                <div class="" style="padding: 10px 10px;">--}}
{{--                    <div class="loGoImd" style="display: flex;flex-wrap:wrap;">--}}
{{--                        <ul class="" style="width:100%;">--}}
{{--                            <li class="" style="display: flex; justify-content:space-between">--}}
{{--                                <a href="/course/1658724/tieng-anh-anh-quoc-1/" class="tab" style="font-weight:bolder;display: block;">--}}
{{--                                    Đã học 6 / 172 từ (0 trong trí nhớ dài hạn)--}}
{{--                                </a>--}}
{{--                                <a href="/course/1658724/tieng-anh-anh-quoc-1/difficult-items/" class="" style="font-weight:bolder;display: block;">--}}
{{--                                    <span class="nav-premium"></span>--}}
{{--                                    34 bỏ qua--}}
{{--                                </a>--}}
{{--                            </li>--}}
{{--                            <li style="text-align: left;">--}}
{{--                                <progress style="width: 100%; border-radius: 0.25rem; height: 1.25rem;  overflow: hidden;" id="file" value="30" max="100"> 30% </progress>--}}
{{--                            </li>--}}
{{--                            <div class="tuyChon" style="display: flex;justify-content: flex-end;">--}}
{{--                                <button style="font-weight:bolder;margin-left: 5px; background-color:#B2D3E0;padding:5px 5px; border-radius: 8px;">--}}
{{--                                    <i class="fa fa-repeat"></i>--}}
{{--                                    bắt đầu lại--}}
{{--                                </button>--}}
{{--                                <button style="font-weight:bolder;margin-left: 5px;background-color:#B2D3E0;padding:5px 5px;border-radius: 8px;">--}}
{{--                                    <i class="fa fa-times"></i>--}}
{{--                                    Thoát--}}
{{--                                </button>--}}
{{--                                <button style="font-weight:bolder;margin-left: 5px; background-color:#B2D3E0;padding:5px 5px;border-radius: 8px;">--}}
{{--                                    Ôn tập (<span>6</span>)--}}
{{--                                </button>--}}
{{--                                <button style="font-weight:bolder;margin-left: 5px; background-color:#B2D3E0;padding:5px 5px;border-radius: 8px;">--}}
{{--                                    <i class="fa fa-headphones"></i>--}}
{{--                                    Luyện nghe--}}
{{--                                </button>--}}
{{--                            </div>--}}

{{--                        </ul>--}}
{{--                    </div>--}}

{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
        <div class="col-thang" style="margin-top:2rem">
            <div class="borderClassTest">
                <div class="borderInnerTest">
                    <div class="khuyetXuong" style="width:40px;height:40px;border-radius: 50% 50%; background-color:red;">
                    </div>
                    <div style="text-align:center; ">
                        <div class>
                            <aside class='ribbon' style="width: 170px;margin: 10px auto;">Điền Từ</aside>
                        </div>


                        <div class>
                            <aside class='ribbon' style="width: 170px;margin: 10px auto;">Chọn Từ</aside>
                        </div>


                        <div class>
                            <aside class='ribbon' style="width: 170px;margin: 10px auto;">Chọn Nhiều Từ</aside>
                        </div>

                    </div>
                    <div class="" style="">
                        <div class>
                            <aside class='arrow' style="width: 130px;margin: 10px auto;">Hợp đồng</aside>
                        </div>
                        <div class="" style="display:flex;flex-direction:column;">
                            <div class="cr  cr-orange" style="text-align:left;width:100%;margin: 5px 0;padding: 0 15px;">
                                <i style="" class="fa fa-location-arrow"></i>
                                <span style="font-weight:bolder;" class="soTu">30 từ</span>
                            </div>
                            <div class="cr  cr-green" style="text-align:right;width: 100%;padding: 0 15px;">
                                <i style="" class="fa fa-clock-o"></i>
                                <span style="font-weight:bolder;" class="tongThoiGian">00:01:15</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="borderClassTest">
                <div class="borderInnerTest">
                    <div class="khuyetXuong" >
                        <img src="seed (32k).png" alt="" srcset="" style="height:5%; background-color: aqua; border-radius: 50%;">
                    </div>
                    <div style="text-align:center;">
                        <div class="chonKieuTest" style=" margin-top: 15px;">
                            <i class="fa fa-angle-double-right" aria-hidden="true"></i>
                            <a>Điền từng từ</a>
                            <i class="fa fa-angle-double-left" aria-hidden="true"></i>
                        </div>
                        <div class="chonKieuTest">
                            <i class="fa fa-angle-double-right" aria-hidden="true"></i>
                            <a >Chọn từng từ</a>
                            <i class="fa fa-angle-double-left" aria-hidden="true"></i>
                        </div>
                        <div class="chonKieuTest">
                            <i class="fa fa-angle-double-right" aria-hidden="true"></i>
                            <a >Chọn nhiều từ</a>
                            <i class="fa fa-angle-double-left" aria-hidden="true"></i>
                        </div>
                    </div>
                    <div class="event-content">
                        <h4><a href="event-details.html">Agreement (Hợp đồng)</a></h4>
                        <div class="">
                            <div class="" style="position: relative;left: 0;">
                                <i style="" class="fa fa-location-arrow"></i>
                                <span>30 từ</span>
                            </div>
                            <div class="event-meta">
                                <i style="" class="fa fa-clock-o"></i>
                                <span>00:01:15</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="borderClassTest">
                <div class="borderInnerTest">
                    <div class="khuyetXuong" >
                        <img src="seed (32k).png" alt="" srcset="" style="height:5%; background-color: aqua; border-radius: 50%;">
                    </div>
                    <div style="text-align:center;">
                        <div class="chonKieuTest" style=" margin-top: 15px;">
                            <i class="fa fa-angle-double-right" aria-hidden="true"></i>
                            <a>Điền từng từ</a>
                            <i class="fa fa-angle-double-left" aria-hidden="true"></i>
                        </div>
                        <div class="chonKieuTest">
                            <i class="fa fa-angle-double-right" aria-hidden="true"></i>
                            <a >Chọn từng từ</a>
                            <i class="fa fa-angle-double-left" aria-hidden="true"></i>
                        </div>
                        <div class="chonKieuTest">
                            <i class="fa fa-angle-double-right" aria-hidden="true"></i>
                            <a >Chọn nhiều từ</a>
                            <i class="fa fa-angle-double-left" aria-hidden="true"></i>
                        </div>
                    </div>
                    <div class="event-content">
                        <h4><a href="event-details.html">Agreement (Hợp đồng)</a></h4>
                        <div class="event-meta-wrap">
                            <div class="event-meta">
                                <i style="display: block;" class="fa fa-location-arrow"></i>
                                <span>30 từ</span>
                            </div>
                            <div class="event-meta">
                                <i style="display: block;" class="fa fa-clock-o"></i>
                                <span>00:01:15</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="borderClassTest">
                <div class="borderInnerTest">
                    <div class="khuyetXuong" >
                        <img src="seed (32k).png" alt="" srcset="" style="height:5%; background-color: aqua; border-radius: 50%;">
                    </div>
                    <div style="text-align:center;">
                        <div class="chonKieuTest" style=" margin-top: 15px;">
                            <i class="fa fa-angle-double-right" aria-hidden="true"></i>
                            <a>Điền từng từ</a>
                            <i class="fa fa-angle-double-left" aria-hidden="true"></i>
                        </div>
                        <div class="chonKieuTest">
                            <i class="fa fa-angle-double-right" aria-hidden="true"></i>
                            <a >Chọn từng từ</a>
                            <i class="fa fa-angle-double-left" aria-hidden="true"></i>
                        </div>
                        <div class="chonKieuTest">
                            <i class="fa fa-angle-double-right" aria-hidden="true"></i>
                            <a >Chọn nhiều từ</a>
                            <i class="fa fa-angle-double-left" aria-hidden="true"></i>
                        </div>
                    </div>
                    <div class="event-content">
                        <h4><a href="event-details.html">Agreement (Hợp đồng)</a></h4>
                        <div class="event-meta-wrap">
                            <div class="event-meta">
                                <i style="display: block;" class="fa fa-location-arrow"></i>
                                <span>30 từ</span>
                            </div>
                            <div class="event-meta">
                                <i style="display: block;" class="fa fa-clock-o"></i>
                                <span>00:01:15</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="borderClassTest">
                <div class="borderInnerTest">
                    <div class="khuyetXuong" >
                        <img src="seed (32k).png" alt="" srcset="" style="height:5%; background-color: aqua; border-radius: 50%;">
                    </div>
                    <div style="text-align:center;">
                        <div class="chonKieuTest" style=" margin-top: 15px;">
                            <i class="fa fa-angle-double-right" aria-hidden="true"></i>
                            <a>Điền từng từ</a>
                            <i class="fa fa-angle-double-left" aria-hidden="true"></i>
                        </div>
                        <div class="chonKieuTest">
                            <i class="fa fa-angle-double-right" aria-hidden="true"></i>
                            <a >Chọn từng từ</a>
                            <i class="fa fa-angle-double-left" aria-hidden="true"></i>
                        </div>
                        <div class="chonKieuTest">
                            <i class="fa fa-angle-double-right" aria-hidden="true"></i>
                            <a >Chọn nhiều từ</a>
                            <i class="fa fa-angle-double-left" aria-hidden="true"></i>
                        </div>
                    </div>
                    <div class="event-content">
                        <h4><a href="event-details.html">Agreement (Hợp đồng)</a></h4>
                        <div class="event-meta-wrap">
                            <div class="event-meta">
                                <i style="display: block;" class="fa fa-location-arrow"></i>
                                <span>30 từ</span>
                            </div>
                            <div class="event-meta">
                                <i style="display: block;" class="fa fa-clock-o"></i>
                                <span>00:01:15</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <div class="ad-r ad-r-in-all" >
        @include('front_end.layouts.ad_r')
    </div>
</div>
@include('front_end.layouts.footer')
</body>

</html>
