<?php
require_once ("check_register.php")
     ?>

<!DOCTYPE html>
<html lang="en">

<head>
     <meta charset="UTF-8">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <title>Register</title>
</head>

<body>
     <h1>Registration Form</h1>
     <form action="" method="post">
          <div>
               <strong>Full name:</strong>
               <br>
               <input type="text" name="full_name"
                    value="<?php echo isset($_POST['full_name']) ? htmlspecialchars($_POST['full_name']) : ''; ?>">
          </div>
          <div>
               <strong>Username:</strong>
               <br>
               <input type="text" name="username"
                    value="<?php echo isset($_POST['username']) ? htmlspecialchars($_POST['username']) : ''; ?>">
          </div>
          <div>
               <strong>Email:</strong>
               <br>
               <input type="email" name="email"
                    value="<?php echo isset($_POST['email']) ? htmlspecialchars($_POST['email']) : ''; ?>">
          </div>
          <div>
               <strong>Date Of Birth:</strong>
               <br>
               <input name="dob" type="date"
                    value="<?php echo isset($_POST['dob']) ? htmlspecialchars($_POST['dob']) : ''; ?>">
          </div>
          <div>
               <strong>Gender:</strong>
               <br>
               <div>
                    <input type="radio" name="gender" value="1">Nam
                    <input type="radio" name="gender" value="2">Nữ
                    <input type="radio" name="gender" value="3">Khác
               </div>
          </div>
          <div>
               <strong>Password:</strong>
               <br>
               <input type="password" name="password">
          </div>
          <div>
               I agree to the conditions:
               <br>
               <input type="checkbox" name="condition" value="Accept">
          </div>
          <div>
               <input type="submit" name="submit" value="Submit">
               <a href="../login/login.php">Login</a>
          </div>
     </form>

     <?php
     if (isset($check)) {
          echo $check;
     }
     ?>


</body>

</html>