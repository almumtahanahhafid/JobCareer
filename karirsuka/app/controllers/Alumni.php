<?php

class Alumni extends Controller
{

  function __construct()
  {
    session_start();
  }

  public function index()
  {
    $data = $this->model('LowonganModel')->getLatestLowongan();
    $this->view('templates/headerAlumni');
    $this->view("alumni/index", $data);
    $this->view('templates/footer');
  }

  private function hasLoginSession()
  {
    return isset($_SESSION["alumniLogin"]);
  }

  public function find()
  {
    $data = $this->model('LowonganModel')->getAllLowongan();
    $this->view('templates/headerAlumni');
    $this->view("alumni/cariLowongan", $data);
    $this->view('templates/footer');
  }

  public function doFinding()
  {
    $data = $this->model('LowonganModel')->getLowonganByKeyword();
    $this->view('templates/headerAlumni');
    $this->view("alumni/cariLowongan", $data);
    $this->view('templates/footer');
  }

  public function lowongan($idLowongan = "")
  {
    if (!$this->hasLoginSession()) {
      header("Location: " . BASE_URL . "alumni/login");
      exit;
    } else if ($idLowongan == "") {
      header("Location: " . BASE_URL);
    }

    $data["lowongan"] = $this->model('LowonganModel')->getLowonganById($idLowongan);
    $data["syarat"] = $this->model('LowonganModel')->getSyaratById($idLowongan);

    $this->view('templates/headerAlumni');
    $this->view("alumni/details", $data);
    $this->view('templates/footer');
  }

  public function apply($idLowongan = "")
  {
    if (!$this->hasLoginSession()) {
      header("Location: " . BASE_URL . "alumni/login");
      exit;
    } else if ($idLowongan == "") {
      header("Location: " . BASE_URL);
    }

    $activeUser = $_SESSION["activeUser"];
    $data["lowongan"] = $this->model('LowonganModel')->getLowonganById($idLowongan);
    $data["user"] = $this->model('AlumniModel')->getAlumniByEmail($activeUser);

    $this->view('templates/headerAlumni');
    $this->view("alumni/apply", $data);
    $this->view('templates/footer');
  }


  public function applyJob($nim = "", $idLowongan = "", $idPerush = "")
  {
    if (!$this->hasLoginSession()) {
      header("Location: " . BASE_URL . "alumni/login");
      exit;
    } else if ($nim == "" || $idLowongan == "" || $idPerush == "") {
      header("Location: " . BASE_URL);
      exit;
    }
    $isApplied = $this->model('AlumniModel')->isApplied($nim, $idLowongan, $idPerush);
    if ($isApplied) {
      header("Location: " . BASE_URL . "alumni/error");
      exit;
    } else {
      $data = $this->model('AlumniModel')->postApplication($nim, $idLowongan, $idPerush);
      if ($data > 0) {
        header("Location: " . BASE_URL . "alumni/success");
        exit;
      } else {
        header("Location: " . BASE_URL . "alumni/error");
        exit;
      }
    }
  }

  public function login($isFailed = false)
  {
    if ($this->hasLoginSession()) {
      if ($_SESSION["alumniLogin"]) {
        header("Location: " . BASE_URL . "alumni/profile");
        exit;
      }
    }

    $data["isFailed"] = $isFailed;
    $this->view('templates/headerAlumni');
    $this->view("alumni/login", $data);
  }

  public function loginAction()
  {
    if ($this->hasLoginSession()) {
      header("Location: " . BASE_URL . "alumni/profile");
      exit;
    }
    $email = $_POST["email"];
    $password = $_POST["password"];
    $data = $this->model('AlumniModel')->loginAlumni($email, $password);

    if ($data == 0) {
      header("Location: " . BASE_URL . "alumni/login/true");
    } else {
      $_SESSION["alumniLogin"] = true;
      $_SESSION["activeUser"] = $data["email"];
      header("Location: " . BASE_URL);
      exit;
    }
  }

  public function profile($isUpdateSuccess = 1)
  {
    if (!$this->hasLoginSession()) {
      header("Location: " . BASE_URL . "alumni/login");
      exit;
    }

    $activeUser = $_SESSION["activeUser"];
    $data = $this->model('AlumniModel')->getAlumniByEmail($activeUser);
    $data["isUpdateSuccess"] = $isUpdateSuccess;

    $this->view('templates/headerAlumni');
    $this->view("alumni/profile", $data);
    $this->view('templates/footer');
  }

  public function history()
  {
    if (!$this->hasLoginSession()) {
      header("Location: " . BASE_URL . "alumni/login");
      exit;
    }

    $activeUser = $_SESSION["activeUser"];
    $data["user"] = $this->model('AlumniModel')->getAlumniByEmail($activeUser);
    $nim = $data["user"]["nim"];
    $data["application"] = $this->model('AlumniModel')->getApplicationHistory($nim);

    $this->view('templates/headerAlumni');
    $this->view("alumni/history", $data);
    $this->view('templates/footer');
  }

  public function update()
  {
    if (!$this->hasLoginSession()) {
      header("Location: " . BASE_URL . "alumni/login");
      exit;
    }

    $email = $_POST["inputEmail"];
    $oldPassword = $_POST['inputOldPassword'];
    $newPassword = $_POST['inputNewPassword'];

    $login = $this->model('AlumniModel')->loginAlumni($email, $oldPassword);
    if ($login == 0) {
      header("Location: " . BASE_URL . "alumni/profile/0");
      exit;
    } else {
      $data = $this->model('AlumniModel')->updateDataAlumni();
      header("Location: " . BASE_URL . "alumni/profile");
    }
  }

  public function logout()
  {
    session_unset();
    session_destroy();
    header("Location: " . BASE_URL);
    exit;
  }

  public function success()
  {
    $this->view('templates/headerAlumni');
    $this->view("templates/success");
    $this->view('templates/footer');
  }

  public function error()
  {
    $this->view('templates/headerAlumni');
    $this->view("templates/error",);
    $this->view('templates/footer');
  }

  
  public function pdf()
  {
    $this->load->library('dompdf_gen');

    $data["alumni"] = $this->m_mahasiswa->tampil_data('tb_lowongan')->result();

    $this->load->view('laporan_pdf', $data);

    $paper_size = 'A4';
    $orientation = 'potrait';
    $html = $this->output->get_output();
    $this->dompdf->set_paper($paper_size, $orientation);

    $this->dompdf->load_html($html);
    $this->dompdf->render();
    $this->dompdf->stream("laporan_riwayat_aplikasi.pdf", array('Attachment' => 0));
    
  }
}
