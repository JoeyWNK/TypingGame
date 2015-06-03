<?php
include "../php/SessionMan.php";
?>
<!DOCTYPE html>
<html>
<head>
    <title>Game</title>
    <link rel="stylesheet" type="text/css" href="../css/main.css">
    <script language="JavaScript" src="../js/nav.js"></script>
</head>

<body onload="init()">
<meta charset="UTF-8">
<div id="ConText">
    <link rel="stylesheet" type="text/css" href="../css/simple.css">
    <script src="js/easeljs-0.8.0.min.js"></script>
    <script src="js/preloadjs-0.6.0.min.js"></script>
    <script src="js/main.js"></script>
    <script src="../js/jquery.min.js"></script>
    <script src="js/PageSession.js"></script>
    <script src="js/lib/Language.js"></script>
    <canvas id="Game" width="800px" height="600px" style="background-color: black"></canvas>
</div>

<div id="NavBar">
    <div id="logo">
        <a href="../">
            <img src="../images/logo.png" alt="Typing Game">
        </a>
    </div>
    <ul id="nav">
        <?php
        include "../php/nav.php";
        ?>
    </ul>
</div><!--end NacBar-->

<div id="Address">
    <div class="footer">
        <p>@ 2015 Razer. All rights reserved.</p>
    </div>
</div>
<!--end Address-->
</body>
</html>

<?php
