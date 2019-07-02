<?php
require 'myconnect.php';
//lay danh sach san pham khuyen mai
$sql="SELECT * FROM sanpham   ";
$result = $conn->query($sql);
//lay danh sach san pham mới nhất
$conn->close();
?>