<br />
<h3>Map!</h3>
<br />
<h2 class="mouse-position">
0, 0
</h2>
<br />

<div id="map-holder">
	<img id="map" src="<?php echo "assets/uploads/" . $image[0]->name; ?>" />
</div>

<button id="drag" value="true">Drag Mode On</button><button id="select" value="true">Select Mode Off</button>

<!--
<div id="canvas-holder">
	<canvas id="map-holder" height="500" width="800"></canvas>
</div>
-->
<script>

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


	/*
	jQuery(document).ready(function(){
		
		var source ="<?//php echo "assets/uploads/" . $image[0]->name; ?>";
		var canvas = $('#map-holder');
		var rect = canvas[0].getBoundingClientRect();
		var context = canvas[0].getContext('2d');
		var imageObj = new Image();
		var dragging = false;


		imageObj.onload = function() {
			context.drawImage(imageObj, 0, 0, 800, 500);
		};
		imageObj.src = source; 

		canvas.mousemove(function(e){
			var x = (e.pageX - rect.left);
			var y = (e.pageY - rect.top);
			$('.mouse-position').html(x +', '+ y);
			if(dragging) {
				context.clearRect ( 0 , 0 , 800 , 500 );
				context.drawImage(imageObj, x, y);
			}
		});

		imageObj.mousedown(function() {
			dragging = true;
			console.log(dragging);
		});

		imageObj.mouseup(function() {
			dragging = false;
			console.log(dragging);
		});


	})
*/
</script>