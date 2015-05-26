<?php
/**
 * Created by IntelliJ IDEA.
 * User: ives
 * Date: 2015/5/25
 * Time: 23:12
 */
session_start();


function USERLOGIN($username, $password){
    //匹配sessionid，若成功，返回uid
    $uid = GETLOGIN($username, $password);//判断username和password是否匹配
    if ($uid){
        REGSESSION(session_id(),$uid);//给查询成功的uid匹配相应的sessionid
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