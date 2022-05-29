<?php
/*
Template Name: Single Case Study
Template Post Type: case_studies
*/
get_header();
if (have_posts());
while (have_posts()): the_post();
?>

<style>
p a, div a{
  color: #000;
  text-decoration:none;
}

p a:hover, div a:hover{
  text-decoration:none;
  color: #000;
}
</style>

<!-- inner header page -->
<div class="inner-page-header">
  <?php 
  $attr=array('title'=>get_the_title(), 'description'=>get_field('chapeau'));
  inner_page_header_case_study($attr);?>
  </div>
  
  <!--  -->

  <div id="case-study-single" class="post-content">
    <div class="container">
      <div class="row">
        <div class="col-lg-8 col-md-12">
          <!-- POST CONTENT -->
          <div id="start-point" class="pt-4">
          <h3>Situation de départ</h3>
          <p><?php the_field('situation_de_depart');?></p>
          </div>

          <div id="dispositif">
          <h3>Dispositif</h3>
          <p><?php the_field('dispositif');?></p>
          </div>
        </div>

        <!-- spacer -->
        <div class="col-lg-1 d-none d-lg-block"></div>
        
        <!-- Client Section -->
        <div id="client-section" class="col-lg-3 col-12 ">
        <div class="text-center">
          
          <img src="<?php echo get_the_post_thumbnail_url(get_the_ID(),'full')?>" alt="">
        </div>
          <?php
          if(get_field('description_testimony')!=''):?>
            <div class="my-5 testimony"><?php the_field('description_testimony');?></div>
          <?php endif;?>

          <?php
          if(get_field('appreciation_client')!=''):?>
            <div class="quote my-5"><?php the_field('appreciation_client');?></div>
          <?php endif;?>

          <?php if(get_field('nom_client')!=''):?>
            <p class="name-client my-5"><?php the_field('nom_client');?></p>
          <?php endif;?>

          <?php 
          if(get_field('newsroom_url')!=''):?>
            <div class="my-5">
            <a href="<?php the_field('newsroom_url');?>" class=" btn tandem-btn-secondary p-3">Découvrir la newsroom</a>
            </div>
          <?php endif;?>

          <?php
          if(get_field('client_website_url')!=''):?>
            <div class="my-5">
            <a href="<?php the_field('client_website_url');?>" class=" btn tandem-btn-secondary p-3">Visiter le site internet</a>
            </div>
          <?php endif;?>
                
        </div>
      </div>
   </div>
</div>

  <!-- Next Case Study -->
  <?php
          if(get_field('description_testimony')!=''):?>
      <div id="next-case-study-first" class="mx-3">
          <div class="container">
            <div class="row">
                <div class="d-flex justify-content-start">
                <span class="next mx-5 d-none d-lg-block">SUIVANT</span>
                  <div>
                  <span class="next d-lg-none">SUIVANT</span>
                  <?php next_case_study(get_the_ID());?>
                  </div>
                </div>
            </div>
          </div>
      </div>
      <?php else : ?> 
      <div id="next-case-study" class="mx-3">
          <div class="container">
            <div class="row">
                <div class="d-flex justify-content-start">
                <span class="next mx-5 d-none d-lg-block">SUIVANT</span>
                  <div>
                  <span class="next d-lg-none">SUIVANT</span>
                  <?php next_case_study(get_the_ID());?>
                  </div>
                </div>
            </div>
          </div>
      </div>
          <?php endif;?>


<?php
endwhile;
get_footer(); ?>
