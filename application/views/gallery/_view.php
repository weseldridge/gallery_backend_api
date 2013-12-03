<div class="col-sm-9">
<table class="table">
<thead>
	<tr>
		<th>Title</th>
		<th>Caption</th>
		<th>Price</th>
		<th>Sold</th>
	</tr>	
</thead>
<tbody>
<?php foreach($items as $item): ?>
	<tr>
		<td><?php echo $item['title']; ?></td>
		<td><?php echo $item['caption']; ?></td>
		<td><?php echo $item['price']; ?></td>
		<td><?php echo $item['is_sold']; ?></td>
	</tr>
<?php endforeach; ?>
</tbody>
</table>
<div>