<?php
$id = $_GET['id'];

if (isset($_POST['confirm'])) {
     include ('../Connect/Connect.php');

     $query = "DELETE FROM restaurant WHERE table_id = $id";
     $result = $conn->query($query);

     if ($result) {
          header("Location: ../Home/main.php");
          exit();
     }
}
?>

<p>Are you sure you want to delete this product?</p>
<form action="" method="post">
     <input type="submit" name="confirm" value="Yes">
     <a href="../Home/main.php">No, go back</a>
</form>