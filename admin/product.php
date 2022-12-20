<?php
include "header.php";
include "sidebar.php";

?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Product</h1>
            <a class="btn btn-success btn-sm" href="product_add.php">
          <i class="far fa-add"></i>
           Add
        </a>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="index.php">Home</a></li>
              <li class="breadcrumb-item active">Product</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">Product</h3>

          <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
              <i class="fas fa-minus"></i>
            </button>
            <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
              <i class="fas fa-times"></i>
            </button>
          </div>
        </div>
        <div class="card-body p-0">
          <table class="table table-striped projects">
              <thead>
                  <tr>
                  <th style="width: 1%">
                          Image
                      </th>
                      <th style="width: 10%" class="text-center">
                          Name
                      </th>
                      <th style="width: 20%" class="text-center">
                          Price
                      </th>
                      <th style="width: 10%" class="text-center">
                          Manufactures
                      </th>
                      <th style="width: 10%" class="text-center">
                          Protype
                      </th>
                      <th style="width: 30%" class="text-center">
                          Decscriptiom
                      </th>
                      <th style="width: 20%" class="text-center">
                      Action
                      </th>
                  </tr>
              </thead>
              <tbody>
                <?php 
                if (isset($_GET['page'])) {
                  $page  = $_GET['page'];
                }else{
                  $page=1;
                }
                $per_page_record = 9;  // số lượng phần tử muốn xuất trong 1 trang
                            				

								// Look for a GET variable page if not found default is 1.
								
								$start_from = ($page-1) * $per_page_record;
                if(isset($_POST['keyword'])){
                $getsp = $products->phantrangtheoKeyword($_POST['keyword'],$start_from);
                $getAllProduct = $products->phantrangtheoKeyword($_POST['keyword'],$start_from);
                }
                else{
                  $getsp = $products->getAllProducts();
                $getAllProduct = $products->phantrang($start_from);
                }
                foreach($getAllProduct as $value):
                ?>
                  <tr>
                      <td><img style ="width :100px"src="../doantest/img/<?php echo  $value['image'] ?>" alt=""></td>
                      <td><?php echo $value['name']?></td>
                      <td><?php echo $value['price']?></td>
                      <td><?php echo $value['manu_name']?></td>
                      <td><?php echo $value['type_name']?></td>
                      <td><?php echo substr($value['description'],0,50)?>...</td>
                      <td class="project-actions text-right">
                          <a class="btn btn-info btn-sm" href="product_edit.php?id=<?php echo  $value['id'] ?>">
                              <i class="fas fa-pencil-alt">
                              </i>
                              Edit
                          </a>
                          <a class="btn btn-danger btn-sm" href="del_product.php?id=<?php echo  $value['id'] ?>">
                              <i class="fas fa-trash">
                              </i>
                              Delete
                          </a>
                      </td>
                  </tr>
                <?php endforeach;?>
              </tbody>
              
          </table>
          <div class="store-filter clearfix">
							<span class="store-qty">Showing 20-50 products</span>
							<ul class="store-pagination">
							      <?php 
							      // Number of pages required.:Số trang yêu cầu.
                    $soluong=count($getsp);
								$total_pages = ceil($soluong / $per_page_record);
									if($page>=2){ ?>
										<li ><a href='product.php?page=<?php echo ($page-1)?>'>  Prev </a></li>
									<?php };
									for ($i=1; $i<=(int)$total_pages; $i++) {
										if ($i == $page) { ?>
											<li class='active' ><a  href= 'product.php?page=<?php echo $i?>'><?php echo $i?> </a></li>
										<?php }
										else  { ?>
											<li><a href= 'product.php?page=<?php echo $i?>'><?php echo $i?> </a></li>

										<?php }
									};
									if($page < $total_pages ){ ?>

										<li><a href='product.php?page=<?php echo ($page+1)?>'>  Next </a></li>
									 <?php };
								?>
							</ul>
                  </div>
        </div>
        <!-- /.card-body -->
      </div>
      <!-- /.card -->

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
<?php
include "footer.php";