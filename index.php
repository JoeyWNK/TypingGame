<!DOCTYPE html>
<html>
<link rel="stylesheet" href="css/main.css">
;
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	<meta name="description" content="Typing Game is a online game which can help you improve your typing skills. " />
	<meta name="keywords" content="Typing Game, Typing skills, Razer" />
	<meta name="author" content="Razer" />
	<meta name="Copyright" content="Razer" />
	<meta name="robots" content="index, follow" />
</head>
<body>

<div id="ConText">
    <link rel="stylesheet" href="css/index.css">
    <div>
        <h1> Welcome to Typing Game! </h1>

        <p> Do you want to know how fast your fingers can move?
            </br>Do you want to know how chaotic your brain can mess with your fingers?
            </br>
            We happen to have a typing game for you.
            </br>
            <a href="game"><strong>Try it now!!</strong></a></p>
    </div>
</div><!--end ConText-->

<div id="NavBar">
    <link rel="stylesheet" href="css/button.css">
    <script src="js/bootstrap.min.js"></script>
    <?php
    include("php/NavigationBar.php");
    new logo("#", "Typing Game", "logo");
    $navbar = new TestNavigationBar("nav");
    $navbar->addTextButton("game", "Game", "gamebtn");
    $navbar->addTextButton("user", "Honor", "mebtn");
    $navbar->addTextButton("about", "About", "aboutbtn");
    $navbar->finish();
    ?>
</div><!--end NacBar-->

<div id="Address">
    <div class="footer">
        <p>@ 2015 Razer. All rights reserved.</p>
    </div>
</div><!--end Address-->

</body>
</html>
<?php
/**
 * Created by IntelliJ IDEA.
 * User: nk
 * Date: 2015/4/17
 * Time: 17:17
 */
?>
