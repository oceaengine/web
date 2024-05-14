<?php
session_start();
include 'Template/Koneksi.php';  
ceklogin();

$NIM = $_POST['NIM'];
$Nama = $_POST['Nama'];
$Nama_prodi = $_POST['Nama_prodi'];
$Nomor_HP = $_POST['Nomor_HP'];
$Alamat = $_POST['Alamat'];

$namaFile = $_FILES['Foto']['name'];
$tmpName = $_FILES['Foto']['tmp_name'];

$ekstensifoto = explode('.', $namaFile);
$ekstensifoto = strtolower(end($ekstensifoto));
$ekstensiValid = ['jpg', 'png', 'jpeg'];

if (!in_array($ekstensifoto, $ekstensiValid)) {
    echo "
    <script>
        alert('File yang anda upload bukan file gambar');
        document.location.href='tambahmahasiswa.php';
    </script>
    ";
    }

    $namaFileBaru = $NIM;
    $namaFileBaru .= '.';
    $namaFileBaru .= $ekstensifoto;

    $Password = password_hash($NIM, PASSWORD_DEFAULT);

$query = 'INSERT INTO mahasiswa (NIM, Nama, Nomor_HP, Alamat, Id_prodi, Foto, Password) 
            VALUES ("' . $NIM . '", "' . $Nama . '", "' . $Nomor_HP . '", "' . $Alamat . '", "' . $Nama_prodi . '", "' . $namaFileBaru . '", "' . $Password . '")';

move_uploaded_file($tmpName, 'dist/img/' . $namaFileBaru);
mysqli_query($conn, $query);

if (mysqli_affected_rows($conn) > 0){
    echo "
        <script>
            alert('Data berhasil ditambahkan');
            document.location.href='Mahasiswa.php';
        </script>
        ";
}else {
    echo "
    <script>
        alert('Data gagal ditambahkan');
    </script>
    ";
    echo mysqli_error($conn);
};