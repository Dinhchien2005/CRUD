<?php
if (isset($_COOKIE['username'])) {
     header("Location: ../home/main.php");
     exit();
}

function isLogin($username, $password)
{
     include ('../Connect/Connect.php');
     $flag = false;
     $check = "";

     $query = "SELECT * FROM users WHERE username = '$username'";
     $result = $conn->query($query);

     if ($result->num_rows > 0) {
          $user_data = $result->fetch_assoc();
          if (password_verify($password, $user_data['password'])) {
               if ($user_data['is_banned'] == 1) {
                    $check = "Your account has been banned";
               } else {
                    $flag = true;
               }
          } else {
               $check = "Password incorrect";
          }
     } else {
          $check = "Username dose not exist";
     }
     $conn->close();
     return array($flag, $check);
}

if (isset($_POST['submit'])) {
     $username = $_POST['username'];
     $password = $_POST['password'];

     list($login_success, $check) = isLogin($username, $password);

     if ($login_success) {
          setcookie('username', $username, time() + (86400 * 30), '/');
          header("Location: ../Home/main.php");
          exit();
     } else if (empty($username)) {
          $check = "You haven't entered username";
     } else if (empty($password)) {
          $check = "You haven't entered password";
     }
}