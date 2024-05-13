<?php
// Класс виджета
class Feedbacks_Container_Widget extends WP_Widget {

    // Метод конструктора
    public function __construct() {
        parent::__construct(
            'feedbacks_container_widget',
            __( 'Feedbacks_Container_Widget', 'text_domain' ),
            array(
                'description' => __( 'Feedbacks_Container_Widget', 'text_domain' ),
            )
        );
    }

    // Метод для отображения виджета во фронтенде
    public function widget( $args, $instance ) {
        echo $args['before_widget'];
        echo '<section id="feedbacks" class="pb-[160px]">';
        echo '<div class="container">';
        echo '<h2 class="h2 mb-14">'. esc_html( $instance['title'] ) . '</h2>';
        echo '<div class="flex gap-[66px]">';
        echo '<div class="flex gap-6">';
        if (!empty($instance['cards'])) {
            foreach ($instance['cards'] as $card) {
        echo '<article class="flex flex-col gap-16 borderStyles">';
        echo '<header class="pt-[16px] pr-[20px] pl-[32px]">';
        echo '<div class="flex items-start justify-between">';
        echo '<div class="flex items-center mb-5">';
        echo '<img src="' . esc_url( $card['user_profile_url'] ) . '" alt="Profile picture feedback" style="width: 56px; height: 56px; border-radius:100%; margin-right:8px">';
        echo '<div class="user">';
        echo '<h4 class="mr-2 text-lg font-medium">'. esc_html($card['name_of_user']) .'</h4>';
        echo '<div class="stars">';
        echo '<span class="flex">';
        echo '<svg width="10" height="10" viewBox="0 0 16 17" fill="none" xmlns="http://www.w3.org/2000/svg"> <path d="M8 13.3589L12.944 16.5L11.632 10.58L16 6.59684L10.248 6.07474L8 0.5L5.752 6.07474L0 6.59684L4.36 10.58L3.056 16.5L8 13.3589Z" fill="#141C24" /></svg>';
        echo '<svg width="10" height="10" viewBox="0 0 16 17" fill="none" xmlns="http://www.w3.org/2000/svg"> <path d="M8 13.3589L12.944 16.5L11.632 10.58L16 6.59684L10.248 6.07474L8 0.5L5.752 6.07474L0 6.59684L4.36 10.58L3.056 16.5L8 13.3589Z" fill="#141C24" /></svg>';
        echo '<svg width="10" height="10" viewBox="0 0 16 17" fill="none" xmlns="http://www.w3.org/2000/svg"> <path d="M8 13.3589L12.944 16.5L11.632 10.58L16 6.59684L10.248 6.07474L8 0.5L5.752 6.07474L0 6.59684L4.36 10.58L3.056 16.5L8 13.3589Z" fill="#141C24" /></svg>';
        echo '<svg width="10" height="10" viewBox="0 0 16 17" fill="none" xmlns="http://www.w3.org/2000/svg"> <path d="M8 13.3589L12.944 16.5L11.632 10.58L16 6.59684L10.248 6.07474L8 0.5L5.752 6.07474L0 6.59684L4.36 10.58L3.056 16.5L8 13.3589Z" fill="#141C24" /></svg>';
        echo '<svg width="10" height="10" viewBox="0 0 16 17" fill="none" xmlns="http://www.w3.org/2000/svg"> <path d="M8 13.3589L12.944 16.5L11.632 10.58L16 6.59684L10.248 6.07474L8 0.5L5.752 6.07474L0 6.59684L4.36 10.58L3.056 16.5L8 13.3589Z" fill="#141C24" /></svg>';
        echo '</span>'; 
        echo '</div>'; 
        echo '</div>'; 
        echo '</div>'; 
        echo '<p class="text-gray-400">'. esc_html($card['date_of_feedback']) .'</p>'; 
        echo '</div>'; 
        echo '<p class="text-gray-400 w-[270px]">'. esc_html($card['text_of_feedback']) .'</p>'; 
        echo '</header>'; 
        echo '<footer class="py-[16px] border-t-2 border-gray-100">'; 
        echo '<div class="flex items-center justify-between pr-[20px] pl-[31px]">'; 
        echo '<p class="font-bold text-primary">'. esc_html($card['profesion_of_user']) .'</p>'; 
        echo '<button class="btn-rounded-sm next"></button>'; 
        echo '</div>'; 
        echo '</footer>'; 
        echo '</article>';
        }
        }
        echo '</div>';
        echo '<div class="flex gap-6">';
        if (!empty($instance['cards-vidio'])) {
            foreach ($instance['cards-vidio'] as $card_vidio) {
            echo '<article class="flex flex-col justify-between bg-gray-200 w-[249px] rounded-[20px] pt-[20px] px-[16px] pb-[24px]">';
            echo '<div class="px-[16px] py-[11px] rounded-full bg-light flex items-center gap-1 w-max">';
            echo '<svg width="18" height="17" viewBox="0 0 18 17" fill="none" xmlns="http://www.w3.org/2000/svg"> <path d="M9.16797 13.3589L14.421 16.5L13.027 10.58L17.668 6.59684L11.5565 6.07474L9.16797 0.5L6.77947 6.07474L0.667969 6.59684L5.30047 10.58L3.91497 16.5L9.16797 13.3589Z" fill="#141C24" /> </svg>';
            echo '<span class="font-semibold">'. esc_html($card_vidio['score_feedback']) .'</span>';
            echo '</div>';
            echo '<button class="flex items-center justify-center mx-auto btn-rounded-dark">';
            echo '<img src="./assets/img/play.svg" alt="">';    
            echo '</button>';    
            echo '<div class="py-[15px] max-w-[217px] bg-light rounded-full text-center">'; 
            echo '<p class="font-semibold">'. esc_html($card_vidio['name_of_user_vidio']) .'</p>';  
            echo '</div>';  
            echo '</article>';    
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
        $instance['cards-vidio'] = ! empty( $new_instance['cards-vidio'] ) ? $new_instance['cards-vidio'] : array();
        return $instance;
    }

   // Метод для вывода формы настройки виджета в админке
public function form( $instance ) {
    $title = ! empty( $instance['title'] ) ? $instance['title'] : '';
    $cards = ! empty( $instance['cards'] ) ? $instance['cards'] : array();
    $cards_vidio = ! empty( $instance['cards_vidio'] ) ? $instance['cards_vidio'] : array();
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
                        
                        <label for="<?php echo $this->get_field_id( 'user_profile_url' ); ?>"><?php _e( 'Image Profile:' ); ?></label><br>
                        <img class="custom_media_image" src="<?php echo esc_url( $card['user_profile_url'] ); ?>" style="margin:0;padding:0;max-width:100px;float:left;display:inline-block" />
                        <input type="hidden" class="widefat custom_media_url" id="<?php echo $this->get_field_id( 'user_profile_url' ); ?>" name="<?php echo $this->get_field_name( 'cards' ); ?>[<?php echo $key; ?>][user_profile_url]" value="<?php echo esc_url( $card['user_profile_url'] ); ?>" />
                        <button type="button" class="button button-primary custom_media_button cards" style="margin-top: 5px;float:left;display:inline-block;width:100%;">Select Image</button>

                        <label for="<?php echo $this->get_field_id( 'name_of_user' ); ?>"><?php _e( 'Name of user:' ); ?></label>
                        <input type="text" class="widefat" name="<?php echo $this->get_field_name( 'cards' ); ?>[<?php echo $key; ?>][name_of_user]" value="<?php echo esc_attr( $card['name_of_user'] ); ?>" placeholder="<?php _e( 'Name of User', 'text_domain' ); ?>">
                        <label for="<?php echo $this->get_field_id( 'date_of_feedback' ); ?>"><?php _e( 'Date of feedback:' ); ?></label>
                        <input type="text" class="widefat" name="<?php echo $this->get_field_name( 'cards' ); ?>[<?php echo $key; ?>][date_of_feedback]" value="<?php echo esc_attr( $card['date_of_feedback'] ); ?>" placeholder="<?php _e( 'Date of feedback', 'text_domain' ); ?>">
                        <label for="<?php echo $this->get_field_id( 'text_of_feedback' ); ?>"><?php _e( 'Text of feedback:' ); ?></label>
                        <textarea class="widefat" name="<?php echo $this->get_field_name( 'cards' ); ?>[<?php echo $key; ?>][text_of_feedback]" placeholder="<?php _e( 'Text of feedback', 'text_domain' ); ?>"><?php echo esc_attr( $card['text_of_feedback'] ); ?></textarea>
                        <label for="<?php echo $this->get_field_id( 'profesion_of_user' ); ?>"><?php _e( 'Profesion of user:' ); ?></label>
                        <input type="text" class="widefat" name="<?php echo $this->get_field_name( 'cards' ); ?>[<?php echo $key; ?>][profesion_of_user]" value="<?php echo esc_attr( $card['profesion_of_user'] ); ?>" placeholder="<?php _e( 'Profesion of user', 'text_domain' ); ?>">
                        <button class="button remove-card"><?php _e( 'Remove', 'text_domain' ); ?></button>
                    </li>
                <?php endforeach; ?>
            </ul>
            <button class="button add-card"><?php _e( 'Add Card', 'text_domain' ); ?></button>
        </p>
        <p>
            <label for="<?php echo $this->get_field_id( 'cards-vidio' ); ?>"><?php _e( 'Cards:' ); ?></label>
            <ul class="cards-vidio-list">
                <?php foreach ( $cards_vidio as $key => $card_vidio ) : ?>
                    <li>
                        
                        <label for="<?php echo $this->get_field_id( 'score_feedback' ); ?>"><?php _e( 'Score feedback:' ); ?></label>
                        <input type="text" class="widefat" name="<?php echo $this->get_field_name( 'cards-vidio' ); ?>[<?php echo $key; ?>][score_feedback]" value="<?php echo esc_attr( $card_vidio['score_feedback'] ); ?>" placeholder="<?php _e( 'Score feedback', 'text_domain' ); ?>">
                        <label for="<?php echo $this->get_field_id( 'name_of_user_vidio' ); ?>"><?php _e( 'Name of user vidio:' ); ?></label>
                        <input type="text" class="widefat" name="<?php echo $this->get_field_name( 'cards-vidio' ); ?>[<?php echo $key; ?>][name_of_user_vidio]" value="<?php echo esc_attr( $card_vidio['name_of_user_vidio'] ); ?>" placeholder="<?php _e( 'Name of user vidio', 'text_domain' ); ?>">
                        
                        <button class="button remove-card-vidio"><?php _e( 'Remove', 'text_domain' ); ?></button>
                    </li>
                <?php endforeach; ?>
            </ul>
            <button class="button add-card-vidio"><?php _e( 'Add Card Vidio', 'text_domain' ); ?></button>
        </p>
    <script>

    jQuery(document).ready(function($) {
    // Добавление новой вкладки
    $('.add-card-vidio').click(function() {
        var count = $('.cards-vidio-list li').length;
        var tabHtml = '<li>';
        tabHtml += '<input type="text" class="widefat" name="' + tabName(count, 'score_feedback') + '" placeholder="<?php _e( 'Score feedback', 'text_domain' ); ?>">';
        tabHtml += '<input type="text" class="widefat" name="' + tabName(count, 'name_of_user_vidio') + '" placeholder="<?php _e( 'Name of user vidio', 'text_domain' ); ?>">';
        tabHtml += '<button class="button remove-card-vidio"><?php _e( 'Remove', 'text_domain' ); ?></button>';
        tabHtml += '</li>';
        $('.cards-vidio-list').append(tabHtml);
        return false;
    });

    // Удаление вкладки
    $('.cards-vidio-list').on('click', '.remove-card-vidio', function() {
        $(this).parent().remove();
        return false;
    });

    // Функция для генерации имен полей вкладок
    function tabName(index, field) {
        return '<?php echo $this->get_field_name( 'cards-vidio' ); ?>[' + index + '][' + field + ']';
    }
});






     jQuery(document).ready(function($) {
    // Добавление новой вкладки
    $('.add-card').click(function() {
        var count = $('.cards-list li').length;
        var tabHtml = '<li>';

        tabHtml += '<label for="' + tabName(count, 'user_profile_url') + '"><?php _e( 'Image:' ); ?></label><br>';
        tabHtml += '<img class="custom_media_image" src="" style="margin:0;padding:0;max-width:100px;float:left;display:inline-block" />';
        tabHtml += '<input type="hidden" class="widefat custom_media_url" name="' + tabName(count, 'user_profile_url') + '" value="" />';
        tabHtml += '<button type="button" class="button button-primary custom_media_button cards" style="margin-top: 5px;float:left;display:inline-block;width:100%;">Select Image</button>';

        tabHtml += '<input type="text" class="widefat" name="' + tabName(count, 'name_of_user') + '" placeholder="<?php _e( 'Name of user', 'text_domain' ); ?>">';
        tabHtml += '<input type="text" class="widefat" name="' + tabName(count, 'date_of_feedback') + '" placeholder="<?php _e( 'Date of feedback', 'text_domain' ); ?>">';
        tabHtml += '<textarea class="widefat" name="' + tabName(count, 'text_of_feedback') + '" placeholder="<?php _e( 'Text of feedback', 'text_domain' ); ?>"></textarea>';
        tabHtml += '<input type="text" class="widefat" name="' + tabName(count, 'profesion_of_user') + '" placeholder="<?php _e( 'Profesion of user', 'text_domain' ); ?>">';
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
function register_feedbacks_container_widget() {
    register_widget( 'Feedbacks_Container_Widget' );
}
add_action( 'widgets_init', 'register_feedbacks_container_widget' );
