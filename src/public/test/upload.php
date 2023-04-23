<form action="/test/upload.php" method="post" enctype="multipart/form-data">
    <input type="file" name="file" />
    <button type="submit" name="submit" value="submit">Upload</button>
</form>

<?php

define('STORAGE_PATH', __DIR__ . '/../../storage');

/** Handle folder permission for Linux users
 * - Grant full-right (read, write, execute) to user and group
 * - Grant read & execute right other users
 * Not test for Windows users yet. Windows user can skip this part, and create a "storage" folder from Explorer UI
 */
if (!is_dir(STORAGE_PATH)) {
    # default umask is 022
    umask(0);
    mkdir(STORAGE_PATH, 0760, true);
} 

if (!is_writable(STORAGE_PATH)){
    echo STORAGE_PATH . " is not writable by " . exec("whoami") . "</br>";
    echo "Please either grant user permission or add " . exec("whoami") . " to the group owner with read write permissions" \. "</br>"
} else {
    if (isset($_POST['submit'])){
        echo '<pre>';
        var_dump($_FILES);
        echo '</pre>';

        $filePath = STORAGE_PATH . '/' . $_FILES['file']['name'];
        if(file_exists($filePath)){
            unlink($filePath);
        }
        move_uploaded_file($_FILES['file']['tmp_name'], $filePath);
        chmod($filePath, 0744);
        echo '<pre>';
        var_dump(file($filePath));
        echo '</pre>';
    }    
}