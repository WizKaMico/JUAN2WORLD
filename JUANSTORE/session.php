<?php
//Start session
session_start();
//Check whether the session variable SESS_MEMBER_ID is present or not
if (!isset($_SESSION['buyer_id']) || (trim($_SESSION['buyer_id']) == '')) {
    header("location: login.php?view=LOGIN");
    exit();
}
$buyer_session_id=$_SESSION['buyer_id'];

?>