<?php
require_once 'dbkoneksi.php';
$delete = $_GET['iddel'];
$sql = "DELETE FROM paramedik WHERE id=?";
$st = $dbh->prepare($sql);
$st->execute([$delete]);

header('location:list_paramedik.php');