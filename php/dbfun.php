<?php
/**
 * Created by IntelliJ IDEA.
 * User: ives
 * Date: 2015/5/26
 * Time: 21:41
 */
//���username�Ƿ���ڣ����ڷ���true�������ڷ���false
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

//ע���û����ɹ�����true�����ɹ�����false
function USERREGISTER ($username,$password){
$mysqli =new mysqli("localhost","Razer","razer","H120008_WEB");
   $result = $mysqli->query("INSERT INTO `User` (name,password) values ('".$username."','".$password."');");
    

    if ($result){
        return true;
    }return false;
};

//�����ݿ����û��������Ƿ�ƥ�䣬ƥ�䷵��uid����ƥ�䷵��null
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

//��sessionidע��һ��uid��boolean
function REGSESSION($sessionid,$uid){
$mysqli =new mysqli("localhost","Razer","razer","H120008_WEB");echo "2";
    if($sessionid){echo "3";
       $result = $mysqli ->query("INSERT INTO `UserSession` (uid,sid) values ('".$uid."','".$sessionid."');");
        return true;
    }return false;
};

//���ض�Ӧuid���ַ���
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

//��ѯsessionid��Ӧ��uid�� ����uid
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

//ɾ��sessionid, uid
function LOGOUT($uid){
$mysqli =new mysqli("localhost","Razer","razer","H120008_WEB");
    $result = $mysqli->query("DELETE sessionid, uid FROM UserSession WHERE uid='".$uid."'");
        if($result){
        return true;
    }return false;

};

//���ض�Ӧ��ŵ�����
function GETGAMETEXT($textid){
$mysqli =new mysqli("localhost","Razer","razer","H120008_WEB");
    $result = $mysqli->query("SELECT text FROM Text WHERE tid='".$textid."';");
    
    if($result){
        return text;
    }
};

//��¼��ǰ��Ϸ�����boolean
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
