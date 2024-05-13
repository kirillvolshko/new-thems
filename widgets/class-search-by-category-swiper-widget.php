<?php
class Search_By_Category_Swiper_Widget extends WP_Widget {

    // Конструктор
    public function __construct() {
        parent::__construct(
            'search_by_category_swiper_widget', // ID вашого віджета
            __( 'Search By Category Swiper Widget', 'text_domain' ), // Назва вашого віджета
            array(
                'description' => __( 'Search By Category Swiper Widget', 'text_domain' ), // Опис вашого віджета
            )
        );
    }

    // Вивід віджета на фронтенді
    public function widget( $args, $instance ) {
        // Вивід віджета
        echo $args['before_widget'];
        echo '<section id="search-by-category" class="mb-[104px]">';
        echo '<div class="container">';
        echo '<h2 class="h2 mb-[40px]">'. esc_html( $instance['widget_title_cards'] ) .'</h2>';
        echo '</div>';
        echo '<div class="mr-0 responsive-margin">';
        echo '<div data-id="5" id="swiper5" class="w-full h-full swiper swiper-category">';
        echo '<div class="swiper-wrapper">';
        if (!empty($instance['cards'])) {
            foreach ($instance['cards'] as $card) {
               echo '<div class="swiper-slide">';
               echo '<article class="borderStyles min-h-[136px] w-[305px] py-[24px] px-[28px] flex items-end">';
               echo '<p class="font-semibold text-[22px] text-primary">'. esc_html($card['name_of_course']) .'</p>';
               echo '</article>';
               echo '</div>';
            }
        }
        echo '</div>';
        echo '</div>';
        echo '</div>';
        echo '</div>';
        echo '</section>';
        echo $args['after_widget'];
    }

    // Метод для оновлення налаштувань віджета
    public function update( $new_instance, $old_instance ) {
        $instance = array();
        $instance['widget_title_cards'] = ! empty( $new_instance['widget_title_cards'] ) ? $new_instance['widget_title_cards'] : '';
        $instance['cards'] = ! empty( $new_instance['cards'] ) ? $new_instance['cards'] : array();
        
        return $instance;
    }

    // Відображення форми налаштувань в адмінці
    public function form( $instance ) {
        $widget_title_cards = ! empty( $instance['widget_title_cards'] ) ? $instance['widget_title_cards'] : '';
        $cards = ! empty( $instance['cards'] ) ? $instance['cards'] : array();
        ?>
        <p>
            <label for="<?php echo $this->get_field_id( 'widget_title_cards' ); ?>"><?php _e( 'Widget Title Cards:' ); ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id( 'widget_title_cards' ); ?>" name="<?php echo $this->get_field_name( 'widget_title_cards' ); ?>" type="text" value="<?php echo esc_attr( $widget_title_cards ); ?>">
        </p>
        <p>
            <label for="<?php echo $this->get_field_id( 'cards' ); ?>"><?php _e( 'Cards:' ); ?></label>
            <ul class="cards-list">
                <?php foreach ( $cards as $key => $card ) : ?>
                    <li>
                        
                        <label for="<?php echo $this->get_field_id( 'name_of_course' ); ?>"><?php _e( 'Name of course:' ); ?></label>
                        <input type="text" class="widefat" name="<?php echo $this->get_field_name( 'cards' ); ?>[<?php echo $key; ?>][name_of_course]" value="<?php echo esc_attr( $card['name_of_course'] ); ?>" placeholder="<?php _e( 'Name of course', 'text_domain' ); ?>">
                        <button class="button remove-card"><?php _e( 'Remove', 'text_domain' ); ?></button>
                    </li>
                <?php endforeach; ?>
            </ul>
            <button class="button add-card"><?php _e( 'Add Card', 'text_domain' ); ?></button>
        </p>
        <script>
           jQuery(document).ready(function($) {
    // Добавление новой вкладки
    $('.add-card').click(function() {
        var count = $('.cards-list li').length;
        var tabHtml = '<li>';
        tabHtml += '<input type="text" class="widefat" name="' + tabName(count, 'name_of_course') + '" placeholder="<?php _e( 'Name of course', 'text_domain' ); ?>">';
        tabHtml += '<button class="button remove-card"><?php _e( 'Remove', 'text_domain' ); ?></button>';
        tabHtml += '</li>';
        $('.cards-list').append(tabHtml);
        return false;
    });

    // Удаление вкладки
    $('.cards-list').on('click', '.remove-card', function() {
        $(this).parent().remove();
        return false;
    });

    // Функция для генерации имен полей вкладок
    function tabName(index, field) {
        return '<?php echo $this->get_field_name( 'cards' ); ?>[' + index + '][' + field + ']';
    }
    });
        </script>
        <?php
    }
}

// Реєстрація віджета
function register_search_by_category_swiper_widget() {
    register_widget( 'Search_By_Category_Swiper_Widget' );
}
add_action( 'widgets_init', 'register_search_by_category_swiper_widget' );


