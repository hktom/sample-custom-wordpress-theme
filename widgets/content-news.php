<?php
$query = new WP_Query(array('p' => 1049, 'post_type'=>'section'));
$blog="";
$blog_sm="";  
if ($query->have_posts()): 
  while ($query->have_posts()): 
      $query->the_post();

      $blog=get_field('shortcode');
      $blog_sm=get_field('shortcode_sm');
?>

<div id="home-blog">
<h1 class='text-center pb-5'>
<img src="<?php echo get_template_directory_uri() . '/images/instant-t.svg'; ?>" style="width:220px" />
</h1>
<?php 
endwhile; 
endif; 
rewind_posts();
?>

<div class="container-fluid d-none d-lg-block">
  <div class="row">
    <div class="col-12 carroussel px-0">

      <div class="main-carousel">
        <?php do_shortcode('[wp_home_blog]'); ?>
      </div>

    </div>
  </div>
</div>

<div class="container d-block d-lg-none">
  <div class="row">

    <div class="col-10 mx-auto caroussel">

      <div class="speeches-caroussel-home">
        <?php do_shortcode('[wp_home_blog]'); ?>
      </div>

  </div>
</div>

<div class="blog-slider-responsive d-none">
  <div class="container">
    <div class="row">
      <?php do_shortcode('[wp_home_blog_mobile]'); ?>
    </div>
  </div>
</div>

<?php 
if($query->have_posts()):
  while ($query->have_posts()): 
      $query->the_post();
?> 

  <div class="text-center btn-div">
    <a class="btn tandem-btn-outline mb-5" style="padding-left:40px !important; padding-right:40px !important"
    href="<?php echo get_field('action_url'); ?>"> 
    <?php echo get_field('action');?>
    </a>
  </div>
</div>

<?php
  endwhile;
  wp_reset_postdata();
endif;
