<?php

class Perusahaan extends Controller
{
  function __construct()
  {
    session_start();
  }
  
  public function index()
  {
    $this->view('templates/headerPerusahaan');
    $this->view("perusahaan/index");
    $this->view('templates/footer');
  }

  private function hasLoginSession()
  {
    return isset($_SESSION["perushLogin"]);
  }

  public function login($isFailed = false)
  {
    if ($this->hasLoginSession()) {
      if ($_SESSION["perushLogin"]) {
        header("Location: " . BASE_URL . "perusahaan/profile");
        exit;
      }
    }

    $data["isFailed"] = $isFailed;
    $this->view('templates/headerPerusahaan');
    $this->view("perusahaan/login", $data);
  }

  public function loginAction()
  {
    if ($this->hasLoginSession()) {
      header("Location: " . BASE_URL . "perusahaan/profile");
      exit;
    }
    $email = $_POST["email"];
    $password = $_POST["password"];
    
    
    $data = $this->model('PerusahaanModel')->loginPerush($email, $password);

    if ($data == 0) {
      header("Location: " . BASE_URL . "perusahaan/login/true");
    } else {
      $_SESSION["perushLogin"] = true;
      $_SESSION["activeUser"] = $data["emailPerush"];
      header("Location: " . BASE_URL . "perusahaan/index");
      exit;
    }
  }

  public function register($isFailed = 0)
  {

    if ($this->hasLoginSession()) {
      if ($_SESSION["perushLogin"]) {
        header("Location: " . BASE_URL . "perusahaan/profile");
        exit;
      }
    }

    $data["isFailed"] = $isFailed;
    $this->view('templates/headerPerusahaan');
    $this->view("perusahaan/register", $data);
  }

  public function registerAction()
  {
    if ($this->hasLoginSession()) {
      header("Location: " . BASE_URL . "perusahaan/profile");
      exit;
    }
    $email = $_POST["email"];
    $password = $_POST["password"];
    
    
    $data = $this->model('PerusahaanModel')->registerPerush($email, $password);

    if ($data == 0) {
      header("Location: " . BASE_URL . "perusahaan/register/true");
    } else {
      header("Location: " . BASE_URL . "perusahaan/login");
      exit;
    }
  }

  public function logout()
  {
    session_unset();
    session_destroy();
    header("Location: " . BASE_URL);
    exit;
  }

  public function profile($isUpdateSuccess = 1)
  {
    if (!$this->hasLoginSession()) {
      header("Location: " . BASE_URL . "perusahaanLoogin/login");
      exit;
    }

    $activeUser = $_SESSION["activeUser"];
    $data = $this->model('PerusahaanModel')->getPerushByEmail($activeUser);
    $data["isUpdateSuccess"] = $isUpdateSuccess;

    $this->view('templates/headerPerusahaan');
    $this->view("perusahaan/profile", $data);
    $this->view('templates/footer');

  }

  public function history()
  {
    if (!$this->hasLoginSession()) {
      header("Location: " . BASE_URL . "perusahaan/login");
      exit;
    }

    $activeUser = $_SESSION["activeUser"];
    $data["user"] = $this->model('PerusahaanModel')->getPerushByEmail($activeUser);
    $idPerush = $data["user"]["idPerush"];
    $data["application"] = $this->model('LowonganModel')->getVacancyHistory($idPerush);

    $this->view('templates/headerPerusahaan');
    $this->view("perusahaan/history", $data);
    $this->view('templates/footer');

  }
  
  public function detailapplicant($idLowongan = "")
  {
    if (!$this->hasLoginSession()) {
      header("Location: " . BASE_URL . "perusahaan/login");
      exit;
    }

    $activeUser = $_SESSION["activeUser"];
    $data["user"] = $this->model('PerusahaanModel')->getPerushByEmail($activeUser);
    $data["lowongan"] = $this->model('LowonganModel')->getLowonganById($idLowongan);
    $data["applicants"] = $this->model('AlumniModel')->getApplicantById($idLowongan);

    $this->view('templates/headerPerusahaan');
    $this->view("perusahaan/detailApplicant", $data);
    $this->view('templates/footer');
  }

  public function postJob()
  {
    $this->view('templates/headerPerusahaan');
    $this->view("perusahaan/postjob");
    $this->view('templates/footer');
  }

  public function postingJob($idLowongan = "", $idPerush = "")
  {
    if (!$this->hasLoginSession()) {
      header("Location: " . BASE_URL . "perusahaan/login");
      exit;
    } else if ($idPerush == "" || $idLowongan == "") {
      header("Location: " . BASE_URL);
      exit;
    }
    
    $isPost = $this->model('LowonganModel')->isPost($idPerush, $idLowongan);
    if ($isPost) {
      header("Location: " . BASE_URL . "perusahaan/error");
      exit;

    } else {
      $data = $this->model('LowonganModel')->postJob($idPerush, $idLowongan);
      if ($data > 0) {
        header("Location: " . BASE_URL . "perusahaan/success");
        exit;
      } else {
        header("Location: " . BASE_URL . "perusahaan/error");
        exit;
      }
    }
  }

  public function success()
  {
    $this->view('templates/headerPerusahaan');
    $this->view("templates/success");
    $this->view('templates/footer');
  }

  public function error()
  {
    $this->view('templates/headerPerusahaan');
    $this->view("templates/error",);
    $this->view('templates/footer');
  }
  
}
