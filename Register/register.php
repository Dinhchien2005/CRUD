<?php
require_once ("check_register.php")
     ?>

<!DOCTYPE html>
<html lang="en">

<head>
     <meta charset="UTF-8">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <title>Register</title>
     <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">

</head>

<body>
     <div class="container">
          <h1>Registration Form</h1>
          <form action="" method="post">
               <div class="form-group">
                    <label for="full_name">Full name:</label>
                    <input type="text" class="form-control" id="full_name" name="full_name"
                         value="<?php echo isset($_POST['full_name']) ? htmlspecialchars($_POST['full_name']) : ''; ?>">
               </div>
               <div class="form-group">
                    <label for="username">Username:</label>
                    <input type="text" class="form-control" id="username" name="username"
                         value="<?php echo isset($_POST['username']) ? htmlspecialchars($_POST['username']) : ''; ?>">
               </div>
               <div class="form-group">
                    <label for="email">Email:</label>
                    <input type="email" class="form-control" id="email" name="email"
                         value="<?php echo isset($_POST['email']) ? htmlspecialchars($_POST['email']) : ''; ?>">
               </div>
               <div class="form-group">
                    <label for="dob">Date Of Birth:</label>
                    <input type="date" class="form-control" id="dob" name="dob"
                         value="<?php echo isset($_POST['dob']) ? htmlspecialchars($_POST['dob']) : ''; ?>">
               </div>
               <div class="form-group">
                    <label>Gender:</label>
                    <div>
                         <input type="radio" id="male" name="gender" value="1">
                         <label for="male">Nam</label>
                         <input type="radio" id="female" name="gender" value="2">
                         <label for="female">Nữ</label>
                         <input type="radio" id="other" name="gender" value="3">
                         <label for="other">Khác</label>
                    </div>
               </div>
               <div class="form-group">
                    <label for="password">Password:</label>
                    <input type="password" class="form-control" id="password" name="password">
               </div>
               <div class="form-group form-check">
                    <input type="checkbox" class="form-check-input" id="condition" name="condition" value="Accept">
                    <label class="form-check-label" for="condition">I agree to the conditions</label>
               </div>
               <button type="submit" class="btn btn-primary" name="submit">Submit</button>
               <a href="../login/login.php" class="btn btn-link">Login</a>
          </form>
     </div>

     <?php
     if (isset($check)) {
          echo '<div class="alert alert-danger mt-3" role="alert">' . $check . '</div>';
     }
     ?>


</body>

</html>