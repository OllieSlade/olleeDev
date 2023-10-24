<!-- 2205667 -->
<?php
$page_name = "Home";
// the indentifier is unique to every page and applied to a couple classes in the header, this allows me to change a few details about the overall page
$identifier = "--index";
require('inc/header.php');
// require("inc/database.php");

// // Fetching the database and picking 3 random items to display
// $f_products = mysqli_query($conn, "SELECT `image`, `id` FROM `products` ORDER BY RAND() LIMIT 3");
// $f_item1 = mysqli_fetch_assoc($f_products);
// $f_item2 = mysqli_fetch_assoc($f_products);
// $f_item3 = mysqli_fetch_assoc($f_products);
?>
<!-- this lone closing tag is closing something in the header incase (as is needed in later pages) something has to go in the nav/hero section-->
</div>

<!-- This is for the new releases section -->
<section class="section1">
    <div class="container row">
        <h2 class="section1__title lines">merch feature</h2>
        <div class="albums">
            <a href="item.php?id=<?=$f_item1['id']?>" class="album"><img src="images/products/<?=$f_item1['image']?>"></a>
            <a href="item.php?id=<?=$f_item2['id']?>" class="album"><img src="images/products/<?=$f_item2['image']?>"></a>
            <a href="item.php?id=<?=$f_item3['id']?>" class="album"><img src="images/products/<?=$f_item3['image']?>"></a>
        </div>
    </div>
</section>

<!-- This is a html table for the tour dates -->
<section class="section2">
    <div class="container row">
        <h2 class="section2__title lines">tour dates</h2>
        <table class="tour">
            <tr>
                <th>Date</th>
                <th>City</th>
                <th class="tour__venue">Venue</th>
                <!-- <th class="tour__tickets">Tickets</th> -->
            </tr>
            <tr>
                <td>19 May 23</td>
                <td>Colchester</td>
                <td>Mercury Theatre</td>
                <!-- <td><a>Buy</a></td> -->
            </tr>
            <tr>
                <td>08 July 23</td>
                <td>Chichester</td>
                <td>Festival Theatre</td>
                <!-- <td><a>Buy</a></td> -->
            </tr>
            <tr>
                <td>02 Aug 23</td>
                <td>Brighton</td>
                <td>Brighton Dome</td>
                <!-- <td><a>Buy</a></td> -->
            </tr>
            <tr>
                <td>04 Aug 23</td>
                <td>London</td>
                <td>The O2</td>
                <!-- <td><a>Buy</a></td> -->
            </tr>
            <tr>
                <td>08 Sept 23</td>
                <td>London</td>
                <td>The O2</td>
                <!-- <td><a>Buy</a></td> -->
            </tr>
            <tr>
                <td>23 Sept 23</td>
                <td>Birmingham</td>
                <td>O2 Academy</td>
                <!-- <td><a>Buy</a></td> -->
            </tr>
        </table>
    </div>
</section>

<!-- This is a html form for the mailing list email submission -->
<section class="section3">
    <div class="container row">
        <div class="section3__divider"></div>
        <form class="section3__mailing">
            <h2 class="section3__title">Want to stay up to date?</h2>
            <div class="section3__input-row">
                <input type="email" class="section3__email" placeholder="Email Address">
                <button class="button button--submit" type="submit"><p>Subscribe</p></button>
            </div>
            <h3 class="section3__label">Join our Mailing List!</h3>
        </form>
    </div>
</section>

<?php
include('inc/footer.php');
?>