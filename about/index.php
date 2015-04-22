<html>
<head>
    <title>About</title>
    <link rel="stylesheet" type="text/css" href="../css/main.css">
</head>
<body>
<div id="ConText">
    <link rel="stylesheet" type="text/css" href="../css/index.css">
    <div id="Info">
        <h1> About </h1>

        <p> Visit GitHub to see our latest work!
            </br>
            <a href="https://github.com/JoeyWNK/TypingGame/"><strong>Github</strong></a></p>
    </div>
</div>
<div id="NavBar">
    <link rel='stylesheet' href='../css/button.css'
    '>
    <script src="../js/bootstrap.min.js"></script>
    <?php
    include("../php/NavigationBar.php");
    new logo("../", "Typing Game", "logo");
    $navbar = new TestNavigationBar("nav");
    $navbar->addTextButton("../game", "Game", "gamebtn");
    $navbar->addTextButton("../user", "Honor", "mebtn");
    $navbar->addTextButton("../about", "About", "aboutbtn");
    $navbar->finish();
    ?>
</div>
<!--end NacBar-->

<div id="Address">
    <div class="footer">
        <p>@ 2015 Razer. All rights reserved.</p>
    </div>
</div>
<!--end Address-->

</html>
<?php
/**
 * Created by IntelliJ IDEA.
 * User: Administrator
 * Date: 2015/4/21
 * Time: 23:47
 */