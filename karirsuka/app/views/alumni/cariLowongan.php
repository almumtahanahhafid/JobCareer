<!-- Search button -->

<div class=container-fluid mt-4>
  <div class="card bg-white text-white border border-white">
    <div class="card-img-overlay">
      <div class="input-group mt-5 m-auto justify-content-center">

        <form class="d-flex" action="<?= BASE_URL; ?>alumni/doFinding" method="POST">
          <input class="form-control" type="search" name="keyword" id="keyword" placeholder="Job Title or Keyword" aria-label="Search" required>
          <select class="form-select" id="inputGroupSelect04" aria-label="Example select with button addon" name="location" id="location" required>
            <option value='' selected>Job Location</option>
            <option value='0'>Indonesia</option>
            <option value='1'>Outside Indonesia</option>
          </select>
          <button class="btn btn-outline-secondary btn-lg" name="cari" style="background-color:#1F5938; color:#FBFBFB" type="submit">Search</button>
        </form>

      </div>
    </div>
  </div>
</div>


<div class="container" style="margin-top: 200px;">

  <?php
  if (isset($_POST["cari"])) {
  ?>
    <h6>Result</h6>
    <h8 style="color:#A4A4A4"><?= $_POST["keyword"] . ', ' . ($_POST["location"] == 0 ? "Indonesia"  : "Outside Indonesia"); ?></h8>
    <br><br>
  <?php
  }
  ?>

  <!-- Check box -->
  <div class="container">
    <div class="row">
      <div class="col-sm-4 border shadow-sm p-3 mb-5 bg-body rounded">
        <h6>Tahun</h6>
        <div class="form-check">
          <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
          <label class="form-check-label" style="color:#A4A4A4" for="flexCheckDefault">2021</label>
        </div>
        <div class="form-check">
          <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
          <label class="form-check-label" style="color:#A4A4A4" for="flexCheckDefault">2020</label>
        </div>
        <div class="form-check">
          <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
          <label class="form-check-label" style="color:#A4A4A4" for="flexCheckDefault">2019</label>
        </div>
        <div class="form-check">
          <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
          <label class="form-check-label" style="color:#A4A4A4" for="flexCheckDefault">2018</label>
        </div><br>

        <h6>Tipe</h6>
        <div class="form-check">
          <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
          <label class="form-check-label" style="color:#A4A4A4" for="flexCheckDefault">Internship</label>
        </div>
        <div class="form-check">
          <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
          <label class="form-check-label" style="color:#A4A4A4" for="flexCheckDefault">Full Time</label>
        </div>
        <div class="form-check">
          <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
          <label class="form-check-label" style="color:#A4A4A4" for="flexCheckDefault">Part Time</label>
        </div>
      </div>

      <div class="col-sm-8 border shadow-sm p-3 mb-5 bg-body rounded">
        <div class="container">

          <?php
          $listLowongan = $data;
          foreach ($listLowongan as $lowongan) { ?>

            <div class="card p-4">
              <div class="row">
                <div class="col d-flex align-items-center">
                  <?= '<img src="data:image/jpeg;base64,' . base64_encode($lowongan['fotoPerush']) . '" alt="Logo" style="width:120px;">' ?>
                </div>

                <div class="col-6">
                  <h4 style="text-align:left; margin-top:30px;"><b><?= $lowongan["judul"]; ?></b></h4>
                  <h8 style="color:#676767;"><?= $lowongan["namaPerush"];; ?></h8><br>
                  <p class="fas fa-map-marker-alt" style="font-size: 10px; text-align:left; color:#676767;"> <span style="font-size: 10px; text-align:left; font-family: 'Poppins';"><?= $lowongan["lokasi"];; ?></span></p>
                </div>
                <div class="col my-5">
                  <p class="m-0" style="text-align:right; font-size:12px; color:#1F5938;">Batas Pendaftaran :</p>
                  <p style="text-align:right; font-size:12px; color:#1F5938; margin-right:25px"><?= $lowongan["batasLowongan"];; ?></p>
                </div>
                <a href="<?= BASE_URL ?>alumni/lowongan/<?= $lowongan["idLowongan"]; ?>" class="stretched-link"></a>

              </div>
            </div>
            <br>

          <?php } ?>


        </div>
      </div>
    </div>
  </div>
</div>