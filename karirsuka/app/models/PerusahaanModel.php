<?php

class PerusahaanModel
{
  private $table = 'perusahaan';
  private $db;

  public function __construct()
  {
    $this->db = new Database;
  }

  public function getAllPerush()
  {
    $this->db->query('SELECT * FROM ' . $this->table);
    return $this->db->resultSet();
  }

  public function getPerushByEmail($email)
  {
    $this->db->query('SELECT * FROM ' . $this->table . ' WHERE emailPerush=:email');
    $this->db->bind('email', $email);
    return $this->db->singleSet();
  }


  //login
  public function loginPerush($email, $password)
  {
    $this->db->query('SELECT * FROM ' . $this->table . ' 
    WHERE emailPerush=:email AND passwordPerush=:pass');
    $this->db->bind('email', $email);
    $this->db->bind('pass', $password);
    return $this->db->singleSet();
  }

  //register
  public function registerPerush($email, $password)
  {
    $query = "INSERT INTO `perusahaan` (`idPerush`,  `emailPerush`, `regTime`, `passwordPerush`) 
    VALUES (:id, :email,  current_timestamp(), :password);";
    $this->db->query($query);
    $this->db->bind('id', rand(0, 999999));
    $this->db->bind('email', $email);
    $this->db->bind('password', $password);
    return $this->db->rowCount();
  }

  //update profile
public function updateDataPerush()
  {
    $idPerush = $_POST["idPerush"];
    $inputName = $_POST["inputName"];
    $inputID = $_POST["inputID"];
    $inputCPName = $_POST["inputCPName"];
    $inputCPNumber = $_POST["inputCPNumber"];
    $inputFaxNumber = $_POST["inputFaxNumber"];
    $inputStreet = $_POST["inputStreet"];
    $inputCity = $_POST["inputCity"];
    $inputState = $_POST["inputState"];
    $inputZip = $_POST["inputZip"];
    $inputAbout = $_POST["inputAbout"];
    $inputOldPassword = $_POST["inputOldPassword"];
    $inputNewPassword = $_POST["inputNewPassword"];
    $pass = ($inputNewPassword == "" ? $inputOldPassword : $inputNewPassword);


    $query = 'UPDATE perusahaan
            SET namaPerush=:inputName,
            namaCp=:inputCPName,
            streetPerush=:inputStreet, 
            idPerush=:inputID,
            cityPerush=:inputCity, 
            statePerush=:inputState, 
            zipCode=:inputZip, 
            telpCp=:inputCPNumber,
            tentangPerush=:inputAbout,
            telpFaxPerush=:inputFaxNumber,
            passwordPerush=:pass
            WHERE idPerush=:idPerush';

    $this->db->query($query);
    $this->db->bind('idPerush', $idPerush);
    $this->db->bind('inputID', $inputID);
    $this->db->bind('inputName', $inputName);
    $this->db->bind('inputCPName', $inputCPName);
    $this->db->bind('inputCPNumber', $inputCPNumber);
    $this->db->bind('inputStreet', $inputStreet);
    $this->db->bind('inputCity', $inputCity);
    $this->db->bind('inputState', $inputState);
    $this->db->bind('inputZip', $inputZip);
    $this->db->bind('inputFaxNumber', $inputFaxNumber);
    $this->db->bind('inputAbout', $inputAbout);
    $this->db->bind('pass', $pass);
    return $this->db->rowCount();
  }
  
  //PostJob
    public function postJob($data)
  {

    $query = "INSERT INTO `perusahaan_lowongan` 
          (`idPerush`, `idlowongan`,`judul`, `deskripsi`, `syarat`, `salary`, `batasLowongan`, `kompetensi`, `lowongan`, `lokasi`)
          VALUES (:idPerush, :idlowongan, :judul, :deskripsi, :syarat, :salary, :batasLowongan, :kompetensi, :lowongan, :lokasi);";

    $this->db->query($query);
    $this->db->bind('idPerush', $data["idPerush"]);
    $this->db->bind('idlowongan', rand(0, 999999));
    $this->db->bind('judul', $data["judul"]);
    $this->db->bind('deskripsi',$data["deskripsi"]);
    $this->db->bind('syarat', $data["syarat"]);
    $this->db->bind('salary', $data["salary"]);
    $this->db->bind('batasLowongan', $data["batasLowongan"]);
    $this->db->bind('kompetensi', $data["kompetensi"]);
    $this->db->bind('lowongan', $data["lowongan"]);
    $this->db->bind('lokasi', $data["lokasi"]);

    return $this->db->rowCount();
  }
 
}
