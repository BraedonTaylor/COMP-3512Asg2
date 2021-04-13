<?php
require_once ("config.inc.php");
require_once("assign_2.classes.inc.php");
require_once ("assign2.navbar.inc.php");
$db="users"; //database name

//Set session start and set user ID to null
session_start();
$_SESSION["userID"] = null;

//If user submits the form
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    //If a username is posted
    if (isset($_POST['username'])) {
        
        //Connect to database with login creds
        $conn = DatabaseHelper::createConnection(array(DBCONNSTRING, DBUSER, DBPASS));
        $loginGateway = new Login($conn);
        
        //Verify login function inside login class returns database info stored
        $result = $loginGateway->verifyLogin($_POST['username']);

        //If statement that takes in the result fetched from the database with verifylogin function
        if (is_array($result)) {   
            
            // Compare the posted password with the password hash fetched from db.
            if(password_verify($_POST['password'], $result['password'])){
                
                // If true, update session id with the username and redirect to home
                $value = $result['id'];
                $_SESSION['userID'] = $value;
                header("Location: index.php");  
                
                // If false, display error message
        } else {
            echo "<span>Incorrect Password, please try again.</span>"; 
        }
        }else{
            echo "<span>No email found.</span>";
        }
        }else{
        echo "<span>No username</span>";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
   <meta charset="utf-8"/>  
    <title>Login Page</title>  
    <link rel="stylesheet" href="css/logincss.css">
    <link rel="stylesheet" href="css/navbar.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" >
    <script src="navbar.js"></script>
</head>
<body>
    <?php buildNav(false, "login"); ?>
    <main class="grid-container">
        <div id="info">
            <form action = "" method = "post">
                <h1>Login</h1>
                <div id = "align"> 
                <label>Email:</label><input type = "text" name = "username" placeholder="Enter Email"><br>
                <label>Password:</label><input type = "password" name = "password" placeholder="Enter Password"><br>
                </div>
                <!-- The error message should appear here -->
                <input type = "submit" value = "Login" id = "hover"/>
            </form>
                <hr>
                <h3>No Account?</h3>
                <label for="signup"><a href="construction.php"><button class = "button">Register</button></a></label><br> 
        </div>
        </main>
    </div>
</body>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyB9kMLcamhEVkimas5Qp7PQyl-ZEYpIPHQ"></script>
</html>