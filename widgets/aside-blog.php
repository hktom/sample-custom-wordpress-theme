
        <!-- A lire -->
        <div id="sidebar-a-lire">
        <div class="line"></div>
        <h4>A lire aussi</h4>
        <!-- a lire Post -->
        <?php
do_shortcode('[wp_list_post post_type="post" per_page=5 offset=1 popular=1 not_tag=49]');?>
      </div>



      <div class="spacer"></div>
      <!-- Newsletter -->
      <?php get_template_part('widgets/content', 'newsletter');?>


      <div class="spacer"></div>

      <!-- Mission -->
    <div id="sidebar-mission">
      <div class="line"></div>
      <h4>Les missions Tandem</h4>
      <?php
do_shortcode('[wp_list_post post_type="case_studies" per_page=5 offset=1]');?>
      </div>
