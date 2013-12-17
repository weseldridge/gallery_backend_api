<div class="col-sm-9">
	<?php echo validation_errors(); ?>
	<div class="row">
		<div class="col-sm-12">
			<table class="table">
				<thead>
					<tr>
						<th>id</th>
						<th>Category</th>
						<th></th>
					</tr>
				</thead>
				<tbody>
					<tr>
						<form action=<?php echo $this->config->item('full_url') . "/category/add" ?> method="post">
							<td>#</td>
							<td><input type="text" name='name' placeholder="New Catetory"></td>
							<td><button type="submit" class="btn btn-primary">Add</button> </td>
						</form>
					</tr>
					<?php foreach($categories as $category): ?>
						<tr>
							<td><?php echo $category['id']; ?> </td>
							<td><a href=<?php echo $this->config->item('full_url') . '/category/edit/' . $category['id']; ?>> <?php echo $category['name']; ?> </a></td>
							<td></td>
						</tr>
					<?php endforeach; ?>
				</tbody>
			</table>
		</div>
	</div>
</div>