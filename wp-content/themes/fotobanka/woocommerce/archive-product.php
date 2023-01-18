<?php get_header() ?>
    <div class="site-section"  data-aos="fade">
      <div class="container-fluid">

        <div class="row justify-content-center">

          <div class="col-md-7">
            <div class="row mb-5">
              <div class="col-12 ">
                <h2 class="site-section-heading text-center">
                    <?php
                    $term = get_term_by( 'slug', get_query_var( 'term' ), get_query_var( 'taxonomy' ) );
                    $parent = get_term_by( 'id', $term->parent, get_query_var( 'taxonomy' ) );
                    
                    $child_terms_ids = [];
                    $parentName      = '';
                    $parentSlug      = '';
                    $parentId        = '';

                    if($parent):
                        echo '<a href="'.get_category_link( $parent->term_id ).'">'.$parent->name.' &#10150; </a>';
                    endif;

                    if($parent):
                            $child_terms_ids = get_term_children( $parent->term_id, 'product_cat' );
                            $parentName = $parent->name;
                            $parentSlug = $parent->slug;
                            $parentId   = $parent->term_id;
                        else:
                            $child_terms_ids = get_term_children( $term->term_id, 'product_cat' );
                            $parentName = single_cat_title('', false);
                            $parentSlug = $term->slug;
                            $parentId   = $term->term_id;
                    endif;
                    
                    ?>
                    <?php echo single_cat_title('', false); ?>
                </h2>
                  
                    <select class="custom-select custom-select-subcategories">
                        
                      <option <?php if($parentId == $term->term_id) echo "SELECTED"; ?> data-url="<?php echo get_category_link( $parentId ); ?>" value="<?php echo $parentSlug ?>">
                          <?php _e('Всі фотографії категорії', 'Dmitriy'); ?> "<?php echo $parentName ?>"
                      </option>
                      
                      <?php foreach ($child_terms_ids AS $v): ?>
                      <?php $optionValue = get_term_by( 'id', $v, get_query_var( 'taxonomy' ) ); ?>
                      <option <?php if($v == $term->term_id) echo "SELECTED"; ?> data-url="<?php echo get_category_link( $v ); ?>" value="<?php echo $optionValue->slug ?>"> &mdash; <?php echo $optionValue->name ?></option>
                      <?php endforeach; ?>
                    </select>
                  
              </div>
            </div>
          </div>

        </div>
        <div class="row" id="lightgallery">
            
        <?php
                $args = array(
                'post_type'             => 'product',
                'post_status'           => 'publish',
                'ignore_sticky_posts'   => 1,
                'posts_per_page'        => '-1',
                'tax_query'             => array(
                    array(
                        'taxonomy'      => 'product_cat',
                        'field'         => 'term_id', //This is optional, as it defaults to 'term_id'
                        'terms'         => $term->term_id,
                        'operator'      => 'IN' // Possible values are 'IN', 'NOT IN', 'AND'.
                    ),
                    array(
                        'taxonomy'      => 'product_visibility',
                        'field'         => 'slug',
                        'terms'         => 'exclude-from-catalog', // Possibly 'exclude-from-search' too
                        'operator'      => 'NOT IN'
                    )
                )
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
            
            <?php
            endforeach; ?>
            

        </div>
      </div>
    </div>
<?php get_footer(); ?>