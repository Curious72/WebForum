<!doctype html>
<html>
<head>
<link type="text/css" rel="stylesheet" href="style.css">
<title> My forum</title>
</head>
<body>
<h1> Awesome Shivam Forum </h1>
<div id="wrapper">
<div id="menu">
<a class="item" href="/forum/index.php">Home</a>
<a class="item" href="/forum/create_topic.php">Create a topic</a>
<a class="item" href="/forum/create_cat.php">Create a Category</a>
<div id="userbar">
<div id="userbar"> 
<?php
session_start();
if(!empty($_SESSION['signed_in']))
    {
        echo 'Hello ' . '<b>'.$_SESSION['user_name'].'</b>' . '. Not you? <a href="signout.php">Sign out</a>';
    }
    else
    {
        echo '<a href="signin.php">Sign in</a> or <a href="signup.php">create an account</a>.';
    }

?>
</div>
</div>
</div>
<div id="content">
