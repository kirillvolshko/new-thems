<?php
class Tabs_Container_Widget extends WP_Widget {

    // Конструктор
    public function __construct() {
        parent::__construct(
            'tabs_container_widget', // ID вашого віджета
            __( 'Tabs Container Widget', 'text_domain' ), // Назва вашого віджета
            array(
                'description' => __( 'Widget for displaying tabs', 'text_domain' ), // Опис вашого віджета
            )
        );
    }

    // Вивід віджета на фронтенді
    public function widget( $args, $instance ) {
        // Вивід віджета
        echo $args['before_widget'];
        echo '<section id="career" class="tabs-container">';
        echo '<div class="container">';
        // Перевірка наявності вкладок
        if (!empty($instance['tabs'])) {
            echo '<h2 class="pb-[44px] text-4xl font-normal text-primary">'. esc_html( $instance['widget_title'] ) .'</h2>';
            echo '<nav class="bg-light py-[22px]">';
            echo '<ul class="flex gap-[30px]">';
            foreach ($instance['tabs'] as $tab) {
                $href = preg_replace('/[^A-Za-z0-9\-]/', '', sanitize_title($tab['title']));
                echo '<li><a href="#' . $href . '" class="py-[22px] text-gray-400 rounded-t-lg hover:text-primary hover:bg-gray-200">' . esc_html($tab['title']) . '</a></li>';
            }
            echo '</ul>';
            echo '</nav>';
            // Вивід контенту кожної вкладки
            foreach ($instance['tabs'] as $tab) {
                $id = preg_replace('/[^A-Za-z0-9\-]/', '', sanitize_title($tab['title']));
                echo '<div id="' . $id . '" class="tab-content-container bg-gray-200 rounded-b-lg rounded-tr-lg p-[60px]">';
                echo '<h3 class="text-4xl font-bold pb-[11px] text-primary">'. esc_html($tab['tab_content_title']) .'</h3>';
                echo '<div class="flex gap-28">';
                echo '<div class="pt-[61px] flex flex-col justify-between">';
                echo '<div class="flex flex-col gap-3">';
                echo '<p class="pb-1 font-bold text-primary">'. esc_html($tab['title_salary_container']) .'</p>';
                echo '<div class="flex items-center">';
                echo '<span class="bg-gray-500 py-[10px] px-[15px] rounded-[10px]">'. esc_html($tab['title_work_first']) .'</span>';
                echo '<p>'. esc_html($tab['salary_work_first']) .'</p>';
                echo '</div>';
                echo '<div class="flex items-center">';
                echo '<span class="bg-primary text-light py-[10px] px-[15px] rounded-[10px]">'. esc_html($tab['title_work_second']) .'</span>';
                echo '<p>'. esc_html($tab['salary_work_second']) .'</p>';
                echo '</div>';
                echo '</div>';

                echo '<div class="flex flex-col p-4 border rounded-[20px] bg-light">';
                echo '<div class="flex items-center mb-5">';
                echo '<img src="' . esc_url( $tab['user_profile_url'] ) . '" alt="Profile picture" style="width: 56px; height: 56px; border-radius:100%; margin-right:8px">';


                echo '<div class="user">';
                echo '<h4 class="mr-2 text-lg font-medium">'. esc_html($tab['user_name']) .'</h4>';
                echo '<div class="stars">';
                echo '<span class="flex">';
                echo '<svg width="10" height="10" viewBox="0 0 16 17" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M8 13.3589L12.944 16.5L11.632 10.58L16 6.59684L10.248 6.07474L8 0.5L5.752 6.07474L0 6.59684L4.36 10.58L3.056 16.5L8 13.3589Z" fill="#141C24" /> </svg>';
                echo '<svg width="10" height="10" viewBox="0 0 16 17" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M8 13.3589L12.944 16.5L11.632 10.58L16 6.59684L10.248 6.07474L8 0.5L5.752 6.07474L0 6.59684L4.36 10.58L3.056 16.5L8 13.3589Z" fill="#141C24" /> </svg>';
                echo '<svg width="10" height="10" viewBox="0 0 16 17" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M8 13.3589L12.944 16.5L11.632 10.58L16 6.59684L10.248 6.07474L8 0.5L5.752 6.07474L0 6.59684L4.36 10.58L3.056 16.5L8 13.3589Z" fill="#141C24" /> </svg>';
                echo '<svg width="10" height="10" viewBox="0 0 16 17" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M8 13.3589L12.944 16.5L11.632 10.58L16 6.59684L10.248 6.07474L8 0.5L5.752 6.07474L0 6.59684L4.36 10.58L3.056 16.5L8 13.3589Z" fill="#141C24" /> </svg>';
                echo '<svg width="10" height="10" viewBox="0 0 16 17" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M8 13.3589L12.944 16.5L11.632 10.58L16 6.59684L10.248 6.07474L8 0.5L5.752 6.07474L0 6.59684L4.36 10.58L3.056 16.5L8 13.3589Z" fill="#141C24" /> </svg>';
                echo '</span>';
                echo '</div>';
                echo '</div>';

                echo '</div>';
                echo '<p class="text-gray-400">'. esc_html($tab['user_feedback_text']) .'</p>';
                echo '</div>';
                echo '</div>';

                echo '<div class="flex gap-8">';
                echo '<div>';
                echo '<div class="font-bold mb-7">';
                echo '<p>'. esc_html($tab['title_of_card_first']) .'</p>';
                echo '</div>';
                echo '<article class="flex flex-col justify-between px-6 py-8 bg-white rounded-lg borderStyles w-[284px] h-[390px]">';
                echo '<header>';
                echo '<h4 class="flex items-start justify-between">';
                echo '<span class="text-xl font-bold">'. esc_html($tab['name_of_course_first']) .'</span>';
                echo '<span class="text-xl font-semibold">'. esc_html($tab['price_of_course_first']) .'</span>';
                echo '</h4>';
                echo '<p class="mt-2 font-semibold text-gray-400">'. esc_html($tab['dostup_for_course_first']) .'</p>';
                echo '</header>';
                echo '<footer class="flex items-start justify-between mt-4">';
                echo '<div class="flex items-center text-lg text-primary">';
                echo '<svg width="16" height="17" viewBox="0 0 16 17" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M8 13.3589L12.944 16.5L11.632 10.58L16 6.59684L10.248 6.07474L8 0.5L5.752 6.07474L0 6.59684L4.36 10.58L3.056 16.5L8 13.3589Z" fill="#141C24" /> </svg>';
                echo '<span class="ml-1">'. esc_html($tab['score_for_course_first']) .'</span>';
                echo'</div>';
                echo '<p class="font-semibold text-gray-400">Skill</p>';
                echo'</footer>';
                echo '</article>';
                echo '</div>';

                echo '<div>';
                echo '<div class="font-bold mb-7">';
                echo '<p>'. esc_html($tab['title_of_card_second']) .'</p>';
                echo '</div>';
                echo '<article class="flex flex-col justify-between px-6 py-8 bg-white rounded-lg borderStyles w-[284px] h-[390px]">';
                echo '<header>';
                echo '<h4 class="flex items-start justify-between">';
                echo '<span class="text-xl font-bold">'. esc_html($tab['name_of_course_second']) .'</span>';
                echo '<span class="text-xl font-semibold">'. esc_html($tab['price_of_course_second']) .'</span>';
                echo '</h4>';
                echo '<p class="mt-2 font-semibold text-gray-400">'. esc_html($tab['dostup_for_course_second']) .'</p>';
                echo '</header>';
                echo '<footer class="flex items-start justify-between mt-4">';
                echo '<div class="flex items-center text-lg text-primary">';
                echo '<svg width="16" height="17" viewBox="0 0 16 17" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M8 13.3589L12.944 16.5L11.632 10.58L16 6.59684L10.248 6.07474L8 0.5L5.752 6.07474L0 6.59684L4.36 10.58L3.056 16.5L8 13.3589Z" fill="#141C24" /> </svg>';
                echo '<span class="ml-1">'. esc_html($tab['score_for_course_second']) .'</span>';
                echo'</div>';
                echo '<p class="font-semibold text-gray-400">Skill</p>';
                echo'</footer>';
                echo '</article>';
                echo '</div>';
                echo '</div>';
                echo '</div>';
                echo '</div>';
            }
            
        }
        
        echo '</div>';
        echo '</section>';
        echo $args['after_widget'];
    }

