<?php
// Класс виджета
class Bootcamp_Programs_Container_Widget extends WP_Widget {

    // Метод конструктора
    public function __construct() {
        parent::__construct(
            'bootcamp_programs_content_container_widget',
            __( 'Bootcamp Programs Container Widget', 'text_domain' ),
            array(
                'description' => __( 'Bootcamp Programs Container Widget', 'text_domain' ),
            )
        );
    }

    // Метод для отображения виджета во фронтенде
    public function widget( $args, $instance ) {
        echo $args['before_widget'];
        
        // Вывод содержимого виджета
        // Код для первой колонки
        echo '<section id="bootcamp-programs" class="mt-20 mb-[104px]">';
        echo '<div class="container grid grid-cols-2 gap-[30px]">';
        echo '<div class="col-span-1 borderStyles pt-[43px] pr-[32px] pb-[40px] pl-[56px] grid grid-flow-row">';
        echo '<div data-id="4" id="swiper4" class="w-full h-full swiper swiper-bootcamp">';
        echo '<div class="flex w-full gap-1 mb-10 swiper-pagination-4"></div>';
        echo '<div class="swiper-wrapper">';
        if (!empty($instance['cards'])) {
         foreach ($instance['cards'] as $card) {
                echo '<div class="swiper-slide">';

                echo '<article class="w-96">';
                echo '<div class="px-3 py-1 mb-4 border-2 border-black rounded-full text-primary w-min">Програма</div>';
                echo '<h2 class="mb-4 text-[32px] font-bold text-primary">'. esc_html($card['name_of_program']) .'</h2>';
                echo '<p class="pb-8 leading-7 text-gray-300">'. esc_html($card['text_of_progam']) .'</p>';
                echo '</article>';
                echo '</div>';
                
            }
        }
        echo '</div>';
        echo '</div>';
        echo '<div class="flex items-center justify-between">';
        echo '<button class="btn">Дізнатися більше</button>';
        echo '<div class="flex flex-col gap-6">';
        echo '<div class="button-next-4 btn-rounded next"></div>';
        echo '<div class="button-prev-4 btn-rounded prev"></div>';
        echo '</div>';
        echo '</div>';
        echo '</div>';
        echo '<div class="grid grid-cols-2 col-span-1 gap-6">';
        echo '<div class="flex items-end col-span-1 borderStyles pl-[28px] pb-[24px]">';
        echo '<p class="font-semibold text-[22px]">'. esc_html( $instance['title_first_card'] ) .'</p>';
        echo '</div>';
        echo '<div class="flex items-end col-span-1 borderStyles pl-[28px] pb-[24px]">';
        echo '<p class="font-semibold text-[22px]">'. esc_html( $instance['title_second_card'] ) .'</p>';
        echo '</div>';
        echo '<div class="flex items-end col-span-1 borderStyles pl-[28px] pb-[24px]">';
        echo '<p class="font-semibold text-[22px]">'. esc_html( $instance['title_third_card'] ) .'</p>';
        echo '</div>';
        echo '<div class="flex items-end col-span-1 borderStyles pl-[28px] pb-[24px]">';
        echo '<p class="font-semibold text-[22px]">'. esc_html( $instance['title_fourth_card'] ) .'</p>';
        echo '</div>';
        echo '<div class="flex items-end col-span-1 borderStyles pl-[28px] pb-[24px]">';
        echo '<p class="font-semibold text-[22px]">'. esc_html( $instance['title_fifty_card'] ) .'</p>';
        echo '</div>';
        echo '<div class="flex items-end col-span-1 borderStyles pl-[28px] pb-[24px]">';
        echo '<p class="font-semibold text-[22px]">'. esc_html( $instance['title_sixty_card'] ) .'</p>';
        echo '</div>';
        echo '</div>';
        echo '</div>';
        echo '</section>';
        echo $args['after_widget'];
    }

    // Метод для обновления данных виджета
    public function update( $new_instance, $old_instance ) {
        $instance = array();
        $instance['cards'] = ! empty( $new_instance['cards'] ) ? $new_instance['cards'] : array();
        $instance['title_first_card'] = ! empty( $new_instance['title_first_card'] ) ? strip_tags( $new_instance['title_first_card'] ) : '';
        $instance['title_second_card'] = ! empty( $new_instance['title_second_card'] ) ? strip_tags( $new_instance['title_second_card'] ) : '';
        $instance['title_third_card'] = ! empty( $new_instance['title_third_card'] ) ? strip_tags( $new_instance['title_third_card'] ) : '';
        $instance['title_fourth_card'] = ! empty( $new_instance['title_fourth_card'] ) ? strip_tags( $new_instance['title_fourth_card'] ) : '';
        $instance['title_fifty_card'] = ! empty( $new_instance['title_fifty_card'] ) ? strip_tags( $new_instance['title_fifty_card'] ) : '';
        $instance['title_sixty_card'] = ! empty( $new_instance['title_sixty_card'] ) ? strip_tags( $new_instance['title_sixty_card'] ) : '';

        return $instance;
    }

