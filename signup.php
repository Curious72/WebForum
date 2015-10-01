<?php
include 'connect.php';
include 'header.php';
echo'<h3>Sign Up</h3>';
if($_SERVER['REQUEST_METHOD']!='POST')
{
echo'<form method="post" action="">
<pre> 
Username:      <input type="text" name="user_name">

password:      <input type="password" name="user_pass">

password again:<input type="password" name="user_pass_check">

E-mail:        <input type="email" name="user_email">
</pre>
<input type="submit" value="Add category"/>
</form>';
}
else
{
$user=$_POST['user_name'];
$pass=$_POST['user_pass'];
$email=$_POST['user_email'];
$que=mysqli_query($db,"INSERT INTO users(user_name,user_pass,user_email,user_date,user_level)
VALUES('$user','$pass','$email',NOW(),0)");
if(!$que)
echo " Something went wrong";
else
echo" Succesfully registered";
include'footer.php';
}
?>




