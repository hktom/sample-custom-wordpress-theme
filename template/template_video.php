<?php
/*
Template Name: Vidéo
*/
get_header();
if (have_posts()):;
while (have_posts()): the_post();
?>

<?php
;?>

   <div id="blog-section-2">
     <div class="container">
     <h1> <?php echo get_the_title();?> </h1>
       <div class="row mt-5">
        <div class="col-lg-7 mt-3 gutter">
        <div class="row mb-5" id="infinite-scroll-container" post="videos">
        <?php endwhile;endif;?>
            <?php  do_shortcode('[wp_list_post post_type="videos" per_page=10]');?>
        </div>
        </div>
         <!-- sidebar -->
         <div class="col-lg-4 tandem-sidebar gutter">
         <?php 
         get_template_part( 'widgets/aside', 'blog' );
         ?>
          </div><!-- end sidebar-->
         </div> <!-- end row-->
       </div><!-- end container-->
     </div><!-- end section-->

<?php
get_footer();?>
