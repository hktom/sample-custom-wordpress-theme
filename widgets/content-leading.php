<?php
$_query = new WP_Query(array('p' => 1046, 'post_type'=>'section'));  
if ($_query->have_posts()) {
  while ($_query->have_posts()) {
      $_query->the_post();
      $img=get_the_post_thumbnail_url(get_the_ID(),'full');
      ?>

<div id="home-leading" class='home-leading'>
  <div class="container">
    <!-- overlay image -->
    <div class="img-overlay"
    style="background-image:url(<?php echo $img; ?>)">
    </div>

    <div class="row d-flex align-items-center">
      <!-- title and description -->
      <div class="col-lg-7 col-md-12 pt-5 content">
        <h3 class="tandem-heading "><?php echo get_the_title(); ?></h3>
  <div class="spacer"></div>
    <a class="btn tandem-btn-outline mt-4" 
    href="<?php echo get_field('action_url') ?>">
    <?php echo get_field('action'); ?>
    </a>
      </div>

      <div class="col-lg-5 col-md-5 d-none d-lg-block">
          <img src="<?php echo $img; ?>" alt="<?php echo get_the_title(); ?>"/>
      </div>

    </div>
  </div>
</div>
    
<?php
  }
  wp_reset_postdata();
}
