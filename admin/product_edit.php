<?php 
include "header.php";
include "sidebar.php";
if(isset($_GET['id'])):
  $id = $_GET['id'];
  $p = $products->getProductById($id);
?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Product Edit</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Product Edit</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-md-12">
          <div class="card card-primary">
            <div class="card-header">
              <h3 class="card-title">Product</h3>

              
              <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                  <i class="fas fa-minus"></i>
                </button>
              </div>
            </div>
            <div class="card-body">
            <form action="edit_product.php" method="post" enctype="multipart/form-data">
              <div class="form-group">
                <label for="inputName">Name</label>
                <input type="hidden" name ="id" value = "<?php echo $p[0]['id']?>">
                <input value = "<?php echo $p[0]['name']?>"type="text" id="inputName" class="form-control" name ="name">
              </div>
              <div class="form-group">
                <label for="inputName">Price</label>
                <input value = "<?php echo $p[0]['price']?>" type="text" id="inputName" class="form-control" name ="price">
              </div>
              <div class="form-group">
                <label for="inputName">Image</label>
                <input type="file" id="inputName" class="form-control" name ="image">
                <img style="width:100px" src="../doantest/img/<?php echo $p[0]['image']?>" alt="">
              </div>
              <div class="form-group">
                <label for="inputDescription">Description</label>
                <textarea id="inputDescription" class="form-control" rows="4" name ="description">
                <?php echo $p[0]['description']?>
                </textarea>
              </div>
              <div class="form-group">
                <label for="inputStatus">Manufactures</label>
                <select id="inputStatus" class="form-control custom-select" name ="manu" >
                  <option selected disabled >Select one</option>
                  <?php $getAllmanu = $manufacture->getAllManu();
                  foreach($getAllmanu as $value):
                    if($value['manu_id']==$p[0]['manu_id']):?>
                    <option selected value ="<?php echo $value['manu_id']?>"><?php echo $value['manu_name']?></option>
                  <?php
                  else:
                    ?>
                  <option value ="<?php echo $value['manu_id']?>"><?php echo $value['manu_name']?></option>
                  <?php endif; endforeach;?>
                </select>
              </div>
              <div class="form-group">
                <label for="inputStatus">Protype</label>
                <select id="inputStatus" class="form-control custom-select" name ="protype">
                  <option selected disabled>Select one</option>
                  <?php $getAllProtype = $protype->getAllProtypes();
                  foreach($getAllProtype as $value):
                    if($value['type_id']==$p[0]['type_id']):?>
                    <option selected value ="<?php echo $value['type_id']?>"><?php echo $value['type_name']?></option>
                  <?php
                  else :
                  ?>
                  <option value ="<?php echo $value['type_id']?>"><?php echo $value['type_name']?></option>
                  <?php endif; endforeach;?>
                </select>
              </div>
              <div class="form-group">
                <?php
                if($p[0]['feature']== 1):?>
                <input checked type="checkbox"  class="form-control" name ="feature">
                <?php
                else:
                ?>
                <input type="checkbox"  class="form-control" name ="feature">
                <?php endif;?>
              </div>
              <div class="form-group">
                <label for="inputClientCompany">Selling</label>
                <?php
                if($p[0]['selling']== 1):?>
                <input checked type="checkbox"  class="form-control" name ="selling">
                <?php
                else:
                ?>
                <input type="checkbox"  class="form-control" name ="selling">
                <?php endif;?>
              </div>
            </div>
            <div class="row">
        <div class="col-12">
          <a href="product.php" class="btn btn-secondary">Cancel</a>
          <input type="submit" value="Edit Product" class="btn btn-success float-right">
        </div>
            </form>
        </div>
      </div>
            
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
        
      </div>
      
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
<?php 
endif;
include "footer.php";?>