<div class="center-content">	
	<h3>Load a Pre-Configured Map</h3>
	<div id="upload">
		<?php echo form_open('selectmap'); ?>
		<select name="image_id">		
			<?php 
				foreach($results as $row) {
					echo "<option value=". $row->id .">" . $row->name . " - " . $row->description . "</option>";
				}
			?>			
		</select>
		<?php echo form_submit('submit', 'Submit'); ?>
	</div>
	<a href="/wayfinder-mapping">&larr; Go back</a>
</div>