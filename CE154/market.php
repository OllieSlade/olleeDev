<!-- 2205667 -->
<?php
$identifier = "--market";
$page_name = "Market";
require("inc/header.php");
require("inc/database.php");

// grabs all products, and then 2 random products for the hero at the top of the page
$products = mysqli_query($conn, "SELECT * FROM `products`");
$f_products = mysqli_query($conn, "SELECT `image`, `id` FROM `products` ORDER BY RAND() LIMIT 2");
$f_item1 = mysqli_fetch_assoc($f_products);
$f_item2 = mysqli_fetch_assoc($f_products);
mysqli_close($conn);
?>
<div class="hero__images container">
    <div class="hero__image-container">
        <a href="item.php?id=<?= $f_item1["id"] ?>" class="hero__image-a"><img class="hero__image" src="images/products/<?= $f_item1["image"] ?>"></a>

    </div>
    <div class="hero__image-container">
        <a href="item.php?id=<?= $f_item2["id"] ?>" class="hero__image-b"><img class="hero__image" src="images/products/<?= $f_item2["image"] ?>"></a>
    </div>
</div>
</div>

<!-- The two larger images, this will be a gallery in the final product -->

<!-- Example products -->
<section class="market__section1 container">
    <!-- iterating through all the items in the database -->
    <?php foreach ($products as $key => $value): ?>
    <div class="item">
        <div class="market__item-container">
            <a href="item.php?id=<?= $value["id"] ?>"><img src="images/products/<?= $value["image"] ?>" class="market__item-image"></a>
        </div>
        <div class="market__item-desc">
            <p class="market__item-title"><?= $value["name"] ?></p>
            <p class="market__item-type"><?= $value["type"] ?></p>
            <p class="market__item-date"><?= $value["date"] ?></p>
            <p class="market__item-price">£<?= $value["price"] ?></p>
        </div>
    </div>
    <?php endforeach ?>
</section>

<?php
include("inc/footer.php");
?>