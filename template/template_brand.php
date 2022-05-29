<?php
/*
Template Name: Brand
 */
get_header();
if (have_posts()):;
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
	  <div class="container">
	    <div class="row">
	      <div class="col-sm-12 col-md-1"></div>
	      <div class="col-sm-12 col-md-11">
        <div class="line" ></div>
		<div class="spacer"></div>
		&nbsp;
          <?php the_content();?>
	      </div>
	    </div>
	  </div>
	</div>

	<!-- Section brand -->
	<div class="brand-list">
	  <div class="container">
	    <div class="row">
	      <div class="col-md-1"></div>
	      <div class="col-md-10">
		  <?php 
		 endwhile;
		endif; ?>
		  <?php do_shortcode(get_field('brand'));?>
	      </div>
	    </div>
	  </div>
	</div>

	<?php
get_template_part( 'widgets/content', 'page_footer' );
get_footer();?>
