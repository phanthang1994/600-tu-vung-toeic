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
