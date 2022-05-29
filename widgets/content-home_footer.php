<?php
$_query = new WP_Query(array('p' => 1051, 'post_type'=>'section'));  
if ($_query->have_posts()) :
  while ($_query->have_posts()):
      $_query->the_post();
      $img=get_the_post_thumbnail_url(get_the_ID(),'full');
?>
      
<?php if(get_field('hide')!='yes'): ;?>
<div id="home-newsletter">
  <div class="container">
    <div class="img-overlay" style="background-image:url(<?php echo $img; ?>)"></div>
    <div class="row d-flex align-items-center">
      <div class="col-md-12 col-lg-6">
        <h4><?php echo get_the_title(); ?></h4>
        <p><?php echo get_the_content(); ?></p>
        <?php do_shortcode(get_field('shortcode'));?>
        <p><?php echo get_field('description'); ?></p>
        <div class="spacer"></div>
      </div>

      <div class="col-md-6 d-none d-lg-block">
      <img src="<?php echo $img; ?>" alt="<?php echo get_the_title(); ?>"/>
      </div>
    </div>
  </div>
</div>
<?php endif;?>

<?php
  endwhile;
  wp_reset_postdata();
endif;
