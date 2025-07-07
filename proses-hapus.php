<?php
session_start();

if(isset($_GET['id'])){
    $id = $_GET['id'];
    if(isset($_SESSION['calon_siswa'][$id])) {
        unset($_SESSION['calon_siswa'][$id]);
    }
    header('Location: list-siswa.php');
} else {
    die("Akses dilarang...");
}
?>