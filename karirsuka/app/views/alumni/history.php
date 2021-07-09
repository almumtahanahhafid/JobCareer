<?php
$user = $data["user"];
$applications = $data["application"];
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
          </div>
        </div>
      </div>
      <div class="col-8">
        <div class="card border-0" style="margin-bottom: 70px;">
          <div class="card-body" style="margin-bottom: 70px;">
            <h5 class="card-title mb-5 fs-2 fw-bold" style="color: #1F5938;">Job Application History</h5>
            <table class="table table-hover table-bordered text-start align-middle">
              <thead class="table">
                <tr>
                  <th scope="col">No.</th>
                  <th scope="col">Judul</th>
                  <th scope="col">Perusahaan</th>
                  <th scope="col">Apply Date</th>
                  <th scope="col">Status</th>
                  <th scope="col">Action</th>
                </tr>
              </thead>
              <tbody>

                <?php
                $i = 1;
                foreach ($applications as $application) { ?>

                  <tr>
                    <th scope="row"><?= $i; ?></th>
                    <td><?= $application["judul"]; ?></td>
                    <td><?= $application["namaPerush"]; ?></td>
                    <td style="width: 150px;"><?= $application["tgl_apply"]; ?></td>
                    <td><?= $application["status"]; ?></td>
                    <td>
                      <a class="btn" href="<?= BASE_URL; ?>alumni/lowongan/<?= $application["idLowongan"]; ?>" style="background-color: #8DAA9A; color: #fff;">Details</a>
                    </td>

                  </tr>

                <?php
                  $i++;
                } ?>

              </tbody>
            </table>
            <div class="d-grid gap-2 d-xl-flex justify-content-md-end" style="margin-top:80px;">
              <a class="btn rounded-3 px-5 py-2 fs-5 mb-5 " style="background-color:#8DAA9A; color:#FBFBFB" href="#" role="button">
              Download History
              </a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

</div>