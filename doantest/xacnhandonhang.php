<?php session_start() ;
if(!$_SESSION['user']){
	header('location: login.php');
} 
 require "addcart.php"; ?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		 <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->

		<title>Electro - HTML Ecommerce Template</title>

 		<!-- Google font -->
 		<link href="https://fonts.googleapis.com/css?family=Montserrat:400,500,700" rel="stylesheet">

 		<!-- Bootstrap -->
 		<link type="text/css" rel="stylesheet" href="css/bootstrap.min.css"/>

 		<!-- Slick -->
 		<link type="text/css" rel="stylesheet" href="css/slick.css"/>
 		<link type="text/css" rel="stylesheet" href="css/slick-theme.css"/>

 		<!-- nouislider -->
 		<link type="text/css" rel="stylesheet" href="css/nouislider.min.css"/>

 		<!-- Font Awesome Icon -->
 		<link rel="stylesheet" href="css/font-awesome.min.css">

 		<!-- Custom stlylesheet -->
 		<link type="text/css" rel="stylesheet" href="css/style.css"/>

 		<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
 		<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
 		<!--[if lt IE 9]>
 		  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
 		  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
 		<![endif]-->

                    <style>
                              .box-cart-confirm {
                                        max-width: 95%;
                                        max-width: 610px;
                                        margin: 30px auto;
                                        border-radius: 10px;
                                        -webkit-border-radius: 10px;
                                        -webkit-box-shadow: 0px 0px 5px 0px rgb(0 0 0 / 15%);
                                        -moz-box-shadow: 0px 0px 5px 0px rgba(0,0,0,0.15);
                                        box-shadow: 0px 0px 10px 5px rgb(0 0 0 / 15%);
                              }
                              .sanpham_ct{
                                        display: flex;
                                        justify-content: center;
                                        border: 1px solid red;
                                        border-radius: 5px;
                                        margin-top:5px;
                                        margin-bottom:5px;       
                                        padding-top: 5px;
                                        padding-right: 5px;
                                        padding-left: 5px;                       
                              }
                              .confirm-head {
                                        text-align: center;
                                        color: #05aa34;
                                        text-transform: uppercase;
                                        font-weight: bold;
                                        font-size: 18px;
                                        margin: 0;
                                        padding: 0;
                                        background: #f6f5f3;
                                        padding: 15px 0;
                              }
                              .confirm-body-inner{
                                        padding: 15px ;
                              }
                              .confirm-body p{
                                        margin-bottom: 15px;
                                        padding-bottom: 5px;
                              }
                              .confirm-body h3 {
                                        text-transform: uppercase;
                                        background: #f5f5f5;
                                        color: #000;
                                        font-size: 13px;
                                        margin: 0 0 10px;
                                        padding: 10px;
                                        border-radius: 3px;
                                        -webkit-border-radius: 3px;
                              }
                              .confirm-body .hotline {
                                        text-align: center;
                                        font-size: 14px;
                                        color: #486ecf;
                              }
                              .sanpham_ct .lienhe p{
                                        margin-bottom: 0;
                                        padding-bottom: 2px;
                                        color: #f7031f;
                                        font-weight: bold;
                                        text-align:right;
                              }
                              .confirm-body .buy-more {
                                        margin-top: 15px;
                                        display: block;
                                        color: #315fcf;
                                        border: 1px solid #315fcf;
                                        border-radius: 5px;
                                        -webkit-border-radius: 5px;
                                        width: 100%;
                                        text-align: center;
                                        text-transform: uppercase;
                                        padding: 10px 0;
                                        font-weight: bold;
                                        font-size: 14px;
                                        transition: color 0.3s ease-out;
                              }
                              .confirm-body .buy-more:hover{
                                       color:#fff;
                                       background: #315fcf;
                              }
                              .confirm-body .order-col {
                                        margin-top: 10px ;
                                        color:#05aa34;
                                        text-align: -webkit-right;
                                        margin-bottom: 10px ;
                              }
                              .confirm-body .order-col .order-total{
                                        padding: 10px ;
                                        width: 40%;
                                        background: repeating-linear-gradient(-45deg, pink, transparent 100px);
                                        display:flex;
                                        justify-content: space-evenly;
                              }
                    </style>

    </head>
	<body>
		<!-- HEADER -->
		<header>
			<!-- TOP HEADER -->
			<div id="top-header">
				<div class="container">
					<ul class="header-links pull-left">
						<li><a href="#"><i class="fa fa-phone"></i> +021-95-51-84</a></li>
						<li><a href="#"><i class="fa fa-envelope-o"></i> email@email.com</a></li>
						<li><a href="#"><i class="fa fa-map-marker"></i> 1734 Stonecoal Road</a></li>
					</ul>
					<ul class="header-links pull-right">
						<?php				 					
						if(isset($_SESSION['user'])){	?>
						         <div class="name dropdown" style ="display: flex;">
						                   <li><a href=''><?php echo "Chào ".$_SESSION['user'] ?></a>
							         <li><a href='../dangnhap/logout.php'><?php echo "Thoát"  ?></a>
						         </div>						
							
						<?php }
						else
						{
							echo "<li><a href='login.php'></a>";
						}
						?>
					</ul>
				</div>
			</div>
			<!-- /TOP HEADER -->

			<!-- MAIN HEADER -->
			<div id="header">
				<!-- container -->
				<div class="container">
					<!-- row -->
                                                  <div class="row">
                                                            <div class="tittle" style="text-align:center;">
                                                                      <h1 style="color:white">Xác Nhận Đơn Hàng</h1>
                                                            </div>
                                                  </div>
                                         </div>
				<!-- /responsive-nav -->
			</div>
			<!-- /container -->
		</nav>
		<!-- /NAVIGATION -->

		<!-- BREADCRUMB -->
		<div id="breadcrumb" class="section">
			<!-- container -->
			<div class="container">
				<!-- row -->
				<div class="row">
					<div class="col-md-12">
						<h3 class="breadcrumb-header">Confirm Page</h3>
						<ul class="breadcrumb-tree">
							<li><a href="home.php">Home</a></li>
							<li class="active">Blank</li>
						</ul>
					</div>
				</div>
				<!-- /row -->
			</div>
			<!-- /container -->
		</div>
		<!-- /BREADCRUMB -->

		<!-- SECTION -->
		<div class="section">
			<!-- container -->
			<div class="container">
				<!-- row -->
				<div class="row">
                                                  <div class="box-cart-confirm">
                                                            <div class="confirm-head">Đặt Hàng Thành Công</div>
                                                            <div class="confirm-body">
                                                                      <div class="confirm-body-inner ">
                                                                                <p>Cảm ơn bạn đã mua hàng tại Shop cơ hội được phục vụ. Nhân viên Electro sẽ gửi tin nhắn hoặc gọi điện xác nhận đơn hàng cho bạn</p>
                                                                                <h3>Thông tin đặt hàng</h3>
                                                                                <ul>
                                                                                          
                                                                                          <li><b>Recipient's name: </b>  <?php echo $_POST['full_name']?></li>
                                                                                          <li><b>Email: </b> <?php echo $_POST['email']?></li>
                                                                                          <li><b>Address: </b><?php echo $_POST['address']?></li>
                                                                                          <li><b>City/Province: </b> <?php echo $_POST['city']?></li>
                                                                                          <li><b>Country: </b><?php echo $_POST['country']?></li>
                                                                                          <li><b>Telephone: </b><?php echo $_POST['tel']?></li>
                                                                                          <li><b>Hình thức thanh toán: </b><?php echo $_POST['payment']?></li>

                                                                                </ul>
                                                                                <p class="hotline">
                                                                                          Hỗ trợ vui lòng gọi
                                                                                          <strong>1800.6229</strong>
                                                                                </p>
                                                                                <h3>Sản Phẩm Bạn Đã Mua</h3>
                                                                                <?php 
                                                                                          if(isset($_SESSION['cart']) && count($_SESSION['cart']) != 0 ){
                                                                                                    foreach($_SESSION['cart'] as $key=>$qty): 
                                                                                                              foreach($products as $value):
                                                                                                                        if($key == $value['id']){ ?>
                                                                                                                        <div class="col-12 sanpham">
                                                                                                                                  <div class="col-12 sanpham_ct">
                                                                                                                                                      <div class="sanpham_detail" style="width: 65%; display:flex;">
                                                                                                                                                                <img src="./img/<?php echo $value['image'] ?>" alt="" style="height: 80px;width: 80px; inset: 0px;color: transparent;">
                                                                                                                                                                <div  class="sanpham_link">
                                                                                                                                                                          <div class="sanpham_name">
                                                                                                                                                                                    <p><a href="product.php?idtam=<?php echo $value['id']?>"><?php echo $value['name'] ?></a><p>
                                                                                                                                                                                    <h6 class="soluong">Số Lượng: <?php echo $qty ?></h6>
                                                                                                                                                                          </div>
                                                                                                                                                                </div>

                                                                                                                                                      </div>
                                                                                                                                                      
                                                                                                                                                      <div class="lienhe" style="width: 25%">
                                                                                                                                                                <p>LH: 1800 6229</p>
                                                                                                                                                      </div>
                                                                                                                                  </div>
                                                                                                                        </div>
                                                                                                              <?php
                                                                                                              }endforeach;
                                                                                                    endforeach; 
                                                                                          }else{
                                                                                                    echo "<h2>Không Tồn Tại Sản Phẩm Trong Giỏ Hàng</h2>";
                                                                                          }
                                                                                                              ?>
                                                                                                              <div class="order-col">
                                                                                                                        <div  class="order-total" ><p style="margin: 0px; padding 0px;">Thành Tiền: <?php echo number_format( tinhtongtien()) ?> VND</p></div>
                                                                                                              </div>
                                                                                                              <div class="chonchucnang" style="text-align:center;">
                                                                                                                        <a href="<?php echo $_SERVER["HTTP_REFERER"]; ?>"><button class="add-to-cart-btn"><i class="fa fa-backward"></i> Quay lại</button></a>
		                                                                                                    <a href="checkout.php"><button class="add-to-cart-btn"><i class="fa fa-trash"></i></i> Hủy đơn hàng</button></a>
                                                                                                                        <a class="buy-more" href="store.php">Mua thêm sản phẩm</a>
                                                                                                              </div>
                                                                                
                                                                      </div>
                                                            </div>
                                                  </div>
				</div>
				<!-- /row -->
			</div>
			<!-- /container -->
		</div>
		<!-- /SECTION -->

		<!-- NEWSLETTER -->
		<div id="newsletter" class="section">
			<!-- container -->
			<div class="container">
				<!-- row -->
				<div class="row">
					<div class="col-md-12">
						<div class="newsletter">
							<p>Sign Up for the <strong>NEWSLETTER</strong></p>
							<form>
								<input class="input" type="email" placeholder="Enter Your Email">
								<button class="newsletter-btn"><i class="fa fa-envelope"></i> Subscribe</button>
							</form>
							<ul class="newsletter-follow">
								<li>
									<a href="#"><i class="fa fa-facebook"></i></a>
								</li>
								<li>
									<a href="#"><i class="fa fa-twitter"></i></a>
								</li>
								<li>
									<a href="#"><i class="fa fa-instagram"></i></a>
								</li>
								<li>
									<a href="#"><i class="fa fa-pinterest"></i></a>
								</li>
							</ul>
						</div>
					</div>
				</div>
				<!-- /row -->
			</div>
			<!-- /container -->
		</div>
		<!-- /NEWSLETTER -->

		<!-- FOOTER -->
		<footer id="footer">
			<!-- top footer -->
			<div class="section">
				<!-- container -->
				<div class="container">
					<!-- row -->
					<div class="row">
						<div class="col-md-3 col-xs-6">
							<div class="footer">
								<h3 class="footer-title">About Us</h3>
								<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut.</p>
								<ul class="footer-links">
									<li><a href="#"><i class="fa fa-map-marker"></i>1734 Stonecoal Road</a></li>
									<li><a href="#"><i class="fa fa-phone"></i>+021-95-51-84</a></li>
									<li><a href="#"><i class="fa fa-envelope-o"></i>email@email.com</a></li>
								</ul>
							</div>
						</div>

						<div class="col-md-3 col-xs-6">
							<div class="footer">
								<h3 class="footer-title">Categories</h3>
								<ul class="footer-links">
									<li><a href="#">Hot deals</a></li>
									<li><a href="#">Laptops</a></li>
									<li><a href="#">Smartphones</a></li>
									<li><a href="#">Cameras</a></li>
									<li><a href="#">Accessories</a></li>
								</ul>
							</div>
						</div>

						<div class="clearfix visible-xs"></div>

						<div class="col-md-3 col-xs-6">
							<div class="footer">
								<h3 class="footer-title">Information</h3>
								<ul class="footer-links">
									<li><a href="#">About Us</a></li>
									<li><a href="#">Contact Us</a></li>
									<li><a href="#">Privacy Policy</a></li>
									<li><a href="#">Orders and Returns</a></li>
									<li><a href="#">Terms & Conditions</a></li>
								</ul>
							</div>
						</div>

						<div class="col-md-3 col-xs-6">
							<div class="footer">
								<h3 class="footer-title">Service</h3>
								<ul class="footer-links">
									<li><a href="#">My Account</a></li>
									<li><a href="#">View Cart</a></li>
									<li><a href="#">Wishlist</a></li>
									<li><a href="#">Track My Order</a></li>
									<li><a href="#">Help</a></li>
								</ul>
							</div>
						</div>
					</div>
					<!-- /row -->
				</div>
				<!-- /container -->
			</div>
			<!-- /top footer -->

			<!-- bottom footer -->
			<div id="bottom-footer" class="section">
				<div class="container">
					<!-- row -->
					<div class="row">
						<div class="col-md-12 text-center">
							<ul class="footer-payments">
								<li><a href="#"><i class="fa fa-cc-visa"></i></a></li>
								<li><a href="#"><i class="fa fa-credit-card"></i></a></li>
								<li><a href="#"><i class="fa fa-cc-paypal"></i></a></li>
								<li><a href="#"><i class="fa fa-cc-mastercard"></i></a></li>
								<li><a href="#"><i class="fa fa-cc-discover"></i></a></li>
								<li><a href="#"><i class="fa fa-cc-amex"></i></a></li>
							</ul>
							<span class="copyright">
								<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
								Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="fa fa-heart-o" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a>
							<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
							</span>


						</div>
					</div>
						<!-- /row -->
				</div>
				<!-- /container -->
			</div>
			<!-- /bottom footer -->
		</footer>
		<!-- /FOOTER -->

		<!-- jQuery Plugins -->
		<script src="js/jquery.min.js"></script>
		<script src="js/bootstrap.min.js"></script>
		<script src="js/slick.min.js"></script>
		<script src="js/nouislider.min.js"></script>
		<script src="js/jquery.zoom.min.js"></script>
		<script src="js/main.js"></script>
		
	</body>
</html>
