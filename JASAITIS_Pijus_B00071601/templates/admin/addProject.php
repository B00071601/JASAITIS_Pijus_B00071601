<?php
?>
<div id="input_left">
    <h1>Add Project.</h1>

    <form
        action="/index.php?action=processAddProject"
        method="post"
    >


        <label for="description">Description:</label><input type="text" name="description"><br><br>

        <label for="implementorId" class="space">Implementor ID:</label><input type="number" name="implementorId"><br><br>

        <label for="deadline" class="space">Deadline:</label><input type="text" name="deadline"><br><br>

        <label for="status" class="space">Status:</label><input type="number" name="status" min="1" max="2"><br><br>

        <input type="submit" value="Submit">
        <input type="reset" value="Reset">

    </form>
</div>