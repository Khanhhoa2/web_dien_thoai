<?php
    require 'myconnect.php';
    $id = $_GET['id_bill_detail'];
?>
<script>

</script>
<?php 
$stringUpdate = " DELETE FROM `chitiethoadon` WHERE `chitiethoadon`.`id_chi_tiet_hoadon` = ".$id."; " ; 
    if ($conn->query($stringUpdate) === TRUE) {
        header('Location: ../quanlyhoadon.php');
    } else {
        echo "Error deleting record: " . $conn->error;
    }
$conn->close();
?>