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
                @if(count($results)>0)
                    <div class="rowFlexTestInnerLeft">
                        <div class="imgLeft" style="border:white solid 1px; border-radius:8px;"><img style="border-radius:8px;max-width: 200px;max-height: 200px;" src="{{ asset($results[0]->chu_de_image) }}" alt="{{$results[0]->category_image}}" srcset=""></div>

                        <div style="text-align:left; margin-left: 10px;">
                            <a href="{{route('home')}}">
                                <p style="color:white; border-bottom: white solid 2px;">600tutoeic.com</p>
                            </a>
                            <p style="color:white">{{$results[0]->chu_de_name}}<span>
                    </span> <br>{{$results[0]->chu_de_description}}</p>
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
<div class="" style="background-color: #FFFFFF;border-bottom: #1b1e21 1px solid;">
    <div class="container" style="padding: 0 10px; text-align:center;">
        <div class="baihoc">
            <p>Chọn chủ đề</p>
            <form action="" method="POST">
                <select name="category" id="category">
                    <option value="1">1 - Contracts : Hợp Đồng</option>
                    <option value="2">2 - Marketing : Nghiên Cứu Thị Trường</option>
                    <option value="3">3 - Warrranties : Sự Bảo Hành</option>
                    <option value="4">4 - Business Planning : Kế Hoạch Kinh Doanh</option>
                    <option value="5">5 - Conferences : Hội Nghị</option>
                    <option value="6">6 - Computers and the Internet : Máy Vi Tính và Mạng Internet</option>
                    <option value="7">7 - Office Technology : Công Nghệ Cho Công Sở</option><option value="8">8 - Office Procedures : Các Quy Trình Trong Công Sở</option><option value="9">9 - Electronics : Điện Tử</option><option value="10">10 - Correspondence : Thư Tín Thương Mại</option><option value="11">11 - Job Ads &amp; Recruitment : Quảng Cáo Tìm Người &amp; Tuyển Dụng</option><option value="12">12 - Apply and Interviewing : Ứng Tuyển và Phỏng Vấn</option><option value="13">13 - Hiring and Training : Tuyển Dụng &amp; Đào Tạo</option><option value="14">14 - Salaries &amp; Benefits : Lương &amp; Các Chế Độ Đãi Ngộ</option><option value="15">15 - Promotions, Pensions &amp; Awards : Thăng Chức, Lương Hưu &amp; Thưởng</option><option value="16">16 - Shopping : Mua sắm</option><option value="17">17 - Ordering Supplies : Đặt Hàng</option><option value="18">18 - Shipping : Vận Chuyển Hàng</option><option value="19">19 - Invoices : In Hóa Đơn</option><option value="20">20 - Inventory : Hàng Hóa / Kiểm Kê Hàng Hóa</option><option value="21">21 - Banking : Ngân Hàng</option><option value="22">22 - Accounting : Kế Toán</option><option value="23">23 - Investments : Sự Đầu Tư</option><option value="24">24 - Taxes : Thuế</option><option value="25">25 - Financial Statements : Bản Báo Cáo Tài Chính</option><option value="26">26 - Property &amp; Departments : Bất Động Sản &amp; Căn Hộ</option><option value="27">27 - Board Meeting &amp; Committees : Họp Hội Đồng Ban Quản Trị &amp; Ủy Ban</option><option value="28">28 - Quality Control : Ban Quản Lý Chất Lượng</option><option value="29">29 - Product Development : Phát Triển Sản Phẩm</option><option value="30">30 - Renting &amp; Leasing : Thuê &amp; Cho Thuê</option><option value="31">31 - Selecting A Restaurant : Chọn Lựa Nhà Hàng</option><option value="32">32 - Eating Out : Ăn Bên Ngoài</option><option value="33">33 - Ordering Lunch : Đặt Ăn Trưa</option><option value="34">34 - Cooking As A Career : Nghề Nấu Ăn</option><option value="35">35 - Events : Sự Kiện</option><option value="36">36 - General Travel : Du Lịch Tổng Quan</option><option value="37">37 - Airlines : Đường / Hảng Hàng Không</option><option value="38">38 - Trains : Tàu Điện</option><option value="39">39 - Hotels : Khách Sạn</option><option value="40">40 - Car Rentals : Thuê Xe Hơi</option><option value="41">41 - Movies : Phim</option><option value="42">42 - Theater : Rạp Hát</option><option value="43">43 - Music : Âm Nhạc</option><option value="44">44 - Museums : Bảo Tàng</option><option value="45">45 - Media : Truyền Thông</option><option value="46">46 - Doctor's Office : Văn Phòng Bác Sĩ</option><option value="47">47 - Dentist's Office : Văn Phòng Nha Sĩ</option><option value="48">48 - Health : Sức Khỏe</option><option value="49">49 - Hopitals : Bệnh Viện</option><option value="50">50 - Pharmacy : Ngành Dược</option>
                </select>
            </form>
        </div>
    </div>
</div>

<div class="all">
    <style>
        .grid-container {
            display: grid;
            grid-template-columns: 30% 30% auto ;
            background-color: #2196F3;
            padding: 10px;
        }
        .grid-item {
            word-wrap: break-word;
            background-color: rgba(255, 255, 255, 0.8);
            border: 1px solid rgba(0, 0, 0, 0.8);
            padding: 5px;
            font-size: 20px;
            text-align: center;
        }
    </style>
    <div class="ad-l ad-l-in-all">
        @include('front_end.layouts.ad_l')
    </div>
    <div class="mainContent">
          <div class="">
              <div class="grid-container">
                  <div class="grid-item">Từ</div>
                  <div class="grid-item">Ví Dụ</div>
                  <div class="grid-item">chế từ</div>
                  <div class="grid-item">
                      <span>agree:</span>
                      (<span>nghĩa</span>)
                      <span>, phiên âm:</span>
                      <span>audio ,</span>
                      (<span>từ loại</span>)
                  </div>
                  <div class="grid-item">7</div>
                  <div class="grid-item">7</div>
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

    }
</script>
</body>
</html>
