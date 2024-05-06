<?php
// Класс виджета
class Main_Content_Container_Widget extends WP_Widget {

    // Метод конструктора
    public function __construct() {
        parent::__construct(
            'main_content_container_widget',
            __( 'Main Content Container Widget', 'text_domain' ),
            array(
                'description' => __( 'Widget with two columns: text and image', 'text_domain' ),
            )
        );
    }

    // Метод для отображения виджета во фронтенде
    public function widget( $args, $instance ) {
        echo $args['before_widget'];

        // Вывод содержимого виджета
        // Код для первой колонки
        echo '<div class="about__header row">';
        echo '<div class="about__recommend col-md-6">';
        echo '<h1 class="about__title">' . esc_html( $instance['title'] ) . '</h1>';
        echo '<p class="about__describe">' . esc_html( $instance['content'] ) . '</p>';
        echo '<button type="button" class="btn btn-dark">' . esc_html( $instance['button_text'] ) . '</button>';
        echo '</div>'; // Закрытие текстовой колонки

        // Код для второй колонки с изображением
        echo '<div class="col-md-6">';
        echo '<img class="img-fluid" src="' . esc_url( $instance['image_url'] ) . '" alt="Image">';
        echo '</div>'; // Закрытие колонки с изображением
        echo '</div>'; // Закрытие .main-content-container
        echo $args['after_widget'];
    }

    // Метод для обновления данных виджета
    public function update( $new_instance, $old_instance ) {
        $instance = array();
        $instance['title'] = ! empty( $new_instance['title'] ) ? strip_tags( $new_instance['title'] ) : '';
        $instance['content'] = ! empty( $new_instance['content'] ) ? strip_tags( $new_instance['content'] ) : '';
        $instance['button_text'] = ! empty( $new_instance['button_text'] ) ? strip_tags( $new_instance['button_text'] ) : '';
        $instance['image_url'] = ! empty( $new_instance['image_url'] ) ? strip_tags( $new_instance['image_url'] ) : '';
        return $instance;
    }

   // Метод для вывода формы настройки виджета в админке
public function form( $instance ) {
    $title = ! empty( $instance['title'] ) ? $instance['title'] : '';
    $content = ! empty( $instance['content'] ) ? $instance['content'] : '';
    $button_text = ! empty( $instance['button_text'] ) ? $instance['button_text'] : '';
    $image_url = ! empty( $instance['image_url'] ) ? $instance['image_url'] : '';
    ?>
    <p>
        <label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Title:' ); ?></label>
        <input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>">
    </p>
    <p>
        <label for="<?php echo $this->get_field_id( 'content' ); ?>"><?php _e( 'Content:' ); ?></label>
        <textarea class="widefat" id="<?php echo $this->get_field_id( 'content' ); ?>" name="<?php echo $this->get_field_name( 'content' ); ?>"><?php echo esc_textarea( $content ); ?></textarea>
    </p>
    <p>
        <label for="<?php echo $this->get_field_id( 'button_text' ); ?>"><?php _e( 'Button Text:' ); ?></label>
        <input class="widefat" id="<?php echo $this->get_field_id( 'button_text' ); ?>" name="<?php echo $this->get_field_name( 'button_text' ); ?>" type="text" value="<?php echo esc_attr( $button_text ); ?>">
    </p>
    <p>
        <label for="<?php echo $this->get_field_id( 'image_url' ); ?>"><?php _e( 'Image:' ); ?></label><br>
        <img class="custom_media_image" src="<?php echo esc_url( $image_url ); ?>" style="margin:0;padding:0;max-width:100px;float:left;display:inline-block" />
        <input type="hidden" class="widefat custom_media_url" id="<?php echo $this->get_field_id( 'image_url' ); ?>" name="<?php echo $this->get_field_name( 'image_url' ); ?>" value="<?php echo esc_url( $image_url ); ?>" />
        <button type="button" class="button button-primary custom_media_button" id="custom_media_button" style="margin-top: 5px;float:left;display:inline-block;width:100%;">Select Image</button>
    </p>
    <script>
    jQuery(document).ready(function($){
        var custom_media_frame;
        $('#custom_media_button').click(function(e) {
            e.preventDefault();
            if (custom_media_frame) {
                custom_media_frame.open();
                return;
            }
            custom_media_frame = wp.media.frames.custom_media_frame = wp.media({
                title: 'Choose Image',
                button: {
                    text: 'Choose Image'
                },
                multiple: false
            });
            custom_media_frame.on('select', function() {
                var attachment = custom_media_frame.state().get('selection').first().toJSON();
                $('.custom_media_url').val(attachment.url);
                $('.custom_media_image').attr('src', attachment.url);
            });
            custom_media_frame.open();
        });
    });
    </script>
    <?php
}

    
}

// Регистрация виджета
function register_main_content_container_widget() {
    register_widget( 'Main_Content_Container_Widget' );
}
add_action( 'widgets_init', 'register_main_content_container_widget' );
