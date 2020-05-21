<div>
    <h4>List Of Users</h4>
    <?php foreach ($users as $person):?>
    <ul>
        <li><?php echo "Name: {$person['name']}";?></li>
        <li><?php echo "Username: {$person['username']}";?></li>
        <li><?php echo "Hired At: {$person['hired_at']}";?></li>
    </ul>
    <?php endforeach;?>
</div>
<div>
    <h4>List Of Items</h4>
    <?php foreach ($items as $rec_item):?>
    <ul>
        <li><?php echo "Product ID: {$rec_item['id']}";?></li>
        <li><?php echo "Product Name: {$rec_item['item_name']}";?></li>
        <li><?php echo "Created By: {$rec_item['user_id']}";?></li>
    </ul>
    <?php endforeach;?>
</div>

<div>
    <h4>Users Wishlists</h4>
    <?php foreach ($wishlist as $rec_wishlist):?>
    <ul>
        <li><?php echo "Record #: {$rec_wishlist['id']}";?></li>
        <li><?php echo "Item: {$rec_wishlist['item_id']}";?></li>
        <li><?php echo "Wished By User: {$rec_wishlist['added_by_user_id']}";?></li>
        <li><?php echo "Item Created By User: {$rec_wishlist['user_id']}";?></li>
        <li><?php echo "Wished At: {$rec_wishlist['created_at']}";?></li>
    </ul>
    <?php endforeach;?>
</div>