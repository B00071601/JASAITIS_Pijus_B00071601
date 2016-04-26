<?php
?>

<h1>Registration page.</h1>

<form
    action="index.php?action=processRegister"
    method="post"
>

    <p>Username:<input type="text" name="username"></p>

    <p>Password:<input type="password" name="password"></p>

    <p>Retype password:<input type="password" name="retypePassword"></p>

    <p>Project ID:<input type="number" name="projectId"></p>

    <p>Supervisor ID:<input type="number" name="supervisorId"></p>

    <input type="submit" value="Submit">

</form>

<h4><a href="index.php" style="margin-top: 10px">Back to index</a></h4>