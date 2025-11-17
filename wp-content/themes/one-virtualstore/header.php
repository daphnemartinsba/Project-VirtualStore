<?php 

include_once 'one-structure.php';

class Header extends OneStructure{

    public function header(){
        ?>
                    <div id="header" class = "one-header">
                        <div class = "page-tag">
                            <?php
                                if ( is_front_page() ) {
                                    echo "Início";
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

                    </div>
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