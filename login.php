<?php
require_once ("config.inc.php");
require_once("assign_2.classes.inc.php");
$db="users"; //database name

session_start();
$_SESSION["userID"] = null;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    //If a username is posted
    if (isset($_POST['username'])) {
        
        $conn = DatabaseHelper::createConnection(array(DBCONNSTRING, DBUSER, DBPASS));
        $loginGateway = new Login($conn);
        
        $result = $loginGateway->verifyLogin($_POST['username']);

        if (is_array($result)) {   
            
            if(password_verify($_POST['password'], $result['password'])){
                // Compare the posted password with the password hash fetched from db.
                $value = $result['id'];
                $_SESSION['userID'] = $value;
                header("Location: index.php");  // For Braeden, on home page check to see if user is logged in. 0 logged out 1 logged in
        } else {
            echo "Incorrect Password, please try again.";
    }
        }
        else {
            echo 'No email found.';
        }
    } else {
        echo "No username";
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
            </form>
                <hr>
                <h3>No Account?</h3>
                <label for="signup"><a href="construction.html"><button>Register</button></a></label><br>
               
        </div>
        </main>
    </div>
</body>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyB9kMLcamhEVkimas5Qp7PQyl-ZEYpIPHQ"></script>
</html>