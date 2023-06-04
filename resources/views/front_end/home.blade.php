<x-HeadComponent css="home_header.css"></x-HeadComponent>
<x-HeadComponent css="slide_home.css"></x-HeadComponent>
<body style="background-color:#fcfaf2;"
@include('front_end.layouts.header')
<div class="outterAllCourseAtHome">
    <div class="allCourseHome" style="background-image:url(assets/img/bg/allCourseHome.PNG); background-repeat:no-repeat;">
        <div class="tcckh">
            Tất cả các khóa học
        </div>
        <div class="rightAllCourseHome">
            <svg viewBox="0 0 38 38" fill="none" xmlns="http://www.w3.org/2000/svg">
                <rect width="37.143" height="37.143" rx="18.571" fill="#74D8C1"></rect>
                <path fill-rule="evenodd" clip-rule="evenodd" d="M19 27.286a8.286 8.286 0 1 0 0-16.572 8.286 8.286 0 0 0 0 16.572zM19 29c5.523 0 10-4.477 10-10S24.523 9 19 9 9 13.477 9 19s4.477 10 10 10z" fill="#293749">
                </path><path fill-rule="evenodd" clip-rule="evenodd" d="M21.186 25.276c.795-1.518 1.338-3.734 1.338-6.276s-.543-4.758-1.338-6.276c-.838-1.599-1.697-2.01-2.186-2.01-.489 0-1.347.411-2.185 2.01-.795 1.518-1.339 3.734-1.339 6.276s.544 4.758 1.339 6.276c.838 1.599 1.696 2.01 2.185 2.01.49 0 1.348-.411 2.186-2.01zM19 29c2.893 0 5.238-4.477 5.238-10S21.893 9 19 9c-2.893 0-5.238 4.477-5.238 10S16.107 29 19 29z" fill="#293749">

                </path><path fill-rule="evenodd" clip-rule="evenodd" d="M27.095 13.762h-16.19l1.428-1.714h13.334l1.428 1.714zM28.048 19.286H9.953V17.57h18.095v1.715zM26.62 25.19H11.38l-.476-1.714h16.19l-.476 1.715z" fill="#293749">
                </path></svg>
            <i class="fa fa-chevron-down" aria-hidden="true"></i>
        </div>

    </div>

</div>
<div class="xuong" style=" ">
    <div class="ad-l" style="flex: 0.55;">
        @include('front_end.layouts.ad_l')
    </div>
    <div class="" style="flex: 0.85; ">
        <div class="thongTinDaHoc" style="margin: 20px 0;padding-right: 15px; padding-left: 15px;">
            @foreach($categories as $item)
                <div class="" style="background-color:#FCFAF2; display: flex;justify-content: center; " >
                    <div class="tatCaKhoaHocCon">
                        <div style="padding:10px 10px; ">
                            <img class="imgAtHome" src="{{$item->image}}" style="" alt="{{$item->image}}">
                        </div>
                        <div class="loGoImd" style=" padding:10px 10px;display: flex;flex-wrap:wrap;">
                            <ul class="" style="width:100%;">
                                <li class="" style="display: flex;justify-content:space-between;">
                                    <div class="aInHome" style="line-break: auto;">

                                            <p class="wrapbox auto aInHome">{{$item->category_name}}</p>

                                    </div>
                                </li>
                                <div class="dpvpxs" style="max-width: 350px;">
                                    <div class="cumBenTrai" style="margin-top:1rem;">

                                            <h4 style="color: #00a651">{{$item->description}}</h4>

                                    </div>
                                </div>
                                <div class="dpvpxs">
                                    <div class="cumBenPhai" style="margin-top:1rem;">
                                        <a class="" href="{{route('category_detail',$item->id)}}" style="font-weight:bolder;margin-left: 5px; padding:5px 5px; border-top: solid blue 2px; background-color:#FCFAF2 ">
                                            <i class="fa fa-rocket"></i>
                                            <span style="color: red; font-size: 1.5rem;">Test</span>
                                        </a>
                                        <a class="" href="{{route('category_detail',$item->id)}}" style="font-weight:bolder;margin-left: 5px; padding:5px 5px; border-bottom: solid blue 2px; background-color:#FCFAF2 ">
                                            <i class="fa fa-graduation-cap" style="font-size: 30px;"></i>
                                            <span style="color: red; font-size: 1.5rem;">Học</span>
                                        </a>
                                    </div>
                                </div>

                            </ul>
                        </div>
                    </div>
                </div>
            @endforeach

        </div>
    </div>
    <div class="ad-r" style="flex: 0.55">
        @include('front_end.layouts.ad_r')
    </div>
</div>
@include('front_end.layouts.footer_home')
<script src="{{url('assets/js/index_home.js')}}"></script>
<script>
    function callRoute() {
        window.location.href = "{{ route('courses') }}";
    }
    document.addEventListener("DOMContentLoaded", function() {
        var callRouteElement = document.querySelector(".call_route");
        callRouteElement.addEventListener("click", callRoute);
    });
</script>
</body>
</html>
