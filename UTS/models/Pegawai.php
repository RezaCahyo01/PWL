<?php
class Pegawai{
    //member1 var
    private $koneksi;
    //member2 konstruktor
    public function __construct()
    {
        global $dbh;
        $this->koneksi = $dbh;
    }
    //member3 method CRUD
    public function dataPegawai()
    {
        $sql = "SELECT pegawai.* , divisi.nama as divisi
                  FROM pegawai INNER JOIN divisi
                  ON divisi.id = pegawai.iddivisi";
        //prepare statement
        $ps = $this->koneksi->prepare($sql);
        $ps->execute();
        $rs = $ps->fetchAll();
        return $rs;
    }    
    public function getPegawai($id)
    {
        $sql = "SELECT pegawai.* , divisi.nama as divisi
                  FROM pegawai INNER JOIN divisi
                  ON divisi.id = pegawai.iddivisi
                  WHERE pegawai.id = ?";
        $ps = $this->koneksi->prepare($sql);
        $ps->execute([$id]);
        $rs = $ps->fetch();
        return $rs;
    }
    public function divisi(){
        $sql = " SELECT * from divisi";
        $rs = $this->koneksi->query($sql);
        return $rs;
    }
    public function simpan($data)
    {
        $sql = "INSERT INTO pegawai(nip,nama,email,agama,iddivisi,foto)
                VALUES (?,?,?,?,?,?)";
        //prepare statement
        $ps = $this->koneksi->prepare($sql);
        $ps->execute($data);
    }
    public function ubah($data)
    {
        $sql = "UPDATE pegawai set nip=?,nama=?,email=?,agama=?,iddivisi=?,foto=? 
                WHERE id=?;";
        //prepare statement
        $ps = $this->koneksi->prepare($sql);
        $ps->execute($data);
    }
    public function hapus($id)
    {
        $sql = "DELETE FROM pegawai WHERE id=?";
        //prepare statement
        $ps = $this->koneksi->prepare($sql);
        $ps->execute($id);
        
    }
}