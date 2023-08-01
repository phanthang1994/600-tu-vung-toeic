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
                @if(count($results)>0)
                    <div class="rowFlexTestInnerLeft">
                        <div class="imgLeft" style="border:white solid 1px; border-radius:8px;"><img style="border-radius:8px;max-width: 200px;max-height: 200px;" src="{{ asset($results[0]->category_image) }}" alt="{{$results[0]->category_image}}" srcset=""></div>

                        <div style="text-align:left; margin-left: 10px;">
                            <a href="{{route('home')}}">
                                <p style="color:white; border-bottom: white solid 2px;">600tutoeic.com</p>
                            </a>
                            <p style="color:white">{{$results[0]->category_name}}<span>
                    </span> <br>{{$results[0]->category_description}}</p>
                        </div>
                    </div>
                @else
                    <div class="rowFlexTestInnerLeft">
                        <div style="text-align:left; margin-left: 10px;">
                            <a href="{{route('home')}}">
                                <p style="color:white; border-bottom: white solid 2px;">600tutoeic.com</p>
                            </a>
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
        <div class="col-thang" style="margin-top:2rem">
            @foreach($results as $item)
                <div class="borderClassTest">
                    <div class="borderInnerTest">
                        <div class="khuyetXuong" style="width:40px;height:40px;border-radius: 50% 50%; background-color:red;">
                        </div>
                        <div style="text-align:center; ">
                            <div class>
                                <a href="{{route('multiple_choice_question',$item->id)}}" >
                                    <aside class='ribbon' style="width: 170px;margin: 10px auto;">Chọn Từ</aside></a>
                            </div>

                            <div class>
                                <a href="{{route('form_question',$item->id)}}" >
                                    <aside class='ribbon' style="width: 170px;margin: 10px auto;">Chọn Nhiều Từ</aside>
                                </a>
                            </div>

                            <div class>
                                <a href="{{route('free_text_question',$item->id)}}" >
                                    <aside class='ribbon' style="width: 170px;margin: 10px auto;">Điền Từ</aside></a>
                            </div>

                        </div>
                        <div class="" style="">
                            <div class>
                                <aside class='arrow' style="width: 130px;margin: 10px auto;">{{$item->chu_de_name}}</aside>
                            </div>
                            <div class="" style="display:flex;flex-direction:column;">
                                <div class="cr  cr-orange" style="text-align:left;width:100%;margin: 5px 0;padding: 0 15px;">
                                    <i style="" class="fa fa-location-arrow">Số từ: </i>
                                    <span style="font-weight:bolder;" class="soTu">{{$item->tu_moi_count}}</span>
                                </div>
                                <div class="cr  cr-green" style="text-align:right;width: 100%;padding: 0 15px;">
                                    <i style="" class="fa fa-clock-o"></i>
                                    <span style="font-weight:bolder;" class="tongThoiGian">{{($item->time_to_test)}}</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach

        </div>

    </div>
    <div class="ad-r ad-r-in-all" >
        @include('front_end.layouts.ad_r')
    </div>
</div>
@include('front_end.layouts.footer')
</body>

</html>
<?php
