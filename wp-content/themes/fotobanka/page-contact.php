<?php get_header(); ?>
<?php
      $pageId     = get_the_ID();
      $address    = get_field('contacts-adress', $pageId); 
      $phone      = get_field('contacts-phone', $pageId); 
      $email      = get_field('contacts-email', $pageId); 
?>
    <div class="site-section"  data-aos="fade">
      <div class="container">

        <div class="row justify-content-center">

          <div class="col-md-7">
            <div class="row mb-5">
              <div class="col-12 ">
                <h2 class="site-section-heading text-center"><?php _e('Контакти', 'Dmitriy'); ?></h2>
              </div>
            </div>
          </div>

        </div>
        
        <div class="row">
          <div class="col-lg-8 mb-5">
              <form method="post">
              <?php echo do_shortcode('[contact-form-7 id="150" title="Сторінка контактів"]') ?>
            </form>
          </div>
          <div class="col-lg-3 ml-auto">
            <div class="mb-3">
              <?php if($address): ?>
              <p class="mb-0 font-weight-bold text-white"><?php _e('Адреса', 'Dmitriy'); ?></p>
              <p class="mb-4"><?=$address;?></p>
              <?php endif; ?>

              <?php if($phone): ?>
              <p class="mb-0 font-weight-bold text-white"><?php _e('Телефон', 'Dmitriy'); ?></p>
              <p class="mb-4"><a href="#"><?=$phone;?></a></p>
              <?php endif; ?>

              <?php if($email): ?>
              <p class="mb-0 font-weight-bold text-white"><?php _e('Email адреса', 'Dmitriy'); ?></p>
              <p class="mb-0"><a href="#"><?=$email;?></a></p>
              <?php endif; ?>
            </div>

          </div>
        </div>
      </div>
    </div>
<?php get_footer(); ?>