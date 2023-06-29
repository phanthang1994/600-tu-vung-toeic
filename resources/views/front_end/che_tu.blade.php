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
            <div class="form-group">
                <select name="category_id" id="category_id">
                    <option value="">--select Category--</option>
                    @foreach($results as $subject)
                        <option value="{{$subject->id}}">{{$subject->category_name}}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <select name="chu_de_id" id="chu_de_id">
                    <option value="">--select Chu De--</option>
                </select>
            </div>
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
                <div class="grid-item" >chế từ</div>
                    <div class="grid-item" id="dynamic-grid-item1">
                        <span id="item_name"></span>
                        (<span id="item_tu_loai"></span>)
                    </div>
                    <div class="grid-item" id="dynamic-grid-item2"></div>
            </div>
        </div>
    </div>
    <div class="ad-r ad-r-in-all">
        @include('front_end.layouts.ad_r')
    </div>
</div>
@include('front_end.layouts.footer')
// Add this script in your view or JavaScript file
<script>
    $(document).ready(function () {
        $('#category_id').on('change', function () {
            var categoryId = $(this).val();
            var chuDeSelect = $('#chu_de_id');

            // Clear existing options
            chuDeSelect.html('<option value="">--select Chu De--</option>');

            if (categoryId !== '') {
                // Send AJAX request to fetch options based on selected category
                $.ajax({
                    url: '/get_chu_de_options',
                    method: 'GET',
                    data: { category_id: categoryId },
                    success: function (chuDeOptions) {
                        // Add fetched options to the second dropdown
                        $.each(chuDeOptions, function (index, chuDe) {
                            chuDeSelect.append('<option value="' + chuDe.id + '">' + chuDe.chu_de_name + '</option>');
                        });
                    }
                });
            }

        });
        $('#chu_de_id').on('change', function () {
            var selectedOption = $(this).val();
            var dynamicGridItems = $('[id^="dynamic-grid-item"]');

            // Update the content of all elements with class "grid-item" and id starting with "dynamic-grid-item"
            dynamicGridItems.each(function () {
                var gridItem = $(this);
                var itemName = gridItem.find('#item_name');
                var itemTuLoai = gridItem.find('#item_tu_loai');

                // Update the content of the specific elements based on the selected option
                if (selectedOption === 'option1') {
                    itemName.text('New Content for Option 1');
                    itemTuLoai.text('New Tu Loai for Option 1');
                } else if (selectedOption === 'option2') {
                    itemName.text('New Content for Option 2');
                    itemTuLoai.text('New Tu Loai for Option 2');
                } else {
                    itemName.text('Default Content');
                    itemTuLoai.text('Default Tu Loai');
                }
            });
        });
    });
</script>

</body>
</html>
