<?php 

require_once('one-operations.php');
$posting = new OneOperations();

get_header();

?>
        <main class = "middle-content">
                <section class = "firs-chapter">
                    <div class="about-content">
                        <?php
                            if (have_posts()){
                                while(have_posts()){
                                    the_post();
                                    ?>
                                        <article>
                                            <h1><?php the_title(); ?></h1>
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
                </section>
                <section class="second-chapter">
                    <div class="one-form">   
                        <h2>Fale conosco</h2>
                        <form method="POST">
                            <div class="form-name">
                                <label>Nome</label>
                                <br>
                                <input type="text" name="nome" class="input-name">    
                            </div>
                            <label>Sobrenome</label>
                            <div class="form-lastname"">
                                <input type="text" name="sobrenome" class="input-lastname">
                            </div>
                            <br>
                            <div class="form-mail">
                                <label>Endereço de email</label>
                                <br>
                                <input type="text" name="email" class="input-mail">
                                <br>
                            </div>
                            <br>
                            <label>Mensagem</label>
                            <br>
                            <textarea class="form-text" name="mensagem"> </textarea>                            
                            <br>
                            <br>
                            <button class="form-btn" name="btn-send" type="submit">Enviar</button>     
                            <?php
                                $posting->store();
                               
                            ?>   
                        </form>
                    </div>
                </section>
            </main>        
<?php get_footer(); ?>