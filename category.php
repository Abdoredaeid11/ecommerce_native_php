<?php session_start();
include "includes/connect.php"; ?>

<!DOCTYPE html>

<html>

<?php 
 $query="SELECT * FROM users";
 $result = mysqli_query($conn, $query);


  if (mysqli_num_rows($result) > 0) {
  // output data of each row
   while($row = mysqli_fetch_assoc($result)) {
?>


<?php include "includes/head.php";
if($row["is_admin"]==1){
  ?>

<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="index.php" class="nav-link">Home</a>
      </li>
      
    </ul>

    <!-- SEARCH FORM -->
    <form class="form-inline ml-3">
      <div class="input-group input-group-sm">
        <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
        <div class="input-group-append">
          <button class="btn btn-navbar" type="submit">
            <i class="fas fa-search"></i>
          </button>
        </div>
      </div>
    </form>

    <!-- Right navbar links -->
   
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
  

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
        </div>
        <div class="info">
          <a href="#" class="d-block"><?php echo $_SESSION['username']; ?>
</a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item has-treeview menu-open">
            <a href="" class="nav-link active">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Caregory
              </p>
            </a>
            <li class="nav-item has-treeview menu-open">
            <a href="login.php" class="nav-link active">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Login
              </p>
            </a>
            <li class="nav-item has-treeview menu-open">
            <a href="register.php" class="nav-link active">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Register
              </p>
            </a>
              
              

             
            
          

       
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Dashboard </h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="index.php  ">Home</a></li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row">
          <div class="col-lg-3 col-6">

          
            <!-- small box -->
          </div>
          <a href="createCategory.php" class="mb-4"><button type="button"  class="btn btn-outline-warning">Insert Category</button></a>
<br>

          <table class="table table-striped" >
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">name</th>
      <th scope="col">descrption</th>
      <th scope="col" style="text-align: center" width="150">image</th>
      <th scope="col">is active</th>
      <th scope="col" style="text-align: center;">controls</th>


    </tr>
  </thead>
  <tbody>
  <?php 
               
               $query="SELECT * FROM category";
               $result = mysqli_query($conn, $query);


                if (mysqli_num_rows($result) > 0) {
                // output data of each row
                 while($row = mysqli_fetch_assoc($result)) {
                  $isactive= $row['is_active'];
                  $is_active=($isactive==1) ? 'active':'not active';
                  $id=$row['id'];
                echo " <tr>
                  <th scope='row'>{$row['id']}</th>
                  <td>{$row['name']}</td>
                  <td>{$row['descrption']}</td>
                  <td  style='text-align: center;'><img style='width:100%' src='assets/images/{$row['img']}' alt=''/></td>
                  <td > $is_active   </td>
                  <td style='text-align: center;'> <a href='product.php?id={$row["id"]}' class='mb-4'><button type='button' class='btn btn-outline-primary'>Show Products</button></a>
                  <a href='editCategory.php?id=$id' class='mb-4'><button type='button' class='btn btn-outline-success'>Edit</button></a>
                  <a href='deleteCategory.php'?$id class='mb-4'><button type='button' class='btn btn-outline-danger'>Delete</button></a>
                     </td>

            
                </tr>";


                 }}



                 ?>
                 <?php
                 }
else{
  echo "<div class='alert alert-danger'>
  <strong>Alert!</strong> cant open this page beacuse you arent An Admin.
  </div> ";
}
                }}
                 ?>

   
  
  </tbody>
</table>
                        
                        <!-- /.contacts-list-info -->
                      </a>
                    </li>
                    <!-- End Contact Item -->
                  </ul>
                  <!-- /.contacts-list -->
                </div>
                <!-- /.direct-chat-pane -->
              </div>
              <!-- /.card-body -->
         
              <!-- /.card-footer-->
            </div>
            <!--/.direct-chat -->

            <!-- TO DO List -->
            
            <!-- /.card -->
          </section>
          <!-- /.Left col -->
          <!-- right col (We are only adding the ID to make the widgets sortable)-->
       
          <!-- right col -->
        </div>
        <!-- /.row (main row) -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->


  <!-- Control Sidebar -->
 
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<?php include "includes/footer.php"; ?>

</body>
</html>
