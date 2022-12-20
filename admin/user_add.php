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
            <h1>User Add</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">User Add</li>
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
            <form action="add_user" method="post" enctype="multipart/form-data">
              <div class="form-group">
                <label for="inputName">Username</label>
                <input type="text" id="inputName" class="form-control" name ="username">
              </div>
              <div class="form-group">
                <label for="inputName">Password</label>
                <input type="password" id="inputName" class="form-control" name ="password">
              </div>
              <div class="form-group">
                <label for="inputClientCompany">Role</label>
                <input type="checkbox"  class="form-control" name ="role">
              </div>
            <div class="row">
        <div class="col-12">
          <a href="user.php" class="btn btn-secondary">Cancel</a>
          <input type="submit" value="Create new Account" class="btn btn-success float-right">
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
<?php include "footer.php";
?>

