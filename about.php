<?php
    require_once ("assign2.navbar.inc.php");
    session_start();
    $login = false;
    if (isset($_SESSION["userID"]) && $_SESSION["userID"] != null) $login = true;
?>
<!DOCTYPE html>
<html>
<head>
  
   <meta charset="utf-8"/>  
    <title>About Page</title>  
    <script src="js/navbar.js"></script>
    <link rel="stylesheet" href="css/navbar.css">
    <link rel="stylesheet" href="css/aboutcss.css">
</head>
<body>
    <?php buildNav($login, "about"); ?>
    <div class="grid-container">
        <div class="about-container">
            <h1>About Page</h1>
            <h2>COMP-3512 Web 2 (Winter 2021)</h2>
            <h2>Mount Royal University</h2>
            <h2>Randy Connolly</h2>
            <h2>Tech Used: Placeholder</h2>
            <p><a href = "https://github.com/BraedonTaylor/COMP-3512Asg2"><button class="team">Team Github</button></a></p>
            <label for="Go Back"><a href="index.php"><button id="Go Back" class="back">Go Back</button></a></label><br><br>
          </div>
    
          <div class="row">
            <div class="column">
              <div class="profile">
                <img src="images/braeden.png" alt="Braeden">
                <div class="container">
                  <h2>Braedon Taylor</h2>
                  <p>btayl801@mtroyal.ca</p>
                  <p><a href = "https://github.com/BraedonTaylor"><button class="button">Find me on Github</button></a></p>
                </div>
              </div>
            </div>
          
            <div class="column">
              <div class="profile">
                <img src="images/jake.jpg" alt="Jake">
                <div class="container">
                  <h2>Jake Gill</h2>
                  <p>jgill204@mtroyal.ca</p>
                  <p><a href = "https://github.com/jacobcg"><button class="button">Find me on Github</button></a></p>
                </div>
              </div>
            </div>
            
            <div class="column">
              <div class="profile">
                <img src="images/juliana.jpg" alt="Juliana">
                <div class="container">
                  <h2>Julianna Gagliardi</h2>
                  <p>jgagl500@mtroyal.ca</p>
                  <p><a href = "https://github.com/JuliannaG8"><button class="button">Find me on Github</button></a></p>
                </div>
              </div>
            </div>
          
            <div class="column">
                <div class="profile">
                  <img src="images/justin.jpg" alt="Justin">
                  <div class="container">
                    <h2>Justin Gajer</h2>
                    <p>jgaje992@mtroyal.ca</p>
                    <p><a href = "https://github.com/justingajer"><button class="button">Find me on Github</button></a></p>
                  </div>
                </div>
              </div>

              <div class="column">
                <div class="profile">
                  <img src="images/salim.jpg" alt="Salim">
                  <div class="container">
                    <h2>Salim Manji</h2>
                    <p>smanj353@mtroyal.ca</p>
                    <p><a href = "https://github.com/salimmanji"><button class="button">Find me on Github</button></a></p>
                  </div>
                </div>
              </div>
        </div>
        </body>
</html>