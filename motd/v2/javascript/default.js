///////////////////////////////////////////////////////
// Requires jQuery library (v1.5.1 used on creation) //
// Current release: 1.5.1                            //
// Created: 2011-03-27                               //
///////////////////////////////////////////////////////

var _SLIDE_SPEED = 250;
var _ANIMATE_SPEED = 1000;

var clicked;

$(document).ready(function() {
	
	$("#nav > p").click(function(){
		
		clicked = $(this);
		
		$(".contentBox").each(function(){
			
			if ($(this).index() - $("#header").index() - 1 == clicked.index()) {
				
				if ($(this).hasClass("external")) {
					
					$(this).slideDown(_SLIDE_SPEED, "linear");
					
					$(this).children("iframe").show();
				}
				else {
		
					$("#nav > p").attr("id", "");
					
					$(clicked).attr("id", "activeLink");
		
					$(".contentBox:visible").hide();
				
					$(this).animate({opacity: "toggle"}, _ANIMATE_SPEED);
				}
			}
		});
	});
	
	$(".external > .close").click(function(){
					
		$(".external:visible > iframe").hide();
		
		$(".external:visible").slideUp(_SLIDE_SPEED, "linear");
	});
	
	if (window.location.hash) {
		
		$(".contentBox:visible").hide();
		
		$(".contentBox:nth-child(" + (parseInt(window.location.hash.slice(1)) + 1) + ")").animate({opacity: "toggle"}, _ANIMATE_SPEED);
	}
	
	$(".alertbox").delay(250).slideDown("slow");
	
	$(".alertbox").click(function(){$(this).slideUp("fast")});
});

// This comment has no purpose