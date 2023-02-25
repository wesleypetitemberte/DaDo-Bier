<?php
//Remove admin bar
show_admin_bar( false );

//Remove Meta wp generetor
remove_action( 'wp_head', 'wp_generator' );

//Remove Emoji
remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
remove_action( 'wp_print_styles', 'print_emoji_styles' );

//Remove RSD
remove_action( 'wp_head', 'rsd_link' );

//Remove wlwmanifest
remove_action( 'wp_head', 'wlwmanifest_link' );

load_theme_textdomain( 'wesley' );

//Remove wp-embed.min.js
function my_deregister_scripts() {
    wp_deregister_script( 'wp-embed' );
}

add_action( 'wp_footer', 'my_deregister_scripts' );

//Add suport thumbnail
add_theme_support( 'post-thumbnails' );
add_image_size( 'thumb-case-mobile', 324, 380 );

//Add menu
register_nav_menus( array(
    'header_menu'   => 'Menu Header',
    'footer_menu'   => 'Menu Footer',
    'footer_menu2'   => 'Menu Footer 2',
) );

//Define locale Brazil
setlocale( LC_ALL, 'pt_BR', 'pt_BR.utf-8', 'pt_BR.utf-8', 'portuguese' );
setlocale( LC_MONETARY, 'pt_BR' );
date_default_timezone_set( 'America/Sao_Paulo' );

//Registro scripts e css
function base_scripts() {
    //JS
    wp_enqueue_script( 'popper.js', 'https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js', array() );
    wp_enqueue_script( 'player-js', 'https://cdn.plyr.io/3.5.3/plyr.js', array(), '1.0.0', true );
    wp_enqueue_script( 'google-recaptcha', 'https://www.google.com/recaptcha/api.js', array(), time() );
    wp_enqueue_script( 'vanilla-lazyload', 'https://cdn.jsdelivr.net/npm/vanilla-lazyload@12.0.0/dist/lazyload.min.js', array(), time() );
    // wp_enqueue_script( 'vanilla-lazyload', '/node_modules/vanilla-lazyload/dist/lazyload.min.js', array(), time() );
    wp_enqueue_script( 'wow.js', 'https://cdnjs.cloudflare.com/ajax/libs/wow/1.1.2/wow.min.js', array(), time() );
    // wp_enqueue_script( 'wow.js', '/node_modules/wow.js/dist/wow.min.js', array(), time() );
    wp_enqueue_script( 'main-js', get_template_directory_uri() . '/dist/js/main.min.js', array(), '1.0.0', true );
    $translation_array = array( 'templateUrl' => get_stylesheet_directory_uri() );
    wp_localize_script( 'main-js', 'object_name', $translation_array );

    //CSS
    wp_enqueue_style( 'player-css', 'https://cdn.plyr.io/3.5.3/plyr.css', array(), time() );
    wp_enqueue_style( 'main', get_template_directory_uri() . '/dist/css/main.min.css', array(), time() );
    // wp_enqueue_style( 'animate.css', '/node_modules/animate.css/animate.min.css', array(), time() );
    wp_enqueue_style( 'animate.css', 'https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.7.2/animate.min.css', array(), time() );

}

add_action( 'wp_enqueue_scripts', 'base_scripts' );

function pagination_bar( $custom_query ) {

    $total_pages = $custom_query->max_num_pages;
    $big = 999999999; // need an unlikely integer

    if ($total_pages > 1){
        $current_page = max(1, get_query_var('paged'));

        echo paginate_links(array(
            'base' => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
            'format' => '?paged=%#%',
            'current' => $current_page,
            'total' => $total_pages,
        ));
    }
}

flush_rewrite_rules();
