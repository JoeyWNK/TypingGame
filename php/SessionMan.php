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
        if(isset($_POST['submit'])){//用户提交登录表单时执行如下代码
            $dbc = mysqli_connect("localhost","monkey","nyit","content");
            $user_username = mysqli_real_escape_string($dbc,trim($_POST['username']));
            $user_password = mysqli_real_escape_string($dbc,trim($_POST['password']));

            if(!empty($username)&&!empty($password)){
                //MySql中的SHA()函数用于对字符串进行单向加密
                $query = "SELECT uid, username FROM user WHERE username = '$username' AND "."password = '$password'";
                //用用户名和密码进行查询
                $data = mysqli_query($dbc,$query);
                //若查到的记录正好为一条，则设置SESSION，同时进行页面重定向
                if(mysqli_num_rows($data)==1){
                    $row = mysqli_fetch_array($data);
                    $_SESSION['uid']=$row['uid'];
                    $_SESSION['username']=$row['username'];
                    $home_url = 'loged.php';
                    header('Location: '.$home_url);
                }else{//若查到的记录不对，则设置错误信息
                    $error_msg = 'Sorry, your password is incorrect.';
                }
            }else{
                $error_msg = 'Please enter your username and password.';
            }
        }
    }else{//如果用户已经登录，则直接跳转到已经登录页面
        $home_url = 'index.php';
        header('Location: '.$home_url);
    }


}

function GETUID(){
    $getID = mysql_insert_id();
}