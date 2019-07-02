<?php
	session_start();
?>
<?php 
	include "head.php";
	?>
<?php
$title ="Shop huy";
$name ="Điện thoai";
?>
<?php 
	include "top.php"
    ?>
    <?php 
	include "header.php"
	?>
	<?php 
	include "navigation.php"
	?>

	<!--//////////////////////////////////////////////////-->
	<!--///////////////////Product Page///////////////////-->
	<!--//////////////////////////////////////////////////-->
	<div id="page-content" class="single-page">
	<?php
   require 'inc/myconnect.php';
   //lay san pham theo id
   $id = $_GET["id"];
   $query="SELECT s.ID,s.Ten,s.date,s.Gia,s.HinhAnh,s.KhuyenMai,s.giakhuyenmai,s.Mota, n.Ten as Tennhasx,s.Manhasx
   from sanpham s 
   LEFT JOIN nhasanxuat n on n.ID = s.Manhasx
	WHERE  s.id =".$id;
   $result = $conn->query($query);
$row = $result->fetch_assoc();

?>
		<div class="container">
			<div class="row">
				<div class="col-lg-12">
					<ul class="breadcrumb">
						<li><a href="index.php">Trang chủ</a></li>
						<li><a href="#">Sản phẩm</a></li>
						<li><a href="#"><?php echo $row["Ten"]?></a></li>
					</ul>
				</div>
			</div>
			<div class="row">

				<div id="main-content" class="col-md-8">
					<div class="product">
						<div class="col-md-6">
							<div class="image">
								<img src="images/<?php echo $row["HinhAnh"]?>" style="width:300px;height:300px" />
								<div class="image-more">
									 <ul class="row">
										 <li class="col-lg-3 col-sm-3 col-xs-4">
											<a href="#"><img class="img-responsive" src="images/<?php echo $row["HinhAnh"]?>"></a>
										</li>
										 <li class="col-lg-3 col-sm-3 col-xs-4">
											<a href="#"><img class="img-responsive" src="images/<?php echo $row["HinhAnh"]?>"></a>
										</li>
										 <li class="col-lg-3 col-sm-3 col-xs-4">
											<a href="#"><img class="img-responsive" src="images/<?php echo $row["HinhAnh"]?>"></a>
										</li>
										 <li class="col-lg-3 col-sm-3 col-xs-4">
											<a href="#"><img class="img-responsive" src="images/<?php echo $row["HinhAnh"]?>"></a>
										</li>
									</ul>
								</div>
							</div>
						</div>
						<div class="col-md-6">
							<div class="caption">
								<div class="name"><h3><?php echo $row["Ten"]?></h3></div>
								<div class="info">
									<ul>
										<li>Nhà sản xuất: <?php echo $row["Tennhasx"]?> <h3></li>
									</ul>
								</div>
								<?php
                                 if($row["KhuyenMai"] == true)
								 {                                      
								?>
									<div class="price"><?php echo $row["giakhuyenmai"]?>.000 VNĐ<span><?php echo $row["Gia"]?>.000 VNĐ</span></div>
								<?php 
								}
								?>
								<?php
                                 if($row["KhuyenMai"] == false)
								 {
								?>
								    <p style="color:red">Không có khuyến mãi</p>
									<div class="price"><?php echo $row["Gia"]?>.000 VNĐ<span></span></div>
								<?php 
								}
								?>
	
								<div class="well">
								<form name="form3" id="ff3" method="POST" action="<?php include "addcart.php" ?>">
								<input type="submit" name="submit" class="btn btn-2" value="Đặt hàng" />
								<a href="#" class="btn btn-info" data-toggle="modal" data-target="#myModal">Mua ngay</a>
								<input type="hidden" name="acction" value="them vao gio hang" />
								<input type="hidden" name="idsp" value="<?php echo $row["ID"] ?>" />
								</form>
								</div>
							
								
								<div class="modal fade" id="myModal" role="dialog">
							
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title" style="text-align: center">Thông tin khách hàng</h4>
        </div>
        <div class="modal-body">
		<form name="form6" id="ff6" method="POST" action="<?php include "luumuangay.php" ?>">
		<div class="form-group">
		<input type="text" class="form-control" placeholder="Tên:" name="name" id="name" required>
		</div>
						<div class="form-group">
							<input type="email" class="form-control" placeholder="Email :" name="email" id="email" required>
						</div>
						<div class="form-group">
							<input type="tel" class="form-control" placeholder="Điện thoại :" name="phone" id="phone" required>
						</div>
						<div class="form-group">
							<input type="text" class="form-control" placeholder="Địa chỉ :" name="txtdiachi" id="txtdiachi" required>
						</div>
						<div class="form-group">
							<input type="number" class="form-control" placeholder="Số lượng:" name="txtsoluong" id="txtsoluong" required>
						</div>
						<div class="form-group">
						<label><input type="date" class="form-control" placeholder="Ngày giao  :" name="date" id="datechoose"  required ></label>
						</div>
						<div class="form-group">
						<label> Hình thức thanh toán :<select class="selectpicker" name="hinhthuctt">
    										<option value="ATM">Trả thẻ</option>
    										<option value="Live">Trực tiếp</option>
  											</optgroup>
										</select>
										</lable>
						</div>
				
						<input type="hidden" name="idsp" value="<?php echo $row["ID"] ?>" />
						<input type="hidden" name="gia" value="<?php echo $row["Gia"] ?>" />
						<button type="submit" name="muangay"  class="btn btn-1">Đặt hàng</button>
		</form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
      
    </div>
  </div>
								<div class="share well">
									<div class="fb-like" data-href="https://www.facebook.com/Hutech-Shoes-1909218519350386/" data-layout="standard" data-action="like" data-size="small" data-show-faces="false" data-share="true"></div>									
								</div>
								<div class="share well">					
									<div class="g-plusone" data-size="medium" data-annotation="none" data-href="https://shopdthuy.000webhostapp.com/product.php?id=<?php echo $row["ID"] ?>"></div>
								</div>
							</div>
						</div>
						<div class="clear"></div>
					</div>	
					<div class="product-desc">
						<ul class="nav nav-tabs">
							<li class="active"><a href="#description">Mô tả</a></li>
							<li><a href="#review">Bình luận</a></li>
						</ul>
						<div class="tab-content">
							<div id="description" class="tab-pane fade in active">
								<h4>Thông tin sản phẩm</h4>
								<div innerHTML>
                      <p><?php echo $row["Mota"]?></p>
                    </div>						
							</div>
							<div id="review" class="tab-pane fade">
							  <div class="review-form">
								<form name="form1" id="ff" method="post" action="review.php">
									<label>
									<span>Bình luận:</span>
									<div class="fb-comments" data-href="https://www.facebook.com/Hutech-Shoes-1909218519350386/" data-numposts="5"></div>
									</label>
								</form>
							  </div>
							</div>
						</div>
					</div>
					<?php 
	include "sanphamlienquan.php"
	?>
	
						<div class="clear"></div>
					</div>
				</div>
				<?php 
	include "sidebar.php"
	?>
			</div>
		</div>
	</div>	

	<?php 
	include "footer.php"
	?>
	<!-- IMG-thumb -->
	<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">         
          <div class="modal-body">                
          </div>
        </div><!-- /.modal-content -->
      </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->
	
	<script>
	$(document).ready(function(){
		$(".nav-tabs a").click(function(){
			$(this).tab('show');
		});
		$('.nav-tabs a').on('shown.bs.tab', function(event){
			var x = $(event.target).text();         // active tab
			var y = $(event.relatedTarget).text();  // previous tab
			$(".act span").text(x);
			$(".prev span").text(y);
		});
	});
	</script>
</body>
</html>
<script>
    var date = new Date();

    var day = date.getDate();
    var month = date.getMonth() + 1;
    var year = date.getFullYear();

    if (month < 10) month = "0" + month;
    if (day < 10) day = "0" + day;

    var today = year + "-" + month + "-" + day;
    document.getElementById("datechoose").value = today;
</script>

