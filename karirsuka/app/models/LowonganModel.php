<?php

class LowonganModel
{
  private $table = 'perusahaan_lowongan';
  private $db;

  public function __construct()
  {
    $this->db = new Database;
  }

  public function getAllLowongan()
  {
    $query = 'SELECT * FROM ' . $this->table . ' pl 
    INNER JOIN perusahaan p ON pl.idPerush=p.idPerush
    ORDER BY tglMasuk DESC;';
    $this->db->query($query);
    return $this->db->resultSet();
  }

  public function getLatestLowongan()
  {
    $query = 'SELECT idLowongan, namaPerush, fotoPerush, judul, lokasi, batasLowongan, tglMasuk
    FROM ' . $this->table . ' pl INNER JOIN perusahaan p 
    ON pl.idPerush=p.idPerush
    ORDER BY tglMasuk DESC
    LIMIT 3';
    $this->db->query($query);
    return $this->db->resultSet();
  }


  public function getLowonganByKeyword()
  {
    $keyword = $_POST['keyword'];
    $location = ($_POST['location'] == 0 ? "LIKE" : "NOT LIKE") . ' "%Indonesia%"';

    $query = 'SELECT * FROM ' . $this->table . ' pl 
    INNER JOIN perusahaan p ON pl.idPerush=p.idPerush 
    WHERE judul LIKE :keyword AND lokasi ' . $location . '
    ORDER BY batasLowongan DESC;';
    $this->db->query($query);
    $this->db->bind('keyword', "%$keyword%");
    return $this->db->resultSet();
  }

  public function detailApplicant($idLowongan)
  {
    $query = "SELECT pl.judul, p.namaPerush, al.nama, al.kompetensi, al.programStudi, al.ipk, al.hp_skrg, al.email FROM alumni al 
      INNER JOIN aplication ap ON al.nama=ap.nim 
      INNER JOIN perusahaan_lowongan pl ON ap.idLowongan=pl.idLowongan 
      INNER JOIN perusahaan p ON ap.idPerush=p.idPerush
      WHERE pl.idLowongan =:idLodwongan
      ;";

    $this->db->query($query);
    $this->db->bind('idLowongan', "$idLowongan");
    return $this->db->resultSet();
  }

  public function getLowonganById($idLowongan)
  {
    $query = 'SELECT * FROM ' . $this->table . ' pl 
    INNER JOIN perusahaan p ON pl.idPerush=p.idPerush 
    WHERE idLowongan=:idLowongan';
    $this->db->query($query);
    $this->db->bind('idLowongan', "$idLowongan");
    return $this->db->singleSet();
  }

  public function getSyaratById($idLowongan)
  {
    $query = 'SELECT * FROM perusahaan_lowongan pl 
    LEFT OUTER JOIN perusahaan_lowongan_syarat pls ON pl.idLowongan=pls.idLowongan 
    LEFT OUTER JOIN syarat_lamar sl ON pls.idSyarat=sl.id 
    WHERE pl.idLowongan=:idLowongan';
    $this->db->query($query);
    $this->db->bind('idLowongan', "$idLowongan");
    return $this->db->resultSet();
  }

  public function getVacancyHistory($idPerush)
  {

    $query = "SELECT  DISTINCT pl.judul, pl.lowongan, pl.tglMasuk, pl.idLowongan FROM perusahaan_lowongan pl
          INNER JOIN perusahaan p ON pl.idPerush = p.idPerush
          WHERE pl.idPerush = :idPerush
          ORDER BY tglMasuk DESC
          ;";
    $this->db->query($query);
    $this->db->bind('idPerush', $idPerush);
    return $this->db->resultSet();
  }

  public function getPerushByEmail($email)
  {
    $this->db->query('SELECT * FROM ' . $this->table . ' WHERE emailPerush=:email');
    $this->db->bind('email', $email);
    return $this->db->singleSet();
  }

  public function postJob($nim, $idLowongan, $idPerush)
  {

    $query = "INSERT INTO `perusahaan_lowongan` (`noapl`, `nim`, `idPerush`, `idLowongan`, `tgl_apply`, `tgl_confirm`, `confirm`, `statusUpdate`, `status`) 
    VALUES (:noapl, :nim, :idPerush, :idLowongan, :currDate, :nextOneWeek, '1', current_timestamp(), 'On Process');";
    $this->db->query($query);
    $this->db->bind('noapl', rand(0, 999999));
    $this->db->bind('nim', $nim);
    $this->db->bind('idLowongan', $idLowongan);
    $this->db->bind('idPerush', $idPerush);
    $this->db->bind('currDate', date("Y-m-d"));
    $this->db->bind('nextOneWeek', date('Y-m-d', strtotime("+1 week")));

    return $this->db->rowCount();
  }

  public function isPost($idLowongan, $idPerush)
  {
    $query = "SELECT * FROM perusahaan_lowongan
    WHERE idPerush=:idPerush AND idLowongan=:idLowongan";
    $this->db->query($query);
    $this->db->bind('idLowongan', $idLowongan);
    $this->db->bind('idPerush', $idPerush);

    return $this->db->singleSet();
  }
  
}
