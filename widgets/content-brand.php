<?php
$_query = new WP_Query(array('p' => 1044, 'post_type'=>'section'));  
if ($_query->have_posts()) {
  while ($_query->have_posts()) {
      $_query->the_post();
      $img=get_the_post_thumbnail_url(get_the_ID(),'full');
      ?>
      
    <div id="home-call-to-action"  class='call-to-action'>
    <div class="overlay"></div>
    <?php if (get_field('media') != ''): ?>
    <video playsinline="playsinline" id="home-video-background" muted="muted" loop="loop" poster="<?php echo $img; ?>" class="d-block">
    <source src="<?php echo get_field('media'); ?>" type="video/mp4">
    <source src="<?php echo get_field('media_2'); ?>" type="video/mp4">
    <source src="<?php echo get_field('media_3'); ?>" type="video/mp4">
    </video>

    <div class='img-overlay d-none'
    style="background-image:url(<?php echo $img; ?>);background-repeat: no-repeat;
    background-position: center;
    background-size: cover;"></div>

    <?php else: ?>
    <div class='img-overlay'
    style="background-image:url(<?php echo $img; ?>);background-repeat: no-repeat;
    background-position: center;
    background-size: cover;"></div>
    <?php endif;?>

      <div class="container">
    <div class="row">
      <div class="col-md-9">
        <h1 class="title"><?php echo get_the_title(); ?></h1>
      </div>
    </div>

    <div class="spacer"></div>

    <div class="row">
      <div class="col-sm-12 col-md-2"></div>
      <div class="col-sm-12 col-md-7">

        <div class="line"></div>
        <div class="spacer"></div>
        
        <h4><?php echo get_the_content(); ?></h4>

        <br/>

        <p><?php echo get_field('description'); ?></p>

        <div class="spacer"></div>
        <br/>
        <a class="btn tandem-btn d-none" href="<?php echo get_field('action_url'); ?>">
        <?php echo get_field('action'); ?>
        </a>

      </div>
    </div>
  </div>
  </div>
    
<?php
  }
  wp_reset_postdata();
}
