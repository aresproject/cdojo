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
		<?php
			include_once("views/partials/header.php");
		?>
		<h2>Hello, <?= $_SESSION["user"]["username"] ?></h2>

		<h3>Your Wish List</h3>
		<h4><a href="controllers/wishlist.php?q=create">Add Wish</a></h4>
		<h4 style="color: red;"><?php echo isset($_SESSION['response']['message']) ? $_SESSION['response']['message'] : ""; ?></h4>
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
				<?= $view_data["items"] ?>
			</tbody>
		</table>

		<h3>Other's Wish List</h3>
		<table id="others_wish_list">
			<thead>
				<tr>
					<th>Item</th>
					<th>Added by</th>
					<th>Date Added</th>
					<th>Action</th>
				</tr>
			</thead>
			<tbody>
				<?= $view_data["other_items"] ?>
			</tbody>
		</table>
	</div>
</body>
</html>
