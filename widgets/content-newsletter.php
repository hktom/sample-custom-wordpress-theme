<?php
$_query = new WP_Query(array('p' => 1057, 'post_type'=>'section'));  
if ($_query->have_posts()) {
  while ($_query->have_posts()) {
      $_query->the_post();
      ?>

    <div id="sidebar-newsletter">
        <div class="line"></div>
        <h4><?php echo get_the_title();?></h4>
        <div><?php echo get_the_content();?></div>
        <?php do_shortcode(get_field('shortcode'));?>
        <p class="notice"> <?php echo get_field('description');?> 
        <a href="<?php echo get_field('action_url');?>">
        <?php echo get_field('action');?>
        </a>
        </p>
    </div>

<?php
  }
  wp_reset_postdata();
}
