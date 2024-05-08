jQuery(document).ready(function ($) {
    // Переключение между вкладками при клике на ссылку
    $('.tabs-container .container ul li a').on('click', function (e) {
        e.preventDefault();
        var target = $(this).attr('href');
        $('.tabs-container .container ul li .tab-content-container').removeClass('active');
        $(this).parent().addClass('active');
        $('.tabs-container .container .tab-content-container').hide();
        $(target).show();
    });
    // Показать первую вкладку при загрузке страницы
    $('.tabs-container .container nav ul li:first-child').addClass('active');
    $('.tab-content-container').hide();
    $('.tab-content-container').first().show();
});
