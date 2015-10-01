<?php
include'connect.php';
include'header.php';
$id=$_GET['id'];
$_SESSION['idfortopic']=$id;
$sql="SELECT topic_id,topic_subject
FROM
topics
WHERE
topics.topic_id='$id'";

$result= mysqli_query($db,$sql);
if(!$result)
echo" there was an error";
else
{
if(mysqli_num_rows($result)==0)
echo" there were no topics ";
else
{
while($row=mysqli_fetch_assoc($result))
$nam=$row['topic_subject'];
echo '<table border="1">
<tr>
<th>'.$nam.'</th>
</tr>';
$sql= "SELECT 
replies.reply_topic,
replies.reply_content,
replies.reply_date,
replies.reply_by,
users.user_id,
users.user_name
FROM
replies 
LEFT JOIN
users
ON
replies.reply_by=users.user_id
WHERE
replies.reply_topic='$id'";

$result=mysqli_query($db,$sql);

if(!$result)
echo" There Are No replies Do u want to Add a reply? Go on";
else
{
if(mysqli_num_rows($result)==0)
{
echo" No data to be shown"; }
else
{
while($rows=mysqli_fetch_assoc($result))
{
echo '<tr>';
echo '<td>'.$rows['reply_by']." ".$rows['reply_content'].'</td>';
echo'</tr>';}}}
}
echo '</table> <br><br><br>';

echo '<h3>Replies:</h3>';
echo '<form action="replies.php" method="post">
<textarea name="reply_content">Maybe apples!! </textarea>
<br>
<input type="submit" >
</form>';


}
?>
