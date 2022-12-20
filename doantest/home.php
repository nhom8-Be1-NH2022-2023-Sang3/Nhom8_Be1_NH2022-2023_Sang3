<?php session_start() ;

//if(!$_SESSION['user']){
       //header('location: login.php');
//}
    //var_dump($_SESSION['user']);
    unset($_SESSION['cart']);
?>
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
						<?php require "addcart.php"?>
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
														  if($key == $value['id']): ?>
	
												 <div class="product-widget">
													<div class="product-img">
														<img src="./img/<?php echo  $value['image'] ?>" alt="">
													</div>
													<div class="product-body">
														<h3 class="product-name"><a href="product.php?idtam=<?php echo  $value['id'] ?>"><?php echo  $value['name'] ?></a></h3>
														<?php if($value['selling'] == 1) { ?>
															<h4 class="product-price"><span class="qty"><?php echo  $qty ?></span><?php echo number_format(($value['price'] * 0.9 )) ?> VND</h4>
														<?php } else {?>
															<h4 class="product-price"><span class="qty"><?php echo  $qty ?></span><?php echo number_format($value['price']  ) ?> VND</h4>
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
						<li class="active"><a href="#">Home</a></li>
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

		<!-- SECTION -->
		<div class="section">
			<!-- container -->
			<div class="container">
				<!-- row -->
				<div class="row">
					<!-- shop -->
					<div class="col-md-4 col-xs-6">
						<div class="shop">
							<div class="shop-img">
								<img src="./img/samsungp1.jpg" alt="">
							</div>
							<div class="shop-body">
								<h3>Laptop<br>Collection</h3>
								<a href="store.php" class="cta-btn">Shop now <i class="fa fa-arrow-circle-right"></i></a>
							</div>
						</div>
					</div>
					<!-- /shop -->

					<!-- shop -->
					<div class="col-md-4 col-xs-6">
						<div class="shop">
							<div class="shop-img">
								<img src="./img/acerp3.jpg" alt="">
							</div>
							<div class="shop-body">
								<h3>Accessories<br>Collection</h3>
								<a href="store.php" class="cta-btn">Shop now <i class="fa fa-arrow-circle-right"></i></a>
							</div>
						</div>
					</div>
					<!-- /shop -->

					<!-- shop -->
					<div class="col-md-4 col-xs-6">
						<div class="shop">
							<div class="shop-img">
								<img src="./img/tainghep3.jpg" alt="">
							</div>
							<div class="shop-body">
								<h3>Cameras<br>Collection</h3>
								<a href="store.php" class="cta-btn">Shop now <i class="fa fa-arrow-circle-right"></i></a>
							</div>
						</div>
					</div>
				<!-- /row -->
			</div>
			<!-- /container -->
		</div>
		<!-- /SECTION -->

		<!-- SECTION -->
		<div class="section">
			<!-- container -->
			<div class="container">
				<!-- row -->
				<div class="row">

					<!-- section title -->
					<div class="col-md-12">
						<div class="section-title">
							<h3 class="title">New Products</h3>
							<div class="section-nav">
								<ul class="section-tab-nav tab-nav">
								    <li class="active"><a data-toggle="tab" href="#tab1">All Products</a></li>
									<li ><a data-toggle="tab" href="#tab2">Laptops</a></li>
									<li><a data-toggle="tab" href="#tab3">Smartphones</a></li>
									<li><a data-toggle="tab" href="#tab4">Tai Nghe</a></li>
									<li><a data-toggle="tab" href="#tab5">Cameras</a></li>
									<li><a data-toggle="tab" href="#tab6">Accessories</a></li>
								</ul>
							</div>
						</div>
					</div>
					<!-- /section title -->
                    			<?php require "phanloai.php" ?>
				
				</div>
				<!-- /row -->
			</div>
			<!-- /container -->
		</div>
		<!-- /SECTION -->

		<!-- HOT DEAL SECTION -->
		<div id="hot-deal" class="section">
			<!-- container -->
			<div class="container">
				<!-- row -->
				<div class="row">
					<div class="col-md-12">
						<div class="hot-deal">
							<ul class="hot-deal-countdown">
								<li>
									<div>
										<h3>02</h3>
										<span>Days</span>
									</div>
								</li>
								<li>
									<div>
										<h3>10</h3>
										<span>Hours</span>
									</div>
								</li>
								<li>
									<div>
										<h3>34</h3>
										<span>Mins</span>
									</div>
								</li>
								<li>
									<div>
										<h3>60</h3>
										<span>Secs</span>
									</div>
								</li>
							</ul>
							<h2 class="text-uppercase">hot deal this week</h2>
							<p>New Collection Up to 50% OFF</p>
							<a class="primary-btn cta-btn" href="store.php">Shop now</a>
						</div>
					</div>
				</div>
				<!-- /row -->
			</div>
			<!-- /container -->
		</div>
		<!-- /HOT DEAL SECTION -->

		<!-- SECTION -->
		<div class="section">
			<!-- container -->
			<div class="container">
				<!-- row -->
				<div class="row">

					<!-- section title -->
					<div class="col-md-12">
						<div class="section-title">
							<h3 class="title">New Products</h3>
							<div class="section-nav">
								<ul class="section-tab-nav tab-nav">
								    <li class="active"><a data-toggle="tab" href="#tab7">All Products</a></li>
									<li ><a data-toggle="tab" href="#tab8">Laptops</a></li>
									<li><a data-toggle="tab" href="#tab9">Smartphones</a></li>
									<li><a data-toggle="tab" href="#tab10">Tai Nghe</a></li>
									<li><a data-toggle="tab" href="#tab11">Cameras</a></li>
									<li><a data-toggle="tab" href="#tab12">Accessories</a></li>
								</ul>
							</div>
						</div>
					</div>
					<!-- /section title -->
                    			<?php require "phanloaiselling.php" ?>
				
				</div>
				<!-- /row -->
			</div>
			<!-- /container -->
		</div>
		<!-- /SECTION -->
		<!-- SECTION -->
		<div class="section">
			<!-- container -->
			<div class="container">
				<!-- row -->
				<div class="row">
					<div class="col-md-4 col-xs-6">
						<div class="section-title">
							<h4 class="title">Top selling</h4>
							<div class="section-nav">
								<div id="slick-nav-3" class="products-slick-nav"></div>
							</div>
						</div>

						
						<div class="products-widget-slick" data-nav="#slick-nav-3">
							<div>
								<!-- product widget -->
								<?php $products = $product ->  getProductById(1);?>
										<?php foreach($products as $value): ?>
								<div class="product-widget">
									<div class="product-img">
										<img src="./img/<?php echo $value['image'] ?>" alt="">
									</div>
									<div class="product-body">
										<p class="product-category">Category</p>
										<h3 class="product-name"><a href="product.php?idtam=<?php echo $value['id']?>"><?php echo $value['name'] ?></a></h3>
										<h4 class="product-price"><?php echo number_format($value['price'] * 0.9 )?><del class="product-old-price"><?php echo number_format($value['price'])?><del class="product-old-price"></del></h4>
									</div>
								</div>
								<?php endforeach; ?>
								<!-- /product widget -->

								<!-- product widget -->
								<?php $products = $product ->  getProductById(2);?>
										<?php foreach($products as $value): ?>
								<div class="product-widget">
									<div class="product-img">
										<img src="./img/<?php echo $value['image'] ?>" alt="">
									</div>
									<div class="product-body">
										<p class="product-category">Category</p>
										<h3 class="product-name"><a href="product.php?idtam=<?php echo $value['id']?>"><?php echo $value['name'] ?></a></h3>
										<h4 class="product-price"><?php echo number_format($value['price'] * 0.9 )?><del class="product-old-price"><?php echo number_format($value['price'])?><del class="product-old-price"></del></h4>
									</div>
								</div>
								<?php endforeach; ?>
								<!-- /product widget -->

								<!-- product widget -->
								<?php $products = $product ->  getProductById(3);?>
										<?php foreach($products as $value): ?>
								<div class="product-widget">
									<div class="product-img">
										<img src="./img/<?php echo $value['image'] ?>" alt="">
									</div>
									<div class="product-body">
										<p class="product-category">Category</p>
										<h3 class="product-name"><a href="product.php?idtam=<?php echo $value['id']?>"><?php echo $value['name'] ?></a></h3>
										<h4 class="product-price"><?php echo number_format($value['price'] * 0.9 )?><del class="product-old-price"><?php echo number_format($value['price'])?><del class="product-old-price"></del></h4>
									</div>
								</div>
								<?php endforeach; ?>
								<!-- product widget -->
							</div>

							<div>
								<!-- product widget -->
								<?php $products = $product ->  getProductById(5);?>
										<?php foreach($products as $value): ?>
								<div class="product-widget">
									<div class="product-img">
										<img src="./img/<?php echo $value['image'] ?>" alt="">
									</div>
									<div class="product-body">
										<p class="product-category">Category</p>
										<h3 class="product-name"><a href="product.php?idtam=<?php echo $value['id']?>"><?php echo $value['name'] ?></a></h3>
										<h4 class="product-price"><?php echo number_format($value['price'] * 0.9 )?><del class="product-old-price"><?php echo number_format($value['price'])?><del class="product-old-price"></del></h4>
									</div>
								</div>
								<?php endforeach; ?>
								<!-- /product widget -->

								<!-- product widget -->
								<?php $products = $product ->  getProductById(6);?>
										<?php foreach($products as $value): ?>
								<div class="product-widget">
									<div class="product-img">
										<img src="./img/<?php echo $value['image'] ?>" alt="">
									</div>
									<div class="product-body">
										<p class="product-category">Category</p>
										<h3 class="product-name"><a href="product.php?idtam=<?php echo $value['id']?>"><?php echo $value['name'] ?></a></h3>
										<h4 class="product-price"><?php echo number_format($value['price'] * 0.9 )?><del class="product-old-price"><?php echo number_format($value['price'])?><del class="product-old-price"></del></h4>
									</div>
								</div>
								<?php endforeach; ?>
								<!-- /product widget -->

								<!-- product widget -->
								<?php $products = $product ->  getProductById(7);?>
										<?php foreach($products as $value): ?>
								<div class="product-widget">
									<div class="product-img">
										<img src="./img/<?php echo $value['image'] ?>" alt="">
									</div>
									<div class="product-body">
										<p class="product-category">Category</p>
										<h3 class="product-name"><a href="product.php?idtam=<?php echo $value['id']?>"><?php echo $value['name'] ?></a></h3>
										<h4 class="product-price"><?php echo number_format($value['price'] * 0.9 )?><del class="product-old-price"><?php echo number_format($value['price'])?><del class="product-old-price"></del></h4>
									</div>
								</div>
								<?php endforeach; ?>
								<!-- product widget -->
							</div>
						</div>
					</div>

					<div class="col-md-4 col-xs-6">
						<div class="section-title">
							<h4 class="title">Top selling</h4>
							<div class="section-nav">
								<div id="slick-nav-4" class="products-slick-nav"></div>
							</div>
						</div>

						<div class="products-widget-slick" data-nav="#slick-nav-4">
							<div>
								<!-- product widget -->
								<?php $products = $product ->  getProductById(12);?>
										<?php foreach($products as $value): ?>
								<div class="product-widget">
									<div class="product-img">
										<img src="./img/<?php echo $value['image'] ?>" alt="">
									</div>
									<div class="product-body">
										<p class="product-category">Category</p>
										<h3 class="product-name"><a href="product.php?idtam=<?php echo $value['id']?>"><?php echo $value['name'] ?></a></h3>
										<h4 class="product-price"><?php echo number_format($value['price'] * 0.9 )?><del class="product-old-price"><?php echo number_format($value['price'])?><del class="product-old-price"></del></h4>
									</div>
								</div>
								<?php endforeach; ?>
								<!-- /product widget -->

								<!-- product widget -->
								<?php $products = $product ->  getProductById(13);?>
										<?php foreach($products as $value): ?>
								<div class="product-widget">
									<div class="product-img">
										<img src="./img/<?php echo $value['image'] ?>" alt="">
									</div>
									<div class="product-body">
										<p class="product-category">Category</p>
										<h3 class="product-name"><a href="product.php?idtam=<?php echo $value['id']?>"><?php echo $value['name'] ?></a></h3>
										<h4 class="product-price"><?php echo number_format($value['price'] * 0.9 )?><del class="product-old-price"><?php echo number_format($value['price'])?><del class="product-old-price"></del></h4>
									</div>
								</div>
								<?php endforeach; ?>
								<!-- /product widget -->

								<!-- product widget -->
								<?php $products = $product ->  getProductById(14);?>
										<?php foreach($products as $value): ?>
								<div class="product-widget">
									<div class="product-img">
										<img src="./img/<?php echo $value['image'] ?>" alt="">
									</div>
									<div class="product-body">
										<p class="product-category">Category</p>
										<h3 class="product-name"><a href="product.php?idtam=<?php echo $value['id']?>"><?php echo $value['name'] ?></a></h3>
										<h4 class="product-price"><?php echo number_format($value['price'] * 0.9 )?><del class="product-old-price"><?php echo number_format($value['price'])?><del class="product-old-price"></del></h4>
									</div>
								</div>
								<?php endforeach; ?>
								<!-- product widget -->
							</div>

							<div>
								<!-- product widget -->
								<?php $products = $product ->  getProductById(21);?>
										<?php foreach($products as $value): ?>
								<div class="product-widget">
									<div class="product-img">
										<img src="./img/<?php echo $value['image'] ?>" alt="">
									</div>
									<div class="product-body">
										<p class="product-category">Category</p>
										<h3 class="product-name"><a href="product.php?idtam=<?php echo $value['id']?>"><?php echo $value['name'] ?></a></h3>
										<h4 class="product-price"><?php echo number_format($value['price'] * 0.9 )?><del class="product-old-price"><?php echo number_format($value['price'])?><del class="product-old-price"></del></h4>
									</div>
								</div>
								<?php endforeach; ?>
								<!-- /product widget -->

								<!-- product widget -->
								<?php $products = $product ->  getProductById(22);?>
										<?php foreach($products as $value): ?>
								<div class="product-widget">
									<div class="product-img">
										<img src="./img/<?php echo $value['image'] ?>" alt="">
									</div>
									<div class="product-body">
										<p class="product-category">Category</p>
										<h3 class="product-name"><a href="product.php?idtam=<?php echo $value['id']?>"><?php echo $value['name'] ?></a></h3>
										<h4 class="product-price"><?php echo number_format($value['price'] * 0.9 )?><del class="product-old-price"><?php echo number_format($value['price'])?><del class="product-old-price"></del></h4>
									</div>
								</div>
								<?php endforeach; ?>
								<!-- /product widget -->

								<!-- product widget -->
								<?php $products = $product ->  getProductById(23);?>
										<?php foreach($products as $value): ?>
								<div class="product-widget">
									<div class="product-img">
										<img src="./img/<?php echo $value['image'] ?>" alt="">
									</div>
									<div class="product-body">
										<p class="product-category">Category</p>
										<h3 class="product-name"><a href="product.php?idtam=<?php echo $value['id']?>"><?php echo $value['name'] ?></a></h3>
										<h4 class="product-price"><?php echo number_format($value['price'] * 0.9 )?><del class="product-old-price"><?php echo number_format($value['price'])?><del class="product-old-price"></del></h4>
									</div>
								</div>
								<?php endforeach; ?>
								<!-- product widget -->
							</div>
						</div>
					</div>

					<div class="clearfix visible-sm visible-xs"></div>

					<div class="col-md-4 col-xs-6">
						<div class="section-title">
							<h4 class="title">Top selling</h4>
							<div class="section-nav">
								<div id="slick-nav-5" class="products-slick-nav"></div>
							</div>
						</div>

						<div class="products-widget-slick" data-nav="#slick-nav-5">
							<div>
								<!-- product widget -->
								<?php $products = $product ->  getProductById(27);?>
										<?php foreach($products as $value): ?>
								<div class="product-widget">
									<div class="product-img">
										<img src="./img/<?php echo $value['image'] ?>" alt="">
									</div>
									<div class="product-body">
										<p class="product-category">Category</p>
										<h3 class="product-name"><a href="product.php?idtam=<?php echo $value['id']?>"><?php echo $value['name'] ?></a></h3>
										<h4 class="product-price"><?php echo number_format($value['price'] * 0.9 )?><del class="product-old-price"><?php echo number_format($value['price'])?><del class="product-old-price"></del></h4>
									</div>
								</div>
								<?php endforeach; ?>
								<!-- /product widget -->

								<!-- product widget -->
								<?php $products = $product ->  getProductById(28);?>
										<?php foreach($products as $value): ?>
								<div class="product-widget">
									<div class="product-img">
										<img src="./img/<?php echo $value['image'] ?>" alt="">
									</div>
									<div class="product-body">
										<p class="product-category">Category</p>
										<h3 class="product-name"><a href="product.php?idtam=<?php echo $value['id']?>"><?php echo $value['name'] ?></a></h3>
										<h4 class="product-price"><?php echo number_format($value['price'] * 0.9 )?><del class="product-old-price"><?php echo number_format($value['price'])?><del class="product-old-price"></del></h4>
									</div>
								</div>
								<?php endforeach; ?>
								<!-- /product widget -->

								<!-- product widget -->
								<?php $products = $product ->  getProductById(30);?>
										<?php foreach($products as $value): ?>
								<div class="product-widget">
									<div class="product-img">
										<img src="./img/<?php echo $value['image'] ?>" alt="">
									</div>
									<div class="product-body">
										<p class="product-category">Category</p>
										<h3 class="product-name"><a href="product.php?idtam=<?php echo $value['id']?>"><?php echo $value['name'] ?></a></h3>
										<h4 class="product-price"><?php echo number_format($value['price'] * 0.9 )?><del class="product-old-price"><?php echo number_format($value['price'])?><del class="product-old-price"></del></h4>
									</div>
								</div>
								<?php endforeach; ?>
								<!-- product widget -->
							</div>

							<div>
								<!-- product widget -->
								<?php $products = $product ->  getProductById(35);?>
										<?php foreach($products as $value): ?>
								<div class="product-widget">
									<div class="product-img">
										<img src="./img/<?php echo $value['image'] ?>" alt="">
									</div>
									<div class="product-body">
										<p class="product-category">Category</p>
										<h3 class="product-name"><a href="product.php?idtam=<?php echo $value['id']?>"><?php echo $value['name'] ?></a></h3>
										<h4 class="product-price"><?php echo number_format($value['price'] * 0.9 )?><del class="product-old-price"><?php echo number_format($value['price'])?><del class="product-old-price"></del></h4>
									</div>
								</div>
								<?php endforeach; ?>
								<!-- /product widget -->

								<!-- product widget -->
								<?php $products = $product ->  getProductById(37);?>
										<?php foreach($products as $value): ?>
								<div class="product-widget">
									<div class="product-img">
										<img src="./img/<?php echo $value['image'] ?>" alt="">
									</div>
									<div class="product-body">
										<p class="product-category">Category</p>
										<h3 class="product-name"><a href="product.php?idtam=<?php echo $value['id']?>"><?php echo $value['name'] ?></a></h3>
										<h4 class="product-price"><?php echo number_format($value['price'] * 0.9 )?><del class="product-old-price"><?php echo number_format($value['price'])?><del class="product-old-price"></del></h4>
									</div>
								</div>
								<?php endforeach; ?>
								<!-- /product widget -->

								<!-- product widget -->
								<?php $products = $product ->  getProductById(39);?>
										<?php foreach($products as $value): ?>
								<div class="product-widget">
									<div class="product-img">
										<img src="./img/<?php echo $value['image'] ?>" alt="">
									</div>
									<div class="product-body">
										<p class="product-category">Category</p>
										<h3 class="product-name"><a href="product.php?idtam=<?php echo $value['id']?>"><?php echo $value['name'] ?></a></h3>
										<h4 class="product-price"><?php echo number_format($value['price'] * 0.9 )?><del class="product-old-price"><?php echo number_format($value['price'])?><del class="product-old-price"></del></h4>
									</div>
								</div>
								<?php endforeach; ?>
								<!-- product widget -->
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