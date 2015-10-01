<?php 

include 'connect.php';
include 'header.php';

/*
if($_SERVER['REQUEST_METHOD']!='POST')
{

$sql="SELECT cat_id,cat_name FROM categories";
$result = mysqli_query($db,$sql);

if(!$result)
echo" Error occured";
else
{

if(mysqli_num_rows($result)==0)
echo " No categories found";
else
{

echo '<h1> Select A Category</h1>';
echo '<form action="" method="POST">';
echo '<select name="category" >';
while($row=mysqli_fetch_assoc($result))
echo '<option value="'.$row['cat_id'].'">'.$row['cat_name'].'</option>';
echo'</select>';
echo '<input type="submit">';
echo '</form>';
}
}
}
else
{*/




$id=$_GET['id'];
$sql="SELECT
cat_id,
cat_name,
cat_description
FROM
categories
WHERE
cat_id='$id'";
$result = mysqli_query($db,$sql);

if(!$result)
echo 'the category could not be displayed ';
else
{


if(mysqli_num_rows($result)==0)
echo 'this category doesnt exist';
else
{


while($row=mysqli_fetch_assoc($result))
{

echo'<h2> Topics in '.$row['cat_name'].' category</h2>';



}

$sql="SELECT
topic_id,topic_subject,topic_date,topic_cat
FROM topics
WHERE topic_cat='$id'";

$result= mysqli_query($db,$sql);

if(!$result)
echo 'The topics coul not be displayed';
else
{


if(mysqli_num_rows($result)==0)
echo "The are no topics ";
else
{

echo '<table border="1">
<tr>
<th> Topic</th>
<th>Created at</th>
</tr>';
while($row=mysqli_fetch_assoc($result))
{


echo'<tr>';
echo '<td class="leftpart">';
echo '<h3><a href="topic.php?id='.$row['topic_id'].'">'.$row['topic_subject'].'</a></h3>';
echo '</td>';
echo '<td class="rightpart">';
echo date('d-m-Y',strtotime($row['topic_date']));
echo '</tr>';
}
}
}
}
}
include 'footer.php';
?>


