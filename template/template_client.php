<?php
/*
Template Name: Client
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
		&nbsp;
          <?php the_content();?>
	      </div>
	    </div>
	  </div>
	</div>

	<!-- List des avis client -->
	<!-- <div class="row"> -->
		<div class="container">
			<div id="list-avis" class="row">
				<div class="col-sm-12 col-md-1"></div>
				<div class="col-sm-12 col-md-9">
					<!-- <h2>L’avis de nos clients</h2> -->
					<?php the_field("Titre de la section");?>
					<div class="line"></div>
					<div id="avis">
					<div class="container" id="infinite-scroll-container" post="clients" >
					<?php echo do_shortcode(get_field('avis_client')); ?>
					</div>
					</div>
				</div>
			</div>
		</div>
	<!-- </div> -->

	<?php
endwhile;
endif;
get_template_part( 'widgets/content', 'page_footer' );
get_footer();?>
