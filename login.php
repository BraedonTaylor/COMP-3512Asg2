<?php
require_once ("login.inc.php");
$host="localhost";
$user="root";  
$password="";
$db="users"; //database name

session_start();
$_SESSION["userID"] = NULL;

if (isset($_POST["submit"])) {
    
    if (isset($_SESSION["userID"]) && $_SESSION["userID"] != null) {
        $user = $_SESSION["userID"]; //checking to see if user is logged in; 
        $result = $portfolioGateway->getPortfolio($_SESSION["userID"]);

    //declaration statements

    $statement->bindValue(1, $_POST["username"]);
    $loginGateway = new Login($conn);
    $result = $loginGateway->verifyLogin($username);
    //if true
    
    if(password_verify($_POST['password'], $row['password'])){

        // Compare the posted password with the password hash fetched from db.
            $value = $row['id'];
            $_SESSION['userID'] = $value;
            header("index.php");  // For Braeden, on home page check to see if user is logged in. 0 logged out 1 logged in
        } else {
            echo "Incorrect Password, please try again.";
        }
    } else {
        echo 'No email found.';
    }
}



?>

<!DOCTYPE html>
<html>
<head>
   <meta charset="utf-8"/>  
    <title>Login Page</title>  
    <link rel="stylesheet" href="css/logincss.css">   
    <script src="navbar.js"></script>
</head>
<body>
    <div class ="main-container">
    <header class="topnav">
        <img class="logo" alt="logo" src="images/logo.png">
        <a class="icon"><i class="fa fa-bars"></i></a>
        <div id="navlinks" class="hidden">
            <a href="index.php">Home</a>
            <a href="about.html">About</a>
            <a href="list.php">Companies</a>
            <a class="login" href="portfolio.php">Portfolio</a>
            <a class="login" href="profile.php">Profile</a>
            <a class="login" href="favorites.php">Favorites</a>
        </div>
    </header>
    
    <main class="grid-container">
        <div id="info">
            <form action = "" method = "post">
                <h1>Login</h1>
                <label>Email:</label><input type = "text" name = "username" placeholder="enter email"><br><br>
                <label>Password:</label><input type = "password" name = "password" placeholder="enter password"><br>
                <input type = "submit" value = "Login"/>
                <hr>
                <h3>No Account?</h3>
                <label for="signup"><a href="construction.html"><button>Register</button></a></label><br>
            </form>   
        </div>
        </main>
    </div>
</body>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyB9kMLcamhEVkimas5Qp7PQyl-ZEYpIPHQ"></script>
</html>