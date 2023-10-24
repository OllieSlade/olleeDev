<!-- 2205667 -->
<?php
$identifier = "--socials";
$page_name = "Social Links";
require("inc/header.php");
?>
</div>

<div class="socials__section1">
    <div class="container row">
        <h2 class="socials__title">listen to us</h2>
        <div class="socials__buttongroup">
            <!-- I split the group of 4 buttons into 2 groups of 2 buttons and arranged them ontop of each other via flexbox. Otherwise you'd often
            get 3 and then 1 etc, which doesnt look good. -->
            <div class="buttongroup__row">
                <button class="button button--socials"><p>Spotify</p></button>
                <button class="button button--socials"><p>Apple Music</p></button>
            </div>
            <div class="buttongroup__row">
                <button class="button button--socials"><p>Amazon Music</p></button>
                <button class="button button--socials"><p>YouTube</p></button>
            </div>
        </div>
        <h2 class="socials__title socials__title--2">follow us</h2>
        <div class="socials__buttongroup">
            <div class="buttongroup__row">
                <button class="button button--socials"><p>Twitter</p></button>
                <button class="button button--socials"><p>Instagram</p></button>
            </div>
            <div class="buttongroup__row">
                <button class="button button--socials"><p>TikTok</p></button>
                <button class="button button--socials"><p>Discord</p></button>
            </div>
        </div>
    </div>
</div>

<!-- same section you've seen multiple times before -->
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
include("inc/footer.php");
?>