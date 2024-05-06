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
        echo '<section id="career">';
        echo '<div class="container">';
        // Перевірка наявності вкладок
        if (!empty($instance['tabs'])) {
            echo '<h2 class="pb-20 text-4xl font-normal text-primary">'. esc_html( $instance['widget_title'] ) .'</h2>';
            echo '<nav class="bg-light py-10">';
            echo '<ul class="flex gap-10">';
            foreach ($instance['tabs'] as $tab) {
                echo '<li id="' . sanitize_title($tab['title']) . '"><a href="#" class="py-[22px] text-gray-400 rounded-t-lg hover:text-primary hover:bg-gray-200">' . esc_html($tab['title']) . '</a></li>';
            }
            echo '</ul>';
            echo '</nav>';
            // Вивід контенту кожної вкладки
            foreach ($instance['tabs'] as $tab) {
                echo '<div id="' . sanitize_title($tab['title']) . '" class="bg-gray-200 rounded-b-lg rounded-tr-lg p-[60px]">';
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
                echo '<span class="bg-gray-500 py-[10px] px-[15px] rounded-[10px]">'. esc_html($tab['title_work_second']) .'</span>';
                echo '<p>'. esc_html($tab['salary_work_second']) .'</p>';
                echo '</div>';
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
function add_custom_tabs_script() {
    wp_enqueue_script( 'custom-tabs-script', get_template_directory_uri() . '/assets/js/custom-tabs.js', array( 'jquery' ), '1.0', true );
}
add_action( 'wp_enqueue_scripts', 'add_custom_tabs_script' );
