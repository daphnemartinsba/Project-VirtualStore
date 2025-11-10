<?php 
get_header();
?>
                    <div class = "page-content">
                        <?php
                        
                            if (have_posts()){
                                while(have_posts()){
                                    the_post();
                                    ?>
                                        <article>
                                            <h2><?php the_title(); ?></h2>
                                            <div><?php the_content(); ?></div>
                                        </article>    
                                    <?php
                                }
                            }else{
                                ?>
                                    <p> Nothing to display</p>
                                <?php
                            }
                        
                        ?>                    
                    </div>
<?php get_footer();?>

