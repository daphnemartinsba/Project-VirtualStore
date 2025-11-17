<?php
/* SHOP PAGE MODIFIERS */

//remove sidebar from shop page
remove_action('woocommerce_sidebar', 'woocommerce_get_sidebar');
//remove breadcrumb
remove_action('woocommerce_before_main_content', 'woocommerce_breadcrumb', 20);
//remove shop title

    
add_filter('woocommerce_show_page_title', 'one_virtualstore_remove_shop_title');
function one_virtualstore_remove_shop_title(){
    $val = false;
    return $val;
}

/* SINGLE PAGE MODIFIERS*/

//remove SKU info from single-product
add_filter('wc_product_sku_enabled', 'one_virtualstore_remove_sku');
function one_virtualstore_remove_sku($val){
    $val = false;
    return $val;
}

?>