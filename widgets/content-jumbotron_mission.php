<?php
$_query = new WP_Query(array('p' => 1110, 'post_type'=>'section'));  
if ($_query->have_posts()) :
  while ($_query->have_posts()) :
      $_query->the_post();
      ?>

      <?php if(get_field('hide')!='yes'):;?>

      <div id="actualite">
        <h2><?php echo get_the_title();?></h2>
        <div class="line"></div>
        <?php do_shortcode(get_field('shortcode'));?>
    </div>

      <?php endif;?>


<?php
  endwhile;
  wp_reset_postdata();
endif;
