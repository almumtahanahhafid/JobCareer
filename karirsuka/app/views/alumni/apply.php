<?php
$lowongan = $data["lowongan"];
$user = $data["user"];
?>

<div class="container">
  <div class="row justify-content-start">
    <div class="col-sm-6">
      <div class="card border-0">
        <div class="card-body">
          <h5 class="card-title mb-1"><b>Apply Job</b></h5>
          <h6 class="card-subtitle mt-4 mb-2 text-muted">Job Title</h6>
          <p class="card-text"><?= $lowongan["judul"]; ?></p>
          <h6 class="card-subtitle mt-3 mb-2 text-muted">Company</h6>
          <p class="card-text"><?= $lowongan["namaPerush"]; ?></p>
          <h6 class="card-subtitle mt-3 mb-2 text-muted">Job Type</h6>
          <p class="card-text">Full Time</p>
          <h5 class="card-title mt-5"><b>Your Information</b></h5>
          <h6 class="card-subtitle mt-4 mb-2 text-muted">Full Name</h6>
          <p class="card-text"><?= $user["nama"]; ?></p>
          <h6 class="card-subtitle mt-3 mb-2 text-muted">Email</h6>
          <p class="card-text"><?= $user["email"]; ?></p>
          <h6 class="card-subtitle mt-3 mb-2 text-muted">Phone Number</h6>
          <p class="card-text"><?= $user["hp_skrg"]; ?></p>
          <h5 class="col-sm card-title mt-5"><b>Upload File CV</b></h5>
          <div class="inputfile mb-5">
            <label for="formFile" class="form-label"> </label>
            <input class="form-control" type="file" id="formFile" required>
          </div>
        </div>
      </div>
    </div>
    <div class="col-sm-6">
      <div class="card border-0">
        <div class="card-body">
          <h6 class="card-subtitle mt-5 mb-2 text-muted">Job Location</h6>
          <p class="card-text"><?= $lowongan["lokasi"]; ?></p>
          <h6 class="card-subtitle mt-3 mb-2 text-muted">Company</h6>
          <p class="card-text"><?= $lowongan["namaPerush"]; ?></p>
          <h6 class="card-subtitle mt-3 mb-2 text-muted">Job Type</h6>
          <p class="card-text">Full Time</p>
          <a href="<?= BASE_URL; ?>alumni/profile">
            <h5 class="card-title mt-5 mb-2 ms-5 pt-2 text-align-end fs-6"><b style="color: #CB9531;">Edit Profile></b></h5>
          </a>
          <h6 class="card-subtitle mt-4 mb-2 pt-2 text-muted">Major</h6>
          <p class="card-text">Teknik Informatika</p>
          <h6 class="card-subtitle mt-3 mb-2 text-muted">NIM</h6>
          <p class="card-text"><?= $user["nim"]; ?></p>
          <h6 class="card-subtitle mt-3 mb-2 text-muted">Competence</h6>
          <p class="card-text"><?= $user["kompetensi"]; ?></p>
        </div>
      </div>
      <div class="d-grid gap-2 d-xl-flex justify-content-md-start mt-4 ms-4">
        <a class="btn rounded-3 px-5 py-2 fs-6 fw-bold mb-5 mt-5" style="background-color:#8DAA9A; color:#FBFBFB" href="<?= BASE_URL; ?>alumni/applyJob/<?= $user["nim"] . "/" . $lowongan["idLowongan"] . "/" . $lowongan["idPerush"]; ?>" role="button">Apply</a>
      </div>
    </div>

  </div>
</div>