<?php
require_once 'models/Pegawai.php';
$obj = new Pegawai();
$rs = $obj->divisi();
$peg = $obj->dataPegawai();
//menangkap id dalam url
$id = $_REQUEST['id'];
$edit = $obj->getPegawai($id);
?>
<form class="offset-1" method="POST" action="controllers/pegawaiController.php">
  <div class="form-group row">
    <label for="nip" class="col-sm-2 col-form-label">NIP</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="nip" value="<?= $edit['nip'] ?>" name="nip" required="required">
    </div>
  </div>
  <div class="form-group row">
    <label for="nama" class="col-sm-2 col-form-label">Nama</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="nama" name="nama" value="<?= $edit['nama'] ?>" required="required">
    </div>
  </div>
  <div class="form-group row">
    <label for="Email" class="col-sm-2 col-form-label">Email</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="Email" name="email" value="<?= $edit['email'] ?>" required="required">
    </div>
  </div>
  <div class="form-group row">
    <label for="Agama" class="col-sm-2 col-form-label">Agama</label>
    <div class="col-sm-10">
        <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="agama" id="inlineRadio1" value="Islam"
                <?= $edit['agama'] == 'Islam' ? 'checked' : ''; ?>>
            <label class="form-check-label" for="inlineRadio1">Islam</label>
        </div>
        <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="agama" id="inlineRadio2" value="Kristen Katholik"
                <?= $edit['agama'] == 'Kristen Katholik' ? 'checked' : ''; ?>>
            <label class="form-check-label" for="inlineRadio2">Kristen Katholik</label>
        </div>
        <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="agama" id="inlineRadio3" value="Kristen Protestan"
                <?= $edit['agama'] == 'Kristen Protestan' ? 'checked' : ''; ?>>
            <label class="form-check-label" for="inlineRadio3">Kristen Protestan</label>
        </div>
        <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="agama" id="inlineRadio4" value="Hindu"
                <?= $edit['agama'] == 'Hindu' ? 'checked' : ''; ?>>
            <label class="form-check-label" for="inlineRadio4">Hindu</label>
        </div>
        <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="agama" id="inlineRadio5" value="Budha"
                <?= $edit['agama'] == 'Budha' ? 'checked' : ''; ?>>
            <label class="form-check-label" for="inlineRadio5">Budha</label>
        </div>
        <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="agama" id="inlineRadio6" value="Khonghucu"
                <?= $edit['agama'] == 'Khonghucu' ? 'checked' : ''; ?>>
            <label class="form-check-label" for="inlineRadio6">Khonghucu</label>
        </div>
    </div>
  </div>
  <div class="form-group row">
    <label for="Divisi" class="col-sm-2 col-form-label">Divisi</label>
    <div class="col-sm-10">
    <select name="iddivisi" class="form-control">
        <option disabled> ~ Pilih Divisi ~ </option>
        <?php foreach($rs as $j) {
            if($j['id'] == $edit['iddivisi']) {
                $aktif = 'selected';
            } else {
                $aktif = '';
            }
        ?>
        <option value="<?= $j['id'] ?>" <?= $aktif; ?>>
            <?= $j['nama'] ?>
        </option>
        <?php } ?>
    </select>
    </div>
  </div>
  <div class="form-group row">
    <label for="Foto" class="col-sm-2 col-form-label">Foto</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="Foto" value="<?= $edit['foto'] ?>" name="foto">
    </div>
  </div>
  <div class="form-group row">
    <div class="offset-1 col-8">
        <input type="hidden" value="<?= $id ?>" name="id">
        <button name="proses" type="submit" value="simpan" class="btn btn-primary">Simpan</button>
      <a href="index.php?hal=dataPegawai" class="btn btn-danger">Batal</a>
    </div>
  </div>
</form>