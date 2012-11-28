<div id="title-padding">
	<h3 id="map-title"><?php echo $image[0]->name . " - " . $image[0]->description; ?></h3>
</div>
<h2 class="mouse-position">
0, 0
</h2>
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

		imageObj.onload = function() {
			context.drawImage(imageObj, 0, 0, imgWidth, imgHeight);
		};
		imageObj.src = source;

				$(function() {
		    $('#map-holder').draggable({
		    	scroll: false,
		    	start: function(event, ui) {
			        $(this).addClass('noclick');
			    }
		    });
		});

		canvas.mousemove(function(e) {
			var offset = $(this).offset();
			var x = e.clientX - offset.left;
			var y = e.clientY - offset.top;	
			$('.mouse-position').html(Math.floor(x) +', '+ Math.floor(y));
		});

		canvas.click(function(e) {
			if ($(this).hasClass('noclick')) {
		        $(this).removeClass('noclick');
		    } else {
				var offset = $(this).offset();
				var x = e.clientX - offset.left;
				var y = e.clientY - offset.top;	
			
				context.fillStyle = "#0F0";
				context.fillRect(x, y, 6, 6);
				/*
				context.beginPath();
				context.arc(x,y,3,0,2*Math.PI);
				context.fillStyle = 'green';
      			context.fill();
				context.stroke();
				*/	
			}
		});

		$('#canvas-holder').height($(window).height() - $('#title-padding').height() - 45);
		$('#canvas-holder').width($(window).width());

		$('#canvas-holder').height($(window).height() - $('#title-padding').height() - 40);
		$('#canvas-holder').width($(window).width());


	});

	/*
	jQuery(document).ready(function() {

		var drag = true;
		var select = false;

		console.log($('#drag').val());

		$('#drag').click(function() {
			console.log(this.val());
			if(this.val() == 'true') {
				this.val('false');
				drag = false;
			} else {
				this.val('true');
				drag = true;
			}
		});

		$(function() {
		    $('#map').draggable({
		    	//containment: "#map-holder",
		    	scroll: false
		    });
		});

		$('#map').mousemove(function(e) {
			if(drag) {
				var offset = $(this).offset();
				var x = e.clientX - offset.left;
				var y = e.clientY - offset.top;	
				$('.mouse-position').html(x +', '+ y);
			}
		});

		$('#map').click(function(e) {
			if(select) {
				var offset = $(this).offset();
				var x = e.clientX - offset.left;
				var y = e.clientY - offset.top;	
				alert(x +', '+ y);
			}
		});
	});
*/	

</script>