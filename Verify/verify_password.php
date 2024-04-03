<?php
if (isset($_POST['Confirm'])) {
    header('../login/login.php');
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Confirm Code</title>
</head>

<body>
    <label for="">Verify Code</label>
    <input type="text" name='code'><br>
    <input type="submit" name='Confirm'>
</body>

</html> 