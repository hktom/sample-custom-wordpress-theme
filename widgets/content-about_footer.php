<?php
$_query = new WP_Query(array('p' => 1055, 'post_type'=>'section'));  
if ($_query->have_posts()) {
  while ($_query->have_posts()) {
      $_query->the_post();
      //$img=get_the_post_thumbnail_url(get_the_ID(),'full');
      ?>

<div class="row pt-5 d-flex justify-content-center team-call-to-action">
    <div class="col-md-8">
    <h3 class="title"><?php echo get_the_title();?></h3>
    <div class="description"><?php echo get_the_content();?></div>
    <div class="text-center">
    <a class="link" href="<?php echo get_field('action_url'); ?>"> <?php echo get_field('action');?>  <span class="iconify" data-icon="fe:arrow-right" data-inline="false"></span> </a>
    </div>
    </div>
  </div>

<?php
  }
  wp_reset_postdata();
}
