<?php
// Класс виджета
class Prometheus_Plus_First_Container_Widget extends WP_Widget {

    // Метод конструктора
    public function __construct() {
        parent::__construct(
            'prometheus_plus_first_container_widget',
            __( 'Prometheus Plus First Container Widget', 'text_domain' ),
            array(
                'description' => __( 'Prometheus Plus First Container Widget', 'text_domain' ),
            )
        );
    }

    // Метод для отображения виджета во фронтенде
    public function widget( $args, $instance ) {
        echo $args['before_widget'];
        echo '<section id="prometheus-plus-about" class="pt-32 pb-[160px] rounded-t-[50px] bg-primary">';
        echo '<div class="container px-4">';
        echo '<h1 class="font-bold text-center text-[64px] text-light mb-28">'. esc_html( $instance['title'] ) .'</h1>';
        echo '<div class="grid grid-cols-11 gap-x-5">';
        echo '<div class="flex flex-col col-span-3 gap-6">';
        echo '<article class="flex-grow pt-[35px] pr-[60px] pb-[50px] pl-[35px] bg-light rounded-2xl flex flex-col gap-10 justify-between">';
        echo '<h5 class="text-2xl font-bold leading-tight text-primary">'. esc_html( $instance['title_first_block'] ) .'</h5>';
        echo '<p class="font-semibold leading-none text-gray-300">'. esc_html( $instance['text_first_block'] ) .'</p>';
        echo '</article>';
        echo '<article class="flex flex-col gap-10 flex-grow pt-[35px] pr-[60px] pb-[50px] pl-[35px] bg-light rounded-2xl">';
        echo '<h5 class="text-2xl font-bold leading-tight text-primary">'. esc_html( $instance['title_second_block'] ) .'</h5>';
        echo '<p class="font-semibold leading-none text-gray-300">'. esc_html( $instance['text_second_block'] ) .'</p>';
        echo '</article>';
        echo '</div>';
        echo '<div class="flex flex-col col-span-4">';
        echo '<article class="flex-grow pt-[40px] pr-[45px] pb-[70px] pl-[45px] bg-light rounded-2xl flex flex-col justify-between">';
        echo '<div class="">';
        echo '<h5 class="text-[44px] font-bold text-primary mb-12 leading-none">'. esc_html( $instance['title_third_block'] ) .'</h5>';
        echo '<p class="leading-none text-gray-300">'. esc_html( $instance['text_third_block'] ) .'</p>';
        echo '</div>';
        echo '<button class="w-full btn-primary">'. esc_html( $instance['text_button'] ) .'</button>';
        echo '</article>';
        echo '</div>';
        echo '<div class="flex flex-col col-span-4 gap-6">';
        echo '<article class="flex flex-col gap-10 flex-grow pt-[35px] pr-[60px] pb-[50px] pl-[35px] bg-light rounded-2xl">';
        echo '<h5 class="text-2xl font-bold leading-tight text-primary">'. esc_html( $instance['title_fourth_block'] ) .'</h5>';
        echo '<p class="font-semibold leading-none text-gray-300">'. esc_html( $instance['text_fourth_block'] ) .'</p>';
        echo '</article>';
        echo '<article class="flex flex-col gap-10 flex-grow pt-[35px] pr-[60px] pb-[50px] pl-[35px] bg-light rounded-2xl">';
        echo '<h5 class="text-2xl font-bold leading-tight text-primary">'. esc_html( $instance['title_fifth_block'] ) .'</h5>';
        echo '<p class="font-semibold leading-none text-gray-300">'. esc_html( $instance['text_fifth_block'] ) .'</p>';
        echo '</article>';
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
        $instance['title_first_block'] = ! empty( $new_instance['title_first_block'] ) ? strip_tags( $new_instance['title_first_block'] ) : '';
        $instance['text_first_block'] = ! empty( $new_instance['text_first_block'] ) ? strip_tags( $new_instance['text_first_block'] ) : '';
        $instance['title_second_block'] = ! empty( $new_instance['title_second_block'] ) ? strip_tags( $new_instance['title_second_block'] ) : '';
        $instance['text_second_block'] = ! empty( $new_instance['text_second_block'] ) ? strip_tags( $new_instance['text_second_block'] ) : '';
        $instance['title_third_block'] = ! empty( $new_instance['title_third_block'] ) ? strip_tags( $new_instance['title_third_block'] ) : '';
        $instance['text_third_block'] = ! empty( $new_instance['text_third_block'] ) ? strip_tags( $new_instance['text_third_block'] ) : '';
        $instance['text_button'] = ! empty( $new_instance['text_button'] ) ? strip_tags( $new_instance['text_button'] ) : '';
        $instance['title_fourth_block'] = ! empty( $new_instance['title_fourth_block'] ) ? strip_tags( $new_instance['title_fourth_block'] ) : '';
        $instance['text_fourth_block'] = ! empty( $new_instance['text_fourth_block'] ) ? strip_tags( $new_instance['text_fourth_block'] ) : '';
        $instance['title_fifth_block'] = ! empty( $new_instance['title_fifth_block'] ) ? strip_tags( $new_instance['title_fifth_block'] ) : '';
        $instance['text_fifth_block'] = ! empty( $new_instance['text_fifth_block'] ) ? strip_tags( $new_instance['text_fifth_block'] ) : '';
        return $instance;
    }

