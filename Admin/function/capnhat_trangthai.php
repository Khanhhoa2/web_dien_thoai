<?php
    require 'myconnect.php';
    $id = $_GET['id'];
?>
<script>

</script>
<?php 
$stringUpdate = " UPDATE `hoadon` SET `trangthai` = 'ok' WHERE `hoadon`.`sodh` = ".$id."; " ; 
    if ($conn->query($stringUpdate) === TRUE) {
        header('Location: ../quanlyhoadon.php');
    } else {
        echo "Error deleting record: " . $conn->error;
    }
$conn->close();
?>