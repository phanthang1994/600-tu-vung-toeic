<x-HeadComponent css="all_course.css"></x-HeadComponent>
<x-HeadComponent css="home_header.css"></x-HeadComponent>
<x-HeadComponent css="pagination.css"></x-HeadComponent>
<x-HeadComponent css="style_chon_tu_hoc.css"></x-HeadComponent>
<x-HeadComponent css="page_test.css"></x-HeadComponent>
<body style="background-color:#fcfaf2;"
@include('front_end.layouts.header')
<div class="" >
    <div class="" style="background-color: #2B3648;border-top: 3px solid red; padding-top: 1rem;">
        <div class="container">
            <div class="rowFlexTest">
                <div class="rowFlexTestInnerLeft">
                    <div class="loGoImd" style="display: flex;flex-wrap:wrap;">
                        <div class="logo" style="margin-bottom: 15px; margin-right:5px">
                            <img style="border-radius:8px;max-width: 50px;max-height: 50px;" src="assets/img/event/event-6.jpg" alt="" srcset="">
                        </div>
                        <div style=" border-radius:8px;">
                            <img style="border-radius:8px;max-width: 50px;max-height: 50px;" src="assets/img/event/event-6.jpg" alt="" srcset="">
                        </div>
                    </div>
                    <div style="text-align:left; margin-left: 10px;">
                        <p style="color:white">600 từ vựng TOEIC<span>
                        </span> <br> 1Tự giới thiệu bản thân, khám phá xung quanh</p>
                    </div>
                </div>
                <div >
                    <div class="rowFlexTestInnerRight" style="display:flex; justify-content:center; margin-top: 10px;">
                        <a style="align-self: center;"><img alt="" style="max-width: 100px;" src="assets/img/logo/logo.png"></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="" style="background-color: #FFFFFF;border-bottom: #1b1e21 1px solid;">
    <div class="container" style="padding: 0 10px; text-align:left;">
        <div class="" style="width:100%;height:58px;display: flex;justify-content: flex-start; align-items: center;">

            <div>
{{--                <a style="font-weight:bolder;display:block; width:100px; padding-top: 5%; height:38px; background-color:#b2d3e0;border-radius: 15px; text-align:center;" href="/course/1658724/tieng-anh-anh-quoc-1/difficult-items/" class="">--}}
{{--                    <i class="fa fa-list-ul"></i>--}}
{{--                    Độ khó (9)--}}
{{--                </a>--}}
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

<div class="all">
    <div class="ad-l ad-l-in-all">
        @include('front_end.layouts.ad_l')
    </div>
    <div class="mainContent">
{{--        <div class="khoaTiepThongTinDaHoc">--}}
{{--            <div class="thongTinDaHoc" style="padding-right: 15px; padding-left: 15px; margin: 3rem 0;">--}}
{{--                <div class="" style="background-color: #FFFFFF; border-radius: 8px;" >--}}
{{--                    <div class="" style="padding: 10px 10px;">--}}
{{--                        <div class="loGoImd" style="display: flex;flex-wrap:wrap;">--}}
{{--                            <ul class="" style="width:100%;">--}}
{{--                                <li class="" style="display: flex; justify-content:space-between">--}}
{{--                                    <a href="/course/1658724/tieng-anh-anh-quoc-1/" class="tab" style="font-weight:bolder;display: block;">--}}
{{--                                        Đã học 6 / 172 từ (0 trong trí nhớ dài hạn)--}}
{{--                                    </a>--}}
{{--                                    <a href="/course/1658724/tieng-anh-anh-quoc-1/difficult-items/" class="" style="font-weight:bolder;display: block;">--}}
{{--                                        34 bỏ qua--}}
{{--                                    </a>--}}
{{--                                </li>--}}
{{--                                <li style="text-align: left;">--}}
{{--                                    <progress style="width: 100%; border-radius: 0.25rem; height: 1.25rem;  overflow: hidden;" id="file" value="30" max="100"> 30% </progress>--}}
{{--                                </li>--}}
{{--                                <div class="tuyChon" style="display: flex;justify-content: flex-end;  height:40px;">--}}
{{--                                    <button style="font-weight:bolder;margin-left: 5px; background-color:#B2D3E0;padding:5px 5px; border-radius: 8px;">--}}
{{--                                        <i class="fa fa-repeat"></i>--}}
{{--                                        bắt đầu lại--}}
{{--                                    </button>--}}
{{--                                </div>--}}
{{--                            </ul>--}}

