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

// display template editor in edit mode on pages and posts edition
add_theme_support( 'block-templates' );

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
            'thumbnail_image_width' => 500,
            'single_image_width'    => 532,
            'product_grid'          => array(
                'defaut_rows'     => 3  ,
                'min_rows'        => 1,
                'max_rows'        => 3,
                'default_columns' => 3,
                'min_columns'     => 1,
                'max_columns'     => 3,  
            )
        )  
    );
    add_theme_support( 'wc-product-gallery-zoom' );
    add_theme_support( 'wc-product-gallery-lightbox' );
    add_theme_support( 'wc-product-gallery-slider' );

    if(! isset($content_width)){
        $content_width = 600;
    }
}
    
add_action('after_setup_theme', 'one_virtualstore_config', 0 );

// If WC isn't activated, the redirect to wc-modifications doesn't occur, and web site doesn't breaks 
if(class_exists('WooCommerce')){
    require get_template_directory() . '/inc/wc-modifications.php';
}

