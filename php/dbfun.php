<?php
/**
 * Created by IntelliJ IDEA.
 * User: ives
 * Date: 2015/5/26
 * Time: 21:41
 */

//���username�Ƿ���ڣ����ڷ���true�������ڷ���false
function USERCHECK($username){
    mysql_select_db(H120008_WEB);
    $query = "SELECT * From 'User' WHERE name='".$username."';";
    $result = mysql_query($query);
    if($result) {
        $row = mysql_fetch_array(MYSQL_NUM);
        if ($row > 0) {
            return true;
        }return false;
    }
};

//ע���û����ɹ�����true�����ɹ�����false
function USERREGISTER ($username,$password){
    mysql_select_db(H12000816_WEB);
    $query = "INSERT INTO 'User' (username,password) values ($username,$password);";
    $result = mysql_query($query);

    if ($result){
        return true;
    }return false;
};

//�����ݿ����û��������Ƿ�ƥ�䣬ƥ�䷵��uid����ƥ�䷵��null
function GETLOGIN ($username,$password){
    $query = "SELECT uid from 'User' WHERE username='".$username."'and password='".$password."'";
    $result = mysql_query($query);

    if($result){
        $row = mysql_fetch_array($result);
        if ($row > 0){
            return uid;
        }return NULL;
    }
};

//��sessionidע��һ��uid��boolean
function REGSESSION($sessionid,$uid){
    if($sessionid){
        $query = "INSERT INTO UserSession (sid) values ($sessionid);";
        return true;
    }return false;
};

//���ض�Ӧuid���ַ���
function GETDATA($uid){
    $query = "SELECT total, error, words FROM 'User' WHERE uid ='$uid';";
    $result = mysql_query($query);

    if ($result){
        $row = mysql_fetch_array($result);
        if ($row > 0){
            echo ("Total:".total."Error".error."Words".words);
        }
    }
};

//��ѯsessionid��Ӧ��uid�� ����uid
function CHECKSESSION($sessionid){
    $query = "SELECT uid FROM UserSession WHERE sessionid='".$sessionid."';";
    $result = mysql_query($query);

    if($result){
        $row = mysql_fetch_array($result);
        if ($row > 0 ){
            return uid;
        }
    }
};

//ɾ��sessionid, uid
function LOGOUT($uid){
    $query = "DELETE sessionid, uid FROM UserSession WHERE uid='".$uid."'";
    $result = mysql_query($query);

    if($result){
        return true;
    }return false;

};

//���ض�Ӧ��ŵ�����
function GETGAMETEXT($textid){
    $query = "SELECT text FROM Text WHERE tid='".$textid."';";
    $result = mysql_query($query);

    if($result){
        return text;
    }
};

//��¼��ǰ��Ϸ�����boolean
function SETDATA($uid,$error,$words,$time){
    $query = "SELECT * FROM 'User'WHERE uid='".$uid."';";
    $result = mysql_query($query);

    if($result){
        $row = mysql_fetch_array($result);
        $sql = "UPDATE 'User' SET total=".($total+$row['total']).",words=".($words+$row['words']).",error=".($error+$row['error']).";";

        $target = mysql_query($sql);
        return true;
    }return false;
};
