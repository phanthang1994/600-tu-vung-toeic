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
                @if(count($subjects)>0)
                <div class="rowFlexTestInnerLeft">
                    <div class="imgLeft" style="border:white solid 1px; border-radius:8px;"><img style="border-radius:8px;max-width: 200px;max-height: 200px;" src="{{ asset($subjects[0]->category_image) }}" alt="{{$subjects[0]->category_image}}" srcset=""></div>

                    <div style="text-align:left; margin-left: 10px;">
                        <p style="color:white; border-bottom: white solid 2px;">600tutoeic.com</p>
                        <p style="color:white">{{$subjects[0]->category_name}}<span>
                    </span> <br>{{$subjects[0]->category_description}}</p>
                    </div>
                </div>
                @endif
            </div>
        </div>
    </div>
</div>
<div class="">
    <div class="" style="background-color: #FFFFFF;border-bottom: #1b1e21 1px solid;">
        <div class="container" style="padding: 0 10px; text-align:left;">



            <div class="" style="width:100%;height:58px;display: flex;justify-content: flex-start; align-items: center;">

                <div>

                </div>
                <div>
                    <a id="tuKho" style=" visibility:hidden;display:block; width:100px;">
                        <i class="fa fa-bolt"></i>
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
        <div class="styleRow">
            @foreach($subjects as $item)

                <div class="borderClass">
                    <div class="innerWrap" >
                        <a href="event-details.html"><img style="width: 230px;height: 200px;"
                                                          src="{{ asset($item->chu_de_image) }}" alt="{{$item->chu_de_image}}"></a>
                        <div class="details-wrapper">
                            <div class="target-photo">
                                <img src="{{ asset('/assets/admin/img/chu_de/en.png') }}" alt="">
                            </div>

                            <div class="tiengAnhBoi">
                                        <span class="author pull-right">
                                            bởi

                                            <a href="#" data-role="hovercard"
                                               data-user-id="2224242" data-direction="bottom"
                                               class="author-link">{{$item->category_name}}</a>

                                        </span>
                                <a href="#" class="category"
                                   title="Tiếng Anh">Chủ đề</a>

                            </div>
                            <h3>
                                <a href="#" class="inner"
                                   title="Tiếng Anh (Anh Quốc) 1" style="font-size: 18px;">
                                    {{$item->chu_de_name}}
                                </a>
                            </h3>

                            <div class="details">

                                <div class="stats">
                                            <span class="stat1" title="670930 người đang học khóa học này">
                                                <i class="fa fa-user"></i>{{$item->so_nguoi_theo_hoc}}
                                            </span>
                                    <span class="stat2" title="Khóa học này cần khoảng 3h">
                                    <i class="fa fa-clock-o"></i>
                                                 {{$item->thoi_gian_hoc}}
                            </span>
                                </div>

                            </div>


                        </div>
                    </div>
                </div>
            @endforeach
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
