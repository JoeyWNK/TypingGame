<?php
/**
 * Created by IntelliJ IDEA.
 * User: ives
 * Date: 2015/5/25
 * Time: 23:12
 */
session_start();
include"DataMan.php";
//匹配sessionid，若成功，返回uid

function USERLOGIN($username, $password){

    //判断username和password是否匹配

    $uid = GETLOGIN($username, $password);

    if ($uid){

        //给查询成功的uid匹配相应的sessionid

        REGSESSION(session_id(),$uid);

        return $uid;
    }
    return null;
}


function ISLOGIN($sessionid){

    //判断是否已经登陆

    return CHECKSESSION($sessionid);

}

function GETUID(){

    //向上提供uid

    return ISLOGIN(session_id());

}