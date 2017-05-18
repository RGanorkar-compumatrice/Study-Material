<?php
error_reporting(0);
session_start();

if($_SESSION["user_id"]=="" && $pageHeading!="login")
header("Location:login.php");

$con = mysql_connect("localhost","root","");
if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }

// some code




$db_selected = mysql_select_db("myfriends", $con);

if (!$db_selected)
  {
  die ("Can\'t use test_db : " . mysql_error());
  }

?> 