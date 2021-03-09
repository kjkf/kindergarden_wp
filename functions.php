<?php
/**
 * Created by IntelliJ IDEA.
 * User: yakjk
 * Date: 22.02.2021
 * Time: 13:18
 */

add_action('wp_enqueue_scripts', 'style_theme');
add_action('wp_footer', 'script_theme');
add_action('after_setup_theme', 'theme_register_nav_menu');
add_action( 'init', 'register_post_types' );
function register_post_types(){
    register_staff_posttype();
    register_group_posttype();
}

function register_staff_posttype() {
    register_post_type( 'staff', [
        'label'  => null,
        'labels' => [
            'name'               => 'Педагогический состав', // основное название для типа записи
            'singular_name'      => 'Сотрудник', // название для одной записи этого типа
            'add_new'            => 'Добавить сотрудника', // для добавления новой записи
            'add_new_item'       => 'Добавление сотрудника', // заголовка у вновь создаваемой записи в админ-панели.
            'edit_item'          => 'Редактирование сотрудника', // для редактирования типа записи
            'new_item'           => 'Новый сотрудник', // текст новой записи
            'view_item'          => 'Смотреть профиль сотрудника', // для просмотра записи этого типа.
            'search_items'       => 'Искать сотрудника', // для поиска по этим типам записи
            'not_found'          => 'Не найдено', // если в результате поиска ничего не было найдено
            'not_found_in_trash' => 'Не найдено в корзине', // если не было найдено в корзине
            'parent_item_colon'  => '', // для родителей (у древовидных типов)
            'menu_name'          => 'Педагогический состав', // название меню
        ],
        'description'         => 'Штатное расписание детского сада',
        'public'              => true,
        // 'publicly_queryable'  => null, // зависит от public
        // 'exclude_from_search' => null, // зависит от public
        // 'show_ui'             => null, // зависит от public
        // 'show_in_nav_menus'   => null, // зависит от public
        'show_in_menu'        => true, // показывать ли в меню адмнки
        // 'show_in_admin_bar'   => null, // зависит от show_in_menu
        'show_in_rest'        => true, // добавить в REST API. C WP 4.7
        'rest_base'           => null, // $post_type. C WP 4.7
        'menu_position'       => 4,
        'menu_icon'           => 'dashicons-id-alt',
        //'capability_type'   => 'post',
        //'capabilities'      => 'post', // массив дополнительных прав для этого типа записи
        //'map_meta_cap'      => null, // Ставим true чтобы включить дефолтный обработчик специальных прав
        'hierarchical'        => false,
        'supports'            => ['title'], // 'title','editor','author','thumbnail','excerpt','trackbacks','custom-fields','comments','revisions','page-attributes','post-formats'
        'taxonomies'          => [],
        'has_archive'         => false,
        'rewrite'             => true,
        'query_var'           => true,
    ] );
}

function register_group_posttype() {
    register_post_type( 'groups', [
        'label'  => null,
        'labels' => [
            'name'               => 'Группы', // основное название для типа записи
            'singular_name'      => 'Группа', // название для одной записи этого типа
            'add_new'            => 'Добавить группу', // для добавления новой записи
            'add_new_item'       => 'Добавление группы', // заголовка у вновь создаваемой записи в админ-панели.
            'edit_item'          => 'Редактирование группы', // для редактирования типа записи
            'new_item'           => 'Новая группа', // текст новой записи
            'view_item'          => 'Смотреть информацию о группе', // для просмотра записи этого типа.
            'search_items'       => 'Искать группу', // для поиска по этим типам записи
            'not_found'          => 'Не найдено', // если в результате поиска ничего не было найдено
            'not_found_in_trash' => 'Не найдено в корзине', // если не было найдено в корзине
            'parent_item_colon'  => '', // для родителей (у древовидных типов)
            'menu_name'          => 'Возрастные группы', // название меню
        ],
        'description'         => 'Штатное расписание детского сада',
        'public'              => true,
        // 'publicly_queryable'  => null, // зависит от public
        // 'exclude_from_search' => null, // зависит от public
        // 'show_ui'             => null, // зависит от public
        // 'show_in_nav_menus'   => null, // зависит от public
        'show_in_menu'        => true, // показывать ли в меню адмнки
        // 'show_in_admin_bar'   => null, // зависит от show_in_menu
        'show_in_rest'        => true, // добавить в REST API. C WP 4.7
        'rest_base'           => null, // $post_type. C WP 4.7
        'menu_position'       => 4,
        'menu_icon'           => 'dashicons-buddicons-groups',
        //'capability_type'   => 'post',
        //'capabilities'      => 'post', // массив дополнительных прав для этого типа записи
        //'map_meta_cap'      => null, // Ставим true чтобы включить дефолтный обработчик специальных прав
        'hierarchical'        => false,
        'supports'            => ['title'], // 'title','editor','author','thumbnail','excerpt','trackbacks','custom-fields','comments','revisions','page-attributes','post-formats'
        'taxonomies'          => [],
        'has_archive'         => false,
        'rewrite'             => true,
        'query_var'           => true,
    ] );
}

add_filter('excerpt_length', 'new_excerpt_length');
add_filter('excerpt_more', 'new_excerpt_more');

function theme_register_nav_menu() {
    register_nav_menu('menu', 'Меню сайта');
    add_theme_support('post-thumbnails', array('post'));
    add_image_size('news_thumb', 250, 250, true);

}

function style_theme() {
    wp_enqueue_style('main_styles', get_stylesheet_uri());
    wp_enqueue_style('normalize', get_template_directory_uri() . '/assets/css/normalize.css');
    wp_enqueue_style('styles', get_template_directory_uri() . '/assets/css/style.css');
}

function script_theme() {
    wp_enqueue_script('scripts', get_template_directory_uri() . '/assets/js/script.js' );
}

function new_excerpt_length($length) {
    return 25;
}

function new_excerpt_more($more) {
    global $post;
    return '<a href="'.get_permalink($post->ID).'" class="bl-info-detail">Подробнее..</a>';
}

