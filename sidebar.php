<div id="sidebar" class="col-md-4">
					<div class="widget wid-categories">
						<div class="heading"><h4>Nhà sản xuất</h4></div>
						<div class="content">
							<ul>
							<?php
   require 'inc/myconnect.php';
   //lay san pham theo id
   $layidrandom="SELECT ID,Ten  from nhasanxuat" ;
   $kq = $conn->query($layidrandom);
   if ($kq ->num_rows > 0) {
	// output data of each row
	while($d = $kq ->fetch_assoc()) {

?>
								<li><a href="category.php?manhasx=<?php echo $d["ID"] ?>"><?php echo $d["Ten"] ?></a></li>
								<?php
	}
}
								 ?>
							</ul>
						</div>
					</div>
					<div class="widget wid-product">
						<div class="heading"><h4>Sản phẩm gợi ý</h4></div>
						<div class="content">
						<?php
   require 'inc/myconnect.php';
   //lay san pham theo id
   $idrandmon = $row["ID"];
   $layidrandom="SELECT ID,Ten,Gia,HinhAnh
   from sanpham where ID != '$idrandmon'
   ORDER BY RAND() limit 0,3 " ;
   $kq = $conn->query($layidrandom);
   if ($kq ->num_rows > 0) {
	// output data of each row
	while($d = $kq ->fetch_assoc()) {

?>
							<div class="product">
								<a href="product.php?id=<?php echo $d["ID"] ?>"><img src="images/<?php echo $d["HinhAnh"] ?>" style="width:80px;height:100px" /></a>
								<div class="wrapper">
									<h5><a href="product.php?id=<?php echo $d["ID"] ?>"><?php echo $d["Ten"] ?></a></h5>
									<div class="price"><?php echo $d["Gia"] ?>.000 VNĐ</div>
								</div>
							</div>
							<?php
	} 
}
							?>
						</div>
					</div>
				</div>