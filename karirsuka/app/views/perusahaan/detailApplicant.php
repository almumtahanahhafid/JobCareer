<?php
$user = $data["user"];
$lowongan = $data["lowongan"];
$applicants = $data["applicants"];
?>

<div class="container" style="align:center; margin-top: 100px;">
<h6 style="color:#A4A4A4">Detail Applicant</h6>
<h4><b><?= $lowongan["judul"]; ?> - <?= $user["namaPerush"]; ?></b></h4>
<br><br>

<!-- Check box -->
<div class="container">
  <div class="row">
    <div class="col-sm-4 border shadow-sm p-3 mb-5 bg-body rounded">
        <h6>Pengalaman Kerja</h6>
        <div class="form-check">
            <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
            <label class="form-check-label" style="color:#A4A4A4" for="flexCheckDefault">Fresh Graduate</label>
        </div>
        <div class="form-check">
            <input class="form-check-input" type="checkbox" value="" id="flexCheckChecked" checked>
            <label class="form-check-label" style="color:#A4A4A4" for="flexCheckChecked">1-2 tahun</label>
        </div>
        <div class="form-check">
            <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
            <label class="form-check-label" style="color:#A4A4A4" for="flexCheckDefault">3-5 tahun</label>
        </div>
        <div class="form-check">
            <input class="form-check-input" type="checkbox" value="" id="flexCheckChecked" checked>
            <label class="form-check-label" style="color:#A4A4A4" for="flexCheckChecked">>5 tahun</label>
        </div>
    </div>

    <div class="col-sm-8 border shadow-sm p-3 mb-5 bg-body rounded">
        <div class="container">
        
          <?php
          foreach ($applicants as $applicant) { ?>

            <div class="card p-4">
              <div class="row">
                <div class="col-auto">
                  <?= '<img src="data:image/jpeg;base64,' . base64_encode($applicant["photo"]) . '" alt="Logo" style="width:120px;">' ?>
                </div>
                <br><br>
                <div class="col-auto me-3">
                  <h4 style="text-align:left;"><b><?= $applicant["nama"]; ?></b></h4>
                  <h8 style="color:#676767;">Skill : <?= $applicant["kompetensi"];; ?></h8><br>
                  <h8 style="color:#676767;">Prodi : <?= $applicant["programStudi"];; ?></h8><br>
                  <h8 style="color:#676767;">IPK : <?= $applicant["ipk"];; ?></h8><br>
                </div>
               
                <div class="col-auto mt-4 mb-2 ps-5">
                    <h8 style="text-align:right; color:#8A8A8A;">Contact:</h8><br>
                    <h8 style="color:#676767;"><?= $applicant["hp_skrg"];; ?></h8><br>
                    <h8 style="color:#676767;"><?= $applicant["email"];; ?></h8>
                </div>
                <a href="<?= BASE_URL ?>perusahaan/history/<?= $applicant["idLowongan"]; ?>" class="stretched-link"></a>

              </div>
            </div><br> 
          <?php } ?>   
       
      </div>
    </div>
    </div>
   </div>
</div>
