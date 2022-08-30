  
jQuery(".navbar-toggler").click(function() {
  jQuery("#navbarSupportedContent").slideToggle();
});

jQuery("ul li.glimpse_item:first-child").on("click", function(e) {

    var arrFrames = jQuery(this).parent('iframe').children('.seek-bar');
    arrFrames.currentTime=122;
    
    console.log(arrFrames);
    console.log(arrFrames.currentTime);
    // to get part of width of progress bar clicked
    
  });

  jQuery(".skip-thirty").on("click", function(e) {
    var curTime = player.currentTime;
    alert(curTime);
    currentTimeStart = curTime + 30;
    player.currentTime = currentTimeStart;
    playPlayer(false);
  });