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
    mkdir(STORAGE_PATH, 0764, true);
    chgrp(STORAGE_PATH, 1000);
} 

if (!is_writable(STORAGE_PATH)){
    echo "Please change owner" . realpath(STORAGE_PATH) . " to user " . exec('whoami') . " . </br>";
    echo "sudo chown -R " . exec('whoami') . ' ' . realpath(STORAGE_PATH) . "</br>";
} else {
    if (isset($_POST['submit'])){
        $filePath = STORAGE_PATH . '/' . $_FILES['file']['name'];
        if(file_exists($filePath)){
            unlink($filePath);
        }
        move_uploaded_file($_FILES['file']['tmp_name'], $filePath);
        chmod($filePath, 0764);
        echo '<pre>';
        var_dump(file($filePath));
        echo '</pre>';
    }    
}