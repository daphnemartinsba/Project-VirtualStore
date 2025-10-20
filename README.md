# Project-VirtualStore


## WordPress Configs:

1. When trying update plugin and WP request for FTP or SSH credentials and you don't want or don't know how to use FTP:

    <p> In wp-config.php file, before the line: </p> 

    `/* That's all, stop editing! Happy publishing. */`

    <p> put: </p>

    `define( 'FS_METHOD', 'direct' );`

2. Enable WP Debug mode while development:
    <p>In wp-config.php file, before the line: </p>

    `/* That's all, stop editing! Happy publishing. */`

    <p> edit: </p>

    define( 'WP_DEBUG', !!getenv_docker('WORDPRESS_DEBUG', '') );

    <p> to: </p>

    `define( 'WP_DEBUG', true);`

    <p> or just insert.</p>