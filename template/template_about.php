<?php
/*
Template Name: About
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
	      <div class="col-sm-12 col-md-9">
        <div class="line" ></div>
		<div class="spacer"></div>
		
          <?php the_content();?>
	      </div>
	    </div>
	  </div>
	</div>

	<div id="office-image">
		<img src="<?php echo the_post_thumbnail_url('full'); ?>" alt="">
	</div>

	<!-- Section Equipe -->
	<div id="equipe">
		<div class="container ">
			<div class="row mb-5 text-center">
			<div class="col-sm-12">
					<h2>L’équipe stratégique</h2>
			</div>
			</div>

				<?php do_shortcode(get_field('on_board_team'));?>

			<div class="dotted-divider"></div>

			<div class="row m-5 text-center d-flex justify-content-center">
			    <?php do_shortcode(get_field('teams'));?>
			</div>

	    </div>
	</div>

	<div>
		<div class="container">
			<div class="row mb-5 text-center">
				<div class="col-sm-12">
						<!-- Call to action -->
			<?php get_template_part( 'widgets/content', 'about_footer' );?>
			<!-- Call to action -->
				</div>
			</div>
		</div>
	</div>

	<?php
endwhile;
endif;
get_template_part( 'widgets/content', 'page_footer' );
get_footer();?>
