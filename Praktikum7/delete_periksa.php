<?php
require_once 'dbkoneksi.php';
$delete = $_GET['iddel'];
$sql = "DELETE FROM periksa WHERE id=?";
$st = $dbh->prepare($sql);
$st->execute([$delete]);

header('location:list_periksa.php');