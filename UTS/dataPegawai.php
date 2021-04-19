<?php
require_once 'models/Pegawai.php';
//ciptakan object dari class Produk
$obj = new Pegawai();
//panggil method tampilkan data
$rs = $obj->dataPegawai();
?>

<div class="row justify-content-around">
    <div class="col-md-4">
        <h3>Data Pegawai</h3>
    </div>
    <div class="col-md-6">
    <?php
        if(isset($member)){
    ?>
        <a class="btn btn-success" href="index.php?hal=formPegawai"><i class="bi bi-plus-circle-fill"></i> Tambah Data</a>
    <?php
    }
    ?>
    </div>
</div>

<table class="table table-hover mt-3">
    <thead >
    <tr class="text-center table-info">
        <th scope="col">No</th>
        <th scope="col">NIP</th>
        <th scope="col">Nama</th>
        <th scope="col">Email</th>
        <th scope="col">Agama</th>
        <th scope="col">Divisi</th>
        <th scope="col">Foto</th>
        <th scope="col">Action</th>
    </tr>
    </thead>
    <tbody>
    <?php
    $no = 1;
    foreach ($rs as $peg) {
        ?>
        <tr>
            <th><?= $no; ?></th>
            <th><?= $peg['nip']; ?></th>
            <th><?= $peg['nama']; ?></th>
            <th><?= $peg['email']; ?></th>
            <th><?= $peg['agama']; ?></th>
            <th><?= $peg['divisi']; ?></th>
            <th><?= $peg['foto']; ?></th>
            <td>
                <div class="btn-group " role="group" aria-label="Basic example">
                    <a href="index.php?hal=detailPegawai&id=<?= $peg['id']; ?>"
                       class="btn btn-sm btn-info">
                        <i class="bi bi-list-stars"></i> Detail
                    </a>
                    <?php
                    $role = $member['role']?? null;
                    if(isset($member)){
                    ?>
                    <a href="index.php?hal=formEditPegawai&id=<?= $peg['id']; ?>"
                       class="btn btn-sm btn-warning">
                        <i class="bi bi-pencil-square"></i> Ubah
                    </a>
                    <?php
                        if($role != 'staff'){
                    ?>
                    <form method="POST" action="controllers/pegawaiController.php">
                        <button name="proses" value="hapus" class="btn btn-sm btn-danger"
                                onclick="return confirm('Are you sure ?')">
                            <i class="bi bi-x-circle-fill"></i> Hapus
                        </button>
                    <?php
                    }
                    ?>
                    <input type="hidden" name="idx" value="<?= $peg['id']; ?>"/>
                    <?php
                    }
                    ?>
                    </form>
                </div>
            </td>
        </tr>
        <?php
        $no++;
    }
    ?>
    </tbody>
</table>