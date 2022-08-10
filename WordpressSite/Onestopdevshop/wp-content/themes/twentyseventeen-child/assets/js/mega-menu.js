

jQuery(document).ready(function(){
	jQuery("ul.mainmenu li:has(ul)").addClass("sub-menu");
	jQuery("a.menulinks").click(function(){
		jQuery('body').toggleClass('cross');
		jQuery(this).next("ul").slideToggle(350);
		jQuery("ul.mainmenu li.sub-menu ul").slideUp(250);
		jQuery("a.child-triggerm").removeClass("active");
	});
	jQuery('.mainmenu li.sub-menu > a').after('<a class="child-triggerm"><span></span></a>');
	//$('.mainmenu li.sub-menu > a').after('<a class="arrow"><span></span></a>');

	jQuery(".mainmenu a.child-triggerm").click(function(){
		
		jQuery(this).parent().siblings("li").find("a.child-triggerm").removeClass("active");
		jQuery(this).parent().siblings("li").find("ul").slideUp(250);
		jQuery(this).next("ul").slideToggle(350);
		jQuery(this).toggleClass("active");
	});
});

