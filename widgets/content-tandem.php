<?php
$_query = new WP_Query(array('p' => 1047, 'post_type'=>'section'));  
if ($_query->have_posts()) {
  while ($_query->have_posts()) {
      $_query->the_post();
      //$img=get_the_post_thumbnail_url(get_the_ID(),'full');
      ?>

<div id="home-ce-que-fait-tandem" class='ce-que-fait-tandem'>
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-sm-11 text-center home-ce-que-fait-tandem-content">
      <h2><?php echo get_the_title(); ?></h2>
      <p><?php echo get_the_content(); ?></p>
      </div>
    </div>

    <div class="row">
    <?php do_shortcode(get_field('shortcode')); ?>
    </div>

  </div>
</div>

<?php
  }
  wp_reset_postdata();
}
