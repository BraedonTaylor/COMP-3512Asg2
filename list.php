<?php
include_once("assign2.navbar.inc.php");
session_start();
if (isset($_SESSION["userID"]) && $_SESSION["userID"] != null) {
    $login = true;
} else $login = false;
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <title>List of Companies</title>
    <meta content="width=device-width, initial-scale=1" name="viewport" />
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,400i,700,800" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="css/style222.css">
    <link rel="stylesheet" href="css/navbar.css">
    <script src="js/navbar.js"></script>
</head>

<body>
    <?php buildNav($login, "list"); ?>
    <main class="container">
        <div class="box b">
            <div id="magnify"><img id="magImage"></div>
            <section>
                <h1>List Of Companies</h1>
                Filter: <input type="text" class="search" placeholder="Search for a Company"> <button id="clearButton" class="buttons">Clear Filter</button>
                <p id="spacer"></p>
                <section id="companyList"></section>
            </section>
        </div>
    </main>

    <script src="js/asg2.js"></script>
</body>

</html>