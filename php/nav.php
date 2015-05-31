<?php
/**
 * Created by IntelliJ IDEA.
 * User: Administrator
 * Date: 2015/5/31
 * Time: 12:54
 */

   if (ISLOGIN(session_id())){
       echo'<li><a href=../game>GAME</a></li>';
       echo'<li><a href=../about>ABOUT</a></li>';
       echo'<li><a href=../user>USER</a></li>';
       echo'<li><a href="#" id="logoutBtn">lOG OUT('.$_SESSION['username'].')</a></li>';
   }else {
       echo'<li><a href=../game>GAME</a></li>';
       echo'<li><a href=../about>ABOUT</a></li>';
       echo'<li><a href=../user>USER</a></li>';
       echo'<li><a href="#" id="loginBtn">lOG IN</a></li>';
   }
