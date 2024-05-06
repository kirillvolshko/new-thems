jQuery(document).ready(function ($) {
    // Обработчик кликов по вкладкам
    $('.tabs-list li').on('click', function () {
        // Удаляем класс active у всех вкладок
        $('.tabs-list li').removeClass('active');
        // Добавляем класс active к текущей вкладке
        $(this).addClass('active');

        // Получаем ID текущей вкладки
        var tabId = $(this).attr('id');

        // Скрываем все блоки с контентом вкладок
        $('[id^=tab-content]').hide();

        // Показываем контент текущей вкладки
        $('#' + tabId).siblings('.tab-content').show();
    });
});
