<?php
include 'connect.php';
include 'header.php';
echo'<h3>Sign in</h3>';

if(isset($_SESSION['signed_in'])&& $_SESSION['signed_in']==true)
echo 'You are already signed in , you can <a href="signout.php">Sign out</a> if u want.';
else
{

if($_SERVER['REQUEST_METHOD']!='POST')
{



echo'<form action="" method="post">
Username: <input type="text" name="user_name"/>
Password: <input type="password" name="user_pass"/>
<input type="submit" value="Sign in"/>
</form>';

}
else
{
$user=$_POST['user_name'];
$pass=$_POST['user_pass'];
$query="SELECT user_id,user_name,user_level FROM users WHERE user_name='$user'
AND user_pass='$pass'";
$result= mysqli_query($db,$query);

if(mysqli_num_rows($result)==0)
echo"You have supplied a wrong user/password pls try again";
else
{
$_SESSION['signed_in']=true;

while($row=mysqli_fetch_assoc($result))
{

$_SESSION['user_id']=$row['user_id'];
$_SESSION['user_name']=$row['user_name'];
$_SESSION['user_level']=$row['user_level'];

}

echo "Welcome,".$_SESSION['user_name']." ".'<a href="index.php"> Proceed to the forum overview</a>';
}

}}
include 'footer.php';
?>
