<?php

include'connect.php';
include'header.php';

if($_SERVER['REQUEST_METHOD']!='POST')
echo" Cannot access this page directly ";
else
{

if(isset($_SESSION['signed_in'])==false)
echo 'First sign up here <a href="/forum/signup.php">Sign Up</a> ';
else
{
$con=$_POST['reply_content'];
$id= $_SESSION['idfortopic'];
$user=$_SESSION['user_id'];
$sql= "INSERT INTO
replies(reply_content,reply_date,reply_topic,reply_by)
VALUES('$con',NOW(),'$id','$user')";
$result= mysqli_query($db,$sql);
if(!$result)
echo " Your reply has not been saved ";
else
echo 'Your reply has been saved successfuly check out <a href="topic.php?id='.htmlentities($id).'">the topic</a>.';
}
}
include 'footer.php';
?>
