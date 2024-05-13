<?php
// Класс виджета
class Interesting_Topics_Container_Widget extends WP_Widget {

    // Метод конструктора
    public function __construct() {
        parent::__construct(
            'interesting_topics_container_widget',
            __( 'Interesting_Topics_Container_Widget', 'text_domain' ),
            array(
                'description' => __( 'Interesting_Topics_Container_Widget', 'text_domain' ),
            )
        );
    }

    // Метод для отображения виджета во фронтенде
    public function widget( $args, $instance ) {
        echo $args['before_widget'];
        echo '<section id="interesting-topics" class="mb-[104px]">';
        echo '<div class="container">';
        echo '<div class="flex justify-between mb-11">';
        echo '<h2 class="h2">'. esc_html( $instance['title'] ) .'</h2>';
        echo '<a href="/" class="btn">Дивитися всі</a>';
        echo '</div>';
        echo '</div>';
        echo '<div class="responsive-margin">';
        echo '<div data-id="topics" id="swiper-topics" class="w-full h-full swiper swiper-category">';
        echo '<div class="swiper-wrapper">';
        if (!empty($instance['cards'])) {
            foreach ($instance['cards'] as $card) {
                echo '<div class="swiper-slide">';
                echo '<article class="borderStyles min-h-[523px] w-[395px] pt-[32px] pb-[24px] px-[24px] flex flex-col justify-between">';
                echo '<div>';
                echo '<div class="flex items-center justify-between pb-7">';
                echo '<p class="px-4 py-2 border-2 border-black rounded-full bg-primary text-light font-[14px] leading-none w-fit">'. esc_html($card['name_of_topic']) .'</p>';
                echo '<p class="leading-none">'. esc_html($card['date_of_public']) .'</p>';
                echo '</div>';
                echo '<div class="w-[347px] h-[192px] rounded-[20px] overflow-hidden mb-8">';
                echo '<img src="' . esc_url( $card['user_profile_url'] ) . '" alt="image of card" class="object-cover object-center w-full h-full">';
                echo '</div>';
                echo '<h5 class="font-extrabold text-[20px] leading-5	uppercase mb-[18px]">'. esc_html($card['title_of_topic']) .'</h5>';
                echo '<p class="leading-none text-gray-500">'. esc_html($card['description_of_topic']) .'</p>';
                echo '</div>';
                echo '<div class="flex items-center self-end gap-1">';
                echo '<svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M10.0013 16.6665C11.7694 16.6665 13.4651 15.9641 14.7153 14.7139C15.9656 13.4636 16.668 11.7679 16.668 9.99984C16.668 8.23173 15.9656 6.53604 14.7153 5.28579C13.4651 4.03555 11.7694 3.33317 10.0013 3.33317C8.23319 3.33317 6.5375 4.03555 5.28726 5.28579C4.03701 6.53604 3.33464 8.23173 3.33464 9.99984C3.33464 11.7679 4.03701 13.4636 5.28726 14.7139C6.5375 15.9641 8.23319 16.6665 10.0013 16.6665ZM10.0013 1.6665C11.0957 1.6665 12.1793 1.88205 13.1903 2.30084C14.2014 2.71963 15.12 3.33346 15.8939 4.10728C16.6677 4.8811 17.2815 5.79976 17.7003 6.81081C18.1191 7.82186 18.3346 8.90549 18.3346 9.99984C18.3346 12.21 17.4567 14.3296 15.8939 15.8924C14.3311 17.4552 12.2114 18.3332 10.0013 18.3332C5.39297 18.3332 1.66797 14.5832 1.66797 9.99984C1.66797 7.7897 2.54594 5.67008 4.10875 4.10728C5.67155 2.54448 7.79116 1.6665 10.0013 1.6665ZM10.418 5.83317V10.2082L14.168 12.4332L13.543 13.4582L9.16797 10.8332V5.83317H10.418Z" fill="#878B8F" /></svg>';
                echo '<p class="text-primary">'. esc_html($card['time_to_read']) .'</p>';
                echo '</div>';
                echo '</article>';
                echo '</div>';
        }
        }
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
        $instance['cards'] = ! empty( $new_instance['cards'] ) ? $new_instance['cards'] : array();

        return $instance;
    }

