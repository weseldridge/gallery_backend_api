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
						<form action=<?php echo $this->config->item('full_url') . "/Catetory/add" ?> method="post">
							<td>Num</td>
							<td><input type="text" placeholder="New Catetory"></td>
							<td><button type="submit" class="btn btn-primary">Add</button> </td>
						</form>
					</tr>
				</tbody>
			</table>
		</div>
	</div>
</div>