   // Метод для вывода формы настройки виджета в админке
public function form( $instance ) {

    $title_first_card = ! empty( $instance['title_first_card'] ) ? $instance['title_first_card'] : '';
    $title_second_card = ! empty( $instance['title_second_card'] ) ? $instance['title_second_card'] : '';
    $title_third_card = ! empty( $instance['title_third_card'] ) ? $instance['title_third_card'] : '';
    $title_fourth_card = ! empty( $instance['title_fourth_card'] ) ? $instance['title_fourth_card'] : '';
    $title_fifty_card = ! empty( $instance['title_fifty_card'] ) ? $instance['title_fifty_card'] : '';
    $title_sixty_card = ! empty( $instance['title_sixty_card'] ) ? $instance['title_sixty_card'] : '';
    $cards = ! empty( $instance['cards'] ) ? $instance['cards'] : array();
    ?>
    <p>
            <label for="<?php echo $this->get_field_id( 'cards' ); ?>"><?php _e( 'Cards:' ); ?></label>
            <ul class="cards-list">
                <?php foreach ( $cards as $key => $card ) : ?>
                    <li>
                        
                        <label for="<?php echo $this->get_field_id( 'name_of_program' ); ?>"><?php _e( 'Name of program:' ); ?></label>
                        <input type="text" class="widefat" name="<?php echo $this->get_field_name( 'cards' ); ?>[<?php echo $key; ?>][name_of_program]" value="<?php echo esc_attr( $card['name_of_program'] ); ?>" placeholder="<?php _e( 'Name of program', 'text_domain' ); ?>">
                        <label for="<?php echo $this->get_field_id( 'text_of_progam' ); ?>"><?php _e( 'Text of program:' ); ?></label>
                        <textarea class="widefat" name="<?php echo $this->get_field_name( 'cards' ); ?>[<?php echo $key; ?>][text_of_progam]" placeholder="<?php _e( 'Text of program', 'text_domain' ); ?>"><?php echo esc_attr( $card['text_of_progam'] ); ?></textarea>
                        <button class="button remove-card"><?php _e( 'Remove', 'text_domain' ); ?></button>
                    </li>
                <?php endforeach; ?>
            </ul>
            <button class="button add-card"><?php _e( 'Add Card', 'text_domain' ); ?></button>
        </p>
    <p>
        <label for="<?php echo $this->get_field_id( 'title_first_card' ); ?>"><?php _e( 'Title First Card:' ); ?></label>
        <input class="widefat" id="<?php echo $this->get_field_id( 'title_first_card' ); ?>" name="<?php echo $this->get_field_name( 'title_first_card' ); ?>" type="text" value="<?php echo esc_attr( $title_first_card ); ?>">
    </p>
      <p>
        <label for="<?php echo $this->get_field_id( 'title_second_card' ); ?>"><?php _e( 'Title Second Card:' ); ?></label>
        <input class="widefat" id="<?php echo $this->get_field_id( 'title_second_card' ); ?>" name="<?php echo $this->get_field_name( 'title_second_card' ); ?>" type="text" value="<?php echo esc_attr( $title_second_card ); ?>">
    </p>
      <p>
        <label for="<?php echo $this->get_field_id( 'title_third_card' ); ?>"><?php _e( 'Title Third Card:' ); ?></label>
        <input class="widefat" id="<?php echo $this->get_field_id( 'title_third_card' ); ?>" name="<?php echo $this->get_field_name( 'title_third_card' ); ?>" type="text" value="<?php echo esc_attr( $title_third_card ); ?>">
    </p>
      <p>
        <label for="<?php echo $this->get_field_id( 'title_fourth_card' ); ?>"><?php _e( 'Title Fourth Card:' ); ?></label>
        <input class="widefat" id="<?php echo $this->get_field_id( 'title_fourth_card' ); ?>" name="<?php echo $this->get_field_name( 'title_fourth_card' ); ?>" type="text" value="<?php echo esc_attr( $title_fourth_card ); ?>">
    </p>
      <p>
        <label for="<?php echo $this->get_field_id( 'title_fifty_card' ); ?>"><?php _e( 'Title Fifty Card:' ); ?></label>
        <input class="widefat" id="<?php echo $this->get_field_id( 'title_fifty_card' ); ?>" name="<?php echo $this->get_field_name( 'title_fifty_card' ); ?>" type="text" value="<?php echo esc_attr( $title_fifty_card ); ?>">
    </p>
      <p>
        <label for="<?php echo $this->get_field_id( 'title_sixty_card' ); ?>"><?php _e( 'Title Sixty Card:' ); ?></label>
        <input class="widefat" id="<?php echo $this->get_field_id( 'title_sixty_card' ); ?>" name="<?php echo $this->get_field_name( 'title_sixty_card' ); ?>" type="text" value="<?php echo esc_attr( $title_sixty_card ); ?>">
    </p>
    
         <script>
           jQuery(document).ready(function($) {
    // Добавление новой вкладки
    $('.add-card').click(function() {
        var count = $('.cards-list li').length;
        var tabHtml = '<li>';
        tabHtml += '<input type="text" class="widefat" name="' + tabName(count, 'name_of_program') + '" placeholder="<?php _e( 'Name of program', 'text_domain' ); ?>">';
        tabHtml += '<textarea class="widefat" name="' + tabName(count, 'text_of_progam') + '" placeholder="<?php _e( 'Text of program', 'text_domain' ); ?>"></textarea>';
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

// Регистрация виджета
function register_bootcamp_programs_container_widget() {
    register_widget( 'Bootcamp_Programs_Container_Widget' );
}
add_action( 'widgets_init', 'register_bootcamp_programs_container_widget' );
