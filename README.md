# Project-VirtualStore

## About WordPress Archtectury

### First: the basics
<p> A WP theme folder needs only two files to appears - and be able to be activated - in WP Panel: index.php and style.css.</p>

### Theme Information 

<p> You can access any vital information about WordPress Themes accessing:</p>

[WordPress Doc References: "Theme Handbook" ](https://developer.wordpress.org/themes/#Screenshot)

<p> To insert a image on the theme block in WP Panel, its necessary create a image file with png extension and size 1220/900px. </p>

<p> You can customize your theme information in style.css, just put it in comment on the first lines of the file. As an Example:</p>

<code>/*

Theme Name: One Virtual Store

Theme URI: https://github.com/daphnemartinsba/Project-VirtualStore

Author: daphnemartinsba

Author URI: https://github.com/daphnemartinsba

Description: One Virtual Store is a project made by students to "Analisys and Project of Object Oriented Sofware" discipline from UFMS.  

Version: 1.0

*/</code>

<p> If you want to know more about theme information you can access: </p> 

[WordPress Doc References: basic structure](https://developer.wordpress.org/themes/classic-themes/basics/main-stylesheet-style-css/#basic-structure)

[WordPress Doc References: theme tags](https://make.wordpress.org/themes/handbook/review/required/theme-tags/)

<p> 

## WordPress Configs:

1. When trying update plugin and WP request for FTP or SSH credentials and you don't want or don't know how to use FTP:

    <p> In wp-config.php file, before the line: </p> 

    `/* That's all, stop editing! Happy publishing. */`

    <p> put: </p>

    `define( 'FS_METHOD', 'direct' );`

    obs: if you are trying to clone this repository, you need to comment the inserted line above before installing WP, you can uncomment after. 

2. Enable WP Debug mode while development:
    <p>In wp-config.php file, before the line: </p>

    `/* That's all, stop editing! Happy publishing. */`

    <p> edit: </p>

    define( 'WP_DEBUG', !!getenv_docker('WORDPRESS_DEBUG', '') );

    <p> to: </p>

    `define( 'WP_DEBUG', true);`

    <p> or just insert.</p>

### WordPress Menu Register

1. Put register_nav_menus() in functions.php

    <p> In functions.php you have to add a config function, one_virtualstore_config(), to receive register_nav_menus() function. Inside register nav menus, insert an array with the amount of menus you want to configure in your website. Here I added main menu and footer menu  </p>

        function one_virtualstore_config(){
            register_nav_menus(
                array(
                    'one_virtualstore_main_menu' => 'One VirtualStore Main Menu',
                    'one_virtualstore_footer_menu' => 'One VirtualStore Footer Menu'
                )
            );
        }
        add_action('after_setup_theme', 'one_virtualstore_config', 0);

2. After saving first step, menu option should be visible when you hover your mouse on Appearance, on WordPress Panel. Click on menu. 

3. Create a menu by inserting the menu slug (like 'One VirtualStore Main Menu') in menu name field, and by mark a checkbox with similar name

4. Select and/or remove and/or organize itens/pages that should appear in menu

5. Add following function inside header, in html element where itens/pages should appear:
        
        <nav class="nav-menu">
            <?php
                wp_nav_menu(
                     array(
                        'theme_location' => 'one_virtualstore_main_menu'
                    )
                );    
            ?>
        </nav>
    <p> obs: to style nav menu, you can call in stylesheet '.nav-menu' to style nav, '.nav-menu ul' to style list, '.nav-menu li' to style list elements, and '.nav-menu a' to style itens/page appearance (like text-decoration). </p> 

### Template editor

 ` add_theme_support( 'block-templates' );`


## WooCommerce Configs

1. Install WooCommerce Pages: WP Panel -> WooCommerce -> status -> Tools -> Create default WooCommerce pages -> Click: Create Pages

2. Declare theme support to woocommerce in functions.php inside function `one_virtualstore_config()`, after `register_nav_menus();` : 

    `add_theme_support( 'woocommerce' );`

    obs: if it doesn't show that theme support was add on WP Panel -> Woocommerce -> status, deactivate and reactivate your theme.

3. 

## WordPress, HTML & CSS Patterns

### HTML lang
<p> Instead of using HTML ordinary syntax: </p>

` <html lang = 'en'> `

<p> You should use WordPress function, because language can be determined through WordPress Panel Settings, that is why it can variate according to installation. Since, once you alter language through WordPress Panel, you automatic alter also in file</p>

<p> Therefore, the following WordPress function benefits with dinamic behavior: </p>

` <html <?php language_attributes(); ?>> `

[About language_attributes](https://developer.wordpress.org/reference/functions/language_attributes/)

### HTML metacharset

<p> Instead of using HTML ordinary syntax: </p>

` <html meta charset="UTF-8"> `

<p> You should use the following WordPress function, because it echoes "UTF-8" and it's the default encoding for WordPress. 'blog info();' displays some informations about pages. The parameter 'charset' displays to what is configured in Settings > Reading on Wordpress Panel, encoding for pages and feeds.   </p>

` <meta charset="<?php bloginfo( 'charset' ); ?>"> `

[About bloginfo](https://developer.wordpress.org/reference/functions/bloginfo/)

### HTML rel="profile"

` <link rel="profile" href="https://gmpg.org/xfn/11" /> `

<p> Its used when a value used in rel attribute are not defined in the HTML specificacion. So, it add de attribuites of XHTML, defined in gmpg.org/xfn/11 /p>

### WordPress Header & Footer

<p> To use WordPress  <b>header</b> functin you have to: </p>

1. Create 'header.php' file
2. Call header's function in page:
 
    ` <?php get_header(); ?>` 

<p> To use WordPress <b>footer</b> is similar: </p>

1. Create 'footer.php' file
2. Call footer's function in page:
 
    ` <?php get_footer(); ?>`

### Return slug of model template 
 `get_page_template_slug();`




## Tecs Info

- WP: versão

- PHP: versão

- Bootstrap: versão 5.3.8-dist

- HTML5
- CSS3

## What is missing
- return tag title
- In:
        `wp_enqueue_style('one-virtualstore-style', get_stylesheet_uri(), array(), filemtime(get_template_directory() . '/style.css'), 'all');`
    <p> alter 'all' to '1.0', for publishing.

