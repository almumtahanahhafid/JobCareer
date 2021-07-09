<div class="card bg-light bg-gradient border-0">
  <div class="card-body">
    <h5 class="card-title p-5" style="font-size: 55px; color:#1F5938; text-align:center; align-items:center; margin-top: 150px;"><b>Mencari pekerjaan dengan <br> mudah bersama kami</b></h5>
    <div class="input-group justify-content-md-center m-0 p-5" id="formsearch">

      <form class="d-flex" action="<?= BASE_URL; ?>alumni/doFinding" method="POST" style="margin-bottom: 130px;">
        <input class="form-control" type="search" id="keyword" name="keyword" placeholder="Job Title or Keyword" aria-label="Search" required>
        <select class="form-select" id="inputGroupSelect04" aria-label="Example select with button addon" name="location" id="location" required>
          <option value='' selected>Job Location</option>
          <option value='0'>Indonesia</option>
          <option value='1'>Outside Indonesia</option>
        </select>
        <button class="btn py-4 px-5" id="buttons" style="background-color:#5A8E71; color:#FBFBFB; font-size: 18px;" type="submit" name="submit"><b>Search</b></button>
      </form>

    </div>
  </div>
</div>
<section class="section-job-content" id="JobsContent">
  <div class="container">
    <h5 class="card-title mb-5" style="font-size: 35px; color:#1F5938; text-align:center;" id="titlejob"><b>Lowongan Kerja Terbaru</b></h5>
    <div class="row row-cols-1 row-cols-md-3 g-4 mt-5 justify-content-md-center">

      <?php
      $latestLowongan = $data;
      foreach ($latestLowongan as $lowongan) { ?>

        <div class="col">
          <div class="card h-100 shadow-lg border-0 mx-5 py-4" id="contentjob">
            <div class="companyImage">
              <?= '<img src="data:image/jpeg;base64,' . base64_encode($lowongan['fotoPerush']) . '" alt="Logo" style="width:96px; height:91px">' ?>

            </div>
            <div class="card-body">
              <h5 class="card-title fw-bold mb-4"><?= $lowongan['namaPerush']; ?></h5>
              <p class="card-text fw-bold m-0"><?= $lowongan['judul']; ?></p>
              <p class="card-text"><?= $lowongan['lokasi']; ?></p>
              <p class="card-text m-0" style="color:#1F5938;">Batas Pendaftaran</p>
              <p class="card-text" style="color: #1F5938;"><?= $lowongan['batasLowongan']; ?></p>

              <a href="<?= BASE_URL; ?>alumni/lowongan/<?= $lowongan['idLowongan']; ?>" class="card-link stretched-link" style="color:#CB9531; text-align:left"><b>More Info ></b></a>
            </div>
          </div>
        </div>

      <?php } ?>

    </div>
  </div>
</section>

<section>
    <div class="container" style="margin-top:100px">
      <div class="title" style="align:center">
        <h5 class="card-title" style="font-size: 35px; color:#DEBD7E; text-align:center"><b>Testimonial <span style="font-size: 35px; color:#1F5938"> Alumni</span></b></h5>
        <div class="container" style="margin-top:50px; margin-bottom:100px;">
          <div class="d-flex justify-content-start">
            <div class="d-flex align-items-center">
              <div class="flex-shrink-0">
                <img src="<?= BASE_URL; ?>/image/alumni2.png" alt="Logo" style="width:75px;height:75px;">
              </div class="row">
              <div class=" flex-grow-1 ms-3">
                <p class="card-text" style="font-size: 16px;">“Lowongan kerja di sini sangat beragam dan juga mudah untuk meng-applynya. Alhamdulillah setelah 2 bulan lulus saya langsung bekerja di bidang yang sesuai dengan skill yang saya miliki. Terima kasih karirsuka.”</p>
                <h6 class=" card-subtitle mb-2 text-muted" style="font-size: 12px;">Siti Rahma</h6>
              </div>
            </div>
          </div>
          <div class="d-flex justify-content-end border-top" style="margin-top: 25px;">
            <div class=" d-flex align-items-center">
              <div class="flex-grow-1 ms-3">
                <p class="card-text text-end" style="font-size: 16px; margin-top : 20px;">“Lowongan kerja di sini sangat beragam dan juga mudah untuk meng-applynya. Alhamdulillah setelah 2 bulan lulus saya langsung bekerja di bidang yang sesuai dengan skill yang saya miliki. Terima kasih karirsuka.”</p>
                <h6 class=" card-subtitle mb-2 text-muted text-end" style="font-size: 12px;">Zulkarnain</h6>
              </div>
              <div class=" flex-shrink-0">
                <img src="<?= BASE_URL; ?>/image/alumni.png" alt="logo" style="width:75px;height:75px;margin-left: 10px">
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    </div>
</section>