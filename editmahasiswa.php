<?php
  include 'Template/Header.php';
  include 'Template/Sidebar.php';
  include 'Template/Koneksi.php';  

  $NIM = $_GET['NIM'];

  $query = "SELECT * FROM mahasiswa WHERE NIM='$NIM'";
  $hasil = mysqli_query($conn, $query);
  
  $data = mysqli_fetch_assoc($hasil);
  
  $queryProdi = "SELECT * FROM prodi";
  $hasilProdi = mysqli_query($conn, $queryProdi);
  
  $data = [];
  while ($baris = mysqli_fetch_assoc($hasilProdi)) 
  
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
              <li class="breadcrumb-item"><a href="#">Home</a></li>
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
                <h3 class="card-title">Edit Mahasiswa</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form action="editaksimahasiswa.php" method="post" enctype="multipart/form-data">
                <input type='hidden' name='nimlama' id='nimlama' value="<?php echo $NIM ?>" />
                <input type='hidden' name='fotolama' id='fotolama' value="<?php echo $d['Foto'] ?>" />
                <div class="card-body">
                  <div class="form-group">
                    <label for="NIM">NIM</label>
                    <input type="text" name="NIM" class="form-control" id="NIM" value="<?php echo $data['NIM'] ?>">
                  </div>
                  <div class="form-group">
                    <label for="Nama">Nama Mahasiswa</label>
                    <input type="text" name="Nama" class="form-control" id="Nama"
                      value="<?php echo $data['Nama'] ?>">
                  </div>
                  <div class="form-group">
                    <label for="Nama_prodi">Prodi</label>
                    <select name="Nama_prodi" id="Nama_prodi" class="form-control">
                      <?php
                      foreach ($d as $prodi) {
                        ?>
                        <option id="<?php echo $prodi['Nama_prodi'] ?>" value="<?php echo $prodi['Id_prodi'] ?>">
                          <?php echo $prodi['Nama_prodi'] ?>
                        </option>
                        <?php
                      }
                      ?>
                    </select>
                  </div>
                  <div class="form-group">
                    <label for="Nomor_HP">Nomor HP</label>
                    <input type="text" name="Nomor_HP" class="form-control" id="Nomor_HP"
                      value="<?php echo $data['Nomor_HP'] ?>">
                  </div>
                  <div class="form-group">
                    <label for="Alamat">Alamat</label>
                    <input type="text" name="Alamat" class="form-control" id="Alamat"
                      value="<?php echo $data['Alamat'] ?>">
                  </div>
                  <div class="form-group">
                    <label for="Foto">Foto</label><br>
                    <input type="file" id="Foto" name="Foto" accept="image/*">
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