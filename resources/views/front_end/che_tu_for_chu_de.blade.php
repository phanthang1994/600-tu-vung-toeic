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
                        <div class="imgLeft" style="border:white solid 1px; border-radius:8px;"><img style="border-radius:8px;max-width: 200px;max-height: 200px;" src="{{ asset($results[0]->chu_de_image) }}" alt="{{$results[0]->chu_de_image}}" srcset=""></div>

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
        </div>
    </div>
</div>

<div class="all">
    <style>
        .grid-container {
            display: grid;
            grid-template-columns: 30% auto ;
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
                  <div class="grid-item">chế từ</div>
                  @foreach($results as $rs) change here
                  <div class="grid-item">
                      <span>agree:</span>
                      (<span>nghĩa</span>)
                      <span>, phiên âm:</span>
                      <span>audio ,</span>
                      (<span>từ loại</span>)
                  </div>
                  <div class="grid-item">7</div>
              </div>
          </div>
    </div>
    <div class="ad-r ad-r-in-all">
        @include('front_end.layouts.ad_r')
    </div>
</div>
@include('front_end.layouts.footer')
</body>
</html>
