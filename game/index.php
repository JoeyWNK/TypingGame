<?php
include "../php/SessionMan.php";
?>
<html>
<head>
    <title>Game</title>
    <link rel="stylesheet" type="text/css" href="../css/main.css">
    <script language="JavaScript" src="../js/nav.js"></script>
</head>
<body onload="init()">
<div id="ConText">
    <link rel="stylesheet" type="text/css" href="../css/simple.css">
    <script src="js/easeljs-0.8.0.min.js"></script>
    <script src="js/preloadjs-0.6.0.min.js"></script>
    <script src="js/main.js"></script>
    <canvas id="Game"></canvas>
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
/**
 * Created by IntelliJ IDEA.
 * User: Administrator
 * Date: 2015/4/21
 * Time: 23:48
 */