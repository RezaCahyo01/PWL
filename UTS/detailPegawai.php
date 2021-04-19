<?php
require_once 'models/Pegawai.php';
//tangkap request id di url
$id = $_REQUEST['id'];
// $id = isset($_GET['id']) ? $_GET['id'] : '';
$obj = new Pegawai();
$peg = $obj->getPegawai($id);
?>

<div class="card mb-3" >
  
  <div class="card-body">
    <h5 class="card-title"><?= $peg['nama'] ?></h5>
    <p class="card-text">
        NIP : <?= $peg['nip']; ?>
        <br/>Divisi : <?= $peg['divisi'] ?>
        <br/>Agama : <?= $peg['agama'] ?>
        <br/>Email : <?= $peg['email'] ?>
    </p>
    <a href="index.php?hal=dataPegawai" class="btn btn-primary">Go Back</a>
  </div>
</div>