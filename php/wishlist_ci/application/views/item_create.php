
<h1>Create item to add in wishlist</h1>

<h4><?php echo validation_errors(); ?></h4>
<?php
    if ($this->session->flashdata('error')) {
        echo "<h3> {$this->session->flashdata('error')} </h3>";
    }
?>

<?php echo form_open('/wishlist/create'); ?>
    <fieldset>
        <legend>Create and Add Item to Wishlist</legend>
        <label for="item_name">Item Name</label>
        <input type="text" name="item_name" >
        <input type="submit" value="create">
    </fieldset>
</form>