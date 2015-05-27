<?php
/**
 * Created by IntelliJ IDEA.
 * User: ives
 * Date: 2015/5/26
 * Time: 21:41
 */
//检查username是否存在，存在返回true，不存在返回false
function USERCHECK($username){
$mysqli =new mysqli("localhost","Razer","razer","H120008_WEB");

$result = $mysqli->query("SELECT * From `User` WHERE name='".$username."';");

    if($result) {
        $row = $result ->fetch_array(MYSQLI_NUM);
        if ($row > 0) {
            return true;
        }
    }return false;
};

//注册用户，成功返回true，不成功返回false
function USERREGISTER ($username,$password){
$mysqli =new mysqli("localhost","Razer","razer","H120008_WEB");
   $result = $mysqli->query("INSERT INTO `User` (name,password) values ('".$username."','".$password."');");
    

    if ($result){
        return true;
    }return false;
};

//向数据库检查用户名密码是否匹配，匹配返回uid，不匹配返回null
function GETLOGIN ($username,$password){
$mysqli =new mysqli("localhost","Razer","razer","H120008_WEB");
$result = $mysqli->query("SELECT uid from `User` WHERE name='".$username."'and password='".$password."'");
    

    if($result){
        $row = $result->fetch_array(MYSQLI_ASSOC);
        if ($row > 0){
            return $row["uid"];
        }return NULL;
    }
};

//向sessionid注册一个uid，boolean
function REGSESSION($sessionid,$uid){
$mysqli =new mysqli("localhost","Razer","razer","H120008_WEB");echo "2";
    if($sessionid){echo "3";
       $result = $mysqli ->query("INSERT INTO `UserSession` (uid,sid) values ('".$uid."','".$sessionid."');");
        return true;
    }return false;
};

//返回对应uid的字符串
function GETDATA($uid){
$mysqli =new mysqli("localhost","Razer","razer","H120008_WEB");
   $result = $mysqli->query("SELECT total, error, words FROM `User` WHERE uid ='$uid';");
    
    if ($result){
        $row = mysqli_fetch_array($result);
        if ($row > 0){
            echo "('Total':".$row['total'].",'Error':".$row['error'].",'Words':".$row['words'].")";
        }
    }
};

//查询sessionid对应的uid， 返回uid
function CHECKSESSION($sessionid){
$mysqli =new mysqli("localhost","Razer","razer","H120008_WEB");
    $result = $mysqli->query("SELECT uid FROM UserSession WHERE sessionid='".$sessionid."';");
    

    if($result){
        $row = mysqli_fetch_array($result);
        if ($row > 0 ){
            return uid;
        }
    }
};

//删除sessionid, uid
function LOGOUT($uid){
$mysqli =new mysqli("localhost","Razer","razer","H120008_WEB");
    $result = $mysqli->query("DELETE sessionid, uid FROM UserSession WHERE uid='".$uid."'");
        if($result){
        return true;
    }return false;

};

//返回对应序号的文章
function GETGAMETEXT($textid){
$mysqli =new mysqli("localhost","Razer","razer","H120008_WEB");
    $result = $mysqli->query("SELECT text FROM Text WHERE tid='".$textid."';");
    
    if($result){
        return text;
    }
};

//记录当前游戏结果，boolean
function SETDATA($uid,$error,$words,$time){
$mysqli =new mysqli("localhost","Razer","razer","H120008_WEB");
    $result = $mysqli->query("SELECT * FROM `User`WHERE uid='".$uid."';");
    

    if($result){
        $row = mysqli_fetch_array($result);
        $sql = "UPDATE `User` SET total=".($total+$row['total']).",words=".($words+$row['words']).",error=".($error+$row['error']).";";

        $target = $mysqli->query($sql);
        return true;
    }return false;
};
