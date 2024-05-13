<?php
// Класс виджета
class Connect_Us_Container_Widget extends WP_Widget {

    // Метод конструктора
    public function __construct() {
        parent::__construct(
            'connect_us_container_widget',
            __( 'Connect_Us_Container_Widget', 'text_domain' ),
            array(
                'description' => __( 'Connect_Us_Container_Widget', 'text_domain' ),
            )
        );
    }

    // Метод для отображения виджета во фронтенде
    public function widget( $args, $instance ) {
        echo $args['before_widget'];
        echo '<section id="connect-us" class="pb-[60px]">';
        echo '<div class="container grid grid-cols-12 gap-3 borderStyles">';
        echo '<div class="flex flex-col justify-between col-span-4 col-start-2 pt-[60px] pb-[138px] gap-8">';
        echo '<div class="">';
        echo '<h2 class="text-[40px] font-bold text-primary mb-[40px]">'. esc_html( $instance['title'] ) .'</h2>';
        echo '<p class="text-gray-400 pr-[37px]">'. esc_html( $instance['text_content'] ) .'</p>';
        echo '</div>';
        echo '<button class="btn-primary">Приєднатися</button>';
        echo '</div>';
        echo '<div class="grid grid-cols-2 col-start-7 col-span-6 gap-6 pt-[50px] pr-[66px] pb-[57px] pl-[40px]">';
        echo '<div class="flex items-end min-h-[174px] min-w-[248px] borderStyles pr-[46px] pl-[33px] py-[22px]">';
        echo '<p class="font-bold text-primary text-[24px] leading-none">'. esc_html( $instance['title_first_block'] ) .'</p>';
        echo '</div>';
        echo '<div class="flex items-end min-h-[174px] min-w-[248px] borderStyles pr-[46px] pl-[33px] py-[22px]">';
        echo '<p class="font-bold text-primary text-[24px] leading-none">'. esc_html( $instance['title_second_block'] ) .'</p>';
        echo '</div>';
        echo '<div class="flex items-end min-h-[174px] min-w-[248px] borderStyles pr-[46px] pl-[33px] py-[22px]">';
        echo '<p class="font-bold text-primary text-[24px] leading-none">'. esc_html( $instance['title_third_block'] ) .'</p>';
        echo '</div>';
        echo '<div class="flex items-end min-h-[174px] min-w-[248px] borderStyles pr-[46px] pl-[33px] py-[22px]">';
        echo '<p class="font-bold text-primary text-[24px] leading-none">'. esc_html( $instance['title_fourth_block'] ) .'</p>';
        echo '</div>';
        echo '</div>';
        echo '</div>';
        echo '</section>';
        echo $args['after_widget'];
    }

    // Метод для обновления данных виджета
    public function update( $new_instance, $old_instance ) {
        $instance = array();
        $instance['title'] = ! empty( $new_instance['title'] ) ? strip_tags( $new_instance['title'] ) : '';
        $instance['text_content'] = ! empty( $new_instance['text_content'] ) ? strip_tags( $new_instance['text_content'] ) : '';
        $instance['title_first_block'] = ! empty( $new_instance['title_first_block'] ) ? strip_tags( $new_instance['title_first_block'] ) : '';
        $instance['title_second_block'] = ! empty( $new_instance['title_second_block'] ) ? strip_tags( $new_instance['title_second_block'] ) : '';
        $instance['title_third_block'] = ! empty( $new_instance['title_third_block'] ) ? strip_tags( $new_instance['title_third_block'] ) : '';
        $instance['title_fourth_block'] = ! empty( $new_instance['title_fourth_block'] ) ? strip_tags( $new_instance['title_fourth_block'] ) : '';
        return $instance;
    }

   // Метод для вывода формы настройки виджета в админке
public function form( $instance ) {
    $title = ! empty( $instance['title'] ) ? $instance['title'] : '';
    $text_content = ! empty( $instance['text_content'] ) ? $instance['text_content'] : '';
    $title_first_block = ! empty( $instance['title_first_block'] ) ? $instance['title_first_block'] : '';
    $title_second_block = ! empty( $instance['title_second_block'] ) ? $instance['title_second_block'] : '';
    $title_third_block = ! empty( $instance['title_third_block'] ) ? $instance['title_third_block'] : '';
    $title_fourth_block = ! empty( $instance['title_fourth_block'] ) ? $instance['title_fourth_block'] : '';
    ?>
    <p>
        <label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Title :' ); ?></label>
        <input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>">
    </p>
    <p>
        <label for="<?php echo $this->get_field_id( 'text_content' ); ?>"><?php _e( 'Text Content:' ); ?></label>
        <textarea class="widefat" id="<?php echo $this->get_field_id( 'text_content' ); ?>" name="<?php echo $this->get_field_name( 'text_content' ); ?>"><?php echo esc_textarea( $text_content ); ?></textarea>
    </p>
    <p>
        <label for="<?php echo $this->get_field_id( 'title_first_block' ); ?>"><?php _e( 'Title First Block:' ); ?></label>
        <input class="widefat" id="<?php echo $this->get_field_id( 'title_first_block' ); ?>" name="<?php echo $this->get_field_name( 'title_first_block' ); ?>" type="text" value="<?php echo esc_attr( $title_first_block ); ?>">
    </p>
    <p>
        <label for="<?php echo $this->get_field_id( 'title_second_block' ); ?>"><?php _e( 'Title Second Block:' ); ?></label>
        <input class="widefat" id="<?php echo $this->get_field_id( 'title_second_block' ); ?>" name="<?php echo $this->get_field_name( 'title_second_block' ); ?>" type="text" value="<?php echo esc_attr( $title_second_block ); ?>">
    </p>
    <p>
        <label for="<?php echo $this->get_field_id( 'title_third_block' ); ?>"><?php _e( 'Title Third Block:' ); ?></label>
        <input class="widefat" id="<?php echo $this->get_field_id( 'title_third_block' ); ?>" name="<?php echo $this->get_field_name( 'title_third_block' ); ?>" type="text" value="<?php echo esc_attr( $title_third_block ); ?>">
    </p>
    <p>
        <label for="<?php echo $this->get_field_id( 'title_fourth_block' ); ?>"><?php _e( 'Title Fourth Block:' ); ?></label>
        <input class="widefat" id="<?php echo $this->get_field_id( 'title_fourth_block' ); ?>" name="<?php echo $this->get_field_name( 'title_fourth_block' ); ?>" type="text" value="<?php echo esc_attr( $title_fourth_block ); ?>">
    </p>
    <script>
    
    </script>
    <?php
}

    
}

// Регистрация виджета
function register_connect_us_container_widget() {
    register_widget( 'Connect_Us_Container_Widget' );
}
add_action( 'widgets_init', 'register_connect_us_container_widget' );
