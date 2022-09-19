<?php
$link = mysqli_connect('localhost', 'root', '', 'hari_raya');

if ($link === false) {
    # code...
    die("Terjadi kesalahan: kemungkinan tidak tersambung. " . mysqli_connect_error());
}
?>