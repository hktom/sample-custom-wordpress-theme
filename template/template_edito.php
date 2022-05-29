<?php
/*
Template Name: Edito
*/
get_header();
if (have_posts()):;
while (have_posts()): the_post();
?>

<?php
;?>

   <div id="blog-section-2">
     <div class="container">
     <h1 class=""> <?php echo get_the_title();?> </h1>
       <div class="row mt-5">
        <div class="col-lg-8 col-12 mt-3">
        <div class="row mb-5">
<?php endwhile;endif;?>
        <?php  do_shortcode('[wp_list_post_edito category="50" post_type="post"  per_page=10 screen=all]');?>
        </div>
        </div>
         <!-- sidebar -->
         <div class="col-lg-3 px-lg-0 tandem-sidebar offset-lg-1">
         <?php 
         get_template_part( 'widgets/aside', 'blog' );
         ?>
          </div><!-- end sidebar-->
         </div> <!-- end row-->
       </div><!-- end container-->
     </div><!-- end section-->

<?php
get_footer();?>
