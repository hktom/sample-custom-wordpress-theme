<?php
$_query = new WP_Query(array('p' => 1048, 'post_type' => 'section'));
if ($_query->have_posts()) {
    while ($_query->have_posts()) {
        $_query->the_post();
        $img = get_the_post_thumbnail_url(get_the_ID(), 'full');
        ?>

<div id="leading-v2" class="text-center ">
<div class="img-overlay"></div>
<div class="encart">
<div class="container">
  <div class="d-flex justify-content-center">
    <div class="col-md-9 text-center">
      <h3 class="encart-title"><?php echo get_the_title(); ?></h3>
      <p class="encart-description"><?php echo get_the_content(); ?></p>
      <?php if (get_field('action_url') != ''): ?>
        <a class="btn tandem-btn-outline"
      href="<?php echo get_field('action_url'); ?>">
      <?php echo get_field('action'); ?>
      </a>
      <?php endif;?>
    </div>
  </div>
</div>
</div>
</div>

<style>

#leading-v2 .img-overlay::before{
content:'';
/* background:red; */
width:100%;
height:476px;
top:-232px;
left:0;
position:absolute;
background-image:url(<?php echo $img; ?>);
background-position:center;
background-repeat: no-repeat;
background-size: 733px 476px;
z-index:7777;
}

@media screen and (max-width: 472px) {
  #leading-v2 .img-overlay::before{
    content:'';
    width:100%;
    height:470px;
    top:-170px;
    left:0;
    background-size: 733px 425px;
    }
}

</style>

<?php

    }
    wp_reset_postdata();
}
