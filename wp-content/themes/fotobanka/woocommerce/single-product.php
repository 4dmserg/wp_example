<?php get_header(); ?>
<?php 
      $pageId = get_the_ID();
      $imageBlock = get_field('prevyu_tovara', $pageId); 
      $imageBlock = (is_array($imageBlock)) ? $imageBlock : [];
      
      $product   = wc_get_product( $pageId );

      $thisPrice = $product->get_price();
      $thisPrice.=' UAH';
?>

<?php $attachUrl = wp_get_attachment_image_url( $imageBlock['big_preview'], 'page-category-big' ); ?>

<style type="text/css">
    .title,.wrap{
        text-align: center;
    }
    .ag-3d_button.orange {
	box-shadow: rgba(155, 142, 50, 0.98) 0 3px 0px, rgba(0, 0, 0, 0.3) 0 3px 3px;
}
.ag-3d_button {
	vertical-align: top;
	border-radius: 4px;
	border: none;
	padding: 10px 25px 12px;
}
.orange {
	background: #fdde02;
	background: -moz-linear-gradient(top,  #fdde02 0%, #dec829 99%);
	background: -webkit-gradient(linear, left top, left bottom, color-stop(0%,#fdde02), color-stop(99%,#dec829));
	background: -webkit-linear-gradient(top,  #fdde02 0%,#dec829 99%);
	background: -o-linear-gradient(top,  #fdde02 0%,#dec829 99%);
	background: -ms-linear-gradient(top,  #fdde02 0%,#dec829 99%);
	background: linear-gradient(to bottom,  #fdde02 0%,#dec829 99%);
	filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#fdde02', endColorstr='#dec829',GradientType=0 );
	color:#fff;
	text-shadow:1px 1px 3px rgba(155, 142, 50, 0.98);
	border: 1px solid rgba(155, 142, 50, 0.98);
	text-decoration: none;
}
.orange:hover {
	background: #dec829;
	background: -moz-linear-gradient(top,  #dec829 1%, #fdde02 100%);
	background: -webkit-gradient(linear, left top, left bottom, color-stop(1%,#dec829), color-stop(100%,#fdde02));
	background: -webkit-linear-gradient(top,  #dec829 1%,#fdde02 100%);
	background: -o-linear-gradient(top,  #dec829 1%,#fdde02 100%);
	background: -ms-linear-gradient(top,  #dec829 1%,#fdde02 100%);
	background: linear-gradient(to bottom,  #dec829 1%,#fdde02 100%);
	filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#dec829', endColorstr='#fdde02',GradientType=0 );
}
.title{
	margin-bottom: 40px;
}	
.title h1{
	font-size:100px;
	color:#20c997;
	text-align:center;
	margin-top:100px;
	text-shadow:6px 1px 6px #333;
	font-family: 'Fjalla One', sans-serif;
}
.title h2{
	font-size:100px;
	color:#20c997;
	text-align:center;
	margin-bottom:1px;
	text-shadow:6px 1px 6px #333;
	font-family: 'Fjalla One', sans-serif;
	margin-top: -20px;
}		
.logo p{
	color:white;
	font-size:25px;
	margin-top:1px;
	font-family: 'Fjalla One', sans-serif;
}	
.gray {
/*	margin-bottom: 20px;*/
/*	background: rgba(12, 52, 77, 0.34);*/
	text-shadow: 0 -1px 1px rgba(0, 0, 0, 0.25);
	border-radius: 4px;
	-webkit-border-radius: 4px;
	-moz-border-radius: 4px;
	-o-border-radius: 4px;
	color:#20c997;
	text-decoration:none;
	padding:0px 30px;
	font-size: 20px;
	font-weight:bold;
	font-family: 'Fjalla One', sans-serif;
	text-align: center;
}	
</style>

<div style="padding-bottom: 0;" class="site-section"  data-aos="fade">
      <div class="container-fluid">

        <div class="row justify-content-center">

          <div class="col-md-7">
            <div class="row mb-5">
              <div class="col-12 ">
                  <h2 class="site-section-heading text-center"><?php the_title() ?></h2>
              </div>
            </div>
          </div>
            <?php woocommerce_breadcrumb(); ?>
        </div>
        
        <div class="row mb-5">
          <div class="col-md-7">
            <img src="<?php echo $attachUrl; ?>" alt="<?php the_title() ?>" class="img-fluid">
          </div>
          <div class="col-md-4 ml-auto">
<!--            <h3 class="text-white"><?php the_title() ?></h3>-->
            <p><?php the_content() ?></p>
            <p><?php echo do_shortcode('[ratingwidget]') ?></p>
            <p><?php 
            $currentTitle  = get_the_title();
            $permalinkThis = get_permalink( $pageId );
            //echo do_shortcode('[addtoany url="'.$permalinkThis.'" title="'.$currentTitle.'" media="'.$attachUrl.'"]') 
            
            if ( function_exists( 'ADDTOANY_SHARE_SAVE_KIT' ) ) { 
                ADDTOANY_SHARE_SAVE_KIT( array( 
                    'linkmedia' => $attachUrl,
                    'linkname'  => $currentTitle,
                    'linkurl'   => $permalinkThis,
                ) );
            }
            ?></p>
            <span id="span-price"><?php echo $thisPrice; ?></span>
            <?php
            do_action('woocommerce_simple_add_to_cart');
            ?>
            <?php  //echo do_shortcode('[cartitem]'); ?>
          </div>
        </div>


        <div style="padding: 0;" class="row site-section">

<?php


        $terms = get_the_terms( $pageId, 'product_cat' );
        $nterms = get_the_terms( $pageId, 'product_tag'  );
        foreach ($terms  as $term  ) {
            $product_cat_id = $term->term_id;
            $product_cat_name = $term->name;
            break;
        }

 
       $linkUrlCat = get_term_link( $product_cat_id, 'product_cat' );


?>

        </div>
      </div>
    </div>
<?php get_footer(); ?>