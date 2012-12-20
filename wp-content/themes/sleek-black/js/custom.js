var $j = jQuery.noConflict();
jQuery(document).ready(function(){
						jQuery("blockquote").append("<div class='quote_bottom'></div>");
						});
jQuery(document).ready(function(){
						   jQuery("a#scroll").fadeTo("normal", 0.5); // This sets the opacity of the thumbs to fade down to 30% when the page loads
						   jQuery("a#scroll").hover(function(){
						   jQuery(this).fadeTo("fast", 1.0);
						   },function(){
						   jQuery(this).fadeTo("fast", 0.5);
							   	});
						   });