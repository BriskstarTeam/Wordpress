
  $(".navbar-toggler").click(function() {
  $("#navbarSupportedContent").slideToggle();
});

$( ".logout" ).on( "click", function() {
  $('.logout-user').trigger( "click" );
});

jQuery("li.menu-item a").click(function() {
    jQuery(this).parent().addClass('active').siblings().removeClass('active');

});