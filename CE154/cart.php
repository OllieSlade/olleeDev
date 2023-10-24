<!-- 2205667 -->
<?php
$identifier = "--cart";
$page_name = "Your Cart";
require("inc/header.php");
require("inc/database.php");

// deletes an item from someones cart when they click remove
if (isset($_POST["item_details"])) {
    list($id, $item_id) = explode(":", $_POST["item_details"]);

    $sql = "DELETE FROM sessions WHERE id='$id' AND item_id=$item_id";
    $conn -> query($sql);
}

// changes the quantity of item in someones cart when prompted by the user
if (isset($_POST["item_quantity"])) {
    list($id, $item_id) = explode(":", $_POST["item_details2"]);
    $new_quantity = $_POST["item_quantity"];

    $sql = "UPDATE sessions SET quantity=$new_quantity WHERE id='$id' AND item_id = $item_id";
    $check = $conn -> query($sql);
}

// checks if the cart cookie has been set yet
if (isset($_COOKIE[$cookie_name])) {
    $key = $_COOKIE[$cookie_name];
}
else {
    $key = null;
}

// fetching sessions (via the cart cookie) and products
$sessions = mysqli_query($conn, "SELECT * FROM `sessions` WHERE `id`='$key'");
$products = mysqli_query($conn, "SELECT `id`, `name`, `quantity`, `price` FROM `products` WHERE 1");
$subtotal = 0;

// turning products into an associated array so I can reference it in the code
$product_data = array();
while ($all = mysqli_fetch_array($products)) {
    $product_data[$all['id']] = array('name'=>$all['name'], 'quantity'=>$all['quantity'], 'price'=>$all['price']); // assignment
}

mysqli_close($conn);
?>
</div>

<!-- This makes up the placeholder items that show in the cart -->
<section class="cart__section1">
    <div class="container row">
        <h2 class="cart__title">Your Cart</h2>
        <!-- looping through the lines in sessions -->
        <?php foreach ($sessions as $k => $value): ?>
        <div class="cart__item">
            <?php $cost = $value["quantity"] * $product_data[$value["item_id"]]["price"] ?>
            <h3 class="cart__item-title"><?= $product_data[$value["item_id"]]["name"] ?></h3>
            <p class="cart__item-total">£<?= $cost ?></p>
            <p class="cart__item-id">#<?= str_pad($value["item_id"], 6, 0, STR_PAD_LEFT);?></p>
            <div class="cart__item-qty">
                <!-- Form for changing quantity -->
                <form action="", method="post">
                    <!-- This is to pass the value from the cart cookie, as well as the product ID back to the PHP -->
                    <input name="item_details2" type="hidden" value="<?= $value["id"]. ":" . $value["item_id"] ?>">
                    <label for="cart-select" class="cart__item-qty__label">Qty</label>
                    <!-- dropdown to change the quantity -->
                    <select name="item_quantity" class="cart__item-qty__dropdown" onchange="this.form.submit()">
                        <option <?php echo ($value["quantity"] == 1 ? 'selected' : '');?> value="1">1</option>
                        <option <?php echo ($value["quantity"] == 2 ? 'selected' : '');?> value="2">2</option>
                        <option <?php echo ($value["quantity"] == 3 ? 'selected' : '');?> value="3">3</option>
                        <option <?php echo ($value["quantity"] == 4 ? 'selected' : '');?> value="4">4</option>
                        <option <?php echo ($value["quantity"] == 5 ? 'selected' : '');?> value="5">5</option>
                        <option <?php echo ($value["quantity"] == 6 ? 'selected' : '');?> value="6">6</option>
                        <option <?php echo ($value["quantity"] == 7 ? 'selected' : '');?> value="7">7</option>
                        <option <?php echo ($value["quantity"] == 8 ? 'selected' : '');?> value="8">8</option>
                        <option <?php echo ($value["quantity"] == 9 ? 'selected' : '');?> value="9">9</option>
                        <option <?php echo ($value["quantity"] == 10 ? 'selected' : '');?> value="10">10</option>
                    </select>
                </form>
            </div>
            <!-- Form for the remove button -->
            <form action="", method="post">
                <input name="item_details" type="hidden" value="<?= $value["id"]. ":" . $value["item_id"] ?>">
                <button type=submit class="cart__item-remove">Remove</button>
            </form>
            
            <!-- changes depending on product quantity (not quantity in the cart) -->
            <?php if ($product_data[$value["item_id"]]["quantity"] != 0 ): ?>
                <p class="cart__item-stock">In Stock</p>
            <?php else: ?>
                <p class="cart__item-stock">Not In Stock</p>
            <?php endif ?>
        </div>
        <?php $subtotal += $cost;?>
        <?php endforeach ?>
    </div>
</section>

<!-- Subtotal at the bottom of the page, I use flexbox to keep this all in place -->
<section class="cart__section2">
    <div class="container row row--market">
        <div class="cart__subtotal">
            <p class="cart__subtotal-value">Estimated Subtotal: £ <?= $subtotal?></p>
            <p class="cart__subtotal-disclaimer">Shipping and Taxes are calculated at checkout</p>
        </div>
        <button type="submit" class="button button--cart"><p>Checkout</p></button>
    </div>
</section>

<?php
include("inc/footer.php");
?>