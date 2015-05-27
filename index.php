<?php
include "SessionMan.php"; 
?>
<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	<meta name="description" content="Typing Game is a online game which can help you improve your typing skills. " />
	<meta name="keywords" content="Typing Game, Typing skills, Razer" />
	<meta name="author" content="Razer" />
	<meta name="Copyright" content="Razer" />
	<meta name="robots" content="index, follow" />
    <link rel="stylesheet" href="css/main.css">
    <script language="JavaScript" src="js/jquery.min.js"></script>
</head>
<body>
<div id="ConText">
    <link rel="stylesheet" href="css/index.css">
    <div>
        <br>
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
    <div id="logo">
        <a href="#">
            <img src="images/logo.png" alt="Typing Game">
        </a>
    </div>
    <ul id="nav">
        <li><a href="game" >game</a></li>
        <li><a href="about">about</a></li>
        <li><a href="user" >user</a></li>
        <li><a href="#" id="loginBtn">log in</a></li>
    </ul>
</div><!--end NacBar-->


<div id="Address">
    <div class="footer">
        <p>@ 2015 Razer. All rights reserved.</p>
    </div>
</div><!--end Address-->

<div id="login_bg" class ="login_bg" style="display:none" ><div>

    <div class="container">
        <div class="signup_forms">
        <div id="signup_forms_container" class="signup_forms_container">
           <form class="signup_form_form" id="sign_form">
                <div class="signup_account" id="signup_account">
                <div class="form_user">
             <span class="form_user">
         <input type="text" name="Username" placeholder="Username" id="signup_username">
             </span>
            </div>
          <div class="form_password">
          <input type="password" name="password" placeholder="Password" id="signup_password">
           </div>
          </div>
         </div>
         <input type="button" id="signin"value="Log in">
         <input type="button" id="signup"value="Register">

           </div>
          </form>
         </div>
        </div>

    <link rel="stylesheet" href="css/login.css">
</div>
<div id="shadow"></div>
<script language="JavaScript">
$("#shadow").hide();
$("#login_bg").hide();
$("#loginBtn").click(function(){
$("#login_bg").show();
$("#shadow").show();
$("#shadow").click(function(){
$("#shadow").hide();
$("#login_bg").hide();
});
});
$("#signup").click(function(){
$.post('login.php',{action:'up',name:$("#signup_username").val(),pass:$("#signup_password").val()});})
$("#signin").click(function(){
$.post('login.php',{action:'in',name:$("#signup_username").val(),pass:$("#signup_password").val()});})
</script>
</body>
</html>
<?php
/**
 * Created by IntelliJ IDEA.
 * User: ives
 * Date: 2015/4/17
 * Time: 17:17
 */
?>
