<?php  
include "includes/connect.php";

if(isset($_GET['id'])){
    $id=$_GET['id'];
    $query="DELETE from orders where id = $id";
    if (mysqli_query($conn, $query)) {
        echo " record deleted successfully";
        header('location:orders.php');
      } else {
        echo "Error: " . $query . "<br>" . mysqli_error($conn);
      }
}

?>