<?php session_start() ?>
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
						<!-- LOGO -->
						<div class="col-md-3">
							<div class="header-logo">
								<a href="#" class="logo">
									<img src="./img/logo.png" alt="">
								</a>
							</div>
						</div>
						<!-- /LOGO -->

						<?php require "addcart.php" ?>
						<!-- SEARCH BAR -->
						<?php require "../models/protypes.php"; 
						$manufacture = new Protype;
						$manufactures = $manufacture -> getAllProtypes();  ?>
						<div class="col-md-6">
							<div class="header-search">
								<form action = "blank.php" method = "get" >
									<select class="input-select" name = "type_id">
										<option value="0">All Categories</option>
										<?php foreach($manufactures as $value):?>
										<option value="<?php echo $value['type_id'] ?>"><?php echo $value['type_name'] ?></option>
										<?php endforeach; ?>
									</select>
									<input class="input" type="text" name="keyword" id =" " placeholder="Search here">
									<button class="search-btn">Search</button>
								</form>
							</div>
						</div>
						<!-- /SEARCH BAR -->


						<!-- ACCOUNT -->
						<div class="col-md-3 clearfix">
							<div class="header-ctn">
								<!-- Wishlist -->
								<div>
									<?php 
									if(isset($_SESSION['user'])){?>
									<a href="#">
										<i class="fa fa-heart-o"></i>
										<span>Your Wishlist</span>
										<div class="qty">2</div>
									</a>
									<?php } else { ?>
										<a href="login.php">
										
										<span>Login</span>
										
									</a>
									 <?php } ?>
								</div>
								<!-- /Wishlist -->

								<!-- Cart -->
								<div class="dropdown">
									<a class="dropdown-toggle" data-toggle="dropdown" aria-expanded="true">
										<i class="fa fa-shopping-cart"></i>
										<span>Your Cart</span>
										<div class="qty"><?php echo demSL() ?></div>
									</a>
									<div class="cart-dropdown">
										<div class="cart-list">
										    <?php 
											if(isset($_SESSION['cart'])){
												foreach($_SESSION['cart'] as $key=>$qty): 
													foreach($products as $value):
														  if($key == $value['id'] ): ?>
	
												 <div class="product-widget">
													<div class="product-img">
														<img src="./img/<?php echo  $value['image'] ?>" alt="">
													</div>
													<div class="product-body">
														<h3 class="product-name"><a href="product.php?idtam=<?php echo  $value['id'] ?>"><?php echo  $value['name'] ?></a></h3>
														<?php if($value['selling'] == 1) { ?>
															<h4 class="product-price"><span class="qty"><?php echo  $qty ?></span><?php echo number_format(($value['price'] * 0.9 )*$qty) ?> VND</h4>
														<?php } else {?>
															<h4 class="product-price"><span class="qty"><?php echo  $qty ?></span><?php echo number_format($value['price']  *$qty) ?> VND</h4>
														<?php } ?>
													</div>
													
													<a href="delproduct.php?id=<?php echo $value['id'] ?>"><button class="delete"><i class="fa fa-close"></i></button></a>
												</div>
												<?php
													  endif;
													 endforeach;
													 endforeach; 
											 }else{
												 echo "<div>  </div>";
											}
											?>
										 </div>
										<div class="cart-summary">
										     <?php if(isset($_SESSION['cart'])){?>
											<small><?php echo demSL() ?> Item(s) selected</small>
											<h5>SUBTOTAL: <?php echo number_format( tinhtongtien()) ?> VND</h5>
											<?php }else{
                                                echo "<p> Không Có Sản Phẩm </p>";
											}?>
										</div>
										<div class="cart-btns">
											<a href="cart.php">View Cart</a>
											<a href="checkout.php">Checkout  <i class="fa fa-arrow-circle-right"></i></a>
										</div>
									</div>
								</div>
								<!-- /Cart -->

								<!-- Menu Toogle -->
								<div class="menu-toggle">
									<a href="#">
										<i class="fa fa-bars"></i>
										<span>Menu</span>
									</a>
								</div>
								<!-- /Menu Toogle -->
							</div>
						</div>
						<!-- /ACCOUNT -->
					</div>
					<!-- row -->
				</div>
				<!-- container -->
			</div>
			<!-- /MAIN HEADER -->
		</header>
		<!-- /HEADER -->

		<!-- NAVIGATION -->
		<nav id="navigation">
			<!-- container -->
			<div class="container">
				<!-- responsive-nav -->
				<div id="responsive-nav">
					<!-- NAV -->
					<ul class="main-nav nav navbar-nav">
						<li class="active"><a href="home.php">Home</a></li>
						<li><a href="store.php?type_id=2">Laptops</a></li>
						<li><a href="store.php?type_id=1">Smartphones</a></li>
						<li><a href="store.php?type_id=3">Tai Nghe</a></li>
						<li><a href="store.php?type_id=4">Cameras</a></li>
						<li><a href="store.php?type_id=5">Accessories</a></li>
					</ul>
					<!-- /NAV -->
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
						<ul class="breadcrumb-tree">
							<li><a href="home.php">Home</a></li>
							<li><a href="#">All Categories</a></li>
							<li><a href="#">Accessories</a></li>
							<li><a href="#">Headphones</a></li>
							<li class="active">Product name goes here</li>
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
					<!-- Product main img -->
					<div class="col-md-5 col-md-push-2">
						<div id="product-main-img">
						  <?php  // lay code tu file.php
	                          
	                          //tao csdl
	                          $product = new Product;
	                          $products = $product -> getAllProducts();
			      $type_id = "";
	                           foreach($products as $value):
								if($value['id'] == $_GET['idtam']){
								$type_id = $value['type_id'];
	                           ?>
							<div class="product-preview">
								<img src="./img/<?php echo $value['image'] ?>" alt="">
							</div>
                            <?php } endforeach ?>
						</div>
					</div>
					<!-- /Product main img -->

					<!-- Product thumb imgs -->
					
					<!-- /Product thumb imgs -->

					<!-- Product details -->
					<?php $reviews = $product -> getAllReviews($_GET['idtam']); ?>
				    <?php	foreach($products as $value):
								if($value['id'] == $_GET['idtam']){
	                           ?>
								<div class="col-md-5 col-md-push-2" >
						<div class="product-details">
							<h2 class="product-name"><?php echo $value['name'] ?></h2>
							<div>
								<div class="product-rating">
									<i class="fa fa-star"></i>
									<i class="fa fa-star"></i>
									<i class="fa fa-star"></i>
									<i class="fa fa-star"></i>
									<i class="fa fa-star-o"></i>
								</div>
								<a class="review-link"  href="#tab3"><?php if( count($reviews) <= 1 ) { echo count($reviews)?> Review <?php }else {echo count($reviews) ?> Review(s) <?php } ?>  | Add your review</a>
							</div>
							<div>
								<h3 class="product-price"><?php echo number_format($value['price'] * 0.9 ) ?> <del class="product-old-price"><?php echo number_format($value['price']) ?></del></h3>
								<span class="product-available">In Stock</span>
							</div>
							<div id = "noidung">
							<p><?php echo $value['description'] ?></p>
							</div>
							

							<div class="product-options">
								<label>
									Size
									<select class="input-select">
										<option value="0">X</option>
									</select>
								</label>
								<label>
									Color
									<select class="input-select">
										<option value="0">Red</option>
									</select>
								</label>
							</div>

							<div class="add-to-cart">
								<div class="qty-label">
									Qty
									<div class="input-number">
										<input type="number">
										<span class="qty-up">+</span>
										<span class="qty-down">-</span>
									</div>
								</div>
								<a href="product.php?id=<?php echo $value['id']?>&idtam=<?php echo $value['id']?>"><button class="add-to-cart-btn"><i class="fa fa-shopping-cart"></i> add to cart</button></a>
							</div>

							<ul class="product-btns">
								<li><a href="wishlist.php"><i class="fa fa-heart-o"></i> add to wishlist</a></li>
								<li><a href="#"><i class="fa fa-exchange"></i> add to compare</a></li>
							</ul>

							<ul class="product-links">
								<li>Category:</li>
								<li><a href="store.php?type_id=3">Headphones</a></li>
								<li><a href="store.php?type_id=5">Accessories</a></li>
							</ul>

							<ul class="product-links">
								<li>Share:</li>
								<li><a href="#"><i class="fa fa-facebook"></i></a></li>
								<li><a href="#"><i class="fa fa-twitter"></i></a></li>
								<li><a href="#"><i class="fa fa-google-plus"></i></a></li>
								<li><a href="#"><i class="fa fa-envelope"></i></a></li>
							</ul>

						</div>
					</div>
                    <?php } endforeach ?>
				
					<!-- /Product details -->

					<!-- Product tab -->
					<div class="col-md-12">
						<div id="product-tab">
							<!-- product tab nav -->
							<ul class="tab-nav">
								<li class="active"><a data-toggle="tab" href="#tab1">Description</a></li>
								<li><a data-toggle="tab" href="#tab2">Details</a></li>
								
								<li><a data-toggle="tab" href="#tab3">Reviews (<?php echo count($reviews) ?>)</a></li>
							</ul>
							<!-- /product tab nav -->

							<!-- product tab content -->
							<div class="tab-content">
								<!-- tab1  -->
								<div id="tab1" class="tab-pane fade in active">
									<div class="row">
										<div class="col-md-12">
										<?php	foreach($products as $value):
								                     	if($value['id'] == $_GET['idtam']){
	                                    						?>
											<p><?php echo $value['description'] ?></p>
											<?php } endforeach ?>
										</div>
									</div>
								</div>
								<!-- /tab1  -->

								<!-- tab2  -->
								<div id="tab2" class="tab-pane fade in">
									<div class="row">
										<div class="col-md-12">
										<?php	
										foreach($products as $value):
								                     	if($value['id'] == $_GET['idtam']){
											$detail = $product ->getDetail($_GET['idtam']);
											//var_dump($detail);
	                                    						?>

										          <h4 style ="text-align: center;">Tên: <?php echo $value['name'] ?></h4>
											<p><b> Mô Tả:</b> <?php echo $value['description'] ?></p>
											<p><b> Thể Loại :</b><?php echo $detail[0]['type_name'] ?></p>
											<p><b> Hãng :</b><?php echo $detail[0]['manu_name'] ?></p>
											<p><b> Thời Gian Ra Mắt :</b><?php echo $detail[0]['created_at'] ?></p>
											<?php } endforeach ?>
										</div>
									</div>
								</div>
								<!-- /tab2  -->

								<!-- tab3  -->
								<div id="tab3" class="tab-pane fade in">
									<div class="row">
										<!-- Rating -->
										<div class="col-md-3">
											<div id="rating">
												<div class="rating-avg">
													<span>4.5</span>
													<div class="rating-stars">
														<i class="fa fa-star"></i>
														<i class="fa fa-star"></i>
														<i class="fa fa-star"></i>
														<i class="fa fa-star"></i>
														<i class="fa fa-star-o"></i>
													</div>
												</div>
												<ul class="rating">
													<li>
														<div class="rating-stars">
															<i class="fa fa-star"></i>
															<i class="fa fa-star"></i>
															<i class="fa fa-star"></i>
															<i class="fa fa-star"></i>
															<i class="fa fa-star"></i>
														</div>
														<div class="rating-progress">
															<div style="width: 80%;"></div>
														</div>
														<span class="sum">3</span>
													</li>
													<li>
														<div class="rating-stars">
															<i class="fa fa-star"></i>
															<i class="fa fa-star"></i>
															<i class="fa fa-star"></i>
															<i class="fa fa-star"></i>
															<i class="fa fa-star-o"></i>
														</div>
														<div class="rating-progress">
															<div style="width: 60%;"></div>
														</div>
														<span class="sum">2</span>
													</li>
													<li>
														<div class="rating-stars">
															<i class="fa fa-star"></i>
															<i class="fa fa-star"></i>
															<i class="fa fa-star"></i>
															<i class="fa fa-star-o"></i>
															<i class="fa fa-star-o"></i>
														</div>
														<div class="rating-progress">
															<div></div>
														</div>
														<span class="sum">0</span>
													</li>
													<li>
														<div class="rating-stars">
															<i class="fa fa-star"></i>
															<i class="fa fa-star"></i>
															<i class="fa fa-star-o"></i>
															<i class="fa fa-star-o"></i>
															<i class="fa fa-star-o"></i>
														</div>
														<div class="rating-progress">
															<div></div>
														</div>
														<span class="sum">0</span>
													</li>
													<li>
														<div class="rating-stars">
															<i class="fa fa-star"></i>
															<i class="fa fa-star-o"></i>
															<i class="fa fa-star-o"></i>
															<i class="fa fa-star-o"></i>
															<i class="fa fa-star-o"></i>
														</div>
														<div class="rating-progress">
															<div></div>
														</div>
														<span class="sum">0</span>
													</li>
												</ul>
											</div>
										</div>
										<!-- /Rating -->

										<!-- Reviews -->

										<!-- Liên kết khóa ngoại thông qua id được gán bởi idtam-->
										<?php 
										
										?>
										<div class="col-md-6">
											<div id="reviews">
												<ul class="reviews">
													<!-- Tạo vòng lặp xuất reviews  kiểm tra khóa ngoại idtam-->
													<?php 
													if(isset($_GET['idtam'])){
														
														
														foreach($reviews as $value){?>
															<li>
																<div class="review-heading">
																	<h5 class="name"><?php echo $value['name_reviewer'] ?></h5>
																	<div class="review-rating">
																		<?php 
																		for( $i = 1; $i <= (int)$value['star']; $i++) {?>
																			<i class="fa fa-star"></i>
																		<?php } ?>
																		<?php for($j = 1;$j <= 5 - (int)$value['star']; $j++) {?>
																			<i class="fa fa-star-o empty"></i>
																		<?php  } ?>
																	</div>
																</div>
																<div class="review-body">
																	<p><?php echo $value['content'] ?></p>
																</div>
															</li>
														<?php } }?>
												</ul>
												<ul class="reviews-pagination">
													<li class="active">1</li>
													<li><a href="#">2</a></li>
													<li><a href="#">3</a></li>
													<li><a href="#">4</a></li>
													<li><a href="#"><i class="fa fa-angle-right"></i></a></li>
												</ul>
											</div>
										</div>
										<!-- /Reviews -->

										<!-- Review Form -->
										<div class="col-md-3">
											<div id="review-form">
												<form class="review-form" method = "post" action="add_review.php?idtam=<?php echo $_GET['idtam']?>">
													<input class="input" type="text" name="name" id ="name" placeholder="Your Name">
													<input class="input" type="email" name="email" id ="email" placeholder="Your Email">
													<textarea class="input" name="content" id ="content" placeholder="Your Review"></textarea>
													<div class="input-rating">
														<span>Your Rating: </span>
														<div class="stars">
															<input id="star5" name="rating" value="5" type="radio"><label for="star5"></label>
															<input id="star4" name="rating" value="4" type="radio"><label for="star4"></label>
															<input id="star3" name="rating" value="3" type="radio"><label for="star3"></label>
															<input id="star2" name="rating" value="2" type="radio"><label for="star2"></label>
															<input id="star1" name="rating" value="1" type="radio"><label for="star1"></label>
														</div>
													</div>
													<button class="primary-btn" name = "submit" >Submit</button>
													
												</form>
											</div>
											
										</div>
										<?php
												          //if(isset($_POST['rating'])){
													// $idsp = $_GET['idtam'];
													// $name = $_POST['name'];
													// $email = $_POST['email'];
													// $content = $_POST['content'];
													//$star = $_POST['rating'];
													// $product -> addReview($idsp, $name, $email, $content, $star);
												//}
												
												?>
										
										<!-- /Review Form -->
									</div>
								</div>
								<!-- /tab3  -->
							</div>
							<!-- /product tab content  -->
						</div>
					</div>
					<!-- /product tab -->
				</div>
				<!-- /row -->
			</div>
			<!-- /container -->
		</div>
		<!-- /SECTION -->

		<!-- Section -->
		<div class="section">
			<!-- container -->
			<div class="container">
				<!-- row -->
				<div class="row">

				<div class="col-md-12">
						<div class="row">
							<div class="products-tabs">
							<!-- tab -->
								<div id="tab1" class="tab-pane active">
									<div class="products-slick" data-nav="#slick-nav-1">
 							   <!-- product -->
								<?php 
								
								$getProductByType = $product->getProductByTypeId($type_id);
								foreach($getProductByType as $value): ?>
							   <!-- product -->
							<div class="col-md-3 col-xs-6">
							<div class="product">
											         <div class="product-img">
												    <img src="./img/<?php echo $value['image'] ?>" alt="">
												    <div class="product-label">
												<?php if($value['selling'] == 1) { ?>
													<span class="sale">-10%</span>
												<?php } ?>
                                                         
													    <span class="new">NEW</span>
												        </div>
											        </div>
											      <div class="product-body">
												<p class="product-category">Category</p>
												<h3 class="product-name"><a href="product.php?idtam=<?php echo $value['id']?>"><?php echo substr($value['name'],0,35)?></a></h3>
                                                <?php if($value['selling'] == 1) { ?>
                                                    <h4 class="product-price"><?php echo number_format($value['price'] * 0.9 ) ?><del class="product-old-price"><?php echo number_format($value['price']) ?></del></h4>
                                                    <?php } else {?>
                                                        <h4 class="product-price"><?php echo number_format($value['price']) ?><del class="product-old-price"></del></h4>
                                                    <?php } ?>
												<div class="product-rating">
													<i class="fa fa-star"></i>
													<i class="fa fa-star"></i>
													<i class="fa fa-star"></i>
													<i class="fa fa-star"></i>
													<i class="fa fa-star"></i>
												</div>
												<div class="product-btns">
													<button class="add-to-wishlist"><i class="fa fa-heart-o"></i><span class="tooltipp">add to wishlist</span></button>
													<button class="add-to-compare"><i class="fa fa-exchange"></i><span class="tooltipp">add to compare</span></button>
													<button class="quick-view"><i class="fa fa-eye"></i><span class="tooltipp">quick view</span></button>
												</div>
											   </div>
											    <div class="add-to-cart">
												<a href="store.php?id=<?php echo $value['id']?>&idtam=<?php echo $value['id']?>"><button class="add-to-cart-btn"><i class="fa fa-shopping-cart"></i> add to cart</button></a>
											</div>
										    </div>
							</div>
							<!-- /product -->
	               				<?php endforeach; ?>
									
										<!-- /product -->
									</div>
									<div id="slick-nav-1" class="products-slick-nav"></div>
								</div>
								<!-- /tab -->
							</div>
						</div>
					</div>
					<!-- Products tab & slick -->
				</div>
				<!-- /row -->
			</div>
			<!-- /container -->
		</div>
		<!-- /Section -->

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
		<script src="../doantest/js/main.js"></script>
		<!-- delete product -->
		<script>
			const product = document.querySelectorAll('.product-widget');
			const b = document.querySelectorAll('.delete');
			
			for (let i = 0; i < b.length; i++) {
				b[i].addEventListener("click", function(){
						 product[i].remove();
						
				});
            };
        </script>
		
	</body>
</html>
