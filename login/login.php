<?php
require_once ("check_login.php")
     ?>

<!DOCTYPE html>
<html lang="en">

<head>
     <meta charset="UTF-8">
     <meta http-equiv="X-UA-Compatible" content="IE=edge">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <title>Login</title>
</head>

<body>
     <form action="" method="post">
          <table>
               <tr>
                    <td>Username:</td>
                    <td>
                         <input type="text" name="username">
                    </td>
               </tr>
               <tr>
                    <td>Password:</td>
                    <td>
                         <input type="password" name="password">
                    </td>
               </tr>
               <tr>
                    <td>
                         <input type="submit" name="submit" value="Login">
                    </td>
                    <td>
                         <a href="../Register/register.php">Register</a>
                    </td>
               </tr>
          </table>
     </form>

     <?php
     if (isset($check)) {
          echo $check;
     }
     ?>
</body>

</html>