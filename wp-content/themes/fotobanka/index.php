<?php
$orderby    = 'name';
$order      = 'asc';
$hide_empty = false ;
$cat_args   = array(
    'orderby'    => $orderby,
    'order'      => $order,
    'hide_empty' => $hide_empty,
    'parent'     => 0,
);
 
$product_categories = get_terms( 'product_cat', $cat_args );

 ?>
<?php get_header(); ?>

    <div class="container-fluid" data-aos="fade" data-aos-delay="500">
      <div class="row">
      <?php foreach ($product_categories AS $v): ?>    
        <div class="col-lg-4">
          <div class="image-wrap-2">
            <div class="image-info">
              <h2 class="mb-3"><?php echo $v->name ?></h2>
              <a href="<?php echo get_category_link( $v->term_id ); ?>" class="btn btn-outline-white py-2 px-4"><?php _e('Всі фотографії','Dmitriy') ?></a>
            </div>
            <?php $thumbnail_id = get_term_meta( $v->term_id, 'thumbnail_id', true ); ?>
            <?php $image_url    = wp_get_attachment_url( $thumbnail_id ); ?>
            <img src="<?php echo $image_url; ?>" alt="Image" class="img-fluid">
          </div>
        </div>
      <?php endforeach; ?>
      </div>
        <div style="padding-top: 7em;" class="container-fluid" data-aos="fade" data-aos-delay="500">
            
            
        <div class="row justify-content-center">
          <div class="col-md-9">
            <div class="row mb-5">
              <div class="col-12 ">
                  <h2 class="site-section-heading text-center"><?php _e('Недавно завантажені','Dmitriy') ?></h2>
              </div>
            </div>
              <div class="row" id="lightgallery">
        <?php
                $args = array(
                'post_type'             => 'product',
                'post_status'           => 'publish',
                'posts_per_page'        => '8',
                'orderby' => 'date',
                'order' => 'DESC',
                'suppress_filters' => false
            );
            $query = new WP_Query($args);
            $posts = $query->posts;
                  
        ?>
            <?php foreach ($posts as $post): ?>
            <?php
                $postId     = $post->ID;
                $imageBlock = get_field('prevyu_tovara', $postId); 
                $imageBlock = (is_array($imageBlock)) ? $imageBlock : [];
            ?>
                <div class="col-sm-6 col-md-4 col-lg-3 col-xl-3 item" data-aos="fade" data-src="<?php echo wp_get_attachment_image_url( $imageBlock['big_preview'], 'page-category-big' ); ?>" 
                     data-sub-html="<h4><?php echo $post->post_title; ?></h4><p class='foto-description'><?php echo $post->post_excerpt; ?></p>
                     <button class='redirect-to-image-page add' data-product='<?php echo $post->post_name; ?>'><?php _e('Перейти на сторінку світлини','Dmitriy') ?></button>">
                    <a href="#"><img src="<?php echo wp_get_attachment_image_url( $imageBlock['small_preview'], 'page-category-small' ); ?>" alt="<?php echo $post->post_title ?>" class="img-fluid"></a>
                </div>
            <?php endforeach; ?>
              </div>
           </div>
        </div>
            
          <div style="margin-top: 7em;" class="row justify-content-center">
          <div class="col-md-9">
            <div class="row mb-5">
              <div class="col-12 ">
                  <h2 class="site-section-heading text-center"><?php _e('Випадкові фото','Dmitriy') ?></h2>
              </div>
            </div>
              
              <script>
               
              </script>
              
              <div class="row" id="lightgallery2">
        <?php
                $args = array(
                'post_type'             => 'product',
                'post_status'           => 'publish',
                'posts_per_page'        => '8',
                'orderby' => 'rand',
                'suppress_filters' => false
            );
            $query = new WP_Query($args);
            $posts = $query->posts;
                  
        ?>
            <?php foreach ($posts as $post): ?>
            <?php
                $postId     = $post->ID;
                $imageBlock = get_field('prevyu_tovara', $postId); 
                $imageBlock = (is_array($imageBlock)) ? $imageBlock : [];
            ?>
                <div class="col-sm-6 col-md-4 col-lg-3 col-xl-3 item" data-aos="fade" data-src="<?php echo wp_get_attachment_image_url( $imageBlock['big_preview'], 'page-category-big' ); ?>" 
                     data-sub-html="<h4><?php echo $post->post_title; ?></h4><p class='foto-description'><?php echo $post->post_excerpt; ?></p>
                     <button class='redirect-to-image-page add' data-product='<?php echo $post->post_name; ?>'><?php _e('Перейти на сторінку світлини','Dmitriy') ?></button>">
                    <a href="#"><img src="<?php echo wp_get_attachment_image_url( $imageBlock['small_preview'], 'page-category-small' ); ?>" 
                                     alt="<?php echo $post->post_title ?>" class="img-fluid"></a>
                </div>
            <?php endforeach; ?>
              </div>
           </div>
        </div>
            
            
        </div>
    </div>

<?php get_footer(); ?>