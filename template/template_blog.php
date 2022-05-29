<?php
/*
Template Name: Blog
 */
get_header();
if(get_query_var( 'paged' )>=2){
  $offset = get_query_var( 'paged' )? (get_query_var( 'paged' )-1) * 14 : 0;
}
else
{
  $offset = get_query_var( 'paged' )? get_query_var( 'paged' ) * 7 : 0;
}
?>

<?php
// get_template_part( 'widgets/content', 'feature_post' );
// get_template_part( 'widgets/content', 'speeches' );
;?>

<div id="featured-post">
  <div class="container">
    <div class="row">

      <div class="col-lg-5">
          <?php do_shortcode('[wp_list_post_edito post_id=844]');?>
      </div>

      <div class="col-lg-7 pl-lg-5">
        <div class="row">
         <?php
         do_shortcode('[wp_list_post per_page=4 offset=0 category=-50]');?>
        </div>
      </div>
    </div>
  </div>
</div>

   <div>
     <div class="container">
       <div class="row ">
        <div class="col-lg-8 col-12 mt-3">
        <?php
          echo '<div class="row">';
          if(get_query_var( 'paged' ) < 2) $offset=$offset+4;
          do_shortcode('[wp_list_post per_page=10 offset='.$offset.' category=-50]');
          echo '</div>';
          ?>

          <!-- pagination -->
          <div class="d-flex justify-content-end mb-5">
          <?php 
          echo do_shortcode('[wp_list_post_pagination offset=0 category=-50 per_page=14 ]');
          ;?>
          </div>
          <!-- pagination -->

        </div>
         <!-- sidebar -->
         <div class="col-lg-3 px-lg-0 offset-lg-1 tandem-sidebar">
         <?php
          get_template_part('widgets/aside', 'blog');
          ?>
          </div><!-- end sidebar-->
         </div> <!-- end row-->
       </div><!-- end container-->
     </div><!-- end section-->

<style>
a.page-numbers {
    margin: 0px 5px;
    color: black;
}

span.page-numbers.current {
  color: #E50E33 !important;
}

</style>
<?php
get_footer();

// function newsroom_footer_actualite()
// {

//     echo '<div class="row mb-5">';
//     do_shortcode('[wp_list_post per_page=10 offset=4 category="1, 51, 52"]');
//     echo '</div>';
// }

// function newsroom_jumbotron()
// {

//     echo '<div id="actualite">';
//     echo '<h2>Les missions Tandem</h2>';
//     echo '<div class="line"></div>';
//     do_shortcode('[wp_list_post post_type="case_studies" per_page=1]');
//     echo '</div>';

// }