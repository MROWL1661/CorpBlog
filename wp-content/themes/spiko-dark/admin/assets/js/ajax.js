jQuery(document).ready(function() {
	/* Tabs in welcome page */
		function spiko_dark_welcome_page_tabs(event) {
		   jQuery(event).parent().addClass("active");
		   jQuery(event).parent().siblings().removeClass("active");
		   var tab = jQuery(event).attr("href");
		   jQuery(".spiko-dark-tab-pane").not(tab).css("display", "none");
		   jQuery(tab).fadeIn();
		}
        jQuery(".spiko-dark-nav-tabs li").slice(0,1).addClass("active");
	    jQuery(".spiko-dark-nav-tabs a").click(function(event) {
		   event.preventDefault();
			spiko_dark_welcome_page_tabs(this);
	    });
		/* Tab Spiko Dark height matches admin menu height for scrolling purpouses */
		$tab = jQuery('.spiko-dark-tab-content > div');
		$admin_menu_height = jQuery('#adminmenu').height();
		if( (typeof $tab !== 'undefined') && (typeof $admin_menu_height !== 'undefined') )
		{
		    $newheight = $admin_menu_height - 180;
		    $tab.css('min-height',$newheight);
		}
		jQuery(".spiko-dark-custom-class").click(function(event){
		   event.preventDefault();
		   jQuery('.spiko-dark-nav-tabs li a[href="#changelog"]').click();
		});
});