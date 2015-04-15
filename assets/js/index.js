// JavaScript Document

$(document).ready(function(){
    $('div.button').mouseenter(function(){
		$(this).fadeTo('fast',0.8);
	});
	$('div.button').mouseleave(function(){
		$(this).fadeTo('fast',1);
	});
	$('div.contentBox').live(mouseenter,function(){
		$(this).fadeTo('fast',0.8);
	});
	$('div.contentBox').live(mouseleave,function(){
		$(this).fadeTo('fast',1);
	});
	$('a.button').live(mouseenter,function(){
		$(this).fadeTo('fast',0.5);
	});
	$('a.button').live(mouseleave,function(){
		$(this).fadeTo('fast',1);
	});
});

$(document).ajaxComplete(function() {
	$('.button').mouseenter(function(){
		$(this).fadeTo('fast',0.5);
	});
	$('.button').mouseleave(function(){
		$(this).fadeTo('fast',1);
	});
});