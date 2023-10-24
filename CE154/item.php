<!-- 2205667 -->
<?php
$identifier = "--item";
$page_name = "Placeholder";
require("inc/header.php");
require("inc/database.php");

$id = $_GET["id"];
// Escaping for security
$id = mysqli_real_escape_string($conn, $id);
$request = mysqli_query($conn, "SELECT * FROM `products` WHERE `id`=$id");
$item = mysqli_fetch_assoc($request);
// padding the id with 0s as it looks better
$padded_id = str_pad($item["id"], 6, 0, STR_PAD_LEFT);

// checking whether or not this page load is caused by the user adding something to cart
if (isset($_POST["item__dropdown"])) {
    $item_quantity = $_POST["item__dropdown"];

    // checking whether or not the cart cookie has been set and setting it if not
    if (!isset($_COOKIE[$cookie_name])) {
        $key = bin2hex(random_bytes(16));
        $check_request = mysqli_query($conn, "SELECT id FROM `sessions` WHERE `id`='$key'");
        if (!mysqli_fetch_assoc($check_request)) {
            setcookie($cookie_name, $key);
        }
    } else {
        // fetching it if it already exists
        $key = $_COOKIE[$cookie_name];
    }
    
    // checking if this item is already in this persons cart and adding their new quantity to their old quantity if so
    $check_request2 = mysqli_query($conn, "SELECT * FROM `sessions` WHERE `id`='$key' AND item_id=$id");
    $check_request2 = mysqli_fetch_assoc($check_request2);
    if ($check_request2) {
        $item_quantity = $item_quantity + $check_request2["quantity"];
    }

    $sql = "REPLACE INTO sessions (id, item_id, quantity) VALUES ('$key', $id, $item_quantity)";
    $check = $conn -> query($sql);
} else {
    $check = null;
}
mysqli_close($conn);
?>

<!-- This causes the alert to appear only when its actually supposed to -->
<?php if ($check === TRUE): ?>
    <div class="cart-alert"><p class="cart-alert__text">Item Added To Cart</p></div>
<?php elseif ($check === FALSE): ?>
    <div class="cart-alert"><p class="cart-alert__text">Failed to Add Item to Cart</p></div>
<?php endif ?>
</div>  

<!-- The item information -->
<section class="item__section1">
    <div class="container row row--item">
        <div class="item__image-container"><img class="item__image" src="images/products/<?= $item["image"] ?>"></div>
        <div class="item__side">
            <div class="item__descriptors">
                <div class="item__left">
                    <h2 class="item__title"><?= $item["name"] ?></h2>
                    <p class="item__id">#<?= $padded_id ?></p>
                </div>
                <?php if ($item["quantity"] != 0 ): ?>
                <p class="item__stock">IN STOCK</p>
                <?php else: ?>
                <p class="item__stock">NOT IN STOCK</p>
                <?php endif ?>
            </div>
            <p class="item__price">£ <?= $item["price"] ?></p>
            <p class="item__description"><?= $item["description"] ?></p>
            <form method="POST" action="">
                <select name="item__dropdown" class="item__dropdown">
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                    <option value="5">5</option>
                    <option value="6">6</option>
                    <option value="7">7</option>
                    <option value="8">8</option>
                    <option value="9">9</option>
                    <option value="10">10</option>
                </select>
                <?php if ($item["quantity"] != 0 ): ?>
                    <button class="button button--item" type="submit"><p>Add to Cart</p></button>
                <?php else: ?>
                    <button class="button button--item" type="submit" disabled><p>Check Back Soon!</p></button>
                <?php endif ?>
            </form>
        
        <div class="item__extra-details">
            <h3>Extra Details</h3>
            <p>Published: <?= $item["date"] ?></p>
            <p>Item Type: <?= $item["type"] ?></p>
            <p>Dimensions: <?= $item["dimensions"] ?></p>
        </div>
    </div>
    </div>
</section>

<?php
include("inc/footer.php");
?>