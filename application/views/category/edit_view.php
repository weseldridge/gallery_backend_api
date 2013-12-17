<div class="col-sm-12">
	<div class="row">
		<form class="form-horizontal" action="<?php echo $this->config->item('full_url') . "/category/edit_category/" . $category['id']; ?>" method="post">
			<fieldset>
				<legend>Edit Category</legend>
				<div class="form-group">
					<label for="name" class="col-sm-3 control-label">Category</label>
					<div class="col-sm-4">
						<input type="text" class="form-control" name="name" id="name" value=<?php echo $category['name']; ?>>
					</div>
				</div>
			</fieldset>
			<div class="col-sm-8">
				<button type="submit" class="btn btn-primary pull-right">Update Item</button>
			</div>
		</form>

	</div>
</div>