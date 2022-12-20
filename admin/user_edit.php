<?php 
include "header.php";
include "sidebar.php";
if(isset($_GET['id_user'])):
  $id = $_GET['id_user'];
  $p = $user->getUserById($id);
?>
?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>User Edit</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">User Edit</li>
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
              <h3 class="card-title">User</h3>
              <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                  <i class="fas fa-minus"></i>
                </button>
              </div>
            </div>
            <div class="card-body">
            <form action="edit_user.php" method="post" enctype="multipart/form-data">
            <div class="form-group">
                <label for="inputName">Username</label>
                <input type="hidden" name ="id" value = "<?php echo $p[0]['id_user']?>">
                <input value = "<?php echo $p[0]['username']?>"type="text" id="inputName" class="form-control" name ="name" disabled>
              </div>
            <div class="form-group">
                <label for="inputName">Password</label>
                <input value = "<?php echo $p[0]['password']?>"type="text" id="inputName" class="form-control" name ="password">
              </div>
              <div class="form-group">
                <?php
                if($p[0]['role']== 1):?>
                <input checked type="checkbox"  class="form-control" name ="role">
                <?php
                else:
                ?>
                <input  type="checkbox"  class="form-control" name ="role">
                <?php endif;?>
              </div>
              <div class="row">
              <div class="col-12">
                <a href="user.php" class="btn btn-secondary">Cancel</a>
                <input type="submit" value="Update User" class="btn btn-success float-right">
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