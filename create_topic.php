<?php
 
include 'connect.php';
include 'header.php';
 echo '<h2> Create a topic</h2>';
if(empty($_SESSION['signed_in']))
echo 'Sorry,you have to be <a href="/forum/signin.php">signed in</a> to create a topic';
else
{

if($_SERVER['REQUEST_METHOD']!='POST')
{


$sql="SELECT cat_id,cat_name,cat_description
FROM
categories";
$result=mysqli_query($db,$sql);


if(!$result)
echo 'Error while selecting from database';
else
{

if(mysqli_num_rows($result)==0)
{

if($_SESSION['user_level']==1)
echo" You have not created categories yet";
else
echo " Before u can post a topic u must wait for an admin to create a category";
}
else
{



echo '
<form action="" method="POST">
subject: <input type="TEXT" name="topic_subject"/>
Category:';
echo '<select name="topic_cat">';
while($row=mysqli_fetch_assoc($result))
echo '<option value="'.$row['cat_id'].'">'.$row['cat_name'].'</option>';
echo '</select>';

echo '
<pre>
Message: <textarea name="reply_content"></textarea>
<input type="submit" value="Create topic"/>
</form>
</pre>';
}
}
}
else
{
$query="BEGIN WORK;";
$result=mysqli_query($db,$query);
if(!$result)
echo" An error occured while creating topic";
else
{
$sub=$_POST['topic_subject'];
$cat=$_POST['topic_cat'];
$user=$_SESSION['user_id'];
$sql="INSERT INTO topics(topic_subject,topic_date,topic_cat,topic_by)
VALUES('$sub',NOW(),'$cat','$user')";
$result= mysqli_query($db,$sql);

if(!$result)
{

echo 'An error occured while inserting your data plzz try again later'.mysqli_error($db);
$sql="ROLLBACK;";
$result=mysqli_query($db,$sql);
}
else
{

$topicid=mysqli_insert_id($db);
$cont=$_POST['reply_content'];
$user=$_SESSION['user_id'];
$sql="INSERT INTO 
replies(reply_content,reply_date,reply_topic,reply_by)
VALUES('$cont',NOW(),'$topicid','$user')";
$result=mysqli_query($db,$sql);

if(!$result)
{

echo 'An error occured while inserting your post';
$sql="ROLLBACK;";
$result=mysqli_query($db,$sql);



}
else
{
$sql="COMMIT;";
$result=mysqli_query($db,$sql);
echo 'You have successfuly created <a href="topic.php?id='.$topicid.'">your new topic</a>.';
}
}
}
}
}
include 'footer.php';
?>



