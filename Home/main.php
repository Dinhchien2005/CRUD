<?php

// Kiểm tra nếu người dùng chưa đăng nhập, chuyển hướng đến trang đăng nhập
if (!isset($_COOKIE['username'])) {
     header("Location: ../login/login.php");
     exit();
}

include ('../Connect/Connect.php');
function getListProduct($records_of_page, $pages)
{
     global $conn;
     $offset = ($pages - 1) * $records_of_page;
     $query = "SELECT *FROM restaurant WHERE is_available = 1 LIMIT $records_of_page OFFSET $offset";
     $result = $conn->query($query);
     return $result;
}
function SearchKeyWords($keyword)
{
     global $conn;
     $keyword = $conn->real_escape_string($keyword);
     $query = "SELECT * FROM restaurant WHERE is_available=1 AND (table_number LIKE '%$keyword%' OR capacity LIKE '%$keyword%' OR location LIKE '%$keyword%' OR description LIKE '%$keyword%')";
     $result = $conn->query($query);
     return $result;
}
$records_of_page = 5;
if (isset($_GET["page"]) && is_numeric($_GET['page'])) {
     $page = $_GET['page'];
} else {
     $page = 1;
}
if (isset($_GET['search']) && isset($_GET['keyword'])) {
     $keyword = $_GET['keyword'];
     $result = SearchKeyWords($keyword);
} else {
     $result = getListProduct($records_of_page, $page);
}
$username = $_COOKIE['username'];
?>

<!DOCTYPE html>
<html>

<head>
     <title>Trang chính</title>
     <link rel="stylesheet" href="index.css">
     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
     <style>
          .logout {
               background-color: #FF0000;
               border: none;
               color: white;
               padding: 10px 20px;
               text-align: center;
               text-decoration: none;
               display: inline-block;
               font-size: 16px;
               margin-left: 20px;
               cursor: pointer;
               border-radius: 5px;
          }

          .logout:hover {
               background-color: #CC0000;
          }

          .add {
               background-color: #4CAF50;
               border: none;
               color: white;
               padding: 10px 20px;
               text-align: center;
               text-decoration: none;
               display: inline-block;
               font-size: 16px;
               margin: 10px;
               cursor: pointer;
               border-radius: 5px;
          }

          .delete-icon {
               color: red;
          }

          .add:hover {
               background-color: #45a049;
          }
     </style>
</head>

<body>
     <h2>Welcome
          <?php echo $username; ?>
     </h2>
     <table border="1" cellspacing="0" cellpadding="10">
          <tr>
               <th>S.N</th>
               <th>Table Number</th>
               <th>Capacity</th>
               <th>Location</th>
               <th>Description</th>
               <th>Reserved</th>
               <th>Available</th>
               <th>Created At</th>
               <th>Last Updated</th>
               <th>Action</th>
          </tr>
          <form action="" method="GET">
               <input type="text" name="keyword" placeholder="Enter keyword">
               <button type="submit" name="search">Search</button>
          </form>
          <?php
          if ($result->num_rows > 0) {
               $stt = ($page - 1) * $records_of_page + 1;
               while ($data = $result->fetch_assoc()) {
                    ?>

                    <tr>
                         <td>
                              <?php echo $stt; ?>
                         </td>
                         <td>
                              <a href="view_detail.php?id=<?php echo $data['table_id']; ?>">
                                   <?php echo $data['table_number']; ?>
                              </a>
                         </td>
                         <td>
                              <?php echo $data['capacity']; ?>
                         </td>
                         <td>
                              <?php echo $data['location']; ?>
                         </td>
                         <td>
                              <?php echo $data['description']; ?>
                         </td>
                         <td>
                              <?php echo $data['is_reserved']; ?>
                         </td>
                         <td>
                              <?php echo $data['is_outdoor']; ?>
                         </td>
                         <td>
                              <?php echo $data['created_at']; ?>
                         </td>
                         <td>
                              <?php echo $data['last_updated_at']; ?>
                         </td>
                         <td>

                              <a href=" ../Update/updated.php?id=<?php echo $data['table_id']; ?>">
                                   <i class="fas fa-edit"></i>
                              </a>
                              <a href="../Delete/delete.php?id=<?php echo $data['table_id']; ?>">
                                   <i class="fas fa-trash-alt delete-icon"></i>
                              </a>
                         </td>
                    <tr>
                         <?php
                         $stt++;
               }
          } else {
               ?>
               <tr>
                    <td colspan=" 8">No data found
                    </td>
               </tr>
          <?php } ?>
     </table>

     <a href="logout.php" class="logout">Đăng xuất</a>
     <a href="../Add/Add.php" class="add">Add</a>
     <?php
     $sql = "SELECT COUNT(*) as total from restaurant WHERE is_available=1";
     $result1 = $conn->query($sql);
     $row = $result1->fetch_assoc();
     $total_records = $row["total"];
     $total_pages = ceil($total_records / $records_of_page);
     echo "<div class='pagination'>";
     for ($i = 1; $i <= $total_pages; $i++) {
          echo "<a href='?page=$i'>$i</a>";
     }
     echo "</div>";
     ?>
</body>

</html>