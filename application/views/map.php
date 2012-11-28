<div id="title-padding">
	<h3 id="map-title"><?php echo $image[0]->name . " - " . $image[0]->description; ?></h3>
</div>
<h2 class="mouse-position">
0, 0
</h2>
<button id="remove-dot">Undo</button>
<button id="clear-dots">Clear</button>
<br />

<div id="canvas-holder">
	<canvas id="map-holder" height="<?php echo $image[0]->height; ?>" width="<?php echo $image[0]->width; ?>"></canvas>
</div>

<!-- <div id="map-holder">
	<img id="map" src="<?php // echo "assets/uploads/" . $image[0]->name; ?>" />
</div> -->

<script>
	
	jQuery(document).ready(function(){
		
		var source ="<?php echo "assets/uploads/" . $image[0]->name; ?>";
		var canvas = $('#map-holder');
		var context = canvas[0].getContext('2d');
		var imageObj = new Image();
		var imgWidth = <?php echo $image[0]->width; ?>;
		var imgHeight = <?php echo $image[0]->height; ?>;
		var scrolling = false;
		var dots = [];

		$('#canvas-holder').height($(window).height() - $('#title-padding').height() - 45);
		$('#canvas-holder').width($(window).width());

		imageObj.onload = function() {
			context.drawImage(imageObj, 0, 0, imgWidth, imgHeight);
		};
		imageObj.src = source;

		if(imgWidth > $(window).width() || imgHeight > $(window).height()) {
			$(function() {
			    $('#map-holder').draggable({
			    	scroll: false,
			    	start: function(event, ui) {
				        scrolling = true;
				    }
			    });
			});
		};

		canvas.mousemove(function(e) {
			var offset = $(this).offset();
			var x = e.clientX - offset.left;
			var y = e.clientY - offset.top;	
			$('.mouse-position').html(Math.floor(x) +', '+ Math.floor(y));
		});

		canvas.click(function(e) {
			if (scrolling == true) {
		        scrolling = false;
		    } else {
				var offset = $(this).offset();
				var x = e.clientX - offset.left;
				var y = e.clientY - offset.top;	
			
				/*context.fillStyle = "#0F0";
				context.fillRect(x, y, 6, 6); */
				
				context.beginPath();
				context.arc(x,y,3,0,2*Math.PI);
				context.fillStyle = 'green';
      			context.fill();
				context.stroke();
				var coords = [Math.floor(x), Math.floor(y)];
				dots.push(coords);		
			}
		});

		$('#remove-dot').click(function() {
			if(dots.length > 0) {
				dots.pop();
				redrawWithDots();
			}
		});

		$('#clear-dots').click(function() {
			if(dots.length > 0) {
				dots.length = 0;
				context.clearRect(0, 0, <?php echo $image[0]->width; ?>, <?php echo $image[0]->height; ?>);
				context.drawImage(imageObj, 0, 0);
			}
		});

		function redrawWithDots() {
			context.clearRect(0, 0, <?php echo $image[0]->width; ?>, <?php echo $image[0]->height; ?>);
			context.drawImage(imageObj, 0, 0);
			//imageObj.src = source;
			console.log("image draw");
			for (var i = 0; i < dots.length; i++) {
				console.log("dot draw");
				context.beginPath();
				context.arc(dots[i][0],dots[i][1],3,0,2*Math.PI);
				context.fillStyle = 'green';
      			context.fill();
				context.stroke();
			};
		}
	});

</script>