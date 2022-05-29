<?php
$_query = new WP_Query(array('p' => 1045, 'post_type'=>'section'));  
if ($_query->have_posts()) {
  while ($_query->have_posts()) {
      $_query->the_post();
      ?>

 <div id="home-brand" class='home-strategies'>
    <div class="container">
        <div class="row justify-content-center">
        <div class="col-sm-11 text-center">
            <h2><?php echo get_the_title();?></h2>
            <p><?php echo get_the_content();?></p>
        </div>
        </div>
        <div class="row liste_strategies">
        <?php do_shortcode(get_field('shortcode'));?>
        </div>
    </div>
</div>

<?php
  }
  wp_reset_postdata();
}