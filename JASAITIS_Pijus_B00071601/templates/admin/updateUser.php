<?php
?>
<div id="input_left">
    <h1>Update User.</h1>

    <form
        action="/index.php?action=processUpdateUser"
        method="post"
    >

        <label for="target" class="space">Target Username:</label><input type="text" name="target"><br><br>

        <label for="username" class="space">New Username:</label><input type="text" name="username"><br><br>

        <label for="password" class="space">Password:</label><input type="password" name="password"><br><br>

        <label for="retypePassword" class="space">Retype password:</label><input type="password" name="retypePassword"><br><br>

        <label for="role" class="space">Role:</label><input type="number" name="role" min="0" max="2"><br><br>

        <label for="projectId" class="space">Project ID:</label><input type="number" name="projectId"><br><br>

        <label for="supervisorId" class="space">Supervisor ID:</label><input type="number" name="supervisorId"><br><br>

        <input type="submit" value="Submit">
        <input type="reset" value="Reset">

    </form>
</div>
