<?php
function buildNav($login, $page = null){ //login is true/false based on whether or not $_SESSION["userID"] is set and not null
    //$page tells the function which <a> to add the "active" class to; both are passed in by the individual pages
    //$page is set to null if the page isn't on the nav menu
    ?>
    <!-- Nav bar based off of https://www.w3schools.com/howto/howto_js_topnav_responsive.asp -->
    <header class="topnav">
        <img class="logo" alt="logo" src="images/logo.png">
        <a class="icon"><i class="fa fa-bars"></i></a>
        <div id="navlinks" class="hidden">
            <a class="<?php if ($page === "index"){ ?> active <?php } ?>" href="index.php">Home</a>
            <a class="<?php if ($page === "about"){ ?> active <?php } ?>" href="about.php">About</a>
            <a class="<?php if ($page === "list"){ ?> active <?php } ?>" href="list.php">Companies</a>
            <?php if ($login === true) { ?> <!--if user is not logged in, does not display the following links-->
            <a class="<?php if ($page === "portfolio"){ ?> active <?php } ?>" href="portfolio.php">Portfolio</a>
            <a class="<?php if ($page === "profile"){ ?> active <?php } ?>" href="profile.php">Profile</a>
            <a class="<?php if ($page === "favorites"){ ?> active <?php } ?>" href="favorites.php">Favorites</a>
            <a class="" href="logout.php">Log Out</a>
            <?php } else { ?> <a class="<?php if ($page === "login"){ ?> active <?php } ?>" href="login.php">Log In</a> <?php } ?>
        </div>
    </header>
<?php } ?>