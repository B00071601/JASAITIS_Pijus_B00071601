<?php
?>
<div id="input_left">
    <h1>Remove User.</h1>

    <form
        action="/index.php?action=processRemoveUser"
        method="post"
    >


        <label for="username">Username:</label><input type="text" name="username"><br><br>

        <label for="id" class="space">ID:</label><input type="number" name="id"><br><br>

        <input type="submit" value="Submit">
        <input type="reset" value="Reset">

    </form>
</div>
