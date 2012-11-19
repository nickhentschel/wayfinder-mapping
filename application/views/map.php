<br />
<h3>Map!</h3>
<br />
<h2 class="mouse-position">
0, 0
</h2>
<br />

<img src="<?php echo "assets/uploads/" . $image[0]->name; ?>" />
<!-- <canvas id="map-holder" height="500" width="800" style="border: 4px solid #000"></canvas> -->
<script>
	/*var canvas = $('#map-holder');
	var context = canvas[0].getContext('2d');
	var imageObj = new Image();

	imageObj.onload = function() {
		context.drawImage(imageObj, 0, 0);
	};
	imageObj.src = "//<?php echo "assets/uploads/" . $image[0]->name; ?>";*/
</script>

<script>
jQuery(document).ready(function(){
	$(document).mousemove(function(e){
		$('.mouse-position').html(e.pageX +', '+ e.pageY);
	}); 
})
</script>