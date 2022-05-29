<?php
/*
Template Name: Remerciement
*/
get_header();
if (have_posts()):;
while (have_posts()): 
the_post();
$featured_img_url = get_the_post_thumbnail_url(get_the_ID(),'full');
?>
<!-- Boutton flottant -->
<a href="<?php echo get_permalink(19);?>">
<img class="float-icon" src="<?php echo get_bloginfo('template_url') ?>/images/pen-icon.png"/></a>

<!-- Baniere  -->
<div id="home-baniere" class="header" style="padding-top:100px !important">
  <div class="container">
    <div class="row align-items-center">
      <div class="col-md-8 col-12">
        <?php the_content();?>
        <!-- <a class="btn tandem-btn-outline mt-4" 
    href="/">Accueil Tandem </a> -->
      </div>

      <div class="col-md-4 col-12">
      <img src="<?php echo $featured_img_url;?>" class="w-100"/>
      </div>
    </div>
    

  </div>
</div>

<?php 
endwhile;
wp_reset_postdata();
endif;
get_footer(); 
?>
