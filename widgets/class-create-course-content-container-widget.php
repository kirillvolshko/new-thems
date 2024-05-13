<?php
// Класс виджета
class Create_Course_Content_Container_Widget extends WP_Widget {

    // Метод конструктора
    public function __construct() {
        parent::__construct(
            'create_course_content_container_widget',
            __( 'Create Course Content Container Widget', 'text_domain' ),
            array(
                'description' => __( 'Create Course Content Container Widget', 'text_domain' ),
            )
        );
    }

    // Метод для отображения виджета во фронтенде
    public function widget( $args, $instance ) {
        echo $args['before_widget'];
        echo '<section id="create-course" class="mb-[107px]">';
        echo '<div class="container grid grid-cols-12 gap-5">';
        echo '<div class="col-span-7 borderStyles py-[64px] pl-[108px] flex flex-col justify-between gap-12">';
        echo '<div class="flex flex-col gap-8 max-w-[500px]">';
        echo '<h2 class="h2 max-w-[250px]">'. esc_html( $instance['title_first_block'] ) .'</h2>';
        echo '<p class="text-gray-400">'. esc_html( $instance['content_first_block'] ) .'</p>';
        echo '</div>';
        echo '<button class="btn-primary w-fit px-[53px]">' . esc_html( $instance['button_text_first'] ) . '</button>';
        echo '</div>';
        echo '<div class="col-span-5 borderStyles py-[64px] pl-[49px] flex flex-col justify-between gap-12">';
        echo '<div class="flex flex-col gap-8 max-w-[396px]">';
        echo '<h2 class="h2 max-w-[250px]">'. esc_html( $instance['title_second_block'] ) .'</h2>';
        echo '<p class="text-gray-400">'. esc_html( $instance['content_second_block'] ) .'</p>';
        echo '</div>';
        echo '<button class="btn-primary w-fit px-[53px]">' . esc_html( $instance['button_text_second'] ) . '</button>';
        echo '</div>';
        echo '</section>';

        echo $args['after_widget'];
    }

    // Метод для обновления данных виджета
    public function update( $new_instance, $old_instance ) {
        $instance = array();
        $instance['title_first_block'] = ! empty( $new_instance['title_first_block'] ) ? strip_tags( $new_instance['title_first_block'] ) : '';
        $instance['content_first_block'] = ! empty( $new_instance['content_first_block'] ) ? strip_tags( $new_instance['content_first_block'] ) : '';
        $instance['button_text_first'] = ! empty( $new_instance['button_text_first'] ) ? strip_tags( $new_instance['button_text_first'] ) : '';
        $instance['title_second_block'] = ! empty( $new_instance['title_second_block'] ) ? strip_tags( $new_instance['title_second_block'] ) : '';
        $instance['content_second_block'] = ! empty( $new_instance['content_second_block'] ) ? strip_tags( $new_instance['content_second_block'] ) : '';
        $instance['button_text_second'] = ! empty( $new_instance['button_text_second'] ) ? strip_tags( $new_instance['button_text_second'] ) : '';
        return $instance;
    }

   // Метод для вывода формы настройки виджета в админке
public function form( $instance ) {
    $title_first_block = ! empty( $instance['title_first_block'] ) ? $instance['title_first_block'] : '';
    $content_first_block = ! empty( $instance['content_first_block'] ) ? $instance['content_first_block'] : '';
    $button_text_first = ! empty( $instance['button_text_first'] ) ? $instance['button_text_first'] : '';
    $title_second_block = ! empty( $instance['title_second_block'] ) ? $instance['title_second_block'] : '';
    $content_second_block = ! empty( $instance['content_second_block'] ) ? $instance['content_second_block'] : '';
    $button_text_second = ! empty( $instance['button_text_second'] ) ? $instance['button_text_second'] : '';
    ?>
    <p>
        <label for="<?php echo $this->get_field_id( 'title_first_block' ); ?>"><?php _e( 'Title First Block:' ); ?></label>
        <input class="widefat" id="<?php echo $this->get_field_id( 'title_first_block' ); ?>" name="<?php echo $this->get_field_name( 'title_first_block' ); ?>" type="text" value="<?php echo esc_attr( $title_first_block ); ?>">
    </p>
    <p>
        <label for="<?php echo $this->get_field_id( 'content_first_block' ); ?>"><?php _e( 'Content First Block:' ); ?></label>
        <textarea class="widefat" id="<?php echo $this->get_field_id( 'content_first_block' ); ?>" name="<?php echo $this->get_field_name( 'content_first_block' ); ?>"><?php echo esc_textarea( $content_first_block ); ?></textarea>
    </p>
    <p>
        <label for="<?php echo $this->get_field_id( 'button_text_first' ); ?>"><?php _e( 'Button Text First:' ); ?></label>
        <input class="widefat" id="<?php echo $this->get_field_id( 'button_text_first' ); ?>" name="<?php echo $this->get_field_name( 'button_text_first' ); ?>" type="text" value="<?php echo esc_attr( $button_text_first ); ?>">
    </p>
    
    <p>
        <label for="<?php echo $this->get_field_id( 'title_second_block' ); ?>"><?php _e( 'Title Second Block:' ); ?></label>
        <input class="widefat" id="<?php echo $this->get_field_id( 'title_second_block' ); ?>" name="<?php echo $this->get_field_name( 'title_second_block' ); ?>" type="text" value="<?php echo esc_attr( $title_second_block ); ?>">
    </p>
    <p>
        <label for="<?php echo $this->get_field_id( 'content_second_block' ); ?>"><?php _e( 'Content Second Block:' ); ?></label>
        <textarea class="widefat" id="<?php echo $this->get_field_id( 'content_second_block' ); ?>" name="<?php echo $this->get_field_name( 'content_second_block' ); ?>"><?php echo esc_textarea( $content_second_block ); ?></textarea>
    </p>
    <p>
        <label for="<?php echo $this->get_field_id( 'button_text_second' ); ?>"><?php _e( 'Button Text Second:' ); ?></label>
        <input class="widefat" id="<?php echo $this->get_field_id( 'button_text_second' ); ?>" name="<?php echo $this->get_field_name( 'button_text_second' ); ?>" type="text" value="<?php echo esc_attr( $button_text_second ); ?>">
    </p>
    <script>
    
    </script>
    <?php
}

    
}

// Регистрация виджета
function register_create_course_content_container_widget() {
    register_widget( 'Create_Course_Content_Container_Widget' );
}
add_action( 'widgets_init', 'register_create_course_content_container_widget' );
