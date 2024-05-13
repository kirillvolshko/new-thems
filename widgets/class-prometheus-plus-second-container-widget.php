<?php
// Класс виджета
class Prometheus_Plus_Second_Container_Widget extends WP_Widget {

    // Метод конструктора
    public function __construct() {
        parent::__construct(
            'prometheus_plus_second_container_widget',
            __( 'Prometheus Plus Second Container Widget', 'text_domain' ),
            array(
                'description' => __( 'Prometheus Plus Second Container Widget', 'text_domain' ),
            )
        );
    }

    // Метод для отображения виджета во фронтенде
    public function widget( $args, $instance ) {
        echo $args['before_widget'];
        echo '<section id="prometheus-plus-video" class="pb-40 bg-primary">';
        
        echo ' <h2 class="font-bold text-center text-[64px] text-light mb-20 max-w-[860px] mx-auto">';
        echo ''. esc_html( $instance['title'] ) .'';
        echo ' <span class="opacity-50">'. esc_html( $instance['title_under'] ) .'</span>';
        echo '</h2>';
        echo '<div class="max-w-[980px] h-[545px] bg-gray-100 rounded-[30px] flex mx-auto relative">';
        echo '<button class="btn-light h-[72px] absolute inset-0 m-auto w-1/3 font-semibold text-[24px]">Дивитись наше інтро</button>';
        echo '</div>';
        echo '</section>';
        echo $args['after_widget'];
    }

    // Метод для обновления данных виджета
    public function update( $new_instance, $old_instance ) {
        $instance = array();
        $instance['title'] = ! empty( $new_instance['title'] ) ? strip_tags( $new_instance['title'] ) : '';
        $instance['title_under'] = ! empty( $new_instance['title_under'] ) ? strip_tags( $new_instance['title_under'] ) : '';
        return $instance;
    }

   // Метод для вывода формы настройки виджета в админке
public function form( $instance ) {
    $title = ! empty( $instance['title'] ) ? $instance['title'] : '';
    $title_under = ! empty( $instance['title_under'] ) ? $instance['title_under'] : '';
    ?>
    <p>
        <label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Title:' ); ?></label>
        <input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>">
    </p>
    <p>
        <label for="<?php echo $this->get_field_id( 'title_under' ); ?>"><?php _e( 'Title Under:' ); ?></label>
        <input class="widefat" id="<?php echo $this->get_field_id( 'title_under' ); ?>" name="<?php echo $this->get_field_name( 'title_under' ); ?>" type="text" value="<?php echo esc_attr( $title_under ); ?>">
    </p>
    
    <?php
}

    
}

// Регистрация виджета
function register_prometheus_plus_Second_container_widget() {
    register_widget( 'Prometheus_Plus_Second_Container_Widget' );
}
add_action( 'widgets_init', 'register_prometheus_plus_second_container_widget' );
