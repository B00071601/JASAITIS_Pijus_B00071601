<?php
require_once '_header.php';
?>

    <h1>Successfully logged in.</h1>
    <p>Welcome <?=$username?>, you were logged in at <?php date_default_timezone_set("UTC"); echo date("h:i:sa");?> UTC.</p>