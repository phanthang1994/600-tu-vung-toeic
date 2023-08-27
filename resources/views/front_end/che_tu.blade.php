<x-HeadComponent css="all_course.css"></x-HeadComponent>
<x-HeadComponent css="home_header.css"></x-HeadComponent>
<x-HeadComponent css="pagination.css"></x-HeadComponent>

<x-HeadComponent css="page_test.css"></x-HeadComponent>
<body style="background-color:#fcfaf2;"
@include('front_end.layouts.header')
@include('front_end.layouts.under_header')
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
        .grid-container1 {
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
            <div class="grid-container1">
                <div class="grid-item">Từ</div>
                <div class="grid-item" >chế từ</div>
            </div>
            <div class="grid-container">
                    <div class="grid-item" id="dynamic-grid-item1">
                        <span id="item_name"></span>
                        /<span id="phien_am"></span>/
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

            // Clear previous content
            $('.grid-container').empty();

            if (selectedOption !== '') {
                // Send AJAX request to fetch options based on the selected chu_de_id
                $.ajax({
                    url: '/get_tu_moi_options', // Update the route name
                    method: 'GET',
                    data: { chu_de_id: selectedOption },
                    success: function (tuMoiOptions) {
                        // Iterate over each option and create a pair of grid items
                        $.each(tuMoiOptions, function (index, option) {
                            var gridItem1 = $('<div class="grid-item" id="dynamic-grid-item1"></div>');
                            var gridItem2 = $('<div class="grid-item" id="dynamic-grid-item2"></div>');

                            // Fill the content of each grid item
                            var itemName = $('<span id="item_name"></span>').text(option.name);
                            var itemTuLoai = $('<span id="item_tu_loai"></span>').text(option.tu_loai);
                            itemTuLoai = itemTuLoai.text();
                            var itemphien_am = $('<span id="phien_am"></span>').text(option.phien_am);
                            itemphien_am = itemphien_am.text();
                            // console.log(option)

                            // Append the content to the grid items
                            gridItem1.append(itemName);
                            gridItem1.append('(' + itemphien_am + ')');
                            gridItem1.append('(' + itemTuLoai + ')');
                            gridItem2.text(option.che_tu);

                            // Append the grid items to the grid container
                            $('.grid-container').append(gridItem1);
                            $('.grid-container').append(gridItem2);
                        });
                    }
                });
            }
        });
    });
</script>

</body>
</html>
