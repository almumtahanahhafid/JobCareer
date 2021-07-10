<?php
$user = $data;
?>

<div class="container">
  <div class="main" id="profPerush">
    <div class="row">
      <div class="col-4">
        <div class="me-3">
          <div class="card text-center p-4">
            <img src="data:image/jpeg;base64,<?= base64_encode($user['fotoPerush']) ?>" class="card-img-top mx-auto" alt="Foto Profile" style="width:120px;">
            <div class="card-body">
              <h4 class="card-text"><b><?= $user["namaPerush"]; ?></b></h4>
              <h6 class="card-text"><?= $user["emailPerush"]; ?></h6>

              <h4 class="card-text mt-5" style="color: #1F5938;"><b>About</b></h4>
              <p class="card-text"><?= $user["tentangPerush"]; ?></p>
              <div class="d-grid gap-2 d-xl-flex justify-content-md-center" style="margin-top:50px;">
                <a class="btn rounded-3 px-5 py-2" style="background-color:#D21F3C; color:#FBFBFB;font-size:15px;" href="<?= BASE_URL; ?>perusahaan/logout" role="button">Sign out</a>
              </div>
            </div>
          </div>
          <div class="mt-5 text-lg-center fs-4 fw-bold">
            <a href="<?= BASE_URL; ?>perusahaan/history" style="color: #1F5938;" id="linkjob">Job Vacancy History</a>
          </div>
        </div>
      </div>

      <div class="col-8">
        <div class="card" style="margin-bottom: 70px;">
          <div class="card-body" style="margin-bottom: 70px;">

            <form class="row g-3" action="<?= BASE_URL; ?>perusahaan/update" method="POST">
              <input type="text" class="form-control" name="idPerush" id="idPerush" value="<?= $user["idPerush"]; ?>" hidden>
              <input type="text" class="form-control" name="inputEmail" id="inputEmail" value="<?= $user["emailPerush"]; ?>" hidden>

              <h4 style="color:#1F5938;"><b>Company Details</b></h4>

              <!-- NAME -->
              <div class="col-md-6">
                <label for="inputName" class="form-label">Company Name</label>
                <input type="text" class="form-control" name="inputName" id="inputName" value="<?= $user["namaPerush"]; ?>" required>
              </div>

              <!-- ID COMPANY -->
              <div class="col-md-6">
                <label for="inputID" class="form-label">Company ID</label>
                <input type="text" name="inputID" class="form-control" id="inputID"value="<?= $user["idPerush"]; ?>" required>
              </div>

              <!-- CP NAME -->
              <div class="col-md-6">
                <label for="inputCPName" class="form-label">Name of Contact Person </label>
                <input name="inputCPName" type="text" class="form-control" id="inputCPName"value="<?= $user["namaCp"]; ?>" required>
              </div>

              <!-- EMAIL -->
              <div class=" col-md-6">
                <label for="inputEmail" class="form-label">Company Email</label>
                <input type="email" class="form-control" name="inputEmail" id="inputEmail" value="<?= $user["emailPerush"]; ?>" disabled>
              </div>

              <!-- CP NUMBER -->
              <div class="col-md-6">
                <label for="inputCPNumber" class="form-label">CP Number</label>
                <input name="inputCPNumber" type="text" class="form-control" id="inputCPNumber"value="<?= $user["telpCp"]; ?>" required>
              </div>

              <!-- FAX NUMBER -->
              <div class="col-md-6">
                <label for="inputFaxNumber" class="form-label">Fax Number</label>
                <input name="inputFaxNumber" type="text" class="form-control" id="inputFaxNumber"value="<?= $user["telpFaxPerush"]; ?>" required>
              </div>

              <!-- ABOUT -->
              <div class="col-md-12">
                <label for="inputAbout" class="form-label">About</label>
                <textarea name="inputAbout" class="form-control" id="inputAbout"value=><?= $user["tentangPerush"]; ?></textarea required>
                <!-- <input type="text" class="form-control" id="inputAbout"value="<?= $user["tentangPerush"]; ?>" required> -->
              </div>

              <!-- STREET -->
              <h4 style="color:#1F5938; margin-top:70px;"><b>Address</b></h4>
              <div class="col-md-6">
                <label for="inputStreet" class="form-label">Street</label>
                <input name="inputStreet" type="text" class="form-control" id="inputStreet"value="<?= $user["streetPerush"]; ?>" required>
              </div>

              <!-- CITY -->
              <div class="col-md-6">
                <label for="inputCity" class="form-label">City</label>
                <input name="inputCity" type="text" class="form-control" id="inputCity"value="<?= $user["cityPerush"]; ?>" required>
              </div>

              <!-- STATE -->
              <div class="col-md-6">
                <label for="inputState" class="form-label">State</label>
                <input name="inputState" type="text" class="form-control" id="inputState"value="<?= $user["statePerush"]; ?>" required>
              </div>

              <!-- ZIP CODE -->
              <div class="col-md-6">
                <label for="inputZip" class="form-label">Zip Code</label>
                <input name="inputZip" type="number" class="form-control" id="inputZip"value="<?= $user["zipCode"]; ?>" required>
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
