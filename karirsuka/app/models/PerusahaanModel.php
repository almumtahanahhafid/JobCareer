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
  public function updateDataAlumni()
  {
    $idPerush = $_POST["inputid"];
    $inputName = $_POST["inputName"];
    $inputCPName = $_POST["inputCPName"];
    $inputCPNumber = $_POST["inputCPNumber"];
    $inputFax = $_POST["inputFax"];
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
            namaCP=:inputCPName,
            streetPerush=:inputStreet, 
            cityPerush=:inputCity, 
            statePerush=:inputState, 
            zipCode=:inputZip, 
            telpCP=:inputCPNumber,
            tentangPerush=:inputAbout,
            telpFaxPerush=:inputFax,
            passwordAlumni=:pass
            WHERE idPerush=:inputid';

    $this->db->query($query);
    $this->db->bind('idPerush', $idPerush);
    $this->db->bind('inputName', $inputName);
    $this->db->bind('inputNameCP', $inputCPName);
    $this->db->bind('inputStreet', $inputStreet);
    $this->db->bind('inputCity', $inputCity);
    $this->db->bind('inputState', $inputState);
    $this->db->bind('inputZip', $inputZip);
    $this->db->bind('inputPhone', $inputCPNumber);
    $this->db->bind('inputFax', $inputFax);
    $this->db->bind('inputAbout', $inputAbout);
    $this->db->bind('pass', $pass);
    return $this->db->rowCount();
  }

 
}
