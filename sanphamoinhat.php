			<div class="row">
			<div class="col-lg-12">
				<div class="heading"><h2>Sản phẩm mới nhất</h2></div>

				<div class="products">
				<?php
require 'inc/myconnect.php';
$query="SELECT * from sanpham WHERE date = (SELECT MAX(date) FROM sanpham) limit 4;";
$rs = $conn->query($query);
if ($rs->num_rows > 0) {
   // output data of each row
   while($row = $rs->fetch_assoc()) {

?>
					<div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
						<div class="product">
							<div class="image"><a href="product.php?id=<?php echo $row["ID"]?>"><img src="images/<?php echo $row["HinhAnh"]?>" style="width:300px;height:300px"/></a></div>
							<div class="caption">
								<div class="name"><h3><a href="product.php?id=<?php echo $row["ID"]?>"><?php echo $row["Ten"]?></a></h3></div>
								<div class="price"><?php echo $row["Gia"] ?>.000 VNĐ</div>
							</div>
						</div>
		
					</div>
					<?php
	}
}
				?>
				</div>