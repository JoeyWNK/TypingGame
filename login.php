<?php

include "php/SessionMan.php";
if (isset($_POST['action'])){
  if ($_POST['action'] === 'up'){
    if (!USERCHECK($_POST['name'])){
      if (USERREGISTER($_POST['name'],$_POST['pass'])){
        die ('{"re":true,"action":"up"}');
      }
    }
  } else if ($_POST['action'] === 'in'){
    $uid = USERLOGIN($_POST['name'],$_POST['pass']);
    if (isset($uid)){
      die ('{"re":true,"action":"in"}');
    }
  } else if ($_POST['action'] === 'out'){
    if ($uid=ISLOGIN(session_id()))
    if (LOGOUT($uid)){
      unset($_SESSION['username']);
      die ('{"re":true,"action":"out"}');
    }
  }
  die ('{"re":false}');
}
