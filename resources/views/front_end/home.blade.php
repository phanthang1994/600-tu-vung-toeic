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
            <svg viewBox="0 0 38 38" fill="none" xmlns="http://www.w3.org/2000/svg"><rect width="37.143" height="37.143" rx="18.571" fill="#74D8C1"></rect><path fill-rule="evenodd" clip-rule="evenodd" d="M19 27.286a8.286 8.286 0 1 0 0-16.572 8.286 8.286 0 0 0 0 16.572zM19 29c5.523 0 10-4.477 10-10S24.523 9 19 9 9 13.477 9 19s4.477 10 10 10z" fill="#293749"></path><path fill-rule="evenodd" clip-rule="evenodd" d="M21.186 25.276c.795-1.518 1.338-3.734 1.338-6.276s-.543-4.758-1.338-6.276c-.838-1.599-1.697-2.01-2.186-2.01-.489 0-1.347.411-2.185 2.01-.795 1.518-1.339 3.734-1.339 6.276s.544 4.758 1.339 6.276c.838 1.599 1.696 2.01 2.185 2.01.49 0 1.348-.411 2.186-2.01zM19 29c2.893 0 5.238-4.477 5.238-10S21.893 9 19 9c-2.893 0-5.238 4.477-5.238 10S16.107 29 19 29z" fill="#293749"></path><path fill-rule="evenodd" clip-rule="evenodd" d="M27.095 13.762h-16.19l1.428-1.714h13.334l1.428 1.714zM28.048 19.286H9.953V17.57h18.095v1.715zM26.62 25.19H11.38l-.476-1.714h16.19l-.476 1.715z" fill="#293749"></path></svg>
            <i class="fa fa-chevron-down" aria-hidden="true"></i>
        </div>

    </div>

</div>
<div class="xuong" style=" ">
    <div class="ad-l" style="flex: 0.5;">
        @include('front_end.layouts.ad_l')
    </div>
    <div class="" style="flex: 2.5; ">
        <div class="thongTinDaHoc" style="margin: 20px 0;padding-right: 15px; padding-left: 15px;">
            <div class="" style="background-color:#FCFAF2; display: flex;justify-content: center; " >
                <div class="tatCaKhoaHocCon">
                    <div style="padding:10px 10px; ">
                        <img class="imgAtHome" src="assets/img/course/course-1.jpg" style="" alt="Tiếng Anh (Anh Quốc) 1">
                    </div>
                    <div class="loGoImd" style=" padding:10px 10px;display: flex;flex-wrap:wrap;">
                        <ul class="" style="width:100%;">
                            <li class="" style="display: flex;justify-content:space-between;">
                                <a class="aInHome" href="#" style="line-break: auto;">
                                    <p class="wrapbox auto aInHome">600 từ vựng TOEIC</p>
                                </a>

{{--                                <a href="#" class="" style="font-weight:bolder;display: block;">--}}
{{--                                    <i class="fa fa-ellipsis-v" aria-hidden="true"></i>--}}

