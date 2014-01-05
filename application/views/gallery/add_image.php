<div class="col-sm-9">
	<form class="form-horizontal" action=<?php echo $this->config->item('full_url') . "/gallery_item/add_new_gallery_item" ?> method="post">
		<fieldset>
			<legend>Add an Image</legend>

			<div class="form-group">
				<label for="image" class="col-sm-3 control-label">Add Image</label>
				<div class="col-sm-4">
					<input type="text"  class="form-control" name="url" id="image">
				</div>
			</div>
		</fieldset>
		<div>
			<input type="submit" value="Add Image">
		</div>
	</form>
</div>