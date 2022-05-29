<?php
/*
Template Name: Accueil
 */
get_header();
if (have_posts()): ;
    while (have_posts()):
        the_post();
        $featured_img_url = get_the_post_thumbnail_url(get_the_ID(), 'full');
        ?>
		<!-- Boutton flottant -->
		<a href="<?php echo get_permalink(19); ?>">
		<img class="float-icon" src="<?php echo get_bloginfo('template_url') ?>/images/pen-icon.png"/></a>

		<!-- Baniere  -->
		<div id="home-baniere" class="header">
		  <div class="container" style="position:relative" >
		    <div class="row ">
		      <div class="col-sm-12 col-md-12 col-lg-12">
		        <?php the_field('description');?>
		      </div>
		    </div>
		    <div class="img-overlay"></div>
		  </div>
		</div>

		<style>
		/* #home-baniere .img-overlay{
		  width:100%;
		  position: relative;
		} */
		#home-baniere .img-overlay::before{
		content:'';
		/* background:red; */
		width:100%;
		height:476px;
		top:165px;
		right:0;
		position:absolute;
		background-image:url(<?php echo $featured_img_url; ?>);
		background-position:right;
		background-repeat: no-repeat;
		background-size: 733px 476px;
		z-index:7777;
		}

		@media only screen and (max-width: 992px) {
		  #home-baniere .img-overlay::before{
		    top:245px;
		    background-size: 733px 476px;
		    background-position:center;
		  }
		}


		@media screen and (max-width: 414px) {
		  #home-baniere .img-overlay::before{
		    top:310px;
		    }
		}
		@media screen and (max-width: 280px) {
		  #home-baniere .img-overlay::before{
		    top:420px;
		    }
		}

		</style>

		<!-- Content Page d'accueil -->
		<div id="home-content">
		  <div class="container">
		    <div class="row">
		      <div class="col-sm-12 col-md-2"></div>
		      <div class="col-sm-12 col-md-7">
		        <div class="line"></div>
		        <div class="spacer"></div>
		        <?php the_content();?>
		      </div>
		    </div>
		  </div>
		</div>

		<?php
    endwhile;
    wp_reset_postdata();
endif;
get_template_part('widgets/content', 'brand');
get_template_part('widgets/content', 'strategies');
get_template_part('widgets/content', 'speeches-accueil');
get_template_part('widgets/content', 'leading');
get_template_part('widgets/content', 'tandem');
get_template_part('widgets/content', 'interlude');
get_template_part('widgets/content', 'news');
get_template_part('widgets/content', 'home_footer');
get_footer();
?>

<script type="text/javascript">
// viedeo Player
$(function(){

try {
var video = document.getElementById("home-video-background");
var section_video = document.getElementById("home-call-to-action");

window.addEventListener('scroll', function() {
 window.pageYOffset >= section_video.offsetTop-500?video.play():video.pause();
});
} catch (error) {

}

});
</script>
