<?php
/*
Template Name: Sour Propostion Parent
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
	      <!-- <div class="col-sm-12 col-md-1"></div> -->
	      <div class="col-sm-12 col-md-8 blog_header_proposition" >
        <div class="line" ></div>
		<div class="spacer"></div>
		&nbsp;
          <?php the_content();?>
	      </div>
	    </div>
	  </div>
	</div>

	<!-- <div class="p-5 "> -->
	  <div class="container">
	    <div class="row">
	      <div class="col-12 col-md-8 content-proposition order-2 order-md-1">		  
          <?php the_field('content_sous_proposition');?>
	      </div>
				<div class="col-md-4 order-1 order-md-2 ">
					<?php echo do_shortcode(get_field('savoir_plus'));?>
	      </div>
	    </div>
	  </div>
	
	<!-- </div> -->
	
	<!-- Section call to action -->

	<?php
endwhile;
endif;
get_template_part( 'widgets/content', 'proposition_footer' );
get_footer();?>
