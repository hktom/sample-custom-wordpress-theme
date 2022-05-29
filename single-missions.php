<?php

get_header();
if (have_posts());
while (have_posts()): the_post();

//Save View
wpb_set_post_views(get_the_ID());
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

<div class="container" id="single-post">
  <div class="row">
    <div class="col-lg-8 gutter ">
      <div class="article-content">
        <img src="<?php echo the_post_thumbnail_url('full'); ?>" alt="">
        <div class="post-tag"><?php echo get_the_date( 'j M Y' );?></div>
        <h2 class="py-3"> <?php echo the_title(); ?> </h2>

        <?php echo the_content();?>

        <!-- Actualite des missions -->
        <?php 
             do_shortcode('[wp_list_post post_type="mission" per_page=1]');
        ?>

      </div>

    </div>

    <!-- <div class="col-lg-1">
    </div> -->

    <div class="col-lg-4 tandem-sidebar gutter">
    <?php include(get_template_directory()."/include/news_sidebar.php");?>
    </div><!-- end sidebar-->
    </div> <!-- end row-->
  </div>
</div>

  <?php
  endwhile;
  get_footer();?>
