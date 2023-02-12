<?php
include_once('../../../class/Peminjaman.php');

$peminjaman = new Peminjaman();

$delete = $_GET["delete"];

$peminjaman->delete($delete);

header('location: index.php');

?>