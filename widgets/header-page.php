<!-- Menu Nav -->
<div id="header-wrapper" class="bg-grey">
  <header id="navbar">
      <div class="container">
        <nav class="navbar navbar-expand-xl navbar-light p-0">
          <a class="navbar-brand" href="/">
          <img src="<?php echo get_template_directory_uri() . '/images/Logo-tamdem.png'; ?>" />
          </a>
          <button onclick="openNav()" class="navbar-toggler" type="button" data-toggle="collapse" data-target="null" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <img src="<?php echo get_template_directory_uri() . '/images/menu-icon.png'; ?>" />
          </button>
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
              <?php theme_nav_menu('Menu principal');?>
            </ul>
            <div>
            <!-- <a href="<?php //echo get_permalink(819); ?>" class="nav-img">
            <img src="<?php //echo get_template_directory_uri() . '/images/instant-t.svg'; ?>" style="width:100px" />
            </a> -->
            <a class="btn tandem-btn-outline outline-newsroom mt-0"
          href="<?php echo get_permalink(819); ?>"> Newsroom</a>

            <button class="btn burger" onclick="openNav()">  <img src="<?php echo get_template_directory_uri() . '/images/menu-icon.png'; ?>" /></button>
            </div>
          </div>
        </nav>
      </div>
    </header>
</div>

<style>
  .btn.tandem-btn-outline.outline-newsroom{
    color: #E50E33 !important;
    border-color:#E50E33 !important;
  }

  .btn.tandem-btn-outline.outline-newsroom:hover{
    color: #fff !important;
  }
</style>