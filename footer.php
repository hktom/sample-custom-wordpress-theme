
<footer>
  <div class="container">
    <div class="row">
      <div class="col-lg-3 col-md-12 col-sm-12 text-center text-lg-left">
          <img class="footer-logo" src="<?php echo get_bloginfo('template_url') ?>/images/logo-white.png"/>
          <div class="spacer"></div>
          <div class="d-none d-lg-block">
            <div class="social-icons">
              <a href="https://www.linkedin.com/company/949679/" target="_blank"><span class="iconify" data-icon="zmdi:linkedin" data-inline="false"></span></a>
              <a href="https://www.facebook.com/Tandemadvertising.ge" target="_blank"><span class="iconify" data-icon="entypo-social:facebook" data-inline="false"></span></a>
              <!-- <a href="#" target="_blank"><span class="iconify" data-icon="il:youtube" data-inline="false"></span></a> -->
            </div>
          </div>
      </div>

      <div class="col-lg-3 col-md-12 col-sm-12 text-center text-lg-left">
        <!-- <h6>L'AGENCE D’UN MONDE QUI ÉCHANGE</h6> -->
        <p>Chemin Barde 2
          <br/>1219 Le Lignon Genève
          <br/>Suisse</p>

          <div class="social-icons d-lg-none text-center text-lg-left m-auto">
            <a href="https://www.linkedin.com/company/949679/" target="_blank"><span class="iconify" data-icon="zmdi:linkedin" data-inline="false"></span></a>
            <a href="https://www.facebook.com/Tandemadvertising.ge" target="_blank"><span class="iconify" data-icon="entypo-social:facebook" data-inline="false"></span></a>
            <!-- <a href="#" target="_blank"><span class="iconify" data-icon="il:youtube" data-inline="false"></span></a> -->
          </div>
      </div>

      <div class="col-lg-3 col-md-12 col-sm-12 d-none d-lg-block">
        <!-- <h6 class="menu-title">TANDEM</h6> -->
        <ul class="footer-menu px-0">
        <?php footer_menu("Footer");?>
        </ul>
      </div>

      <div class="col-lg-3 col-md-12 col-sm-12 d-none d-lg-block">
        <div class="contact d-flex justify-content-end align-items-center contact-action">
          <h3> <a href="<?php echo get_permalink(19);?>">Nous contacter</a></h3>
          <a href="<?php echo get_permalink(19);?>"><img class="phone-icon" src="<?php echo get_bloginfo('template_url') ?>/images/phone-icon.png"/></a>
        </div>
      </div>
    </div>
  </div>
</footer>

<script src="https://code.jquery.com/jquery-2.2.4.min.js" integrity="sha256-BbhdlvQf/xTY9gja0Dq3HiwQF8LaCRTXxZKRutelT44=" crossorigin="anonymous"></script>
<script src="https://unpkg.com/flickity@2/dist/flickity.pkgd.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>
<script src="https://unpkg.com/infinite-scroll@3/dist/infinite-scroll.pkgd.min.js"></script>
  <?php wp_footer();?>
  <script src="https://code.iconify.design/1/1.0.7/iconify.min.js"></script>
  <script src="https://unpkg.com/scrollreveal"></script>
</body>
</html>
