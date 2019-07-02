<?php
    require 'myconnect.php';
    $id = $_GET['id_bill_detail'];
?>
<script>

</script>
<?php 
        $stringDelete = " DELETE FROM `chitiethoadon` WHERE `id_chi_tiet_hoadon` = ".$id."; ";
    if ($conn->query($stringDelete) === TRUE) {
        header('Location: ../quanlyhoadon.php');
    } else {
        echo "Error deleting record: " . $conn->error;
    }

$conn->close();
?>
        <script>
function myFunction() {
    alert("Đã thay đổi trạng thái");
}
</script>