    // Метод для оновлення налаштувань віджета
    public function update( $new_instance, $old_instance ) {
        $instance = array();
        $instance['widget_title'] = ! empty( $new_instance['widget_title'] ) ? $new_instance['widget_title'] : '';
        $instance['tabs'] = ! empty( $new_instance['tabs'] ) ? $new_instance['tabs'] : array();
        
        return $instance;
    }

    // Відображення форми налаштувань в адмінці
    public function form( $instance ) {
        $widget_title = ! empty( $instance['widget_title'] ) ? $instance['widget_title'] : '';
        $tabs = ! empty( $instance['tabs'] ) ? $instance['tabs'] : array();
        ?>
        <p>
            <label for="<?php echo $this->get_field_id( 'widget_title' ); ?>"><?php _e( 'Widget Title:' ); ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id( 'widget_title' ); ?>" name="<?php echo $this->get_field_name( 'widget_title' ); ?>" type="text" value="<?php echo esc_attr( $widget_title ); ?>">
        </p>
        <p>
            <label for="<?php echo $this->get_field_id( 'tabs' ); ?>"><?php _e( 'Tabs:' ); ?></label>
            <ul class="tabs-list">
                <?php foreach ( $tabs as $key => $tab ) : ?>
                    <li>
                        <label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Tab Title:' ); ?></label>
                        <input type="text" class="widefat" name="<?php echo $this->get_field_name( 'tabs' ); ?>[<?php echo $key; ?>][title]" value="<?php echo esc_attr( $tab['title'] ); ?>" placeholder="<?php _e( 'Tab Title', 'text_domain' ); ?>">
                        <label for="<?php echo $this->get_field_id( 'tab_content_title' ); ?>"><?php _e( 'Tab Content Title:' ); ?></label>
                        <input type="text" class="widefat" name="<?php echo $this->get_field_name( 'tabs' ); ?>[<?php echo $key; ?>][tab_content_title]" value="<?php echo esc_attr( $tab['tab_content_title'] ); ?>" placeholder="<?php _e( 'Tab Content Title', 'text_domain' ); ?>">
                        <label for="<?php echo $this->get_field_id( 'title_salary_container' ); ?>"><?php _e( 'Title Salary Container:' ); ?></label>
                        <input type="text" class="widefat" name="<?php echo $this->get_field_name( 'tabs' ); ?>[<?php echo $key; ?>][title_salary_container]" value="<?php echo esc_attr( $tab['title_salary_container'] ); ?>" placeholder="<?php _e( 'Title Salary Container', 'text_domain' ); ?>">
                        <label for="<?php echo $this->get_field_id( 'title_work_first' ); ?>"><?php _e( 'Title Work First:' ); ?></label>
                        <input type="text" class="widefat" name="<?php echo $this->get_field_name( 'tabs' ); ?>[<?php echo $key; ?>][title_work_first]" value="<?php echo esc_attr( $tab['title_work_first'] ); ?>" placeholder="<?php _e( 'Title Work First', 'text_domain' ); ?>">
                        <label for="<?php echo $this->get_field_id( 'salary_work_first' ); ?>"><?php _e( 'Salary First Work:' ); ?></label>
                        <input type="text" class="widefat" name="<?php echo $this->get_field_name( 'tabs' ); ?>[<?php echo $key; ?>][salary_work_first]" value="<?php echo esc_attr( $tab['salary_work_first'] ); ?>" placeholder="<?php _e( 'Salary First Work', 'text_domain' ); ?>">
                        <label for="<?php echo $this->get_field_id( 'title_work_second' ); ?>"><?php _e( 'Title Work Second:' ); ?></label>
                        <input type="text" class="widefat" name="<?php echo $this->get_field_name( 'tabs' ); ?>[<?php echo $key; ?>][title_work_second]" value="<?php echo esc_attr( $tab['title_work_second'] ); ?>" placeholder="<?php _e( 'Title Work Second', 'text_domain' ); ?>">
                        <label for="<?php echo $this->get_field_id( 'salary_work_second' ); ?>"><?php _e( 'Salary First Second:' ); ?></label>
                        <input type="text" class="widefat" name="<?php echo $this->get_field_name( 'tabs' ); ?>[<?php echo $key; ?>][salary_work_second]" value="<?php echo esc_attr( $tab['salary_work_second'] ); ?>" placeholder="<?php _e( 'Salary Second Work', 'text_domain' ); ?>">
                        
                        <label for="<?php echo $this->get_field_id( 'user_profile_url' ); ?>"><?php _e( 'Image Profile:' ); ?></label><br>
                        <img class="custom_media_image" src="<?php echo esc_url( $tab['user_profile_url'] ); ?>" style="margin:0;padding:0;max-width:100px;float:left;display:inline-block" />
                        <input type="hidden" class="widefat custom_media_url" id="<?php echo $this->get_field_id( 'user_profile_url' ); ?>" name="<?php echo $this->get_field_name( 'tabs' ); ?>[<?php echo $key; ?>][user_profile_url]" value="<?php echo esc_url( $tab['user_profile_url'] ); ?>" />
                        <button type="button" class="button button-primary custom_media_button tabs" style="margin-top: 5px;float:left;display:inline-block;width:100%;">Select Image</button>


                        <label for="<?php echo $this->get_field_id( 'user_name' ); ?>"><?php _e( 'User Name:' ); ?></label>
                        <input type="text" class="widefat" name="<?php echo $this->get_field_name( 'tabs' ); ?>[<?php echo $key; ?>][user_name]" value="<?php echo esc_attr( $tab['user_name'] ); ?>" placeholder="<?php _e( 'User Name', 'text_domain' ); ?>">
                        <label for="<?php echo $this->get_field_id( 'user_feedback_text' ); ?>"><?php _e( 'User Feedback Text:' ); ?></label>
                        <textarea class="widefat" name="<?php echo $this->get_field_name( 'tabs' ); ?>[<?php echo $key; ?>][user_feedback_text]" placeholder="<?php _e( 'User Feedback Text:', 'text_domain' ); ?>"><?php echo esc_textarea( $tab['user_feedback_text'] ); ?></textarea>

                        <label for="<?php echo $this->get_field_id( 'title_of_card_first' ); ?>"><?php _e( 'Title of card first:' ); ?></label>
                        <input type="text" class="widefat" name="<?php echo $this->get_field_name( 'tabs' ); ?>[<?php echo $key; ?>][title_of_card_first]" value="<?php echo esc_attr( $tab['title_of_card_first'] ); ?>" placeholder="<?php _e( 'Title of card first', 'text_domain' ); ?>">
                        <label for="<?php echo $this->get_field_id( 'name_of_course_first' ); ?>"><?php _e( 'Name of course first:' ); ?></label>
                        <input type="text" class="widefat" name="<?php echo $this->get_field_name( 'tabs' ); ?>[<?php echo $key; ?>][name_of_course_first]" value="<?php echo esc_attr( $tab['name_of_course_first'] ); ?>" placeholder="<?php _e( 'Name of course first', 'text_domain' ); ?>">
                        <label for="<?php echo $this->get_field_id( 'price_of_course_first' ); ?>"><?php _e( 'Price of course first:' ); ?></label>
                        <input type="text" class="widefat" name="<?php echo $this->get_field_name( 'tabs' ); ?>[<?php echo $key; ?>][price_of_course_first]" value="<?php echo esc_attr( $tab['price_of_course_first'] ); ?>" placeholder="<?php _e( 'Price of course first', 'text_domain' ); ?>">
                        <label for="<?php echo $this->get_field_id( 'dostup_for_course_first' ); ?>"><?php _e( 'Dostup for course first:' ); ?></label>
                        <input type="text" class="widefat" name="<?php echo $this->get_field_name( 'tabs' ); ?>[<?php echo $key; ?>][dostup_for_course_first]" value="<?php echo esc_attr( $tab['dostup_for_course_first'] ); ?>" placeholder="<?php _e( 'Dostup for course first', 'text_domain' ); ?>">
                        <label for="<?php echo $this->get_field_id( 'score_for_course_first ' ); ?>"><?php _e( 'Score for course first:' ); ?></label>
                        <input type="text" class="widefat" name="<?php echo $this->get_field_name( 'tabs' ); ?>[<?php echo $key; ?>][score_for_course_first ]" value="<?php echo esc_attr( $tab['score_for_course_first '] ); ?>" placeholder="<?php _e( 'Score for course first', 'text_domain' ); ?>">

                        <label for="<?php echo $this->get_field_id( 'title_of_card_second' ); ?>"><?php _e( 'Title of card second:' ); ?></label>
                        <input type="text" class="widefat" name="<?php echo $this->get_field_name( 'tabs' ); ?>[<?php echo $key; ?>][title_of_card_second]" value="<?php echo esc_attr( $tab['title_of_card_second'] ); ?>" placeholder="<?php _e( 'Title of card second', 'text_domain' ); ?>">
                        <label for="<?php echo $this->get_field_id( 'name_of_course_second' ); ?>"><?php _e( 'Name of course second:' ); ?></label>
                        <input type="text" class="widefat" name="<?php echo $this->get_field_name( 'tabs' ); ?>[<?php echo $key; ?>][name_of_course_second]" value="<?php echo esc_attr( $tab['name_of_course_second'] ); ?>" placeholder="<?php _e( 'Name of course second', 'text_domain' ); ?>">
                        <label for="<?php echo $this->get_field_id( 'price_of_course_second' ); ?>"><?php _e( 'Price of course second:' ); ?></label>
                        <input type="text" class="widefat" name="<?php echo $this->get_field_name( 'tabs' ); ?>[<?php echo $key; ?>][price_of_course_second]" value="<?php echo esc_attr( $tab['price_of_course_second'] ); ?>" placeholder="<?php _e( 'Price of course second', 'text_domain' ); ?>">
                        <label for="<?php echo $this->get_field_id( 'dostup_for_course_second' ); ?>"><?php _e( 'Dostup for course second:' ); ?></label>
                        <input type="text" class="widefat" name="<?php echo $this->get_field_name( 'tabs' ); ?>[<?php echo $key; ?>][dostup_for_course_second]" value="<?php echo esc_attr( $tab['dostup_for_course_second'] ); ?>" placeholder="<?php _e( 'Dostup for course second', 'text_domain' ); ?>">
                        <label for="<?php echo $this->get_field_id( 'score_for_course_second ' ); ?>"><?php _e( 'Score for course second:' ); ?></label>
                        <input type="text" class="widefat" name="<?php echo $this->get_field_name( 'tabs' ); ?>[<?php echo $key; ?>][score_for_course_second ]" value="<?php echo esc_attr( $tab['score_for_course_second '] ); ?>" placeholder="<?php _e( 'Score for course second', 'text_domain' ); ?>">
                        <button class="button remove-tab"><?php _e( 'Remove', 'text_domain' ); ?></button>
                    </li>
                <?php endforeach; ?>
            </ul>
            <button class="button add-tab"><?php _e( 'Add Tab', 'text_domain' ); ?></button>
        </p>
        <script>
           jQuery(document).ready(function($) {
    // Добавление новой вкладки
    $('.add-tab').click(function() {
        var count = $('.tabs-list li').length;
        var tabHtml = '<li>';
        tabHtml += '<input type="text" class="widefat" name="' + tabName(count, 'title') + '" placeholder="<?php _e( 'Tab Title:', 'text_domain' ); ?>">';
        tabHtml += '<input type="text" class="widefat" name="' + tabName(count, 'tab_content_title') + '" placeholder="<?php _e( 'Tab Content Title:', 'text_domain' ); ?>">';
        tabHtml += '<input type="text" class="widefat" name="' + tabName(count, 'title_salary_container') + '" placeholder="<?php _e( 'Title Salary Container:', 'text_domain' ); ?>">';
        tabHtml += '<input type="text" class="widefat" name="' + tabName(count, 'title_work_first') + '" placeholder="<?php _e( 'Title Work First:', 'text_domain' ); ?>">';
        tabHtml += '<input type="text" class="widefat" name="' + tabName(count, 'salary_work_first') + '" placeholder="<?php _e( 'Salary First Work:', 'text_domain' ); ?>">';
        tabHtml += '<input type="text" class="widefat" name="' + tabName(count, 'title_work_second') + '" placeholder="<?php _e( 'Title Work Second:', 'text_domain' ); ?>">';
        tabHtml += '<input type="text" class="widefat" name="' + tabName(count, 'salary_work_second') + '" placeholder="<?php _e( 'Salary First Second:', 'text_domain' ); ?>">';
        
        tabHtml += '<label for="' + tabName(count, 'user_profile_url') + '"><?php _e( 'Image:' ); ?></label><br>';
        tabHtml += '<img class="custom_media_image" src="" style="margin:0;padding:0;max-width:100px;float:left;display:inline-block" />';
        tabHtml += '<input type="hidden" class="widefat custom_media_url" name="' + tabName(count, 'user_profile_url') + '" value="" />';
        tabHtml += '<button type="button" class="button button-primary custom_media_button tabs" style="margin-top: 5px;float:left;display:inline-block;width:100%;">Select Image</button>';

        tabHtml += '<input type="text" class="widefat" name="' + tabName(count, 'user_name') + '" placeholder="<?php _e( 'User Name', 'text_domain' ); ?>">';
        tabHtml += '<textarea class="widefat" name="' + tabName(count, 'user_feedback_text') + '" placeholder="<?php _e( 'User Feedback Text:', 'text_domain' ); ?>"></textarea>';
        
        tabHtml += '<input type="text" class="widefat" name="' + tabName(count, 'title_of_card_first') + '" placeholder="<?php _e( 'Title of card first', 'text_domain' ); ?>">';
        tabHtml += '<input type="text" class="widefat" name="' + tabName(count, 'name_of_course_first') + '" placeholder="<?php _e( 'Name of course first', 'text_domain' ); ?>">';
        tabHtml += '<input type="text" class="widefat" name="' + tabName(count, 'price_of_course_first') + '" placeholder="<?php _e( 'Price of course first', 'text_domain' ); ?>">';
        tabHtml += '<input type="text" class="widefat" name="' + tabName(count, 'dostup_for_course_first') + '" placeholder="<?php _e( 'Dostup for course first', 'text_domain' ); ?>">';
        tabHtml += '<input type="text" class="widefat" name="' + tabName(count, 'score_for_course_first ') + '" placeholder="<?php _e( 'Score for course first', 'text_domain' ); ?>">';
        
        tabHtml += '<input type="text" class="widefat" name="' + tabName(count, 'title_of_card_second') + '" placeholder="<?php _e( 'Title of card second', 'text_domain' ); ?>">';
        tabHtml += '<input type="text" class="widefat" name="' + tabName(count, 'name_of_course_second') + '" placeholder="<?php _e( 'Name of course second', 'text_domain' ); ?>">';
        tabHtml += '<input type="text" class="widefat" name="' + tabName(count, 'price_of_course_second') + '" placeholder="<?php _e( 'Price of course second', 'text_domain' ); ?>">';
        tabHtml += '<input type="text" class="widefat" name="' + tabName(count, 'dostup_for_course_second') + '" placeholder="<?php _e( 'Dostup for course second', 'text_domain' ); ?>">';
        tabHtml += '<input type="text" class="widefat" name="' + tabName(count, 'score_for_course_second ') + '" placeholder="<?php _e( 'Score for course second', 'text_domain' ); ?>">';

        tabHtml += '<button class="button remove-tab"><?php _e( 'Remove', 'text_domain' ); ?></button>';
        tabHtml += '</li>';
        $('.tabs-list').append(tabHtml);
        return false;
    });

    // Удаление вкладки
    $('.tabs-list').on('click', '.remove-tab', function() {
        $(this).parent().remove();
        return false;
    });

    // Функция для генерации имен полей вкладок
    function tabName(index, field) {
        return '<?php echo $this->get_field_name( 'tabs' ); ?>[' + index + '][' + field + ']';
    }
});

 jQuery(document).ready(function($) {
    $(document).on('click', '.custom_media_button.tabs', function(e) {
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

// Реєстрація віджета
function register_tabs_container_widget() {
    register_widget( 'Tabs_Container_Widget' );
}
add_action( 'widgets_init', 'register_tabs_container_widget' );

// Додавання JavaScript до сторінки
function add_custom_tabs_script_2() {
    wp_enqueue_script( 'custom-tabs-script-2', get_template_directory_uri() . '/assets/js/custom-tabs.js', array( 'jquery' ), '1.0', true );
}
add_action( 'wp_enqueue_scripts', 'add_custom_tabs_script_2' );
