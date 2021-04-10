
<?php
require_once ("login.inc.php");
$host="localhost";
$user="root";  
$password="";
$db="users"; //database name

session_start();
$_SESSION["userID"] = NULL;

if (isset($_POST["submit"])) {
    
    //declaration statements
    $username = $_POST["username"];
    $password = $_POST["password"];

    $sql = "SELECT id, email, password FROM users WHERE username = ? LIMIT 1"; //SQL string
    $statement->bindValue(1, $_POST["username"]);
    $statement = $find->query($sql);
    $credentials = $statement->fetch(PDO::FETCH_ASSOC); //PDO::FETCH returns the array from table

    //if true
    if ($credentials) { 
        $hash = $credentials['password'];

        // Compare the posted password with the password hash fetched from db.
        if (password_verify($password, $hash)) {
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
                <input type = "submit" value = " Login "/>
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