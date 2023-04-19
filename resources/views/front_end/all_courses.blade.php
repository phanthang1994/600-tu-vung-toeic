<x-HeadComponent css="all_course.css"></x-HeadComponent>
<x-HeadComponent css="home_header.css"></x-HeadComponent>
<x-HeadComponent css="pagination.css"></x-HeadComponent>
<x-HeadComponent css="page_test.css"></x-HeadComponent>
<body style="background-color:#fcfaf2;"
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
{{--                <div>--}}
{{--                    <div class="rowFlexTestInnerRight" style="display:flex; justify-content:center; margin-top: 10px;">--}}
{{--                        <a style="align-self: center;"><img style="max-width: 100px;" alt="" src="assets/img/logo/logo.png"></a>--}}
{{--                    </div>--}}
{{--                </div>--}}
            </div>
        </div>
    </div>
</div>
<div class="">
    <div class="" style="background-color: #FFFFFF;border-bottom: #1b1e21 1px solid;">
        <div class="container" style="padding: 0 10px; text-align:left;">



            <div class="" style="width:100%;height:58px;display: flex;justify-content: flex-start; align-items: center;">

                <div>
{{--                    <a style="font-weight:bolder;display:block; width:100px; padding-top: 5%; height:38px; background-color:#b2d3e0;border-radius: 15px; text-align:center;" href="/course/1658724/tieng-anh-anh-quoc-1/difficult-items/" class="">--}}
{{--                        <i class="fa fa-list-ul"></i>--}}
{{--                        Độ khó (9)--}}
{{--                    </a>--}}
                </div>
                <div>
                    <a id="tuKho" style="font-weight:bolder;display:block; width:100px; padding-top: 5%; height:38px; border-radius: 15px; text-align:center;" href="/course/1658724/tieng-anh-anh-quoc-1/difficult-items/" class="">
                        <i class="fa fa-bolt"></i>
                        Độ khó (9)
                    </a>
                </div>

            </div>



        </div>
    </div>
