<?php
if (isset ($_COOKIE['username'])) {
    setcookie('username', '', time() - 3600, "/");
}

header("Location: ../login/login.php");
exit();
?>