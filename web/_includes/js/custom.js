$(function () {
  // run the currently selected effect
  function toggleRow(whichRow) {
	  
	  // get effect type from 
	  var selectedEffect = null;

	  // most effect types need no options passed by default
	  var options = {};
	  // some effects have required parameters
	  if (selectedEffect === "scale") {
		  options = { percent: 0 };
	  } else if (selectedEffect === "size") {
		  options = { to: { width: 200, height: 60} };
	  }

	  // run the effect
	  $("tr#toggle-" + whichRow).toggle(selectedEffect, options, 500);
	  
  };

  // HIDE ALL ROWS ON LOAD
 $("tr.toggle").hide();

  // A ICON ACTS AS BUTTON TO SHOW OR HIDE SECONDARY ROW
  $("a.toggle-row").click(function () {
	  
	  var id = 0;
	  id = $(this).parent().parent().attr("id");
	  
	  //Change the plus symbol to a minus
	  $(this).children().toggleClass('icon-minus', 'icon-plus');
	  

	  if ($(this).hasClass('on')) {
		  $(this).removeClass('on').addClass('off');
	  } else if ($(this).hasClass('off')) {
		  $(this).removeClass('off').addClass('on');
	  } else {
		  $(this).addClass('on');
	  }
	  
	  
	  
	  //alert(this);

	  // SHOW OR HIDE THIS ROW
	  toggleRow(id);
  });
});

//Animate Progress Bars
setTimeout(function(){

	$('.progress .bar').each(function() {
		var me = $(this);
		var perc = me.attr("data-percentage");

		//TODO: left and right text handling

		var current_perc = 0;

		var progress = setInterval(function() {
			if (current_perc>=perc) {
				clearInterval(progress);
			} else {
				current_perc +=1;
				me.css('width', (current_perc)+'%');
			}

			me.text((current_perc)+'%');

		}, 100);

	});

},300);

//Initialise tooltips
$('.bar-tooltip').tooltip()