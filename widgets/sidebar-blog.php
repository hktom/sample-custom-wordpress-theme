<?php
?>

<div id="sidebar-menu" class="d-none justify-content-end bg-black">

     <div class="wide-section w-100" onclick="closeNav()">
     <div id="sidebar-overlay" class="overlay w-100 h-100">
      </div>
      </div>
   
      <div class="menu-items text-right">
      
         <a href="javascript:void(0)" onclick="closeNav()" class="btn-close"><img src="<?php echo get_bloginfo('template_url');?>/images/close-white.png"/> </a>
         <ul class="navbar-nav mr-auto">
            <?php theme_nav_menu('newsroom left');?>
            <?php theme_nav_menu('newsroom right');?>
              <li>
              <a href="/" class="aside-btn">
              L’AGENCE TANDEM
              </a>
              </li>
          </ul>
          
        <p class="sidebar-agence-description">L'AGENCE DE COMMUNICATION PAR L'ACTUALITÉ
        <br/>Chemin Barde 2
          <br/>1219 Le Lignon Genève
          <br/>Suisse</p>

          <div class="social-icons justify-content-end d-flex">
            <div><a href="https://www.linkedin.com/company/949679/" target="_blank"><span class="iconify" data-icon="zmdi:linkedin" data-inline="false"></span></a></div>
            <div>
            <a href="https://www.facebook.com/Tandemadvertising.ge" target="_blank" ><span class="iconify" data-icon="entypo-social:facebook" data-inline="false"></span></a>
            </div>
            <div><a href="#"><span class="iconify" data-icon="il:youtube" data-inline="false"></span></a></div>
          </div>

      </div>
</div>