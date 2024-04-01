<?php
require_once ("check_login.php");
?>

<!DOCTYPE html>
<html lang="en">

<head>
     <meta charset="UTF-8">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <title>Login</title>
     <!-- Bootstrap CSS -->
     <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
     <style>
          /* Add your custom styles here */
     </style>
</head>

<body>
     <div class="container mt-5">
          <form action="" method="post">
               <div class="form-group row">
                    <label for="username" class="col-sm-2 col-form-label">Username:</label>
                    <div class="col-sm-10">
                         <input type="text" class="form-control" id="username" name="username" required>
                    </div>
               </div>
               <div class="form-group row">
                    <label for="password" class="col-sm-2 col-form-label">Password:</label>
                    <div class="col-sm-10">
                         <input type="password" class="form-control" id="password" name="password" required>
                    </div>
               </div>
               <div class="form-group row">
                    <div class="col-sm-10 offset-sm-2">
                         <input type="submit" class="btn btn-primary" name="submit" value="Login">
                    </div>
               </div>
          </form>
          <div class="row">
               <div class="col-sm-10 offset-sm-2">
                    <a href="../Register/register.php" class="btn btn-link">Register</a>
               </div>
          </div>

          <?php
          if (isset($check)) {
               echo '<div class="alert alert-danger mt-3" role="alert">' . $check . '</div>';
          }
          ?>
     </div>


</body>

</html>