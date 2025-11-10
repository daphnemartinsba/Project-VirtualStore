<?php 

class Footer{

    public function footer(){
        ?>
                    <footer class = "one-footer">
                        <!--
                        <section class="footer-widgets"> Widgets do rodapé </section>
                        <section class="copyright"> Copyright </section>
                        -->
                        <div class = "name-store">
                            <?php
                                echo get_bloginfo();
                            ?>
                        </div>
                        <nav class = "nav-bot">
                            <?php
                                wp_nav_menu(
                                    array(
                                        'theme_location' => 'one_virtualstore_footer_menu'
                                    )
                                )
                            ?>
                        </nav>
                    </footer> 
        <?php
    }
    
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

$implemented_footer = new Footer();

$implemented_footer->footer();

$implemented_footer->endPage();

$implemented_footer->wpFooter();

$implemented_footer->endBody();

$implemented_footer->endMark();


?>