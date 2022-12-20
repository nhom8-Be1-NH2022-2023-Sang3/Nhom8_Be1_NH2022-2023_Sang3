<?php 
include "header.php";
include "sidebar.php";
if(isset($_GET['id'])):
  $id = $_GET['id'];
  $p = $protype->getProtypeById($id);
?>
?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Protype Edit</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Protype Edit</li>
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
              <h3 class="card-title">Protype</h3>
              <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                  <i class="fas fa-minus"></i>
                </button>
              </div>
            </div>
            <div class="card-body">
            <form action="edit_protype.php" method="post" enctype="multipart/form-data">
              <div class="form-group">
                <label for="inputName">Name</label>
                <input type="hidden" name ="id" value = "<?php echo $p[0]['type_id']?>">
                <input value = "<?php echo $p[0]['type_name']?>" type="text" id="inputName" class="form-control" name ="name">
              </div>
              <div class="row">
              <div class="col-12">
                <a href="protype.php" class="btn btn-secondary">Cancel</a>
                <input type="submit" value="Update Protype" class="btn btn-success float-right">
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
include "footer.php"?>