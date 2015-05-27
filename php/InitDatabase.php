<?php
$con = mysql_connect("localhost","root","nyit");
if (!$con)
 {
 die('Could not connect: ' . mysql_error());
 }

if (mysql_query("CREATE DATABASE IF NOT EXISTS H120008_WEB",$con))
 {
 echo "Database created";
 }
else
 {
 echo "Error creating database: " . mysql_error();
 }
 

mysql_select_db("H120008_WEB", $con);
$sql = "CREATE User Razer;";
$sql = "CREATE TABLE User
(
uid int AUTO_INCREMENT NOT NULL,
name varchar(32) NOT NULL,
password varchar(32) NOT NULL,
total int NOT NULL,
errors int NOT NULL,
words int NOT NULL,
PRIMARY KEY (`uid`,`name`,`password`),
UNIQUE KEY `uid`(`uid`),
UNIQUE KEY `name`(`name`)
);";
mysql_query($sql,$con);


$sql = "CREATE TABLE UserSession
(
uid int NOT NULL,
sid varchar(32) NOT NULL,
PRIMARY KEY (`uid`,`sid`),
UNIQUE KEY `uid`(`uid`),
UNIQUE KEY `sid`(`sid`)
);";
mysql_query($sql,$con);


$sql = "CREATE TABLE Text
(
tid int AUTO_INCREMENT NOT NULL,
text text NOT NULL,
UNIQUE KEY `tid`(`tid`)
);";
mysql_query($sql,$con);

mysql_close($con);
echo "Done";




?>

