<?php
require_once ("config.inc.php");
require_once("assign_2.classes.inc.php");
require_once ("assign2.navbar.inc.php");
$db="users"; //database name

session_start();
$_SESSION["userID"] = null;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    //If a username is posted
    if (isset($_POST['username']) && $_POST['username'] != null) {
        
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
                echo "<script>alert('Incorrect Password, please try again.')</script>"; 
            }
        } else {
            echo "<script>alert('Email not found.')</script>";
        } 
    } else {
        echo "<script>alert('No username submitted.')</script>";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
   <meta charset="utf-8"/>  
    <title>Login Page</title>  
    <link rel="stylesheet" href="css/logincss.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/navbar.css">
    <script src="navbar.js"></script>
</head>
<body>
    <?php buildNav(false, "login"); ?>
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
                <label for="signup"><a href="construction.php"><button>Register</button></a></label><br>
               
        </div>
        </main>
</body>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyB9kMLcamhEVkimas5Qp7PQyl-ZEYpIPHQ"></script>
</html>