<?php 
include_once 'one-structure.php';

class Footer extends OneStructure{

    public function footer(){
        ?>
                    <div id = "footer" class = "one-footer">
                        <!--
                        <section class="footer-widgets"> Widgets do rodapé </section>
                        <section class="copyright"> Copyright </section>
                        -->
                        <div class = "name-store">
                            <?php
                                echo get_bloginfo();
                            ?>
                        </div>
                        <div class="media-icons">
                            <a href="facebook-page">
                                <img src="<?php echo get_template_directory_uri(); ?>/assets/images/facebook-icon.png" alt="facebook" class="facebook">
                            </a>
                            <a href="linkedin-page">
                                <img src="<?php echo get_template_directory_uri(); ?>/assets/images/linkedin-icon.png" alt="linkedin" class="linkedin">
                            </a>
                            <a href="youtube-page">
                                <img src="<?php echo get_template_directory_uri(); ?>/assets/images/youtube-icon.png" alt="youtube" class="youtube">
                            </a>
                            <a href="instagram-page">
                                <img src="<?php echo get_template_directory_uri(); ?>/assets/images/instagram-icon.png" alt="instagram" class="instagram">
                            </a>                             
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
                    </div> 
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