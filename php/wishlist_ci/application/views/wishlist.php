<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
	<style>
		table td, table th{
			min-width: 120px;
			text-align: left;
		}
	</style>
</head>
<body>
	<div id="wrapper">
		
		
		<h2>Hello, <?php echo isset($_SESSION['logged_name']) ? $_SESSION['logged_name'] : ""; ?></h2>
		

		<h3>Your Wish List</h3>
		<h4><a href="controllers/wishlist.php?q=create">Add Wish</a></h4>
		<h4 style="color: red;"><?php //echo isset($_SESSION['response']['message']) ? $_SESSION['response']['message'] : ""; ?></h4>
		<table id="my_wish_list">
			<thead>
				<tr>
					<th>Item</th>
					<th>Added by</th>
					<th>Date Added</th>
					<th>Action</th>
				</tr>
			</thead>
			<tbody>
			<?php foreach($logged_user_wishlist as $items): ?>
				<tr>
					<td><a href='<?= "/wishlist/item_view/{$items['item_id']}/{$items['item_name']}" ?>'><?= $items['item_name'] ?></a></td>
					<td><?= $items['adder_name'] ?></td>
					<td><?= date('Y-m-d', strtotime($items['created_at'])) ?> </td>
					
					<?php $option = $items['user_id'] == $_SESSION['logged_userid'] ? "Delete" : "Remove" ; ?>
					
					<td><a href='<?= "/wishlist/delete/" . $items['item_id'] ;  ?>' >
						<?= $option; ?>
					</a></td>
				</tr>
			<?php endforeach; ?>
			</tbody>
		</table>

		<h3>Other's Wish List</h3>
		<table id="//others_wish_list">
			<thead>
				<tr>
					<th>Item</th>
					<th>Added by</th>
					<th>Date Added</th>
					<th>Action</th>
				</tr>
			</thead>
			<tbody>
			<?php foreach($other_user_wishlist as $items): ?>
				<tr>
					<td><a href='<?= "/wishlist/item_view/{$items['item_id']}/{$items['item_name']}"   ?>'><?= $items['item_name'] ?></a></td>
					<td><?= $items['adder_name'] ?></td>
					<td><?= date('Y-m-d', strtotime($items['created_at'])) ?> </td>
					<td><a href='<?= "/wishlist/add/" . $items['item_id'] ;  ?>' >Add</a></td>
				</tr>
				<?php endforeach; ?>
			</tbody>
		</table>
	</div>
</body>
</html>
