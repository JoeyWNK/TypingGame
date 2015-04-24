<html>
<head>
  <title>User Profile</title>
  <link rel="stylesheet" type="text/css" href="../css/main.css">
</head>
<body>
<div id="ConText">
  <link rel="stylesheet" type="text/css" href="../css/user.css">
  <div id="UserInfo">
    <lu>
      <li><strong>Name:</strong></li>
      <li><strong>Time:</strong></li>
      <li><strong>Times:</strong></li>
      <li><strong>Words:</strong></li>
      <li><strong>Errors:</strong></li>
    </lu>
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
</div><!--end NacBar-->

<div id="Address">
  <div class="footer">
    <p>@ 2015 Razer. All rights reserved.</p>
  </div>
</div>
<!--end Address-->

</html>
