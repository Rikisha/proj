/**
 * @version    1.7.0.2 August 7, 2012
 * @author    RocketTheme http://www.rockettheme.com
 * @copyright   Copyright (C) 2007 - 2012 RocketTheme, LLC
 * @license    http://www.rockettheme.com/legal/license.php RocketTheme Proprietary Use License
 */

var $j = jQuery.noConflict();
	$j(document).ready(function () {

         if ($j('ul#magemenu-top > li').hasClass('active')) { // Only run script if a menu item is active

		//Retrieve the selected item position and width
		var default_left = Math.round($j('.inner-header-container ul#magemenu-top > li.active').offset().left - $j('.inner-header-container').offset().left);
		var default_width = $j('.inner-header-container ul#magemenu-top > li.active').width();

		//Set the floating bar position and width
		$j('#box').css({left: default_left});
		$j('#box .head').css({width: default_width});

		//if mouseover the menu item
		$j('.inner-header-container ul#magemenu-top > li').hover(function () {

			//Get the position and width of the menu item
			left = Math.round($j(this).offset().left - $j('.inner-header-container').offset().left);
			width = $j(this).width();

			//Set the floating bar position, width and transition
			$j('#box').stop(false, true).animate({left: left},{duration:200});
			$j('#box .head').stop(false, true).animate({width:width},{duration:200});

		//if user click on the menu
		}).click(function () {

			//reset the selected item
			$j('.inner-header-container ul#magemenu-top > li').removeClass('active');

			//select the current item
			$j(this).addClass('active');

		});

		//If the mouse leave the menu, reset the floating bar to the selected item
		$j('.inner-header-container').mouseleave(function () {

			//Retrieve the selected item position and width
			default_left = Math.round($j('.inner-header-container ul#magemenu-top > li.active').offset().left - $j('.inner-header-container').offset().left);
			default_width = $j('.inner-header-container ul#magemenu-top > li.active').width();

			//Set the floating bar position, width and transition
			$j('#box').stop(false, true).animate({left: default_left},{duration:200});
			$j('#box .head').stop(false, true).animate({width:default_width},{duration:200});

		});
         };
	});