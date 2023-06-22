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
                        <div style="text-align:left; margin-left: 10px;">
                            <a href="{{route('home')}}">
                                <p style="color:white; border-bottom: white solid 2px;">600tutoeic.com</p>
                            </a>
                        </div>
                    </div>
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
