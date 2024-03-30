<?php

if (isset($_POST['submit'])) {
     $id = $_GET['id'];
     $table = $_POST['number'];
     $capacity = $_POST['capacity'];
     $location = $_POST['location'];
     $description = $_POST['decsription'];
     include ('../Connect/Connect.php');
     $query = "UPDATE restaurant SET table_number='$table', capacity='$capacity', location='$location', description='$description' WHERE table_id=$id";
     $result = $conn->query($query);
     if ($result) {
          header("Location: ../Home/main.php");
          exit();
     }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
     <meta charset="UTF-8">
     <meta http-equiv="X-UA-Compatible" content="IE=edge">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <title>Home</title>
</head>

<body>
     <table>
          <form action="" method="post">
               <tr>
                    <td><label for="">Table Number</label></td>
                    <td><input type="number" name='number'></td>
               </tr>
               <tr>
                    <td><label for="">Capacity</label></td>
                    <td><input type="number" name="capacity"><br></td>
               </tr>
               <tr>
                    <td><label for="">Location</label></td>
                    <td><input type="text" name="location"><br></td>
               </tr>
               <tr>
                    <td><label for="">Description</label></td>
                    <td><input type="text" name="decsription"><br></td>
               </tr>
               <tr>
                    <td><input type="submit" name='submit' value='Save'></td>
               </tr>
          </form>
     </table>
</body>

</html>