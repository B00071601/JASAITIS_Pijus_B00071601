<?php
namespace Itb;
?>

<h2>Profile photo: <br><img src="<?php print User::getImage(); ?>" alt="Profile photo"></h2>

<form
    action="/index.php?action=processImageChange"
    method="post"

<label for="image" class="space">New Image URL:</label><input type="text" name="image"><br><br>

<label for="uploadImage" class="space">Or upload an image:</label>
<input type="file" name="fileToUpload" id="fileToUpload"><br><br>

<input type="submit" value="Submit">

</form>