{{--                        </div>--}}

{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--            <div class="tuyChon" style="display: flex;justify-content: flex-end; align-self: center;">--}}
{{--                <button style=" font-weight:bolder;margin-left: 5px; background-color:#B2D3E0;padding:5px 5px; border-radius: 8px;">--}}
{{--                    <span style="border-right: 1px solid red">Chủ Đề Tiếp</span>--}}
{{--                    <span style="display:block;" id="chuDeTiepTheo">Thanh toán</span>--}}
{{--                    <i class="fa fa-angle-right fa-3x"></i>--}}
{{--                </button>--}}
{{--            </div>--}}
{{--        </div>--}}

        <div class="">
            <div class="gridContainerThang">
                <!--                           phần tiêu đề cột-->
                <div class="itemGridTieuDe">
                    34 từ
                </div>
                <div class="itemGridTieuDe">

                </div>
                <div class="itemGridTieuDe">
                    <p style="display:inline-block;">31 từ bỏ qua</p>
                </div>

                <div class="itemGrid">

                </div>
                <div class="itemGrid" style="display:flex;justify-content:flex-start; ">
                    <div style="margin-right:50px;">Nghĩa</div>
                    <div>Ví DỤ</div>
                </div>
                <div class="itemGrid" style="text-align: center;">
                    <button class="boQUa" onclick="boQUaFunction()"  style="font-weight: bolder; border-radius: 5px; background-color: #8EA9E6; box-shadow: inset 5px 5px #aec0e5; border: none;">
                        Bỏ qua
                    </button>
                </div>
                <!--                           phần thân bảng-->
                <div class="itemGrid">
                    grid-template-columns: 100px 50px 100px;
                    grid-template-rows: 80px auto 80px;
                    column-gap: 10px;
                    row-gap: 15px;
                </div>
                <div class="itemGrid">
                    grid-template-columns: 100px 50px 100px;
                    grid-template-rows: 80px auto 80px;
                    column-gap: 10px;
                    row-gap: 15px;
                </div>
                <div class="itemGrid btnCheckItemGrid" style="display:flex;justify-content:center;">
                    <label for="vehicle1"></label><input class="checkboxItemGrid" type="checkbox" id="vehicle1" name="vehicle1" value="Bike">
                </div>
                <!--                        hết hàng 1-->
                <div class="itemGrid">
                    grid-template-columns: 100px 50px 100px;
                    grid-template-rows: 80px auto 80px;
                    column-gap: 10px;
                    row-gap: 15px;
                </div>
                <div class="itemGrid">
                    grid-template-columns: 100px 50px 100px;
                    grid-template-rows: 80px auto 80px;
                    column-gap: 10px;
                    row-gap: 15px;
                </div>
                <div class="itemGrid btnCheckItemGrid" style="display:flex;justify-content:center;">
                    <label for="vehicle"></label><input class="checkboxItemGrid" type="checkbox" id="vehicle" name="vehicle1" value="Bike">
                </div>
            </div>
        </div>
    </div>
    <div class="ad-r ad-r-in-all">
        @include('front_end.layouts.ad_r')
    </div>
</div>
@include('front_end.layouts.footer')
<script>
    var touchtime = 0;
    document.querySelectorAll('.btnCheckItemGrid').forEach(item => {
        item.addEventListener('click', event => {
            let checkboxItemGrid = document.querySelectorAll('.checkboxItemGrid')
            if (touchtime === 0) {
                // set first click
                touchtime = new Date().getTime();
            } else {
                // compare first click to this click and see if they occurred within double click threshold
                if (((new Date().getTime()) - touchtime) < 800) {
                    // double click occurred
                    for (let i =0; i<checkboxItemGrid.length;i++)
                    {
                        checkboxItemGrid[i].checked = checkboxItemGrid[i].checked !== true;
                    }
                    touchtime = 0;
                } else {
                    // not a double click so set as a new first click
                    touchtime = new Date().getTime();
                }
            }

        })
    })
    // viết cho nút bỏ qua
    function boQUaFunction() {
            alert('bỏ qua')
    }
</script>
</body>
</html>
