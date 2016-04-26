<?php
?>
<div id="input_left">
    <h1>Update Project.</h1>

    <form
        action="/index.php?action=processUpdateProject"
        method="post"
    >

        <label for="target" class="space">Target ID:</label><input type="number" name="target" min="1"><br><br>

        <label for="description" class="space">New Description:</label><input type="text" name="description"><br><br>

        <label for="implementorId" class="space">Implementor ID:</label><input type="number" name="ImplementorId"><br><br>

        <label for="deadline" class="space">Deadline:</label><input type="date"  name="deadline"><br><br>

        <label for="status" class="space">Status:</label><input type="number" name="status" min="1" max="2"><br><br>

        <input type="submit" value="Submit">
        <input type="reset" value="Reset">

    </form>
</div>
