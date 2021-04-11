<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <title>COMP3512 Assignment 2</title>
    <meta content="width=device-width, initial-scale=1" name="viewport" />
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,400i,700,800" rel="stylesheet">
    <link rel="stylesheet" href="css/style222.css">
    <script src="js/navbar.js"></script>
</head>

<body>
    <main class="container">
        <!-- Nav bar based off of https://www.w3schools.com/howto/howto_js_topnav_responsive.asp -->
        <header class="topnav">
            <img class="logo" alt="logo" src="images/logo.png">
            <a class="icon"><i class="fa fa-bars"></i></a>
            <div id="navlinks" class="hidden">
                <a href="index.php">Home</a>
                <a href="about.html">About</a>
                <a href="list.php">Companies</a>
                <a class="login" href="portfolio.php">Portfolio</a>
                <a class="login" href="profile.php">Profile</a>
                <a class="login" href="favourites.php">Favourites</a>
                <a class="login" href="">Log Out</a>
            </div>
        </header>
        <div class="box b">
            <div id="magnify"><img id="magImage"></div>
            <section>
                <h2>List Of Companies</h2>
                Filter: <input type="text" class="search" placeholder="Search for a Company"> <button id="clearButton" class="buttons">Clear Filter</button>
                <p id="spacer"></p>
                <section id="companyList"></section>

            </section>
        </div>
    </main>

    <script src="js/asg2.js"></script>
</body>

</html>