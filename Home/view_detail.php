<?php

// Kiểm tra nếu người dùng chưa đăng nhập, chuyển hướng đến trang đăng nhập
if (!isset($_COOKIE['username'])) {
     header("Location:../login/login.php");
     exit();
}
function getDetailProduct()
{
     include ('../Connect/Connect.php');
     $id = $_GET['id'];
     $query = "SELECT *FROM restaurant where table_id =$id";
     $result = $conn->query($query);
     return $result;
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
     <meta charset="UTF-8">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <title>Document</title>
</head>

<body>
     <h2>Product Detail</h2>
     <table cellspacing="0" cellpadding="10">
          <?php
          if (getDetailProduct()->num_rows > 0) {
               $data = getDetailProduct()->fetch_assoc();
               ?>
               <tr>
                    <th>Table Number</th>
                    <td>
                         <?php echo $data['table_number']; ?>
                    </td>
               </tr>
               <tr>
                    <th>Capacity</th>
                    <td>
                         <?php echo $data['capacity']; ?>
                    </td>
               </tr>
               <tr>
                    <th>Location</th>
                    <td>
                         <?php echo $data['location']; ?>
                    </td>
               </tr>
               <tr>
                    <th>Description</th>
                    <td>
                         <?php echo $data['description']; ?>
                    </td>
               </tr>
               <tr>
                    <th>Is Reserved</th>
                    <td>
                         <?php echo $data['is_reserved']; ?>
                    </td>
               </tr>
               <tr>
                    <th>Available</th>
                    <td>
                         <?php echo $data['is_available']; ?>
                    </td>
               </tr>
               <tr>
                    <th>Created At</th>
                    <td>
                         <?php echo $data['created_at']; ?>
                    </td>
               </tr>
               <tr>
                    <th>Last Update</th>
                    <td>
                         <?php echo $data['last_updated_at']; ?>
                    </td>
               </tr>
               <tr>
                    <th>Action</th>
                    <td>
                         <a href="#" value="">Edit</a>
                         <a href="#" value="">Delete</a>
                    </td>
               </tr>
               <tr>
                    <td>
                         <a href="main.php">Back to View List Product</a>
                    </td>
               </tr>
               <?php
          } else {
               ?>
               <tr>
                    <td colspan="8">No data found</td>
               </tr>
          <?php } ?>
     </table>
</body>

</html>