   // Метод для вывода формы настройки виджета в админке
public function form( $instance ) {
    $title = ! empty( $instance['title'] ) ? $instance['title'] : '';
    $title_first_block = ! empty( $instance['title_first_block'] ) ? $instance['title_first_block'] : '';
    $text_first_block = ! empty( $instance['text_first_block'] ) ? $instance['text_first_block'] : '';
    $title_second_block = ! empty( $instance['title_second_block'] ) ? $instance['title_second_block'] : '';
    $text_second_block = ! empty( $instance['text_second_block'] ) ? $instance['text_second_block'] : '';
    $title_third_block = ! empty( $instance['title_third_block'] ) ? $instance['title_third_block'] : '';
    $text_third_block = ! empty( $instance['text_third_block'] ) ? $instance['text_third_block'] : '';
    $text_button = ! empty( $instance['text_button'] ) ? $instance['text_button'] : '';
    $title_fourth_block = ! empty( $instance['title_fourth_block'] ) ? $instance['title_fourth_block'] : '';
    $text_fourth_block = ! empty( $instance['text_fourth_block'] ) ? $instance['text_fourth_block'] : '';
    $title_fifth_block = ! empty( $instance['title_fifth_block'] ) ? $instance['title_fifth_block'] : '';
    $text_fifth_block = ! empty( $instance['text_fifth_block'] ) ? $instance['text_fifth_block'] : '';
    ?>
    <p>
        <label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Title:' ); ?></label>
        <input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>">
    </p>
    <p>
        <label for="<?php echo $this->get_field_id( 'title_first_block' ); ?>"><?php _e( 'Title First Block:' ); ?></label>
        <input class="widefat" id="<?php echo $this->get_field_id( 'title_first_block' ); ?>" name="<?php echo $this->get_field_name( 'title_first_block' ); ?>" type="text" value="<?php echo esc_attr( $title_first_block ); ?>">
    </p>
    <p>
        <label for="<?php echo $this->get_field_id( 'text_first_block' ); ?>"><?php _e( 'Text First Block:' ); ?></label>
        <textarea class="widefat" id="<?php echo $this->get_field_id( 'text_first_block' ); ?>" name="<?php echo $this->get_field_name( 'text_first_block' ); ?>"><?php echo esc_textarea( $text_first_block ); ?></textarea>
    </p>
    <p>
        <label for="<?php echo $this->get_field_id( 'title_second_block' ); ?>"><?php _e( 'Title Second Block:' ); ?></label>
        <input class="widefat" id="<?php echo $this->get_field_id( 'title_second_block' ); ?>" name="<?php echo $this->get_field_name( 'title_second_block' ); ?>" type="text" value="<?php echo esc_attr( $title_second_block ); ?>">
    </p>
    <p>
        <label for="<?php echo $this->get_field_id( 'text_second_block' ); ?>"><?php _e( 'Text Second Block:' ); ?></label>
        <textarea class="widefat" id="<?php echo $this->get_field_id( 'text_second_block' ); ?>" name="<?php echo $this->get_field_name( 'text_second_block' ); ?>"><?php echo esc_textarea( $text_second_block ); ?></textarea>
    </p>
    <p>
        <label for="<?php echo $this->get_field_id( 'title_third_block' ); ?>"><?php _e( 'Title Third Block:' ); ?></label>
        <input class="widefat" id="<?php echo $this->get_field_id( 'title_third_block' ); ?>" name="<?php echo $this->get_field_name( 'title_third_block' ); ?>" type="text" value="<?php echo esc_attr( $title_third_block ); ?>">
    </p>
    <p>
        <label for="<?php echo $this->get_field_id( 'text_third_block' ); ?>"><?php _e( 'Text Third Block:' ); ?></label>
        <textarea class="widefat" id="<?php echo $this->get_field_id( 'text_third_block' ); ?>" name="<?php echo $this->get_field_name( 'text_third_block' ); ?>"><?php echo esc_textarea( $text_third_block ); ?></textarea>
    </p>
    <p>
        <label for="<?php echo $this->get_field_id( 'text_button' ); ?>"><?php _e( 'Button Text:' ); ?></label>
        <input class="widefat" id="<?php echo $this->get_field_id( 'text_button' ); ?>" name="<?php echo $this->get_field_name( 'text_button' ); ?>" type="text" value="<?php echo esc_attr( $text_button); ?>">
    </p>
    <p>
        <label for="<?php echo $this->get_field_id( 'title_fourth_block' ); ?>"><?php _e( 'Title Fourth Block:' ); ?></label>
        <input class="widefat" id="<?php echo $this->get_field_id( 'title_fourth_block' ); ?>" name="<?php echo $this->get_field_name( 'title_fourth_block' ); ?>" type="text" value="<?php echo esc_attr( $title_fourth_block ); ?>">
    </p>
    <p>
        <label for="<?php echo $this->get_field_id( 'text_fourth_block' ); ?>"><?php _e( 'Text Fourth Block:' ); ?></label>
        <textarea class="widefat" id="<?php echo $this->get_field_id( 'text_fourth_block' ); ?>" name="<?php echo $this->get_field_name( 'text_fourth_block' ); ?>"><?php echo esc_textarea( $text_fourth_block ); ?></textarea>
    </p>
    <p>
        <label for="<?php echo $this->get_field_id( 'title_fifth_block' ); ?>"><?php _e( 'Title Fifth Block:' ); ?></label>
        <input class="widefat" id="<?php echo $this->get_field_id( 'title_fifth_block' ); ?>" name="<?php echo $this->get_field_name( 'title_fifth_block' ); ?>" type="text" value="<?php echo esc_attr( $title_fifth_block ); ?>">
    </p>
    <p>
        <label for="<?php echo $this->get_field_id( 'text_fifth_block' ); ?>"><?php _e( 'Text Fifth Block:' ); ?></label>
        <textarea class="widefat" id="<?php echo $this->get_field_id( 'text_fifth_block' ); ?>" name="<?php echo $this->get_field_name( 'text_fifth_block' ); ?>"><?php echo esc_textarea( $text_fifth_block ); ?></textarea>
    </p>
    <?php
}

    
}

// Регистрация виджета
function register_prometheus_plus_first_container_widget() {
    register_widget( 'Prometheus_Plus_First_Container_Widget' );
}
add_action( 'widgets_init', 'register_prometheus_plus_first_container_widget' );
