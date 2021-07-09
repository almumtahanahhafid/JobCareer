<?php

class AlumniModel
{
  private $table = 'alumni';
  private $db;

  public function __construct()
  {
    $this->db = new Database;
  }

  // @return false if email or password wrong  
  public function loginAlumni($email, $password)
  {
    $this->db->query('SELECT * FROM ' . $this->table . ' 
    WHERE email=:email AND passwordAlumni=:pass');
    $this->db->bind('email', $email);
    $this->db->bind('pass', $password);
    return $this->db->singleSet();
  }


  public function getAllAlumni()
  {
    $this->db->query('SELECT * FROM ' . $this->table);
    return $this->db->resultSet();
  }

  public function getAlumniByEmail($email)
  {
    $this->db->query('SELECT * FROM ' . $this->table . ' WHERE email=:email');
    $this->db->bind('email', $email);
    return $this->db->singleSet();
  }

  public function updateDataAlumni()
  {
    $nim = $_POST["nim"];
    $inputName = $_POST["inputName"];
    $inputGender = $_POST["inputGender"];
    $inputPhone = $_POST["inputPhone"];
    $inputWn = $_POST["inputWn"];
    $inputMarital = $_POST["inputMarital"];
    $inputCompetence = $_POST["inputCompetence"];
    $inputStreet = $_POST["inputStreet"];
    $inputCity = $_POST["inputCity"];
    $inputState = $_POST["inputState"];
    $inputZip = $_POST["inputZip"];
    $inputOldPassword = $_POST["inputOldPassword"];
    $inputNewPassword = $_POST["inputNewPassword"];
    $pass = ($inputNewPassword == "" ? $inputOldPassword : $inputNewPassword);


    $query = 'UPDATE alumni
            SET nama=:inputName,
            jenkel=:inputGender,
            streetAl=:inputStreet, 
            cityAl=:inputCity, 
            stateAl=:inputState, 
            zipcodeAl=:inputZip, 
            telp_skrg=:inputPhone,
            wn=:inputWn,
            statusMarital=:inputMarital,
            kompetensi=:inputCompetence,
            passwordAlumni=:pass
            WHERE nim=:nim';

    $this->db->query($query);
    $this->db->bind('nim', $nim);
    $this->db->bind('inputName', $inputName);
    $this->db->bind('inputGender', $inputGender);
    $this->db->bind('inputStreet', $inputStreet);
    $this->db->bind('inputCity', $inputCity);
    $this->db->bind('inputState', $inputState);
    $this->db->bind('inputZip', $inputZip);
    $this->db->bind('inputPhone', $inputPhone);
    $this->db->bind('inputWn', $inputWn);
    $this->db->bind('inputMarital', $inputMarital);
    $this->db->bind('inputCompetence', $inputCompetence);
    $this->db->bind('pass', $pass);
    return $this->db->rowCount();
  }


  public function getApplicationHistory($nim)
  {

    $query = "SELECT pl.judul, p.namaPerush, ap.tgl_apply, ap.status, pl.idLowongan FROM alumni al
          INNER JOIN aplication ap ON al.nim=ap.nim
          INNER JOIN perusahaan_lowongan pl ON ap.idLowongan=pl.idLowongan
          INNER JOIN perusahaan p ON ap.idPerush=p.idPerush
          WHERE al.nim = :nim
          ORDER BY tgl_apply DESC
          ;";
    $this->db->query($query);
    $this->db->bind('nim', $nim);
    return $this->db->resultSet();
  }

  public function postApplication($nim, $idLowongan, $idPerush)
  {

    $query = "INSERT INTO `aplication` (`noapl`, `nim`, `idPerush`, `idLowongan`, `tgl_apply`, `tgl_confirm`, `confirm`, `statusUpdate`, `status`) 
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

  public function isApplied($nim, $idLowongan, $idPerush)
  {
    $query = "SELECT * FROM aplication
    WHERE nim=:nim AND idLowongan=:idLowongan AND idPerush=:idPerush";
    $this->db->query($query);
    $this->db->bind('nim', $nim);
    $this->db->bind('idLowongan', $idLowongan);
    $this->db->bind('idPerush', $idPerush);

    return $this->db->singleSet();
  }
}
