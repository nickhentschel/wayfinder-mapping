<h3 id="map-title"><?php echo $image[0]->name . " - " . $image[0]->description; ?></h3>
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
		    	scroll: false
		    });
		});

		canvas.mousemove(function(e) {
			var offset = $(this).offset();
			var x = e.clientX - offset.left;
			var y = e.clientY - offset.top;	
			$('.mouse-position').html(x +', '+ y);
		});

		canvas.click(function() {

		});

		$('#canvas-holder').height($(window).height() - 60);
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