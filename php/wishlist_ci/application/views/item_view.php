<h1><?= $title; ?></h1>

<h2><?= $item_name; ?></h2>

<h3>Users who have this product in their wishlist</h3>

<ul>
    <?php foreach($users as $person): ?>
        <li><?= $person['name']; ?></li>
    <?php endforeach; ?>
</ul>