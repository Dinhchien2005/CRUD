<?php
if (isset($_COOKIE['username'])) {
     header('Location: ../home/welcome.php');
     exit();
}

function checkInformation($username, $email)
{
     include ('../Connect/Connect.php');
     $flag = true;
     $check = "";

     $query_select = "SELECT * FROM users";
     $result = $conn->query($query_select);
     if ($result->num_rows > 0) {
          while ($user_data = $result->fetch_assoc()) {
               if ($user_data["username"] == $username) {
                    $flag = false;
                    $check = "Username already registered";
                    break;
               } elseif ($user_data["email"] == $email) {
                    $flag = false;
                    $check = "Email already registered";
                    break;
               }
          }
     }
     $conn->close();
     return array($flag, $check);
}

function registration_success($full_name, $username, $email, $dob, $gender, $password)
{
     include ('../Connect/Connect.php');
     $success = false;

     $hashed_password = password_hash($password, PASSWORD_DEFAULT);

     $query_insert = "INSERT INTO users (full_name, username, email, dob, gender, password) VALUES ('$full_name', '$username', '$email', '$dob', '$gender', '$hashed_password')";

     if ($conn->query($query_insert) === TRUE) {
          $success = true;
     }

     $conn->close();
     return $success;
}

if (isset($_POST['submit'])) {
     $full_name = $_POST["full_name"];
     $username = $_POST["username"];
     $email = $_POST["email"];
     $dob = $_POST["dob"];
     $gender = isset($_POST["gender"]) ? $_POST["gender"] : "";
     $password = $_POST["password"];
     $condition = isset($_POST["condition"]) ? $_POST["condition"] : "";
     $pattern = '/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,})+$/';

     $check = "";
     if (empty($full_name)) {
          $check = "Please fill in the full name field";
     } elseif (empty($username)) {
          $check = "Please fill in the username field";
     } elseif (!preg_match($pattern, $email)) {
          $check = "Email is invalid";
     } elseif (empty($dob)) {
          $check = "Please fill in the dob field";
     } elseif (empty($gender)) {
          $check = "Please choose a gender";
     } elseif (empty($password)) {
          $check = "Please fill in the password field";
     } elseif (empty($condition)) {
          $check = "Please check the condition";
     } else {
          list($regis_success, $check) = checkInformation($username, $email);
          if ($regis_success) {
               $regis_success = registration_success($full_name, $username, $email, $dob, $gender, $password);
               if ($regis_success) {
                    header('Location: ../Verify/verify.php');
                    exit();
               } else {
                    $check = "Registration failed. Please try again later.";
               }
          }
     }
}
?>