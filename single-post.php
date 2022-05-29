<?php
$current_id=0;
get_header();
if (have_posts());
while (have_posts()): the_post();

//Save View
wpb_set_post_views(get_the_ID());
$current_id=get_the_ID();
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
    <div class="col-lg-7 gutter ">
      <div class="article-content">
        <img src="<?php echo the_post_thumbnail_url('full'); ?>" alt=""/>
        <i class="img-legend"><?php echo get_post(get_post_thumbnail_id())->post_excerpt;?></i>
        <div class="post-tag"><?php echo get_the_date( 'j M Y' );?></div>
        <h2 class="py-3"> <?php echo the_title(); ?> </h2>

        <?php echo the_content();?>

        <!-- Bottom Single Post -->
        <div class="d-flex justify-content-start">
        <div><strong>PARTAGER</strong></div>
        <div class="ml-2"><?php echo do_shortcode('[Sassy_Social_Share]');?></div>
        </div>

        <div style="margin-top:4rem">
        <h5><i>Ces articles peuvent vous intéresser</i></h5>
        </div>
        <div class="row mb-5">
        <?php 
             do_shortcode('[wp_list_post per_page=2 category=-50 not_post='.$current_id.']');
        ?>
        </div>
      </div>
        <!-- Bottom Single Post -->

    </div>

    <!-- <div class="col-lg-1">
    </div> -->

    <div class="col-lg-4 offset-lg-1 tandem-sidebar gutter">
    <?php 
    get_template_part( 'widgets/aside', 'single_post' );
    ?>
    </div><!-- end sidebar-->
    </div> <!-- end row-->
  </div>
</div>
<div style="margin-top:100px"></div>
  <?php
  endwhile;
  get_footer();?>
