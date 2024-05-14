<?php
session_start();
include 'Template/Koneksi.php';  

$NIM = $_POST['NIM'];
$Password = $_POST['Password'];

//query ke database
$result = mysqli_query($conn, "SELECT * FROM mahasiswa WHERE NIM='$NIM'");

//mengambil baris  pertama
$row = mysqli_fetch_assoc($result);

if (password_verify($Password, $row['Password'])) {
    $_SESSION['login'] = true;
    $_SESSION['Nama'] = $row['Nama'];
    $_SESSION['Foto'] = $row['Foto'];
    $_SESSION['hakakses'] = 'mahasiswa';
    header("Location: index.php");
} else {
    echo "
    <script>
    alert('Username atau Password salah');
    document.location.href='login.php';
    </script>
    ";

}