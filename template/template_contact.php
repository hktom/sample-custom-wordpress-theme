<?php
/*
Template Name: Contact
*/

if ( function_exists( 'wpcf7_enqueue_scripts' ) ) {
  add_action( 'wp_enqueue_scripts', 'wpcf7_recaptcha_enqueue_scripts', 10, 0 );
}
get_header();
if (have_posts());
while (have_posts()): the_post();
	?>
	<!-- Boutton flottant -->
<a href="<?php echo get_permalink(19);?>">
<img class="float-icon" src="<?php echo get_bloginfo('template_url') ?>/images/pen-icon.png"/></a>

	<div class="inner-page-header">
  <!-- An header for all inner page -->
	<?php inner_page_header([
    'title'=>get_the_title(),
    'sub_title'=>get_field('sous_titre'),
  ]);?>

  <!-- brand content -->
	  <div id="page-contact" class="container">
	    <div class="row">
	      <div class="col-sm-12 col-md-1"></div>

	      <div class="col-sm-12 col-md-11">
              <div class="row">
              <div class="col-lg-6">
              <div class="line" ></div>

        <div class="spacer"></div>

          <?php the_content();?>
              </div>

              <div class="col-lg-6">
              <div class="line" ></div>
                 <div class="spacer"></div>
								 <p></p>
                 <h3>Nous écrire</h3>
                 <?php echo do_shortcode(get_field('form-contact'));?>
              </div>
              </div>
	      </div>
	    </div>
	  </div>
	</div>
	<!-- Section call to action -->

	<?php
endwhile;
get_footer();?>
