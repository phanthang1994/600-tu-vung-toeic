
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
