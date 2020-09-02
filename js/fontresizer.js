$(document).ready(function(){
  // Reset Font Size
  var originalFontSize = $('div.isi-detil').css('font-size');
  $(".resetFont").click(function(){
  $('div.isi-detil').css('font-size', originalFontSize);
  });
  // Increase Font Size
  $(".increaseFont").click(function(){
  	var currentFontSize = $('div.isi-detil').css('font-size');
 	var currentFontSizeNum = parseFloat(currentFontSize, 10);
    var newFontSize = currentFontSizeNum*1.2;
	$('div.isi-detil').css('font-size', newFontSize);
	return false;
  });
  // Decrease Font Size
  $(".decreaseFont").click(function(){
  	var currentFontSize = $('div.isi-detil').css('font-size');
 	var currentFontSizeNum = parseFloat(currentFontSize, 10);
    var newFontSize = currentFontSizeNum*0.8;
	$('div.isi-detil').css('font-size', newFontSize);
	return false;
  });
});