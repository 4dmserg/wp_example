<?php
/*
Template Name: My Account
Template Post Type: page
*/
?>
<?php get_header('cart'); ?>
<style>
    
</style>
    <div class="container-fluid" data-aos="fade" data-aos-delay="500">
        <div style="display: grid;margin: 0 auto;width: 70%;padding-top: 3em;" class="row">
         <?php the_content(); ?>
      </div>
    </div>

<?php get_footer(); ?>