{{--                                </a>--}}
                            </li>
{{--                            <li>--}}
{{--                                <div class="" style="margin-bottom: 1rem;" >--}}
{{--                                    <span class="" style="font-weight: 700; margin-right: 2rem;">3%</span>--}}
{{--                                    <span class="" style="margin: 0 10px;font-size: 1rem;font-weight: 700;">6 / 172</span>--}}
{{--                                    mục đã học--}}
{{--                                </div>--}}
{{--                            </li>--}}
{{--                            <li style="text-align: left;">--}}
{{--                                <progress style="width: 100%; border-radius: 0.25rem; height: 1.25rem;  overflow: hidden;" id="file" value="30" max="100"> 30% </progress>--}}
{{--                            </li>--}}
                            <div class="dpvpxs">
                                <div class="cumBenTrai" style="margin-top:1rem;">
                                    <p>Từ cần thiết để bắt đầu học TOEIC</p>

                                    {{--                                    <button class="" data-toggle="tooltip" data-placement="top" title="Kiểm tra" style="font-weight:bolder;margin-left: 5px; padding:5px 5px; border: none; background-color:#FCFAF2 ">--}}
{{--                                        <i class="fa fa-rocket"></i>--}}
{{--                                        <span>0</span>--}}
{{--                                    </button>--}}
{{--                                    <button data-toggle="tooltip" data-placement="top" title="Từ ôn tập" style="font-weight:bolder;margin-left: 5px;background-color:#FCFAF2;padding:5px 5px;border: none;">--}}
{{--                                        <svg width="40" height="40" viewBox="0 0 48 48" fill="none" xmlns="http://www.w3.org/2000/svg"><g id="Review"><path id="Combined Shape" fill-rule="evenodd" clip-rule="evenodd" d="M29.469 6.008c2.165-.098 3.987.705 5.571 2.187 1.453 1.36 2.505 2.966 3.23 4.803 1.69 4.28 3.38 8.56 5.076 12.838.637 1.606 1.285 3.209 1.932 4.812l.201.497c.684 1.693.624 1.856-1.045 2.631l-3.202 1.489c-4.132 1.921-8.264 3.842-12.4 5.752-1.341.618-2.027.345-2.668-1.023l-.086-.184c-.654-1.396-1.309-2.794-1.895-4.22-.262-.637-.625-1.064-1.258-1.327-.848-.352-1.69-.72-2.531-1.089-.497-.218-.994-.435-1.493-.65-2.443-1.05-4.887-2.098-7.331-3.146l-1.963-.842-.1-.043c-.38-.163-.76-.325-1.142-.482-.258-.105-.51-.161-.67.161-.2.4-.54.34-.875.243a86.363 86.363 0 0 0-.324-.093c-.469-.134-.938-.269-1.395-.435-.625-.227-.757-.51-.511-1.13.213-.539.45-1.068.688-1.597.1-.223.199-.444.296-.667l.154-.35c.159-.364.318-.726.481-1.087.348-.768.56-.878 1.403-.73.185.032.367.079.549.126.852.222.905.238.935 1.119.02.54.223.787.732.955 2.616.863 5.226 1.744 7.836 2.624l2.712.914c.11.037.223.07.335.103l.096.029c.386.116.503-.031.361-.39-.322-.819-.65-1.635-.976-2.451l-.23-.573c-.167-.418-.34-.834-.512-1.25-.372-.897-.744-1.794-1.064-2.709-1.205-3.45-.956-6.78 1.032-9.896.882-1.384 2.11-2.435 3.577-3.173 2.026-1.02 4.139-1.761 6.474-1.746zm-8.844 10.717.037.335c.033.3.072.644.115.987.168 1.334.262 1.385 1.547.856l2.54-1.044a6204.72 6204.72 0 0 0 7.314-3.012 117.95 117.95 0 0 0 2.472-1.056c.286-.125.543-.286.345-.678l-.197-.393c-.452-.903-.903-1.803-1.562-2.591-.802-.96-1.764-1.372-3.035-1.347-2.127.043-4.04.722-5.859 1.723-2.391 1.316-3.63 3.364-3.717 6.22zM6.748 36.91c.895-.817 1.033-2.195.186-3.939l-.48-.665a76.892 76.892 0 0 0-1.673-2.27c-.275-.355-.68-.459-.971.054-.817 1.435-1.51 2.928-1.778 4.55-.193 1.175.502 2.264 1.59 2.794.938.458 2.301.23 3.126-.524z" fill="#2B3648"></path></g></svg>--}}

