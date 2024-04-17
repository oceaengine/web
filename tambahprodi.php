<?php
  include 'Template/Header.php';
  include 'Template/Sidebar.php';
  include 'Template/Koneksi.php';  

  $query = "SELECT * FROM prodi";
  $hasil = mysqli_query($conn, $query);

  $data = [];
  while ($baris = mysqli_fetch_assoc($hasil))

  {
    $data[] = $baris;
  }
  
  ?>

</aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Data Program Studi</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Program Studi</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
      <div class="row">
          <!-- left column -->
          <div class="col-md-12">
            <!-- jquery validation -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title"> Tambah Program Studi</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form action="tambahaksiprodi.php" method="post">
                <div class="card-body">
                  <div class="form-group">
                    <label for="namaprodi">Nama Program Studi</label>
                    <input type="text" name="namaprodi" class="form-control" id="namaprodi" placeholder="Masukan Nama Program Studi">
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Submit</button>
                </div>
              </form>
            </div>
            <!-- /.card -->
            </div>
          <!--/.col (left) -->
          <!-- right column -->
          <div class="col-md-6">

          </div>
          <!--/.col (right) -->
        </div>
            <!-- /.card -->
          </div>
        </div>
        <!-- /.row -->
        <!-- Main row -->
        <!-- /.row (main row) -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>

  <?php
  include 'Template/Footer.php';
  ?>