   // Метод для вывода формы настройки виджета в админке
public function form( $instance ) {
    $title = ! empty( $instance['title'] ) ? $instance['title'] : '';
    $cards = ! empty( $instance['cards'] ) ? $instance['cards'] : array();
    
    ?>
    <p>
        <label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Title:' ); ?></label>
        <input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>">
    </p>
    <p>
            <label for="<?php echo $this->get_field_id( 'cards' ); ?>"><?php _e( 'Cards:' ); ?></label>
            <ul class="cards-list">
                <?php foreach ( $cards as $key => $card ) : ?>
                    <li>
                        
                        <label for="<?php echo $this->get_field_id( 'name_of_topic' ); ?>"><?php _e( 'Name of topic:' ); ?></label>
                        <input type="text" class="widefat" name="<?php echo $this->get_field_name( 'cards' ); ?>[<?php echo $key; ?>][name_of_topic]" value="<?php echo esc_attr( $card['name_of_topic'] ); ?>" placeholder="<?php _e( 'Name of Topic', 'text_domain' ); ?>">

                         <label for="<?php echo $this->get_field_id( 'date_of_public' ); ?>"><?php _e( 'Date of public:' ); ?></label>
                        <input type="text" class="widefat" name="<?php echo $this->get_field_name( 'cards' ); ?>[<?php echo $key; ?>][date_of_public]" value="<?php echo esc_attr( $card['date_of_public'] ); ?>" placeholder="<?php _e( 'Date of public', 'text_domain' ); ?>">

                        

                        <label for="<?php echo $this->get_field_id( 'user_profile_url' ); ?>"><?php _e( 'Image Topic:' ); ?></label><br>
                        <img class="custom_media_image" src="<?php echo esc_url( $card['user_profile_url'] ); ?>" style="margin:0;padding:0;max-width:100px;float:left;display:inline-block" />
                        <input type="hidden" class="widefat custom_media_url" id="<?php echo $this->get_field_id( 'user_profile_url' ); ?>" name="<?php echo $this->get_field_name( 'cards' ); ?>[<?php echo $key; ?>][user_profile_url]" value="<?php echo esc_url( $card['user_profile_url'] ); ?>" />
                        <button type="button" class="button button-primary custom_media_button cards" style="margin-top: 5px;float:left;display:inline-block;width:100%;">Select Image</button>

                        <label for="<?php echo $this->get_field_id( 'title_of_topic' ); ?>"><?php _e( 'Title of topic:' ); ?></label>
                        <input type="text" class="widefat" name="<?php echo $this->get_field_name( 'cards' ); ?>[<?php echo $key; ?>][title_of_topic]" value="<?php echo esc_attr( $card['title_of_topic'] ); ?>" placeholder="<?php _e( 'Title of topic', 'text_domain' ); ?>">
                        <label for="<?php echo $this->get_field_id( 'description_of_topic' ); ?>"><?php _e( 'Description of topic:' ); ?></label>
                        <textarea class="widefat" name="<?php echo $this->get_field_name( 'cards' ); ?>[<?php echo $key; ?>][description_of_topic]" placeholder="<?php _e( 'Description of topic', 'text_domain' ); ?>"><?php echo esc_attr( $card['description_of_topic'] ); ?></textarea>
                        <label for="<?php echo $this->get_field_id( 'time_to_read' ); ?>"><?php _e( 'Time to read:' ); ?></label>
                        <input type="text" class="widefat" name="<?php echo $this->get_field_name( 'cards' ); ?>[<?php echo $key; ?>][time_to_read]" value="<?php echo esc_attr( $card['time_to_read'] ); ?>" placeholder="<?php _e( 'Time to read', 'text_domain' ); ?>">
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

        tabHtml += '<input type="text" class="widefat" name="' + tabName(count, 'name_of_topic') + '" placeholder="<?php _e( 'Name of topic:', 'text_domain' ); ?>">';
        tabHtml += '<input type="text" class="widefat" name="' + tabName(count, 'date_of_public') + '" placeholder="<?php _e( 'Date of public', 'text_domain' ); ?>">';

        tabHtml += '<label for="' + tabName(count, 'user_profile_url') + '"><?php _e( 'Image Topic:' ); ?></label><br>';
        tabHtml += '<img class="custom_media_image" src="" style="margin:0;padding:0;max-width:100px;float:left;display:inline-block" />';
        tabHtml += '<input type="hidden" class="widefat custom_media_url" name="' + tabName(count, 'user_profile_url') + '" value="" />';
        tabHtml += '<button type="button" class="button button-primary custom_media_button cards" style="margin-top: 5px;float:left;display:inline-block;width:100%;">Select Image</button>';

        tabHtml += '<input type="text" class="widefat" name="' + tabName(count, 'title_of_topic') + '" placeholder="<?php _e( 'Title of topic:', 'text_domain' ); ?>">';
        tabHtml += '<textarea class="widefat" name="' + tabName(count, 'description_of_topic') + '" placeholder="<?php _e( 'Description of topic', 'text_domain' ); ?>"></textarea>';
        tabHtml += '<input type="text" class="widefat" name="' + tabName(count, 'time_to_read') + '" placeholder="<?php _e( 'Time to read', 'text_domain' ); ?>">';
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
jQuery(document).ready(function($) {
    $(document).on('click', '.custom_media_button.cards', function(e) {
        e.preventDefault();
        var button = $(this);
        var field = button.siblings('.custom_media_url');
        var custom_media_frame = wp.media.frames.custom_media_frame = wp.media({
            title: 'Choose Image',
            button: {
                text: 'Choose Image'
            },
            multiple: false
        });
        custom_media_frame.on('select', function() {
            var attachment = custom_media_frame.state().get('selection').first().toJSON();
            field.val(attachment.url).trigger('change');
            button.siblings('.custom_media_image').attr('src', attachment.url);
        });
        custom_media_frame.open();
    });
});
    </script>
    <?php
}

    
}

// Регистрация виджета
function register_interesting_topics_container_widget() {
    register_widget( 'Interesting_Topics_Container_Widget' );
}
add_action( 'widgets_init', 'register_interesting_topics_container_widget' );
