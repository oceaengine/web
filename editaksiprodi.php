<?php
include 'Template/Koneksi.php';  

$id = $_POST['Id_prodi'];
$prodi = $_POST['namaprodi'];

$query = "UPDATE prodi set Nama_prodi='$prodi' WHERE Id_Prodi =$id ";

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