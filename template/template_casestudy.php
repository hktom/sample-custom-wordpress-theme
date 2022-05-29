<?php
/*
Template Name: Case Study
*/

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
	  ]);?></div>

	<div id="casestudy">
		<div class="container" id="infinite-scroll-container" post="case_studies" >
			<!-- Case study post -->
		<?php do_shortcode(get_field('cases'));?>
		</div>
	</div>

  <!-- Section call to action -->
	<?php do_shortcode(get_field('inner_page_footer')); ?>

  <?php
endwhile;
get_footer();?>
