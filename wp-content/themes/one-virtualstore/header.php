<?php 

class Header{

    public function initMark(){
        ?>
            <!DOCTYPE html>

        <?php
    }

    public function languageAttribute(){
        ?>
            <html <?php language_attributes(); ?>>
        <?php
    }

    public function head(){
        ?>
            <head>
                <meta charset="<?php bloginfo( 'charset' ); ?>">
                <meta name="viewport" content="width=device-width, initial-scale=1.0">
                <link rel="profile" href="https://gmpg.org/xfn/11" />
                <?php wp_head(); ?>
            </head> 
        <?php

    }

    public function bodyClass(){
        ?>
            <body <?php body_class(); ?>>
        <?php
    }

    public function bodyPage(){
        ?>
                <div id="page" class="page-structure"> 
        <?php    
    }

    public function header(){
        ?>
                    <header class = "one-header">
                        <div class = "page-tag">
                            <?php
                                if ( is_front_page() ) {
                                    echo "Home";
                                }else{
                                    wp_title('');                                    
                                }
                                //echo get_the_title();
                                //the_title();
                                //echo wp_get_document_title();
                            ?>
                        </div>
                            <?php

                            if (wp_get_referer() == true){
                                ?>       
                                    <div class = "page-redirect">                             
                                        <button class="back-button" onclick="history.back()"> Voltar </button>                                       
                                    </div>
                                <?php
                            }
                            ?>  
                        <nav class="nav-menu">
                            <?php
                                wp_nav_menu(
                                    array(
                                        'theme_location' => 'one_virtualstore_main_menu',
                                    )
                                );    
                            ?> 
                        </nav>
                          
                    </header>
        <?php
    }

}

$implemented_header = new Header();

# besides var of header, insert others in a function called 'basePage()'

$implemented_header->initMark();

$implemented_header->languageAttribute();

$implemented_header->head();

$implemented_header->bodyClass();

$implemented_header->bodyPage();

$implemented_header->header();

?>