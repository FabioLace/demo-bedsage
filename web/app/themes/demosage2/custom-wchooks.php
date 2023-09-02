<?php

    function changeItemTitle(){
        echo '<h2 class="text-danger">' . get_the_title() . '</h2>';
    }

    //ARCHIVE-PRODUCT
    remove_action( 'woocommerce_before_shop_loop', 'woocommerce_result_count', 20 );
    remove_action('woocommerce_before_shop_loop', 'woocommerce_catalog_ordering', 30);

    //CONTENT-PRDUCT
    remove_action( 'woocommerce_shop_loop_item_title', 'woocommerce_template_loop_product_title', 10 );
    remove_action('woocommerce_shop_loop_item_title','woocommerce_template_loop_price',10);
    add_action('woocommerce_shop_loop_item_title', 'changeItemTitle',10);

?>