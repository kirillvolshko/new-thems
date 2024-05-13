<?php
class Prometheus_Plus_Third_Container_Widget extends WP_Widget {

    // Конструктор
    public function __construct() {
        parent::__construct(
            'prometheus_plus_third_container_widget', // ID вашого віджета
            __( 'Prometheus Plus Third Container Widget', 'text_domain' ), // Назва вашого віджета
            array(
                'description' => __( 'Prometheus Plus Third Container Widget', 'text_domain' ), // Опис вашого віджета
            )
        );
    }

    // Вивід віджета на фронтенді
    public function widget( $args, $instance ) {
        // Вивід віджета
        echo $args['before_widget'];
        echo '<section id="prometheus-plus-slider-programs" class="pb-40 bg-primary">';
        echo '<div class="container relative grid grid-cols-12">';
        // Перевірка наявності вкладок
        if (!empty($instance['cards'])) {
            echo '<div class="col-span-11 mb-11">';
            echo '<h2 class="font-bold text-center text-light text-[50px]">'. esc_html( $instance['widget_title_cards'] ) .'</h2>';
            echo '</div>';
            echo '<div data-id="3" id="swiper3" class="w-full h-full col-span-11 swiper">';
            echo '<div class="swiper-wrapper">';
            // Вивід контенту кожної вкладки
            foreach ($instance['cards'] as $card) {
                echo '<div class="swiper-slide">';

                echo '<article class="flex flex-col justify-between px-6 py-8 bg-white rounded-lg borderStyles w-[284px] h-[390px]">';
                echo '<header>';
                echo '<h2 class="flex items-start justify-between">';
                echo '<span class="text-xl font-bold">'. esc_html($card['name_of_course']) .'</span>';
                echo '<span class="text-xl font-semibold">'. esc_html($card['price_of_course']) .'</span>';
                echo '</h2>';
                echo '<p class="mt-2 font-semibold text-gray-400">'. esc_html($card['dostup_for_course']) .'</p>';
                echo '</header>';
                echo '<footer class="flex items-start justify-between mt-4">';
                echo '<div class="flex items-center text-lg text-primary">';
                echo '<svg width="16" height="17" viewBox="0 0 16 17" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M8 13.3589L12.944 16.5L11.632 10.58L16 6.59684L10.248 6.07474L8 0.5L5.752 6.07474L0 6.59684L4.36 10.58L3.056 16.5L8 13.3589Z" fill="#141C24" /> </svg>';
                echo '<span class="ml-1">'. esc_html($card['score_for_course']) .'</span>';
                echo'</div>';
                echo '<p class="font-semibold text-gray-400">Skill</p>';
                echo'</footer>';
                echo '</article>';
                
                echo '</div>';
            }
            echo '</div>';
            echo '</div>';

           
        }
            echo '<div class="flex items-center justify-end col-start-12 col-end-13">';
            echo '<div class="button-next-3 btn-rounded next"></div>';
            echo '</div>';
            
        echo '<div class="flex justify-center col-span-11 mt-24">';
        echo '<button class="btn-light">'. esc_html( $instance['text_of_button'] ) .'</button>';
        echo '</div>';
        echo '</div>';
        echo '</section>';
        echo $args['after_widget'];
    }

    // Метод для оновлення налаштувань віджета
    public function update( $new_instance, $old_instance ) {
        $instance = array();
        $instance['widget_title_cards'] = ! empty( $new_instance['widget_title_cards'] ) ? $new_instance['widget_title_cards'] : '';
        $instance['text_of_button'] = ! empty( $new_instance['text_of_button'] ) ? $new_instance['text_of_button'] : '';
        $instance['cards'] = ! empty( $new_instance['cards'] ) ? $new_instance['cards'] : array();
        
        return $instance;
    }

