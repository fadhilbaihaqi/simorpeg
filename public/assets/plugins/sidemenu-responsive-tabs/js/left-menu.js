(function($) {
	"use strict";
	
	// ______________Active Class
	$(".app-sidebar li  a").each(function() {
	  var pageUrl = window.location.href.split(/[?#]/)[0];
		if (this.href == pageUrl) { 
			$(this).addClass("active");
			$(this).parent().addClass("active"); // add active to li of the current link
			$(this).parent().parent().prev().addClass("active"); // add active class to an anchor
			$(this).parent().parent().prev().click(); // click the item to make it drop
		}
	});
	
	//Active Class
	$(".app-sidebar li a").each(function() {
		var pageUrl = window.location.href.split(/[?#]/)[0];
		if (this.href == pageUrl) {
			$(this).addClass("active");
			$(this).parent().addClass("active"); // add active to li of the current link
			$(this).parent().addClass("resp-tab-content-active"); // add active to li of the current link
			$(this).parent().parent().parent().prev().addClass("active"); // add active class to an anchor
			$(this).parent().parent().parent().prev().click(); // click the item to make it drop
		}
	});
	
	$(".submenu-list li a").each(function() {
		var pageUrl = window.location.href.split(/[?#]/)[0];
		if (this.href == pageUrl) {
			$(this).addClass("active");
			$(this).parent().parent().parent().parent().parent().addClass("active"); // add active to li of the current link
			$(this).parent().parent().parent().parent().parent().addClass("resp-tab-content-active"); // add active to li of the current link
			$(this).parent().parent().parent().prev().addClass("active"); // add active class to an anchor
			$(this).parent().parent().parent().prev().click(); // click the item to make it drop
		}
	});
	
	$(document).ready(function(){		
		
		if ($('.dashboard-azira.active').hasClass('active'))
        $('li.dashboard-azira').addClass('active');
	
	    if ($('.widget-azira.active').hasClass('active'))
        $('li.widget-azira').addClass('active');
	
        if ($('.mail-azira.active').hasClass('active'))
        $('li.mail-azira').addClass('active');
	
		if ($('.app-azira.active').hasClass('active'))
        $('li.app-azira').addClass('active');
	
		if ($('.icons-azira.active').hasClass('active'))
        $('li.icons-azira').addClass('active');
	
		if ($('.maps-azira.active').hasClass('active'))
        $('li.maps-azira').addClass('active');
		
		if ($('.tables-azira.active').hasClass('active'))
        $('li.tables-azira').addClass('active');
	
		if ($('.element-azira.active').hasClass('active'))
        $('li.element-azira').addClass('active');
	
		if ($('.advanced-azira.active').hasClass('active'))
        $('li.advanced-azira').addClass('active');
	
		if ($('.forms-azira.active').hasClass('active'))
        $('li.forms-azira').addClass('active');
	
		if ($('.chart-azira.active').hasClass('active'))
        $('li.chart-azira').addClass('active');
		
		if ($('.pages-azira.active').hasClass('active'))
        $('li.pages-azira').addClass('active');
		
		if ($('.ecommerce-azira.active').hasClass('active'))
        $('li.ecommerce-azira').addClass('active');
	
		if ($('.utilities-azira.active').hasClass('active'))
        $('li.utilities-azira').addClass('active');
	
		if ($('.custom-azira.active').hasClass('active'))
        $('li.custom-azira').addClass('active');
	
		if ($('.submenus-azira.active').hasClass('active'))
        $('li.submenus-azira').addClass('active');
	
	});
	
	
	// VerticalTab
	$('#sidemenu-Tab').easyResponsiveTabs({
		type: 'vertical',
		width: 'auto', 
		fit: true, 
		closed: 'accordion',
		tabidentify: 'hor_1',
		activate: function(event) {
			var $tab = $(this);
			var $info = $('#nested-tabInfo2');
			var $name = $('span', $info);
			$name.text($tab.text());
			$info.show();
		}
	});
	
	const ps11 = new PerfectScrollbar('.first-sidemenu', {
	  useBothWheelAxes:true,
	  suppressScrollX:true,
	});
	const ps12 = new PerfectScrollbar('.second-sidemenu', {
	  useBothWheelAxes:true,
	  suppressScrollX:true,
	});
	
})(jQuery);