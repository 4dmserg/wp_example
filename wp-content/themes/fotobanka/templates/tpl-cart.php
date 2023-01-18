<?php
/*
Template Name: Shoppping cart
Template Post Type: page
*/
?>
<?php get_header('cart');/* echo do_shortcode('[woocommerce_cart]')*/ ?>

    <div class="container-fluid" data-aos="fade" data-aos-delay="500">
        <div style="text-align: center;display: grid;margin: 0 auto;width: 70%;padding-top: 3em;" class="row">
         <?php the_content(); ?>
      </div>
    </div>

<?php get_footer(); ?>