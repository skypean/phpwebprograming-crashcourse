<?php

setcookie('uid', "1", time() + 24*60*60, '/', '', false, true);

echo '<pre>';
var_dump($_COOKIE);
echo '</pre>';

$_POST['username']

?>

<html>
<body>
    <h1>You search for <?= $_GET['search'] ?? '' ?></h1>
</body>
</html>