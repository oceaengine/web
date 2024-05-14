<?php
  session_start();
  include 'Template/Header.php';
  include 'Template/Sidebar.php';
  include 'Template/Koneksi.php';  
  ceklogin();
  
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
          <h1 class="m-0">Data Mahasiswa</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="index.php">Home</a></li>
            <li class="breadcrumb-item active">Data Mahasiswa</li>
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
              <h3 class="card-title">Tambah Mahasiswa</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form action="tambahaksimahasiswa.php" method="post" enctype="multipart/form-data">
              <div class="card-body">
                <div class="form-group">
                  <label for="NIM">NIM</label>
                  <input type="text" name="NIM" class="form-control" id="NIM" placeholder="Masukkan NIM">
                </div>
                <div class="form-group">
                  <label for="Nama">Nama Mahasiswa</label>
                  <input type="text" name="Nama" class="form-control" id="Nama"
                    placeholder="Masukkan Nama Mahasiswa">
                </div>
                <div class="form-group">
                  <label for="Nama_prodi">Program Studi</label>
                  <select name="Nama_prodi" id="Nama_prodi" class="form-control select2bs4" style="width: 100%;">
                  <option value="">Pilih Program Studi</option> 
                    <?php
                    foreach ($data as $d):
                      ?>
                      <option value="<?php echo $d['Id_prodi'] ?>"><?php echo $d['Nama_prodi']; ?></option>
                      <?php
                    endforeach;
                    ?>
                  </select>
                </div>
                <div class="form-group">
                  <label for="Nomor_HP">Nomor HP</label>
                  <input type="text" name="Nomor_HP" class="form-control" id="Nomor_HP" placeholder="Masukkan Nomor HP">
                </div>
                <div class="form-group">
                  <label for="Alamat">Alamat</label>
                  <input type="text" name="Alamat" class="form-control" id="Alamat" placeholder="Masukkan Alamat">
                </div>
                <div class="form-group">
                  <label for="Foto">Foto</label><br>
                  <div class="input-group">
                    <div class="custom-file">
                      <input type="file" class="custom-file-input" id="Foto" name="Foto">
                      <label class="custom-file-label" for="Foto">Pilih Foto</label>
                    </div>
                    <div class="input-group-append">
                      <span class="input-group-text">Upload</span>
                    </div>
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