<?php get_header(); ?>
<style>
    .card{
        background: #212121;
    }
</style>
<?php
      $pageId   = get_the_ID();
      $faqBlock = get_field('vopros-otvet', $pageId); 
      $faqBlock = (is_array($faqBlock)) ? $faqBlock : [];
?>
    <div class="site-section"  data-aos="fade">
      <div class="container">

        <div class="row justify-content-center">

          <div class="col-md-7">
            <div class="row mb-5">
              <div class="col-12 ">
                <h2 class="site-section-heading text-center">Часто задавані питання</h2>
              </div>
            </div>
          </div>

        </div>
        
        <div class="row justify-content-center">
          <div class="col-lg-12 ml-auto">
<!--- Collapse --->
    <div class="accordion" id="accordionExample">
      <?php foreach ($faqBlock AS $k=>$v): ?>  
      <div class="card">
        <div class="card-header" id="headingOne<?=$k?>">
          <h2 class="mb-0">
            <button class="btn btn-link btn-block text-left" type="button" data-toggle="collapse" data-target="#collapseOne<?=$k?>" aria-expanded="true" aria-controls="collapseOne<?=$k?>">
              <?=$v['vopros']?>
            </button>
          </h2>
        </div>

        <div id="collapseOne<?=$k?>" class="collapse" aria-labelledby="headingOne<?=$k?>" data-parent="#accordionExample">
          <div class="card-body">
            <code>
                <?=$v['otvet']?>
            </code>
          </div>
        </div>
      </div>
        <?php endforeach; ?>
    </div>
<!--- Collapse --->
          </div>
        </div>
      </div>
    </div>
<?php get_footer(); ?>