<div class="center-content">
	<?php if(isset($successmessage)) { echo '<h3>' . $successmessage . '</h3>'; } ?>
	<?php if(isset($error)) { echo '<h3>' . $error . '</h3>'; } ?>
	<div id="upload">
		<?php 
		echo form_open_multipart('uploadmap');
		echo form_upload('userfile');
		echo form_submit('upload', 'Upload');
		echo form_close();
		?>
	</div>
</div>