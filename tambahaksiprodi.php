<?php
include 'Template/Koneksi.php';  

$prodi = $_POST['namaprodi'];

$query = $query = "INSERT INTO prodi (Nama_prodi) VALUES ('$prodi')";

mysqli_query($conn, $query);

if (mysqli_affected_rows($conn) > 0){
    echo "
        <script>
            alert('Data berhasil ditambahkan');
            document.location.href='Prodi.php';
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

?>