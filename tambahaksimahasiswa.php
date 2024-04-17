<?php
include 'Template/Koneksi.php';  

$NIM = $_POST['NIM'];
$Nama = $_POST['Nama'];
$Nama_prodi = $_POST['Nama_prodi'];
$Nomor_HP = $_POST['Nomor_HP'];
$Alamat = $_POST['Alamat'];
$namaFile = $_FILES['Foto']['name'];
$tmpName = $_FILES['Foto']['tmp_name'];
move_uploaded_file($tmpName, "C:/xampp/htdocs/web/dist/img/" . $namaFile);

$query = 'INSERT INTO mahasiswa (NIM, Nama, Nomor_HP, Alamat, Password, ID_Prodi, Foto)
             VALUES ("' . $NIM . '", "' . $Nama . '", "' . $Nomor_HP . '", "' . $Alamat . '", "NULL", "' . $Nama_prodi . '", "' .$namaFile. '")';

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