<?php
/**
 * Created by IntelliJ IDEA.
 * User: ives
 * Date: 2015/5/25
 * Time: 23:12
 */
session_start();

$error = "ERROR";

function USERLOGIN($username, $password){

    GETLOGIN($username, $password);
    return GETLOGIN(uid());

}

function ISLOGIN($sessionid){
    if(!isset($_SESSION['uid'])){
        if(isset($_POST['submit'])){//�û��ύ��¼��ʱִ�����´���
            $dbc = mysqli_connect("localhost","monkey","nyit","content");
            $user_username = mysqli_real_escape_string($dbc,trim($_POST['username']));
            $user_password = mysqli_real_escape_string($dbc,trim($_POST['password']));

            if(!empty($username)&&!empty($password)){
                //MySql�е�SHA()�������ڶ��ַ������е������
                $query = "SELECT uid, username FROM user WHERE username = '$username' AND "."password = '$password'";
                //���û�����������в�ѯ
                $data = mysqli_query($dbc,$query);
                //���鵽�ļ�¼����Ϊһ����������SESSION��ͬʱ����ҳ���ض���
                if(mysqli_num_rows($data)==1){
                    $row = mysqli_fetch_array($data);
                    $_SESSION['uid']=$row['uid'];
                    $_SESSION['username']=$row['username'];
                    $home_url = 'loged.php';
                    header('Location: '.$home_url);
                }else{//���鵽�ļ�¼���ԣ������ô�����Ϣ
                    $error_msg = 'Sorry, your password is incorrect.';
                }
            }else{
                $error_msg = 'Please enter your username and password.';
            }
        }
    }else{//����û��Ѿ���¼����ֱ����ת���Ѿ���¼ҳ��
        $home_url = 'index.php';
        header('Location: '.$home_url);
    }


}

function GETUID(){
    $getID = mysql_insert_id();
}