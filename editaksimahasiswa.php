<?php
include 'Template/Koneksi.php';  

$NIM = $_POST['NIM'];
$nimlama = $_POST['nimlama'];
$Nama = $_POST['Nama'];
$Nama_prodi = $_POST['Nama_prodi'];
$Nomor_HP = $_POST['Nomor_HP'];
$Alamat = $_POST['Alamat'];
$fotolama = $_POST['fotolama'];
$namaFileBaru;

if ($_FILES['Foto']['error'] === 4) {
    $namaFile = $fotolama;
} else {
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
    $Foto = $namaFileBaru;

    move_uploaded_file($tmpName, "dist/img/" . $namaFile);
    unlink("dist/img/" . $fotolama);
}

$query = "UPDATE mahasiswa SET NIM='$NIM', Nama='$Nama', Nomor_HP='$Nomor_HP', Alamat='$Alamat', Id_prodi='$Nama_prodi', Foto='$namaFile'  WHERE NIM='$nimlama'";

mysqli_query($conn, $query);

if (mysqli_affected_rows($conn) > 0) {
    echo "
            <script>
            alert('Data Berhasil diedit');
            document.location.href='mahasiswa.php';
            </script>
    ";
} else {
    echo "
    <script>
    alert ('Data gagal diedit');
    </script>
";
    echo mysqli_error($conn);
}
;

?>