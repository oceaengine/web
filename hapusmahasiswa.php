<?php
include 'Template/Koneksi.php';  

$NIM = $_GET['NIM'];

$query = "DELETE FROM mahasiswa WHERE NIM='$NIM'";

mysqli_query($conn, $query);

if (mysqli_affected_rows($conn) > 0){
    echo "
        <script>
            alert('Data berhasil dihapus');
            document.location.href='Mahasiswa.php';
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