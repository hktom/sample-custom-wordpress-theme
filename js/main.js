$(function () {
  ScrollReveal().reveal(
    `#home-content h4,#home-content .line,#home-content p,#home-call-to-action .container,#home-brand .row,#home-brand .strategie,#home-leading .container,#home-ce-que-fait-tandem .row,#home-ce-que-fait-tandem .list-point-point,#leading-v2 .container,#home-blog h1,#home-blog .container-fluid,#home-newsletter .container,.inner-page-container,.inner-page-header h4,.inner-page-header .line,.inner-page-header .card,.inner-page-header p,.brand-list .brands,#inner_page_footer .container,#proposition,.propostion-list,#inner-proposition-page-footer .container,#equipe .row,.team-call-to-action,#list-avis .line,#avis .py-3,.casestudy-post,#featured-post,.blog-slides .container-fluid,#blog-section-2 .post,#actualite,.infinite .post `,
    { distance: "50px", origin: "bottom", duration: 700, delay: 200 }
  );
});
//#home-baniere .container,

// Sticky Menu
$(function () {
  var navbar = document.getElementById("navbar");
  window.onscroll = function () {
    stickyMenu();
  };

  function stickyMenu() {
    if (window.pageYOffset > 400) {
      navbar.classList.add("sticky");
      $(".logo-legend").removeClass("d-block");
      $(".logo-legend").addClass("d-none");
      $('.navbar-brand').addClass("resize-logo");
    } else {
      navbar.classList.remove("sticky");
      $(".logo-legend").addClass("d-block");
      $(".logo-legend").removeClass("d-none");
      $('.navbar-brand').removeClass("resize-logo");
    }
  }
});

// Aside Menu
function openNav() {
  var el = document.getElementById("sidebar-overlay");
  document.getElementById("sidebar-menu").classList.add("sidebar-show");
  document.getElementById("sidebar-menu").classList.remove("d-none");
  document.getElementById("sidebar-menu").classList.add("d-flex");
}

function closeNav() {
  document.getElementById("sidebar-menu").classList.remove("sidebar-show");
  document.getElementById("sidebar-menu").classList.remove("d-flex");
  document.getElementById("sidebar-menu").classList.add("d-none");
}

function fadeIn(el, time) {
  el.style.opacity = 0;
  var last = +new Date();
  var tick = function () {
    el.style.opacity = +el.style.opacity + (new Date() - last) / time;
    last = +new Date();
    if (+el.style.opacity < 1) {
      (window.requestAnimationFrame && requestAnimationFrame(tick)) ||
        setTimeout(tick, 1000);
    }
  };
  tick();
}

// Caroussel Flicky
$(function () {
  $(".main-carousel").flickity({
    autoPlay: 5000,
    cellAlign: "center",
    contain: false,
    groupCells: 4,
    prevNextButtons: !1,
    selectedAttraction: 0.0001,
    pauseAutoPlayOnHover: false,
  });

  // speeches
  $(".speeches-caroussel").flickity({
    cellAlign: "left",
    contain: !0,
    groupCells: 1,
    prevNextButtons: !1,
    freeScroll: !0,
    wrapAround: !0,
  });

  // speeches home
  $(".speeches-caroussel-home").flickity({
    cellAlign: "left",
    contain: !0,
    groupCells: 1,
    prevNextButtons: 1,
    freeScroll: !0,
    wrapAround: !0,
  });

  // speeches home mobile
  // $(".speeches-caroussel-home-mobile").flickity({
  //   cellAlign: "left",
  //   contain: !0,
  //   groupCells: 1,
  //   prevNextButtons: 1,
  //   freeScroll: !0,
  //   wrapAround: !0,
  // });

  // initialization
  var $carousel = $(".speeches-caroussel").flickity();
  var $carousel_home = $(".speeches-caroussel-home").flickity();
  //var $carousel_home_mobile = $(".speeches-caroussel-home-mobile").flickity();

  $(".carrousel-navigator-left").on("click", function (e) {
    e.preventDefault();
    $carousel.flickity("previous");
    $carousel_home.flickity("previous");
  });
  $(".carrousel-navigator-right").on("click", function (e) {
    e.preventDefault();
    $carousel.flickity("next");
    $carousel_home.flickity("next");
  });
});