<?php
include 'Template/Koneksi.php';  

$id = $_GET['Id_prodi'];

$query = "DELETE FROM prodi WHERE Id_prodi='$id'";

mysqli_query($conn, $query);

if (mysqli_affected_rows($conn) > 0){
    echo "
        <script>
            alert('Data berhasil dihapus');
            document.location.href='Prodi.php';
        </script>
        ";
}else {
    echo "
    <script>
        alert('Data gagal dihapus');
    </script>
    ";
    echo mysqli_error($conn);
};
?>