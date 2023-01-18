<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
  <title><?php if(is_tax()){ echo get_bloginfo( 'name' );} echo wp_title('-', true,''); ?></title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="icon" href="<?php echo get_template_directory_uri(); ?>/favicon.ico" type="image/x-icon" />
  <link rel="shortcut icon" href="<?php echo get_template_directory_uri(); ?>/favicon.ico" type="image/x-icon" />

  <link href="https://fonts.googleapis.com/css2?family=Josefin+Sans:wght@400;700&family=Roboto+Mono:wght@400;700&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Rubik&display=swap" rel="stylesheet">
  <script>
  var tickerLine1 = <?php _e('"Постійне поповнення!";','Dmitriy'); ?>
  var tickerLine2 = <?php _e('"Ласкаво просимо!";','Dmitriy'); ?>
  var tickerLine3 = <?php _e('" світлин у базі!";','Dmitriy'); ?>
  </script>
  <?php wp_head(); ?>
</head>
<body>

  <div class="site-wrap">

    <div class="site-mobile-menu">
      <div class="site-mobile-menu-header">
        <div class="site-mobile-menu-close mt-3">
          <span class="icon-close2 js-menu-toggle"></span>
        </div>
      </div>
      <div class="site-mobile-menu-body"></div>
    </div>
    



    <header class="site-navbar py-3" role="banner">

      <div class="container-fluid">
        <div class="row align-items-center">

          <div class="col-6 col-xl-2" data-aos="fade-down">
              <h1 class="mb-0">
                  <a href="<?php echo icl_get_home_url() ?>" class="text-white h2 mb-0">
                  <?php //_e(get_bloginfo('name'),"Dmitriy"); ?>
                  <?php _e("ФотоБанка","Dmitriy"); ?>
                  </a>
              </h1>
              <?php 
                  $args = array(
                        'status'   => 'publish',
                        'return'   => 'ids',
                        'limit'    => -1,
                    );
                  $products = count(wc_get_products( $args ));
              ?>
              <span id="product_count"><?=$products?></span>
              <div style="display: inline; font-size: 1rem;" id="message"></div>
          </div>
          <div class="col-10 col-md-8 d-none d-xl-block" data-aos="fade-down">
            <?php get_template_part('parts/navigation') ?>
          </div>

          <div class="col-6 col-xl-2 text-right" data-aos="fade-down">
            <div class="d-none d-xl-inline-block">
              <ul class="site-menu js-clone-nav ml-auto list-unstyled d-flex text-right mb-0" data-class="social">
<!--                  <li>
                      <?php // echo do_shortcode('[cartitem]'); ?>
                  </li>-->
                <?php if($fb = get_field('facebook','option')): ?>
                <li>
                  <a href="<?=$fb?>" class="pl-0 pr-3"><span class="icon-facebook"></span></a>
                </li>
                <?php endif; ?>
                
                <?php if($tw = get_field('twitter','option')): ?>
                <li>
                  <a href="<?=$tw?>" class="pl-3 pr-3"><span class="icon-twitter"></span></a>
                </li>
                <?php endif; ?>
                
                <?php if($ig = get_field('instagram','option')): ?>
                <li>
                  <a href="<?=$ig?>" class="pl-3 pr-3"><span class="icon-instagram"></span></a>
                </li>
                <?php endif; ?>
                
                <?php if($yt = get_field('youtube','option')): ?>
                <li>
                  <a href="<?=$yt?>" class="pl-3 pr-3"><span class="icon-youtube-play"></span></a>
                </li>
                <?php endif; ?>
              </ul>
            </div>

            <div class="d-inline-block d-xl-none ml-md-0 mr-auto py-3" style="position: relative; top: 3px;"><a href="#" class="site-menu-toggle js-menu-toggle text-black"><span class="icon-menu h3"></span></a></div>

          </div>

        </div>
      </div>
      
    </header>