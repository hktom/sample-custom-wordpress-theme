<?php
$_query = new WP_Query(array('p' => 1054, 'post_type'=>'section'));  
if ($_query->have_posts()) {
  while ($_query->have_posts()) {
      $_query->the_post();
      //$img=get_the_post_thumbnail_url(get_the_ID(),'full');
      ?>

<div id="inner-proposition-page-footer" class="position-relative">
<div class="container">

  <div class="row text-center">
    <div class="col-md-12">
      <h2>
      <?php echo get_the_title();?>
      </h2>
      <h4 class="py-3"><?php echo get_the_content();?></h4>
      <div class="font-weight-bold">
        <?php echo get_field('description');?>
      </div>
    </div>
  </div>

  <div class="row py-4">
      <div class="col-lg-3 col-md-12 col-12 text-center my-4 my-lg-0">
          <strong>DÉCISIONS STRATÉGIQUES</strong>
      </div>
      <div class="col-lg-4 col-6 position-relative">
          <div class="tandem-badge-white">DIRECTION DE L’ENTREPRISE</div>
          <div class="text-center">
            Agit comme « Directeur de Publication »
          </div>
          <div class="arrow-down">
          <!-- <span class="iconify" data-icon="gg:arrow-long-down" data-inline="false"></span> -->
          <span class="iconify" data-icon="cil:arrow-bottom" data-inline="false"></span>
          </div>
      </div>
      <div class="col-lg-1 d-none d-lg-block"></div>
      <div class="col-lg-4 col-6 position-relative">
          <div class="tandem-badge-white">Agence TANDEM</div>
          <div class="text-center">
          Agit comme « Directeur de Rédaction »
          </div>
          <div class="arrow-down">
          <!-- <span class="iconify" data-icon="gg:arrow-long-down" data-inline="false"></span> -->
          <span class="iconify" data-icon="cil:arrow-bottom" data-inline="false"></span>
          </div>
      </div>
  </div>
  <div class="dotted-divider"></div>

  <div class="row py-4">
      <div class="col-lg-3 col-md-12 col-md-12 text-center my-4 my-lg-0">
          <strong>PROGRAMMATION ÉDITORIALE</strong>
      </div>
      <div class="col-lg-4 col-6 position-relative">
          <div class="tandem-badge-white">Garant du contenu</div>
          <div class="arrow-down-long">
          <!-- <span class="iconify" data-icon="gg:arrow-long-down" data-inline="false"></span> -->
          <span class="iconify" data-icon="cil:arrow-bottom" data-inline="false"></span>
          </div>
      </div>
      <div class="col-lg-1 d-none d-lg-block"></div>
      <div class="col-lg-4 col-6">
          <div class="tandem-badge-white">Garant de l’élaboration et du planning</div>
      </div>
  </div>
  <div class="dotted-divider"></div>

  <div class="row py-4">
      <div class="col-lg-3 col-md-12 col-12 text-center my-4 my-lg-0">
          <strong>MISE EN ŒUVRE</strong>
      </div>
      <div class="col-lg-4 col-6 position-relative">
          <div class="tandem-badge-white">DÉPARTEMENT COMMUNICATION</div>
          <div class="text-center">
          Validation
          </div>
          <div class="arrow-right">
          <span class="iconify d-none d-lg-block" data-icon="cil:arrow-right" data-inline="false"></span>
          <span class="iconify d-lg-none d-block" data-icon="eva:arrow-ios-forward-fill" data-inline="false"></span>
          </div>
      </div>
      <div class="col-lg-1 d-none d-lg-block"></div>
      <div class="col-lg-4 col-6">
          <div class="tandem-badge-white">CHARGÉ DE PROJET TANDEM</div>
          <div class="text-center">
          Rédaction et publication
          </div>
      </div>
  </div>


</div>
</div>

<?php
  }
  wp_reset_postdata();
}
