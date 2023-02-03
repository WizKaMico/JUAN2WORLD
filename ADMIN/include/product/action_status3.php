<?php
session_start();
include_once('../../../connection/connection.php');
if(isset($_POST['bulk_update_submit'])){
    $idArr = $_POST['checked_id'];
    $quantity = $_POST['quantity'];
    $reason = $_POST['reason'];
    foreach($idArr as $id){
        $sql = "SELECT * FROM tbl_product WHERE id = '$id'";
        $query = $conn->query($sql);
        while($row = $query->fetch_assoc()){
        // $assigned_id = $row['user_id'];   
        $name = $row['name']; 
        $previous_quantity = $row['quantity']; 
        $status = 'AVAILABLE';
        date_default_timezone_set('Asia/Manila');
        $date_updated = date('Y-m-d');
        mysqli_query($conn,"UPDATE tbl_product SET quantity = '$quantity' WHERE id = '$id'");
        // mysqli_query($conn,"INSERT INTO tbl_product_history (name, prod_id, previous_price, price, reason, status, date_updated) VALUES ('$name','$id','$previous_price', '$price', '$reason', '$status', '$date_updated')");
        // mysqli_query($conn,"UPDATE tbl_order_item SET item_price = '$price' WHERE product_id = '$id'");
        }
    }
    $_SESSION['success_msg'] = 'Successful';
    header("Location:index2.php");
}
?>