<h3>Upload a picture!</h3>
<hr/>

<div style="color:red">
	<?php echo validation_errors(); ?>
	<?php if (isset($error)) {
		print $error;
	} ?>
</div>
<?php echo form_open_multipart('slider/file_data'); ?>

<div class="form-group">
	<label for="slider_title">Picture Name*:</label>
	<input type="text" class="form-control" name="slider_title" value="<?= set_value('slider_title'); ?>"
		   id="slider_title">
</div>
<div class="form-group">
	<label for="slider_type">Duration:*</label>
	<textarea name="slider_type" class="form-control" id="slider_typt"><?= set_value('slider_type'); ?></textarea>
</div>
<div class="form-group">
	<label for="slider_size">Select Image*:</label>
	<input type="file" name="slider_size" class="form-control" id="slider_size">
</div>
<a href="<?= base_url(); ?>" class="btn btn-warning">Back</a>
<button type="submit" class="btn btn-success">Submit</button>
</form>
