<?php
require_once '_header.php';
?>

<form
    action="index.php?action=processLogin"
    method="post"
    >

    <p>Username:<input type="text" name="username"></p>

    <p>Password:<input type="password" name="password"></p>

    <input type="submit" value="Login">

</form>

<h4><a href="index.php?action=registerPage">Register</a></h4>