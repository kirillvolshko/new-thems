<?php
// Класс виджета
class Counter_Content_Container_Widget extends WP_Widget {

    // Метод конструктора
    public function __construct() {
        parent::__construct(
            'counter_content_container_widget',
            __( 'Counter Content Container Widget', 'text_domain' ),
            array(
                'description' => __( 'Widget with two columns: four cards and image', 'text_domain' ),
            )
        );
    }

    // Метод для отображения виджета во фронтенде
    public function widget( $args, $instance ) {
        echo $args['before_widget'];

        // Вывод содержимого виджета
        // Код для первой колонки
        echo '<section class="about mb-[104px]">';
        echo '<div class="container">';
        echo '<div class="about__info grid grid-cols-12 gap-4">';
        echo '<div class="about__statistics col-span-5 grid grid-cols-2 gap-4">';
        echo '<div class="borderStyles flex min-h-[175px] flex-col justify-end pb-4 pl-[20px]">';
        echo '<h3 class="text-2xl font-bold text-primary">' . esc_html( $instance['title1'] ) . '</h3>';
        echo '<p class="text-gray-200">' . esc_html( $instance['content1'] ) . '</p>';
        echo '</div>';
        echo '<div class="borderStyles flex min-h-[175px] flex-col justify-end pb-4 pl-[20px]">';
        echo '<h3 class="text-2xl font-bold text-primary">' . esc_html( $instance['title2'] ) . '</h3>';
        echo '<p class="text-gray-200">' . esc_html( $instance['content2'] ) . '</p>';
        echo '</div>';
        echo '<div class="borderStyles flex min-h-[175px] flex-col justify-end pb-4 pl-[20px]">';
        echo '<h3 class="text-2xl font-bold text-primary">' . esc_html( $instance['title3'] ) . '</h3>';
        echo '<p class="text-gray-200">' . esc_html( $instance['content3'] ) . '</p>';
        echo '</div>';
        echo '<div class="borderStyles flex min-h-[175px] flex-col justify-end pb-4 pl-[20px]">';
        echo '<h3 class="text-2xl font-bold text-primary">' . esc_html( $instance['title4'] ) . '</h3>';
        echo '<p class="text-gray-200">' . esc_html( $instance['content4'] ) . '</p>';
        echo '</div>';
        echo '</div>'; // Закрытие текстовой колонки

        // Код для второй колонки с изображением
        echo '<div class="about__partners px-[56px] py-[70px] borderStyles col-span-7">';
        echo '<div class="flex justify-between w-[270px]">';
        echo '<div class="flex flex-col justify-between min-h-[235px]">';
        echo '<div>';
        echo '<h2 class="text-4xl font-bold text-primary">' . esc_html( $instance['title_partners'] ) . '</h2>';
        echo '<p class="text-base">' . esc_html( $instance['content_partners'] ) . '</p>';
        echo '</div>';
        echo '<button type="button" class="btn">' . esc_html( $instance['button_text'] ) . '</button>';
        echo '</div>';
        echo '<div class="about__partners-logos col">';
        echo '<img src="' . esc_url( $instance['image_url'] ) . '" alt="Image">';
        echo '</div>';
        echo '</div>';
        echo '</div>';
        echo '</div>';
        echo '</div>';
        echo '</section>';
        echo $args['after_widget'];
    }

    // Метод для обновления данных виджета
    public function update( $new_instance, $old_instance ) {
        $instance = array();
        $instance['title1'] = ! empty( $new_instance['title1'] ) ? strip_tags( $new_instance['title1'] ) : '';
        $instance['content1'] = ! empty( $new_instance['content1'] ) ? strip_tags( $new_instance['content1'] ) : '';
        $instance['title2'] = ! empty( $new_instance['title2'] ) ? strip_tags( $new_instance['title2'] ) : '';
        $instance['content2'] = ! empty( $new_instance['content2'] ) ? strip_tags( $new_instance['content2'] ) : '';
        $instance['title3'] = ! empty( $new_instance['title3'] ) ? strip_tags( $new_instance['title3'] ) : '';
        $instance['content3'] = ! empty( $new_instance['content3'] ) ? strip_tags( $new_instance['content3'] ) : '';
        $instance['title4'] = ! empty( $new_instance['title4'] ) ? strip_tags( $new_instance['title4'] ) : '';
        $instance['content4'] = ! empty( $new_instance['content4'] ) ? strip_tags( $new_instance['content4'] ) : '';
        $instance['title_partners'] = ! empty( $new_instance['title_partners'] ) ? strip_tags( $new_instance['title_partners'] ) : '';
        $instance['content_partners'] = ! empty( $new_instance['content_partners'] ) ? strip_tags( $new_instance['content_partners'] ) : '';
        $instance['button_text'] = ! empty( $new_instance['button_text'] ) ? strip_tags( $new_instance['button_text'] ) : '';
        $instance['image_url'] = ! empty( $new_instance['image_url'] ) ? strip_tags( $new_instance['image_url'] ) : '';
        return $instance;
    }

