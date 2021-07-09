<?php
$lowongan = $data["lowongan"];
$listSyarat = $data["syarat"];
?>

<div class="container border" style="margin-top: 100px;">
  <div class="row">
    <div class="col border">

      <section>
        <div class="container mt-5">
          <div class="title">
            <div class="card w-100 mt-3 border-0">
              <div class="card-body">

                <div class="row">
                  <div class="col-3">
                    <img src="data:image/jpeg;base64,<?= base64_encode($lowongan['fotoPerush']) ?>" alt="Logo" style="width:120px; margin:20px 50px 20px 60px;">'
                  </div>

                  <div class="col-9">
                    <p style="text-align:right; font-size:10px; color:#1F5938;">Batas Pendaftaran: <?= $lowongan["batasLowongan"]; ?></p>
                    <h4 style="text-align:left; margin-top:30px;"><b><?= $lowongan["judul"]; ?></b></h4>
                    <h8><?= $lowongan["namaPerush"]; ?></h8><br>
                    <p class="fas fa-map-marker-alt" style="font-size: 10px; text-align:left;"> <span style="font-size: 10px; text-align:left; font-family: 'Poppins';">Jakarta, Indonesia</span></p>
                  </div>
                </div>

                <div class="row">
                  <div class="col">
                    <h5 class="card-title fas fa-briefcase" style="margin-top:70px;"> <span style="font-size: 18px; text-align:left; font-family: 'Poppins';"><b>Deskripsi Lowongan</b></span></h5>
                    <ul>
                      <li style="text-align:left; font-size:12px; color:#1F5938;"><?= $lowongan["kompetensi"]; ?></li>
                    </ul>
                  </div>
                </div>

                <div class="row">
                  <div class="col">
                    <h5 class="card-title fas fa-file-alt" style="margin-top:30px;"> <span style="font-size: 18px; text-align:left; font-family: 'Poppins';"><b>Persyaratan</b></span></h5>
                    <ul>

                      <?php foreach ($listSyarat as $syarat) { ?>

                        <li style="text-align:left; font-size:12px; color:#1F5938;"><?= $syarat["syarat"]; ?></li>

                      <?php } ?>

                    </ul>
                  </div>
                </div>

                <div class="d-grid gap-2 d-xl-flex justify-content-md-center" style="margin-top:70px;">
                  <a class="btn rounded-3" style="background-color:#8DAA9A; color:#FBFBFB" href="<?= BASE_URL; ?>alumni/apply/<?= $lowongan["idLowongan"]; ?>" role="button">Apply Now</a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>

    </div>
  </div>
</div>