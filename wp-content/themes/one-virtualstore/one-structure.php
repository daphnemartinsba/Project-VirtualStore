<?php
    abstract class OneStructure{

        /*Opening page marks*/
        
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
                    <link rel="preconnect" href="https://fonts.googleapis.com">
                    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
                    <link href="https://fonts.googleapis.com/css2?family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&display=swap" rel="stylesheet">
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

        /*Ending page marks*/
        

        public function endPage(){
            ?> 
                    </div>
            <?php
        }

        public function wpFooter(){
            ?>
                    <?php wp_footer(); ?>
            <?php
        }
        
        public function endBody(){
            ?> 
                </body>
            <?php
        }
        
        public function endMark(){
            ?> 
                </html>
            <?php

        }
 

    }
?>