{{--                                        <span>6</span>--}}
{{--                                    </button>--}}
{{--                                    <button data-toggle="tooltip" data-placement="top" title="Từ khó" style="font-weight:bolder;margin-left: 5px;background-color:#FCFAF2;padding:5px 5px;border: none;">--}}
{{--                                        <i class="fa fa-bolt"></i>--}}
{{--                                        <span>1</span>--}}
{{--                                    </button>--}}
                                </div>
{{--                                <div class="cumBenPhai"  style="margin-top:1rem;">--}}
{{--                                    <button  style="font-weight:bolder;margin-left: 5px;border: none; background-color:#FFC119;padding:5px 5px;border-radius: 1rem;">--}}
{{--                                        <a class="xTAIE">--}}
{{--                                            <svg width="40" height="40" viewBox="0 0 48 48" fill="none" xmlns="http://www.w3.org/2000/svg"><g id="Review"><path id="Combined Shape" fill-rule="evenodd" clip-rule="evenodd" d="M29.469 6.008c2.165-.098 3.987.705 5.571 2.187 1.453 1.36 2.505 2.966 3.23 4.803 1.69 4.28 3.38 8.56 5.076 12.838.637 1.606 1.285 3.209 1.932 4.812l.201.497c.684 1.693.624 1.856-1.045 2.631l-3.202 1.489c-4.132 1.921-8.264 3.842-12.4 5.752-1.341.618-2.027.345-2.668-1.023l-.086-.184c-.654-1.396-1.309-2.794-1.895-4.22-.262-.637-.625-1.064-1.258-1.327-.848-.352-1.69-.72-2.531-1.089-.497-.218-.994-.435-1.493-.65-2.443-1.05-4.887-2.098-7.331-3.146l-1.963-.842-.1-.043c-.38-.163-.76-.325-1.142-.482-.258-.105-.51-.161-.67.161-.2.4-.54.34-.875.243a86.363 86.363 0 0 0-.324-.093c-.469-.134-.938-.269-1.395-.435-.625-.227-.757-.51-.511-1.13.213-.539.45-1.068.688-1.597.1-.223.199-.444.296-.667l.154-.35c.159-.364.318-.726.481-1.087.348-.768.56-.878 1.403-.73.185.032.367.079.549.126.852.222.905.238.935 1.119.02.54.223.787.732.955 2.616.863 5.226 1.744 7.836 2.624l2.712.914c.11.037.223.07.335.103l.096.029c.386.116.503-.031.361-.39-.322-.819-.65-1.635-.976-2.451l-.23-.573c-.167-.418-.34-.834-.512-1.25-.372-.897-.744-1.794-1.064-2.709-1.205-3.45-.956-6.78 1.032-9.896.882-1.384 2.11-2.435 3.577-3.173 2.026-1.02 4.139-1.761 6.474-1.746zm-8.844 10.717.037.335c.033.3.072.644.115.987.168 1.334.262 1.385 1.547.856l2.54-1.044a6204.72 6204.72 0 0 0 7.314-3.012 117.95 117.95 0 0 0 2.472-1.056c.286-.125.543-.286.345-.678l-.197-.393c-.452-.903-.903-1.803-1.562-2.591-.802-.96-1.764-1.372-3.035-1.347-2.127.043-4.04.722-5.859 1.723-2.391 1.316-3.63 3.364-3.717 6.22zM6.748 36.91c.895-.817 1.033-2.195.186-3.939l-.48-.665a76.892 76.892 0 0 0-1.673-2.27c-.275-.355-.68-.459-.971.054-.817 1.435-1.51 2.928-1.778 4.55-.193 1.175.502 2.264 1.59 2.794.938.458 2.301.23 3.126-.524z" fill="#2B3648"></path></g></svg>--}}
{{--                                            <span class="tinhTrangBenPhai autoCumbenPhai">Ôn tập thông thường</span>--}}
{{--                                        </a>--}}
{{--                                    </button>--}}
{{--                                    <button style="font-weight:bolder;margin-left: 5px; border: none;background-color:#FFC119;padding:5px 5px;border-radius: 1rem;">--}}
{{--                                        <i class="fa fa-bars"></i>--}}
{{--                                    </button>--}}
{{--                                </div>--}}
                            </div>

                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="ad-r" style="flex: 0.5">
        @include('front_end.layouts.ad_r')
    </div>
</div>
@include('front_end.layouts.footer')
<script src="{{url('assets/js/index_home.js')}}"></script>
<script>
    $(document).ready(function(){
        $('[data-toggle="tooltip"]').tooltip();
    });
</script>
</body>
</html>
