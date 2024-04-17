<?php
include 'Template/Koneksi.php';  

$NIM = $_POST['NIM'];
$nimlama = $_POST['nimlama'];
$Nama = $_POST['Nama'];
$Nama_prodi = $_POST['Nama_prodi'];
$Nomor_HP = $_POST['Nomor_HP'];
$Alamat = $_POST['Alamat'];
$fotolama = $_POST['fotolama'];
if ($_FILES == "") {
    $namaFile = $fotolama;
} else {
    $namaFile = $_FILES['Foto']['name'];
    $tmpName = $_FILES['Foto']['tmp_name'];
    move_uploaded_file($tmpName, "dist/img/" . $namaFile);
    unlink("dist/img/" . $fotolama);
}
$query = "UPDATE mahasiswa SET NIM='$NIM', Nama='$Nama', Nomor_HP='$Nomor_HP', Alamat='$Alamat', Id_prodi='$Nama_prodi', Foto='$namaFile'  WHERE NIM='$nimlama'";

mysqli_query($conn, $query);

if (mysqli_affected_rows($conn) > 0){
    echo "
        <script>
            alert('Data berhasil diedit');
            document.location.href='Prodi.php';
        </script>
        ";
}else {
    echo "
    <script>
        alert('Data gagal diedit');
    </script>
    ";
    echo mysqli_error($conn);
};