<?php
/**
 * Created by IntelliJ IDEA.
 * User: ives
 * Date: 2015/5/26
 * Time: 21:41
 */

//检查username是否存在，存在返回true，不存在返回false
function USERCHECK($username){
    mysqli_select_db(H120008_WEB);
    $query = "SELECT * From 'User' WHERE name='".$username."';";
    $result = mysqli_query($query);
    if($result) {
        $row = mysqli_fetch_array(MYSQL_NUM);
        if ($row > 0) {
            return true;
        }return false;
    }
};

//注册用户，成功返回true，不成功返回false
function USERREGISTER ($username,$password){
    mysqli_select_db(H120008_WEB);
    $query = "INSERT INTO 'User' (username,password) values ($username,$password);";
    $result = mysqli_query($query);

    if ($result){
        return true;
    }return false;
};

//向数据库检查用户名密码是否匹配，匹配返回uid，不匹配返回null
function GETLOGIN ($username,$password){
	mysqli_select_db(H120008_WEB);   
 $query = "SELECT uid from 'User' WHERE username='".$username."'and password='".$password."'";
    $result = mysqli_query($query);

    if($result){
        $row = mysqli_fetch_array($result);
        if ($row > 0){
            return uid;
        }return NULL;
    }
};

//向sessionid注册一个uid，boolean
function REGSESSION($sessionid,$uid){
	mysqli_select_db(H120008_WEB);
    if($sessionid){
        $query = "INSERT INTO UserSession (sid) values ($sessionid);";
        return true;
    }return false;
};

//返回对应uid的字符串
function GETDATA($uid){
	mysqli_select_db(H120008_WEB);
    $query = "SELECT total, error, words FROM 'User' WHERE uid ='$uid';";
    $result = mysqli_query($query);

    if ($result){
        $row = mysqli_fetch_array($result);
        if ($row > 0){
            echo ("Total:".total."Error".error."Words".words);
        }
    }
};

//查询sessionid对应的uid， 返回uid
function CHECKSESSION($sessionid){
	mysqli_select_db(H120008_WEB);
    $query = "SELECT uid FROM UserSession WHERE sessionid='".$sessionid."';";
    $result = mysqli_query($query);

    if($result){
        $row = mysqli_fetch_array($result);
        if ($row > 0 ){
            return uid;
        }
    }
};

//删除sessionid, uid
function LOGOUT($uid){
	mysqli_select_db(H120008_WEB);
    $query = "DELETE sessionid, uid FROM UserSession WHERE uid='".$uid."'";
    $result = mysqli_query($query);

    if($result){
        return true;
    }return false;

};

//返回对应序号的文章
function GETGAMETEXT($textid){
	mysqli_select_db(H120008_WEB);
    $query = "SELECT text FROM Text WHERE tid='".$textid."';";
    $result = mysqli_query($query);

    if($result){
        return text;
    }
};

//记录当前游戏结果，boolean
function SETDATA($uid,$error,$words,$time){
	mysqli_select_db(H120008_WEB);
    $query = "SELECT * FROM 'User'WHERE uid='".$uid."';";
    $result = mysqli_query($query);

    if($result){
        $row = mysqli_fetch_array($result);
        $sql = "UPDATE 'User' SET total=".($total+$row['total']).",words=".($words+$row['words']).",error=".($error+$row['error']).";";

        $target = mysqli_query($sql);
        return true;
    }return false;
};