</div>
<div class="all" style="display: flex;justify-content: center; min-height: 100px; box-sizing: content-box;">
    <div class="ad-l ad-l-in-all" style="flex: 0.5;">
        @include('front_end.layouts.ad_l')
    </div>
    <div class="mainContent" style="flex: 2.5">
{{--        <div class="thongTinDaHoc" style="padding-right: 15px; padding-left: 15px; margin: 3rem 0;">--}}
{{--            <div class="" style="background-color: #FFFFFF; border-radius: 8px;">--}}
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
        <div class="styleRow">
            <div class="borderClass">
                <div class="innerWrap" >
                    <a href="event-details.html"><img style="width: 200px;height: 200px;"
                                                      src="assets/img/event/event-6.jpg" alt=""></a>
                    <div class="details-wrapper">
                        <div class="target-photo">
                            <img src="https://static.memrise.com/uploads/category_photos/en.png" alt="">
                        </div>

                        <div class="tiengAnhBoi">
                                        <span class="author pull-right">
                                            bởi

                                            <a href="/user/Memrise/courses/teaching/" data-role="hovercard"
                                               data-user-id="2224242" data-direction="bottom"
                                               class="author-link">Memrise</a>

                                        </span>
                            <a href="/vi/courses/vietnamese/english/" class="category"
                               title="Tiếng Anh">Chủ đề</a>

                        </div>
                        <h3>
                            <a href="/course/1658724/tieng-anh-anh-quoc-1/" class="inner"
                               title="Tiếng Anh (Anh Quốc) 1" style="font-size: 18px;">
                                Hợp đồng
                            </a>
                        </h3>

                        <div class="details">

                            <div class="stats">
                                            <span class="stat1" title="670930 người đang học khóa học này">
                                                <i class="fa fa-user"></i> 671k
                                            </span>
                                <span class="stat2" title="Khóa học này cần khoảng 3h">
                                    <i class="fa fa-clock-o"></i>
                                                 3h
                            </span>
                            </div>

                        </div>


                    </div>
                </div>
            </div>
            <div class="borderClass">
                <div class="innerWrap" >
                    <a href="event-details.html"><img style="width: 200px;height: 200px;"
                                                      src="assets/img/event/event-6.jpg" alt=""></a>
                    <div class="details-wrapper" style="position:relative;top:-50px;">
                        <div class="target-photo">
                            <img src="https://static.memrise.com/uploads/category_photos/en.png" alt="">
                        </div>

                        <div class="clearfix" style="margin-top: 10px;">
                                        <span class="author pull-right">
                                            bởi

                                            <a href="/user/Memrise/courses/teaching/" data-role="hovercard"
                                               data-user-id="2224242" data-direction="bottom"
                                               class="author-link">Memrise</a>

                                        </span>
                            <a href="/vi/courses/vietnamese/english/" class="category"
                               title="Tiếng Anh">Tiếng Anh</a>

                        </div>
                        <h3>
                            <a href="/course/1658724/tieng-anh-anh-quoc-1/" class="inner"
                               title="Tiếng Anh (Anh Quốc) 1" style="font-size: 18px;">
                                Tiếng Anh (Anh Quốc) 1
                            </a>
                        </h3>

                        <div class="details">

                            <div class="stats">
                                            <span class="stat1" title="670930 người đang học khóa học này">
                                                <span class="ico ico-user"></span> 671k
                                            </span>
                                <span class="stat2" title="Khóa học này cần khoảng 3h">
                                                <span class="ico ico-clock" style="width:100%"></span> 3h</span>
                            </div>

                        </div>


                    </div>
                </div>
            </div>
            <div class="borderClass">
                <div class="innerWrap" >
                    <a href="event-details.html"><img style="width: 200px;height: 200px;"
                                                      src="assets/img/event/event-6.jpg" alt=""></a>
                    <div class="details-wrapper" style="position:relative;top:-50px;">
                        <div class="target-photo">
                            <img src="https://static.memrise.com/uploads/category_photos/en.png" alt="">
                        </div>

                        <div class="clearfix" style="margin-top: 10px;">
                                        <span class="author pull-right">
                                            bởi

                                            <a href="/user/Memrise/courses/teaching/" data-role="hovercard"
                                               data-user-id="2224242" data-direction="bottom"
                                               class="author-link">Memrise</a>

                                        </span>
                            <a href="/vi/courses/vietnamese/english/" class="category"
                               title="Tiếng Anh">Tiếng Anh</a>

                        </div>
                        <h3>
                            <a href="/course/1658724/tieng-anh-anh-quoc-1/" class="inner"
                               title="Tiếng Anh (Anh Quốc) 1" style="font-size: 18px;">
                                Tiếng Anh (Anh Quốc) 1
                            </a>
                        </h3>

                        <div class="details">

                            <div class="stats">
                                            <span class="stat1" title="670930 người đang học khóa học này">
                                                <span class="ico ico-user"></span> 671k
                                            </span>
                                <span class="stat2" title="Khóa học này cần khoảng 3h">
                                                <span class="ico ico-clock" style="width:100%"></span> 3h</span>
                            </div>

                        </div>


                    </div>
                </div>
            </div>
            <div class="borderClass">
                <div class="innerWrap" >
                    <a href="event-details.html"><img style="width: 200px;height: 200px;"
                                                      src="assets/img/event/event-6.jpg" alt=""></a>
                    <div class="details-wrapper" style="position:relative;top:-50px;">
                        <div class="target-photo">
                            <img src="https://static.memrise.com/uploads/category_photos/en.png" alt="">
                        </div>

                        <div class="clearfix" style="margin-top: 10px;">
                                        <span class="author pull-right">
                                            bởi

                                            <a href="/user/Memrise/courses/teaching/" data-role="hovercard"
                                               data-user-id="2224242" data-direction="bottom"
                                               class="author-link">Memrise</a>

                                        </span>
                            <a href="/vi/courses/vietnamese/english/" class="category"
                               title="Tiếng Anh">Tiếng Anh</a>

                        </div>
                        <h3>
                            <a href="/course/1658724/tieng-anh-anh-quoc-1/" class="inner"
                               title="Tiếng Anh (Anh Quốc) 1" style="font-size: 18px;">
                                Tiếng Anh (Anh Quốc) 1
                            </a>
                        </h3>

                        <div class="details">

                            <div class="stats">
                                            <span class="stat1" title="670930 người đang học khóa học này">
                                                <span class="ico ico-user"></span> 671k
                                            </span>
                                <span class="stat2" title="Khóa học này cần khoảng 3h">
                                                <span class="ico ico-clock" style="width:100%"></span> 3h</span>
                            </div>

                        </div>


                    </div>
                </div>
            </div>
            <div class="borderClass">
                <div class="innerWrap" >
                    <a href="event-details.html"><img style="width: 200px;height: 200px;"
                                                      src="assets/img/event/event-6.jpg" alt=""></a>
                    <div class="details-wrapper" style="position:relative;top:-50px;">
                        <div class="target-photo">
                            <img src="https://static.memrise.com/uploads/category_photos/en.png" alt="">
                        </div>

                        <div class="clearfix" style="margin-top: 10px;">
                                        <span class="author pull-right">
                                            bởi

                                            <a href="/user/Memrise/courses/teaching/" data-role="hovercard"
                                               data-user-id="2224242" data-direction="bottom"
                                               class="author-link">Memrise</a>

                                        </span>
                            <a href="/vi/courses/vietnamese/english/" class="category"
                               title="Tiếng Anh">Tiếng Anh</a>

                        </div>
                        <h3>
                            <a href="/course/1658724/tieng-anh-anh-quoc-1/" class="inner"
                               title="Tiếng Anh (Anh Quốc) 1" style="font-size: 18px;">
                                Tiếng Anh (Anh Quốc) 1
                            </a>
                        </h3>

                        <div class="details">

                            <div class="stats">
                                            <span class="stat1" title="670930 người đang học khóa học này">
                                                <span class="ico ico-user"></span> 671k
                                            </span>
                                <span class="stat2" title="Khóa học này cần khoảng 3h">
                                                <span class="ico ico-clock" style="width:100%"></span> 3h</span>
                            </div>

                        </div>


                    </div>
                </div>
            </div>
            <div class="borderClass">
                <div class="innerWrap" >
                    <a href="event-details.html"><img style="width: 200px;height: 200px;"
                                                      src="assets/img/event/event-6.jpg" alt=""></a>
                    <div class="details-wrapper" style="position:relative;top:-50px;">
                        <div class="target-photo">
                            <img src="https://static.memrise.com/uploads/category_photos/en.png" alt="">
                        </div>

                        <div class="clearfix" style="margin-top: 10px;">
                                        <span class="author pull-right">
                                            bởi

                                            <a href="/user/Memrise/courses/teaching/" data-role="hovercard"
                                               data-user-id="2224242" data-direction="bottom"
                                               class="author-link">Memrise</a>

                                        </span>
                            <a href="/vi/courses/vietnamese/english/" class="category"
                               title="Tiếng Anh">Tiếng Anh</a>

                        </div>
                        <h3>
                            <a href="/course/1658724/tieng-anh-anh-quoc-1/" class="inner"
                               title="Tiếng Anh (Anh Quốc) 1" style="font-size: 18px;">
                                Tiếng Anh (Anh Quốc) 1
                            </a>
                        </h3>

                        <div class="details">

                            <div class="stats">
                                            <span class="stat1" title="670930 người đang học khóa học này">
                                                <span class="ico ico-user"></span> 671k
                                            </span>
                                <span class="stat2" title="Khóa học này cần khoảng 3h">
                                                <span class="ico ico-clock" style="width:100%"></span> 3h</span>
                            </div>

                        </div>


                    </div>
                </div>
            </div>
        </div>
        <div class="pro-pagination-style text-center mt-25">
            <ul>
                <li><a class="prev" href="#"><i class="fa fa-angle-double-left"></i></a></li>
                <li><a class="active" href="#">1</a></li>
                <li><a href="#">2</a></li>
                <li><a class="next" href="#"><i class="fa fa-angle-double-right"></i></a></li>
            </ul>
        </div>
    </div>
    <div class="ad-r ad-r-in-all" style="flex: 0.5">
        @include('front_end.layouts.ad_r')
    </div>
</div>
@include('front_end.layouts.footer')
</body>
</html>
