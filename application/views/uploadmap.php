<div class="center-content">
	<?php echo '<h3>' . $message . '</h3>'; ?>
	<div id="upload">
		<?php 
		echo form_open_multipart('uploadmap');
		echo form_upload('userfile');
		echo form_textarea('description');
		echo form_submit('upload', 'Upload');
		echo form_close();		
		?>
	</div>