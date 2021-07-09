<?php
$user = $data;
?>

<div class="container">
  <div class="main" id="profAlumni">

    <div class="row">
      <div class="col-4">

        <div class="card text-center p-4 ">
          <img src="data:image/jpeg;base64,<?= base64_encode($user['photo']) ?>" class="card-img-top mx-auto" alt="Foto Profile" style="width:120px;">

          <div class="card-body">
            <h4 class="card-text"><b><?= $user["nama"]; ?></b></h4>
            <h6 class="card-text"><?= $user["email"]; ?></h6>

            <h4 class="card-text mt-5" style="color: #1F5938;"><b>About</b></h4>
            <p class="card-text"><?= $user["pengalamanKerja"]; ?></p>
            <a class="btn rounded-3 px-5 py-2" style="background-color:#D21F3C; color:#FBFBFB;font-size:15px;" href="<?= BASE_URL; ?>alumni/logout" role="button">Sign out</a>

          </div>
        </div>

        <div class="mt-5 text-lg-center fs-4 fw-bold">
          <a href="<?= BASE_URL; ?>alumni/history" style="color: #1F5938;" id="linkjob">Job Application History</a>
        </div>

      </div>


      <div class="col-8">
        <div class="card" style="margin-bottom: 70px;">
          <div class="card-body" style="margin-bottom: 70px;">

            <form class="row g-3" action="<?= BASE_URL; ?>alumni/update" method="POST">
              <input type="text" class="form-control" name="nim" id="nim" value="<?= $user["nim"]; ?>" hidden>
              <input type="text" class="form-control" name="inputEmail" id="inputEmail" value="<?= $user["email"]; ?>" hidden>

              <h4 style="color:#1F5938;"><b>Personal Details</b></h4>

              <!-- NAME -->
              <div class="col-md-6">
                <label for="inputName" class="form-label">Full Name</label>
                <input type="text" class="form-control" name="inputName" id="inputName" value="<?= $user["nama"]; ?>" required>
              </div>

              <!-- GENDER -->
              <div class="col-md-6">
                <label for="inputGender" class="form-label">Gender</label>

                <div id="inputGender" class="form-gender">
                  <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="inputGender" id="inlineRadio1" value="L" <?= ($user["jenkel"] == 'L') ? "checked" : ''; ?>>
                    <label class="form-check-label" for="inlineRadio1">Man</label>
                  </div>

                  <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="inputGender" id="inlineRadio2" value="P" <?= ($user["jenkel"] == 'P') ? "checked" : ''; ?>>
                    <label class="form-check-label" for="inlineRadio2">Woman</label>

                  </div>
                </div>

              </div>

              <!-- PHONE NUMBER -->
              <div class="col-md-6">
                <label for="inputPhone" class="form-label">Phone Number</label>
                <input type="number" class="form-control" name="inputPhone" id="inputPhone" value="<?= $user["telp_skrg"]; ?>" required>
              </div>

              <!-- EMAIL -->
              <div class=" col-md-6">
                <label for="inputEmail" class="form-label">Email Address</label>
                <input type="email" class="form-control" name="inputEmail" id="inputEmail" value="<?= $user["email"]; ?>" disabled>
              </div>

              <!-- NASIONALITY -->
              <div class="col-md-6">
                <label for="inputWn" class="form-label">Nasionality</label>
                <input type="text" class="form-control" name="inputWn" id="inputWn" value="<?= $user["wn"]; ?>" required>
              </div>

              <!-- MARITAL -->
              <div class="col-md-6">
                <label for="inputMarital" class="form-label">Marital Status</label>
                <select id="inputMarital" name="inputMarital" class="form-select">
                  <option <?= ($user["jenkel"] == "Menikah") ? "selected" : ''; ?>>Menikah</option>
                  <option <?= !($user["jenkel"] == "Menikah") ? "selected" : ''; ?>>Belum Menikah</option>
                </select>
              </div>

              <!-- Competence -->
              <div class="col-md-6">
                <label for="inputCompetence" class="form-label">Competence</label>
                <input type="text" class="form-control" name="inputCompetence" id="inputCompetence" value="<?= $user["kompetensi"]; ?>" required>
              </div>

              <h4 style="color:#1F5938; margin-top:70px;"><b>Address</b></h4>
              <!-- STREET -->
              <div class="col-md-6">
                <label for="inputStreet" class="form-label">Street</label>
                <input type="text" class="form-control" name="inputStreet" id="inputStreet" value="<?= $user["streetAl"]; ?>" required>
              </div>

              <!-- CITY -->
              <div class="col-md-6">
                <label for="inputCity" class="form-label">City</label>
                <input type="text" class="form-control" name="inputCity" id="inputCity" value="<?= $user["cityAl"]; ?>" required>
              </div>

              <!-- STATE -->
              <div class="col-md-6">
                <label for="inputState" class="form-label">State</label>
                <input type="text" class="form-control" name="inputState" id="inputState" value="<?= $user["stateAl"]; ?>" required>
              </div>

              <!-- ZIP CODE -->
              <div class="col-md-6">
                <label for="inputZip" class="form-label">Zip Code</label>
                <input type="number" class="form-control" name="inputZip" id="inputZip" value="<?= $user["zipcodeAl"]; ?>" required>
              </div>

              <!-- PASSWORD -->
              <h4 style="color:#1F5938; margin-top:70px;"><b>Account</b></h4>
              <div class="col-md-6">
                <label for="inputOldPassword" class="form-label">Old Password</label>
                <input type="password" class="form-control" name="inputOldPassword" id="inputOldPassword" required>
              </div>

              <div class=" col-md-6">
                <label for="inputNewPassword" class="form-label">New Password (optional)</label>
                <input type="password" class="form-control" name="inputNewPassword" id="inputNewPassword">
              </div>

              <div class=" d-grid gap-2 d-xl-flex justify-content-md-center" style="margin-top:70px;">
                <button class="btn rounded-3 px-5 py-2" name="update" type="submit" style="background-color:#8DAA9A; color:#FBFBFB;font-size:15px;">Update</button>
              </div>

              <div align="center" style="margin-top:10px;">
                <i style="text-align:center;color:red">

                  <?php
                  $isUpdateSuccess = $data["isUpdateSuccess"];
                  if (!$isUpdateSuccess) {
                    echo "password anda salah";
                  }
                  ?>

                </i>
              </div>

            </form>

          </div>
        </div>
      </div>
    </div>
  </div>
</div>
