<?php
$_query = new WP_Query(array('p' => 1051, 'post_type'=>'section'));  
if ($_query->have_posts()) {
  while ($_query->have_posts()) {
      $_query->the_post();
      //$img=get_the_post_thumbnail_url(get_the_ID(),'full');
      ?>

<?php if(get_field('hide')!='yes'): ;?>
<div id="inner_page_footer">
  <div class="container">
    <div class="row">

      <div class="col-md-1"></div>
      <div class="col-md-10">
        <h4 class="secondary-heading"><?php echo get_the_title();?></h4>
        <p class="font-weight-bold" style="font-weight:bold"><?php echo get_the_content();?></p>

        <!-- shortcode form contact -->
       <div class="row">
        <div class="col-md-12 col-lg-6 text-center" style="margin:auto">
        <?php do_shortcode(get_field('shortcode'));?>
        </div>
       </div>

        <p><?php echo get_field('description');?></p>

        <div class="spacer"></div>
      </div>

      <div class="col-md-1"></div>
    </div>
  </div>
</div>
<?php endif;?>

<?php
  }
  wp_reset_postdata();
}