    // Відображення форми налаштувань в адмінці
    public function form( $instance ) {
        $widget_title_cards = ! empty( $instance['widget_title_cards'] ) ? $instance['widget_title_cards'] : '';
        $text_of_button = ! empty( $instance['text_of_button'] ) ? $instance['text_of_button'] : '';
        $cards = ! empty( $instance['cards'] ) ? $instance['cards'] : array();
        ?>
        <p>
            <label for="<?php echo $this->get_field_id( 'widget_title_cards' ); ?>"><?php _e( 'Widget Title Cards:' ); ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id( 'widget_title_cards' ); ?>" name="<?php echo $this->get_field_name( 'widget_title_cards' ); ?>" type="text" value="<?php echo esc_attr( $widget_title_cards ); ?>">
        </p>
        <p>
            <label for="<?php echo $this->get_field_id( 'text_of_button' ); ?>"><?php _e( 'Text for button:' ); ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id( 'text_of_button' ); ?>" name="<?php echo $this->get_field_name( 'text_of_button' ); ?>" type="text" value="<?php echo esc_attr( $text_of_button ); ?>">
        </p>
        <p>
            <label for="<?php echo $this->get_field_id( 'cards' ); ?>"><?php _e( 'Cards:' ); ?></label>
            <ul class="cards-list">
                <?php foreach ( $cards as $key => $card ) : ?>
                    <li>
                        
                        <label for="<?php echo $this->get_field_id( 'name_of_course' ); ?>"><?php _e( 'Name of course:' ); ?></label>
                        <input type="text" class="widefat" name="<?php echo $this->get_field_name( 'cards' ); ?>[<?php echo $key; ?>][name_of_course]" value="<?php echo esc_attr( $card['name_of_course'] ); ?>" placeholder="<?php _e( 'Name of course', 'text_domain' ); ?>">
                        <label for="<?php echo $this->get_field_id( 'price_of_course' ); ?>"><?php _e( 'Price of course:' ); ?></label>
                        <input type="text" class="widefat" name="<?php echo $this->get_field_name( 'cards' ); ?>[<?php echo $key; ?>][price_of_course]" value="<?php echo esc_attr( $card['price_of_course'] ); ?>" placeholder="<?php _e( 'Price of course', 'text_domain' ); ?>">
                        <label for="<?php echo $this->get_field_id( 'dostup_for_course' ); ?>"><?php _e( 'Dostup for course:' ); ?></label>
                        <input type="text" class="widefat" name="<?php echo $this->get_field_name( 'cards' ); ?>[<?php echo $key; ?>][dostup_for_course]" value="<?php echo esc_attr( $card['dostup_for_course'] ); ?>" placeholder="<?php _e( 'Dostup for course', 'text_domain' ); ?>">
                        <label for="<?php echo $this->get_field_id( 'score_for_course' ); ?>"><?php _e( 'Score for course:' ); ?></label>
                        <input type="text" class="widefat" name="<?php echo $this->get_field_name( 'cards' ); ?>[<?php echo $key; ?>][score_for_course]" value="<?php echo esc_attr( $card['score_for_course'] ); ?>" placeholder="<?php _e( 'Score for course', 'text_domain' ); ?>">
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
        tabHtml += '<input type="text" class="widefat" name="' + tabName(count, 'price_of_course') + '" placeholder="<?php _e( 'Price of course', 'text_domain' ); ?>">';
        tabHtml += '<input type="text" class="widefat" name="' + tabName(count, 'dostup_for_course') + '" placeholder="<?php _e( 'Dostup for course', 'text_domain' ); ?>">';
        tabHtml += '<input type="text" class="widefat" name="' + tabName(count, 'score_for_course') + '" placeholder="<?php _e( 'Score for course', 'text_domain' ); ?>">';
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
function register_prometheus_plus_third_container_widget() {
    register_widget( 'Prometheus_Plus_Third_Container_Widget' );
}
add_action( 'widgets_init', 'register_prometheus_plus_third_container_widget' );


