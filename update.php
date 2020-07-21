<?php
// Turn off all error reporting
    error_reporting(0);
?>

<?php 
    include_once 'db.php';
    
    $phone = $_POST['child_phone'];
    
    $id = $_POST['idnumber'];
    $sql = "UPDATE user_entries SET number='$phone' WHERE child_id_number='$id'";
    $res = mysqli_query($conn, $sql);
    include "success.html"
?> 
