  <?php
  include 'Template/Header.php';
  include 'Template/Sidebar.php';
  include 'Template/Koneksi.php';  

  $query = "SELECT * FROM Mahasiswa JOIN Prodi ON Mahasiswa.id_prodi = Prodi.id_prodi";
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
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Dashboard</li>
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
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Data Mahasiswa</h3>

                <div class="card-tools">
                <td><a href="tambahmahasiswa.php" class="btn btn-primary">Tambah</a>
                </div>

                  </div>
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body table-responsive p-0">
                <table class="table table-hover text-nowrap">
                  <thead>
                    <tr>
                      <th>NO</th>
                      <th>NIM</th>
                      <th>Nama</th>
                      <th>Program Studi</th>
                      <th>Nomor HP</th>
                      <th>Alamat</th>
                      <th>Foto</th>
                      <th>Aksi</th>
                    </tr>
                  </thead>

                  <tbody>
                    <?php
                    $i = 1;
                    foreach ($data as $d) {
                      ?>

                      <tr>
                      <td><?php echo $i++ ?></td>
                      <td><?php echo $d['NIM'] ?></td>
                      <td><?php echo $d['Nama'] ?></td>
                      <td><?php echo $d['Nama_prodi'] ?></td>
                      <td><?php echo $d['Nomor_HP'] ?></td>
                      <td><?php echo $d['Alamat'] ?></td>
                      <td> <img src="dist/img/<?php echo $d['Foto'] ?>" width="100px"
                                                    height="100px" /> </td>
                      <td> <a href="editmahasiswa.php?NIM=<?php echo $d['NIM'] ?>"
                      class="btn btn-warning">Edit</a>
                      <a href="hapusmahasiswa.php?NIM=<?php echo $d['NIM'] ?>"
                      class="btn btn-danger">Hapus</a>
                      </td>
                      </tr>
                      <?php
                    }
                    ?>
                    
                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
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