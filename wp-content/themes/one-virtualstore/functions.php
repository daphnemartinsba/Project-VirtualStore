<?php


/** 
 * one_virtualstore_scripts() passa o endereço da folh ade estilo através da função
 * wp_enqueue_style() que aceita quatro argumentos: nome da folha de estilo, 
 * endereço, um array que pode ser preenchido com demais nomes de folhas, 
 * com a versão (que passa a data de alteração) e com o tipo de mídia. 
 * add_action adiciona uma ação dentro da execução do wp, 
 * especificamente o gancho wp_enqueue_scripts que executará a função one_virtualstore_scripts();
 */

function one_virtualstore_scripts(){
    
    // add Bootstrap, if last parameter in bootstrap-js is true, it will be aplicable in footer (if doesnt mark, its false)
    wp_enqueue_script('bootstrap-js', get_template_directory_uri() . '/inc/boostrap.min.js', array('jquery'), '5.3.8', true);
    wp_enqueue_script('bootstrap-css', get_template_directory_uri() . '/inc/boostrap.min.css', array(), '5.3.8', 'all');

    // Theme's main stylesheet
    wp_enqueue_style('one-virtualstore-style', get_stylesheet_uri(), array(), filemtime(get_template_directory() . '/style.css'), 'all');
}

add_action('wp_enqueue_scripts', 'one_virtualstore_scripts');


// everything created in the following function will be executated when the hook 'after-setup-theme' is available
function one_virtualstore_config(){
    // register header and footer menus
    register_nav_menus(
        array(
            'one_virtualstore_main_menu'   => 'One VirtualStore Main Menu',
            'one_virtualstore_footer_menu' => 'One VirtualStore Footer Menu'
            )
    );
    
    // add theme support for woocommerce and 
    add_theme_support( 'woocommerce', 
        array(
            'thumbnail_image_width' => 255,
            'single_image_width'    => 255,
            'product_grid'          => array(
                'defaut_rows'     => 10,
                'min_rows'        => 5,
                'max_rows'        => 10,
                'default_columns' => 1,
                'min_columns'     => 1,
                'max_columns'     => 1,  
            )
        )  
    );
    add_theme_support( 'wc-product-gallery-zoom' );
    add_theme_support( 'wc-product-gallery-lightbox' );
    add_theme_support( 'wc-product-gallery-slider' );
}
    
add_action('after_setup_theme', 'one_virtualstore_config', 0 );
    
// display template editor in edit mode on pages and posts edition
add_theme_support( 'block-templates' );


/* PÁGINAS SHOP */

# adicionando div antes do conteúdo (ficou logo após o header), da página shop
add_action('woocommerce_before_main_content', 'one_virtualstore_open_container_row', 5);
function one_virtualstore_open_container_row(){
    echo '<div class="container shop-content"><div class="row">';
}

# 
add_action('woocommerce_before_main_content', 'one_virtualstore_close_container_row');
function one_virtualstore_close_container_row(){
    echo '</div></div>';
}

add_action('woocommerce_before_main_content', 'one_virtualstore_add_sidebar_tags', 6);
function one_virtualstore_add_sidebar_tags(){
    echo '<div class="sidebar-shop col-lg-3 col-md-4 order-2 order-md-1"';
}

add_action('woocommerce_before_main_content', 'one_virtualstore_close_sidebar_tags', 8);
function one_virtualstore_close_sidebar_tags(){
    echo '</div>';
}

add_action('woocommerce_before_main_content', 'one_virtualstore_add_shop_tags', 9);

# Remove sidebar da página shop do woocommerce
remove_action('woocommerce_sidebar', 'woocommerce_get_sidebar');
#adiciona side bar antes do before main content
add_action('woocommerce_before_main_content', 'woocommerce_get_sidebar', 7);
