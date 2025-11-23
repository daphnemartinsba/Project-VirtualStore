<?php 
get_header();
?>
        <main class = "middle-content">
                <section class = "firs-chapter">
                    <div class = "page-content">
                        <?php
                            if (have_posts()){
                                while(have_posts()){
                                    the_post();
                                    ?>
                                        <article>
                                            <!--<h2><?php the_title(); ?></h2>-->
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
                    <?php

                        /*$pdo = new PDO('mysql:host=localhost;dbname=wordpress_db', 'wordpress_user', 'senha123');
                        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                        //Insert
                        //*/
                        
                        /*
                        $conn = new mysql_connect('localhost:3306', 'wordpress_user', 'senha123');
                        if (!$conn){
                            die('Could not connect: '. mysql_error());
                        }
                        echo 'Connected successfully';
                        mysql_close($conn);*/
                       
                       
                        // CORRETO: $db = new SQLite3('wordpress_db');
                        
                        
                        /*
                        require_once ('database.php');
                        $database = new Database();
                        $conn = $database->connect();
                        if(!$conn){
                            echo 'error connection';
                        }else{
                            echo $conn->lastErrorMsg();
                        }*/
                        
                        // TODO -> put connection code in database.php and insert code in form.php     
                        $dbName = 'wordpress_db';
                        $connection;

                        $host = 'db:3306';
                        $username = 'wordpress_user';
                        $password = "senha123";
                            
                        $connection = mysqli_connect($host, $username, $password, $dbName);
                        if (!$connection) {
                            die("Database connection failed: " . mysqli_connect_error());
                        }

                        $query = "SELECT * FROM wp_posts LIMIT 5";
                        $result = mysqli_query($connection, $query);

                        if ($result) {
                            while ($row = mysqli_fetch_assoc($result)) {
                                echo "Post ID: " . $row['ID'] . ", Title: " . $row['post_title'] . "<br>";
                            }
                            mysqli_free_result($result); // Free the result set
                        } else {
                            echo "Error executing query: " . mysqli_error($connection);
                        }
                            
                        
                        echo phpinfo();

                    ?>    
                    <form method="post">
                        <input type="text" name="nome">    
                        <input type="text" name="email">
                        <input type="submit" name="enviar">            
                    </form>
                </section>
            </main>        

<?php get_footer(); ?>