<?php
/**
 * Created by IntelliJ IDEA.
 * User: ives
 * Date: 2015/5/25
 * Time: 23:12
 */
session_start();


function USERLOGIN($username, $password){
    //ƥ��sessionid�����ɹ�������uid
    $uid = GETLOGIN($username, $password);//�ж�username��password�Ƿ�ƥ��
    if ($uid){
        REGSESSION(session_id(),$uid);//����ѯ�ɹ���uidƥ����Ӧ��sessionid
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