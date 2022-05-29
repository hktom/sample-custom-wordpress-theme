<?php
$_query = new WP_Query(array('p' => 1106, 'post_type'=>'section'));  
if ($_query->have_posts()) :
  while ($_query->have_posts()) :
      $_query->the_post();
      ?>

      <?php if(get_field('hide')!='yes'):;?>
      
      <div class="d-flex justify-content-between align-items-center">
        <h2 class="blog-section-title">
            <?php echo get_the_title();?> 
        </h2>
        <a class="link float-right" 
        href="<?php echo get_field('action_url');?>">
        <?php echo get_field('action');?> <span class="iconify" data-icon="fe:arrow-right" data-inline="false"></span></a>
    </div>

    <div class="row mb-5">
    <?php  do_shortcode(get_field('shortcode'));?>
    </div>

      <?php endif;?>


<?php
  endwhile;
  wp_reset_postdata();
endif;
