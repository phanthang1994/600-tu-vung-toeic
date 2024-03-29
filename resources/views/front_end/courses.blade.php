<x-HeadComponent css="all_course.css"></x-HeadComponent>
<x-HeadComponent css="home_header.css"></x-HeadComponent>
<x-HeadComponent css="pagination.css"></x-HeadComponent>
<x-HeadComponent css="page_test.css"></x-HeadComponent>
<body style="background-color:#fcfaf2;"
@include('front_end.layouts.header')
@include('front_end.layouts.under_header')
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
    <div class="ad-l ad-l-in-all" style="flex: 0.5;">
        @include('front_end.layouts.ad_l')
    </div>
    <div class="mainContent" style="flex: 2.5">
        <div class="styleRow">
            @foreach($subjects as $item)

                <div class="borderClass">
                    <div class="innerWrap" >
                        <a href="{{route('new_words',$item->id)}}">
                            <img style="width: 230px;height: 200px;" src="{{ asset($item->chu_de_image) }}" alt="{{$item->chu_de_image}}"></a>
                        <div class="details-wrapper">
                            <div class="target-photo">
                                <img src="{{ asset('/assets/admin/img/chu_de/en.png') }}" alt="">
                            </div>

                            <div class="tiengAnhBoi">
                                        <span class="author pull-right">
                                            nhóm:

                                            <span title="{{$item->category_name}}" style="color: #006cfa">{{$item->category_name}}</span>

                                        </span>
                                <div  class="category">Chủ đề</div>

                            </div>
                            <h3>
                                <a href="{{route('new_words',$item->id)}}" class="inner"
                                title=" {{$item->chu_de_name}}" style="font-size: 18px;">
                                    {{$item->chu_de_name}}
                                </a>
                            </h3>

                            <div class="details">

                                <div class="stats">
                                             <span class="stat1" title="Nhóm này có {{$item->tu_moi_count}} từ mới">
                                                <i class="fa fa-book" aria-hidden="true">:</i>
                                                         {{$item->tu_moi_count}}
                                            </span>
                                    <span class="stat2" title="{{$item->so_nguoi_theo_hoc}} người đang học khóa học này">
                                                <i class="fa fa-user">: </i>{{$item->so_nguoi_theo_hoc}}
                                            </span>

                                </div>

                            </div>


                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        @include('front_end.layouts.pagination-links', ['subjects' => $subjects])
    </div>
    <div class="ad-r ad-r-in-all" style="flex: 0.5">
        @include('front_end.layouts.ad_r')
    </div>
</div>
@include('front_end.layouts.footer')
<script>
    // pagination.js

    // pagination_ajax.js

    $(document).on('click', '.pro-pagination-style ul li a', function (e) {
        e.preventDefault();
        var url = $(this).attr('href');

        $.ajax({
            url: url,
            type: 'GET',
            dataType: 'html',
            success: function (data) {
                // Update the content of the mainContent section with the new data
                $('.mainContent .styleRow').html($(data).find('.styleRow').html());
                $('.mainContent .pro-pagination-style').html($(data).find('.pro-pagination-style').html());
                // Scroll to the top of the mainContent section after loading new content
                $('html, body').animate({ scrollTop: $('.mainContent').offset().top }, 'slow');
            },
            error: function (xhr, status, error) {
                console.log(xhr.responseText);
            }
        });
    });

</script>
</body>
</html>
