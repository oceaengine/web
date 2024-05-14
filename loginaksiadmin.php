<?php
session_start();
include 'Template/Koneksi.php';  

$User = $_POST['User'];
$Password = $_POST['Password'];

//query ke database
$result = mysqli_query($conn, "SELECT * FROM admin WHERE User='$User'");

//mengambil baris  pertama
$row = mysqli_fetch_assoc($result);

if (password_verify($Password, $row['Password'])) {
    $_SESSION['login'] = true;
    $_SESSION['Nama'] = $row['User'];
    $_SESSION['Foto'] = 'admin.jpeg';
    $_SESSION['hakakses'] = 'admin';
    header("Location: index.php");
} else {
    echo "
    <script>
    alert('Username atau Password salah');
    document.location.href='loginadmin.php';
    </script>
    ";

}