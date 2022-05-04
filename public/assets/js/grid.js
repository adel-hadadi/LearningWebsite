$(function () {
  $(".navbar-toggler").click(function () {
    $(".collapse").slideToggle();
  });
  $(".owl-carousel").owlCarousel({
    rtl: true,
    loop: true,
    margin: 10,
    responsive: {
      0: {
        items: 1,
      },
      600: {
        items: 2,
      },
      1000: {
        items: 4,
      },
    },
  });

  $("#showMore").click(function () {
    $("#footerDescription").slideToggle();
    $("#showMore").fadeOut();
    $(".showMoreClose").fadeIn();
  });
  $(".showMoreClose").click(function () {
    $("#footerDescription").slideToggle();
    $("#showMore").fadeIn();
    $(".showMoreClose").fadeOut();
  });
  $("#up-toggle").click(function () {
    $("html, body").animate(
      {
        scrollTop: $("body").offset().top,
      },
      600
    );
  });

  $(".showContent .showContentItem").click(function () {
    $(this).parent().find(".content-items").slideToggle();
  });
  $(".tags .showMoreTag").click(function () {
    $(".tags .box").css("height", "auto");
    $(".tags .showLoseTag").fadeIn();
    $(".tags .showMoreTag").fadeOut();
  });
  $(".tags .showLoseTag").click(function () {
    $(".tags .box").css("height", "130px");
    $(".tags .showMoreTag").fadeIn();
    $(".tags .showLoseTag").fadeOut();
  });

  //enable tooltipe bootstrap
  $('[data-toggle="tooltip"]').tooltip();

  //pin aside in curce page whene scrolled down
  $(window).scroll(function () {
    if ($(window).width() > 990.98) {
      var sidebar = new StickySidebar("#sidebar", {
        containerSelector: "#main-content",
        innerWrapperSelector: ".sidebar__inner",
        topSpacing: 20,
        bottomSpacing: 20,
      });
    }
  });

  $(".panel-navbar ul li").click(function () {
    $(".panel-navbar ul .active").removeClass("active");
    $(this).addClass("active");

    var forPage = $(this).attr("data-page");
    $(".main-content .main-content-item").css("display", "none");
    $("#" + forPage).css("display", "block");
  });

  //نشان دادن جزییات تراکنش در پنل استاد
  $(".bill-item .bill-header").click(function () {
    $(this).parent().find(".bill-item-content").slideToggle();
  });
});
