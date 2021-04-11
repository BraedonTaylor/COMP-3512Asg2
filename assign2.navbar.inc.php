<?php
function buildNav($page, $login = false){
    ?>
    <!-- Nav bar based off of https://www.w3schools.com/howto/howto_js_topnav_responsive.asp -->
    <header class="topnav">
        <img class="logo" alt="logo" src="images/logo.png">
        <a class="icon"><i class="fa fa-bars"></i></a>
        <div id="navlinks" class="hidden">
            <a class="<?php if ($page === "index"){ ?> active <?php } ?>" href="index.php">Home</a>
            <a href="about.html">About</a>
            <a href="list.php">Companies</a>
            <?php if ($login === true) { ?>
            <a class="" href="portfolio.php">Portfolio</a>
            <a class="<?php if ($page === "profile"){ ?> active <?php } ?>" href="profile.php">Profile</a>
            <a class="" href="favorites.php">Favorites</a>
            <a class="" href="">Log Out</a>
            <?php } ?>
        </div>
    </header>
<?php } ?>