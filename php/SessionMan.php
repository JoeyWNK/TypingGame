<?php
/**
 * Created by IntelliJ IDEA.
 * User: ives
 * Date: 2015/5/25
 * Time: 23:12
 */
session_start();
include"DataMan.php";
//ƥ��sessionid�����ɹ�������uid

function USERLOGIN($username, $password){

    //�ж�username��password�Ƿ�ƥ��

    $uid = GETLOGIN($username, $password);

    if ($uid){

        //����ѯ�ɹ���uidƥ����Ӧ��sessionid

        REGSESSION(session_id(),$uid);

        return $uid;
    }
    return null;
}


function ISLOGIN($sessionid){

    //�ж��Ƿ��Ѿ���½

    return CHECKSESSION($sessionid);

}

function GETUID(){

    //�����ṩuid

    return ISLOGIN(session_id());

}