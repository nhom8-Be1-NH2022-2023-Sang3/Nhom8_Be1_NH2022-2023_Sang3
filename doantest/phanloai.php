	<!-- Products tab & slick -->
				<div class="col-md-12">
						<div class="row">
							<div class="products-tabs">
								<!-- tab -->
								<div id="tab1" class="tab-pane active">
									<div class="products-slick"  >
										<!-- product -->
                                        <?php $products = $product -> getProductByDate();?>
										<?php foreach($products as $value): ?>
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
												<h3 class="product-name"><a href="product.php?idtam=<?php echo $value['id']?>"><?php echo substr($value['name'],0,35) ?></a></h3>
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
												<a href="home.php?id=<?php echo $value['id']?>&idtam=<?php echo $value['id']?>"><button class="add-to-cart-btn"><i class="fa fa-shopping-cart"></i> add to cart</button></a>
											</div>
										    </div>
                                        <?php endforeach; ?>
										<!-- /product -->
									</div>
                                    <div id="slick-nav-1" class="products-slick-nav"></div>
								</div>
                                
                                <div id="tab2" class="tab-pane ">
									<div class="products-slick" data-nav="#slick-nav-1 ">
										<!-- product -->
                                        <?php $products = $product ->  getProductByDateId(2);?>
                                        <?php foreach($products as $value): ?>
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
												<h3 class="product-name"><a href="product.php?idtam=<?php echo $value['id']?>"><?php echo substr($value['name'],0,35) ?></a></h3>
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
												<a href="home.php?id=<?php echo $value['id']?>&idtam=<?php echo $value['id']?>"><button class="add-to-cart-btn"><i class="fa fa-shopping-cart"></i> add to cart</button></a>
											</div>
										    </div>
                                        <?php endforeach; ?>
										<!-- /product -->
									</div>
                                    <div id="slick-nav-1" class="products-slick-nav"></div>
								</div>
                                <div id="tab3" class="tab-pane ">
									<div class="products-slick" >
										<!-- product -->
                                        <?php $products = $product ->  getProductByDateId(1);?>
                                        <?php foreach($products as $value): ?>
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
												<h3 class="product-name"><a href="product.php?idtam=<?php echo $value['id']?>"><?php echo substr($value['name'],0,35) ?></a></h3>
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
												<a href="home.php?id=<?php echo $value['id']?>&idtam=<?php echo $value['id']?>"><button class="add-to-cart-btn"><i class="fa fa-shopping-cart"></i> add to cart</button></a>
											</div>
										    </div>
                                        <?php endforeach; ?>
	               				
										<!-- /product -->
									</div>
                                    
								</div>
                                <div id="tab4" class="tab-pane ">
									<div class="products-slick" >
										<!-- product -->
                                        <?php $products = $product ->  getProductByDateId(3);?>
                                        <?php foreach($products as $value): ?>
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
												<h3 class="product-name"><a href="product.php?idtam=<?php echo $value['id']?>"><?php echo substr($value['name'],0,35) ?></a></h3>
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
												<a href="home.php?id=<?php echo $value['id']?>&idtam=<?php echo $value['id']?>"><button class="add-to-cart-btn"><i class="fa fa-shopping-cart"></i> add to cart</button></a>
											</div>
										    </div>
                                        <?php endforeach; ?>
	               				
										<!-- /product -->
									</div>
                                    
								</div>
                                <div id="tab5" class="tab-pane ">
									<div class="products-slick" >
										<!-- product -->
                                        <?php $products = $product ->  getProductByDateId(4);?>
                                        <?php foreach($products as $value): ?>
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
												<h3 class="product-name"><a href="product.php?idtam=<?php echo $value['id']?>"><?php echo substr($value['name'],0,35) ?></a></h3>
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
												<a href="home.php?id=<?php echo $value['id']?>&idtam=<?php echo $value['id']?>"><button class="add-to-cart-btn"><i class="fa fa-shopping-cart"></i> add to cart</button></a>
											</div>
										    </div>
                                        <?php endforeach; ?>
	               				
										<!-- /product -->
									</div>
                                    
								</div>
                                <div id="tab6" class="tab-pane ">
									<div class="products-slick" >
										<!-- product -->
                                        <?php $products = $product ->  getProductByDateId(5);?>
                                        <?php foreach($products as $value): ?>
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
												<h3 class="product-name"><a href="product.php?idtam=<?php echo $value['id']?>"><?php echo substr($value['name'],0,35) ?></a></h3>
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
												<a href="home.php?id=<?php echo $value['id']?>&idtam=<?php echo $value['id']?>"><button class="add-to-cart-btn"><i class="fa fa-shopping-cart"></i> add to cart</button></a>
											</div>
										    </div>
                                        <?php endforeach; ?>
	               				
										<!-- /product -->
									</div>
                                    <div id="slick-nav-1" class="products-slick-nav"></div>
								</div>
								<!-- /tab -->
							</div>
						</div>
                </div>