   // Метод для вывода формы настройки виджета в админке
public function form( $instance ) {
    $title1 = ! empty( $instance['title1'] ) ? $instance['title1'] : '';
    $content1 = ! empty( $instance['content1'] ) ? $instance['content1'] : '';
    $title2 = ! empty( $instance['title2'] ) ? $instance['title2'] : '';
    $content2 = ! empty( $instance['content2'] ) ? $instance['content2'] : '';
    $title3 = ! empty( $instance['title3'] ) ? $instance['title3'] : '';
    $content3 = ! empty( $instance['content3'] ) ? $instance['content3'] : '';
    $title4 = ! empty( $instance['title4'] ) ? $instance['title4'] : '';
    $content4 = ! empty( $instance['content4'] ) ? $instance['content4'] : '';
    $title_partners = ! empty( $instance['title_partners'] ) ? $instance['title_partners'] : '';
    $content_partners = ! empty( $instance['content_partners'] ) ? $instance['content_partners'] : '';
    $button_text = ! empty( $instance['button_text'] ) ? $instance['button_text'] : '';
    $image_url = ! empty( $instance['image_url'] ) ? $instance['image_url'] : '';
    ?>
    <p>
        <label for="<?php echo $this->get_field_id( 'title1' ); ?>"><?php _e( 'Title First Card:' ); ?></label>
        <input class="widefat" id="<?php echo $this->get_field_id( 'title1' ); ?>" name="<?php echo $this->get_field_name( 'title1' ); ?>" type="text" value="<?php echo esc_attr( $title1 ); ?>">
    </p>
    <p>
        <label for="<?php echo $this->get_field_id( 'content1' ); ?>"><?php _e( 'Content First Card:' ); ?></label>
        <textarea class="widefat" id="<?php echo $this->get_field_id( 'content1' ); ?>" name="<?php echo $this->get_field_name( 'content1' ); ?>"><?php echo esc_textarea( $content1 ); ?></textarea>
    </p>
     <p>
        <label for="<?php echo $this->get_field_id( 'title2' ); ?>"><?php _e( 'Title Second Card:' ); ?></label>
        <input class="widefat" id="<?php echo $this->get_field_id( 'title2' ); ?>" name="<?php echo $this->get_field_name( 'title2' ); ?>" type="text" value="<?php echo esc_attr( $title2 ); ?>">
    </p>
    <p>
        <label for="<?php echo $this->get_field_id( 'content2' ); ?>"><?php _e( 'Content Second Card:' ); ?></label>
        <textarea class="widefat" id="<?php echo $this->get_field_id( 'content2' ); ?>" name="<?php echo $this->get_field_name( 'content2' ); ?>"><?php echo esc_textarea( $content2 ); ?></textarea>
    </p>
     <p>
        <label for="<?php echo $this->get_field_id( 'title3' ); ?>"><?php _e( 'Title Third Card:' ); ?></label>
        <input class="widefat" id="<?php echo $this->get_field_id( 'title3' ); ?>" name="<?php echo $this->get_field_name( 'title3' ); ?>" type="text" value="<?php echo esc_attr( $title3 ); ?>">
    </p>
    <p>
        <label for="<?php echo $this->get_field_id( 'content3' ); ?>"><?php _e( 'Content Third Card:' ); ?></label>
        <textarea class="widefat" id="<?php echo $this->get_field_id( 'content3' ); ?>" name="<?php echo $this->get_field_name( 'content3' ); ?>"><?php echo esc_textarea( $content3 ); ?></textarea>
    </p>
     <p>
        <label for="<?php echo $this->get_field_id( 'title4' ); ?>"><?php _e( 'Title Fourth Card:' ); ?></label>
        <input class="widefat" id="<?php echo $this->get_field_id( 'title4' ); ?>" name="<?php echo $this->get_field_name( 'title4' ); ?>" type="text" value="<?php echo esc_attr( $title4 ); ?>">
    </p>
    <p>
        <label for="<?php echo $this->get_field_id( 'content4' ); ?>"><?php _e( 'Content Fourth Card:' ); ?></label>
        <textarea class="widefat" id="<?php echo $this->get_field_id( 'content4' ); ?>" name="<?php echo $this->get_field_name( 'content4' ); ?>"><?php echo esc_textarea( $content4 ); ?></textarea>
    </p>
    <p>
        <label for="<?php echo $this->get_field_id( 'title_partners' ); ?>"><?php _e( 'Title Partners Block:' ); ?></label>
        <input class="widefat" id="<?php echo $this->get_field_id( 'title_partners' ); ?>" name="<?php echo $this->get_field_name( 'title_partners' ); ?>" type="text" value="<?php echo esc_attr( $title_partners ); ?>">
    </p>
    <p>
        <label for="<?php echo $this->get_field_id( 'content_partners' ); ?>"><?php _e( 'Content Partners Block:' ); ?></label>
        <textarea class="widefat" id="<?php echo $this->get_field_id( 'content_partners' ); ?>" name="<?php echo $this->get_field_name( 'content_partners' ); ?>"><?php echo esc_textarea( $content_partners ); ?></textarea>
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
                title: 'Вибрати Картинку',
                button: {
                    text: 'Вибрати Картинку'
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
function register_counter_content_container_widget() {
    register_widget( 'Counter_Content_Container_Widget' );
}
add_action( 'widgets_init', 'register_counter_content_container_widget' );
