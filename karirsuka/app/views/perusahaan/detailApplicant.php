<?php
$user = $data["user"];
$applicants = $data["applicant"];
?>

<div class="container" style="align:center; margin-top: 100px;">
<h6 style="color:#A4A4A4">Detail Applicant</h6>
<h4><b><?= $user["judul"]; ?> - <?= $user["namaPerush"]; ?></b></h4>
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
            <div class="row border"> 
                <div class="col">
                    <img src="foto1.png" alt="Logo" style="width:120px; height:120px; margin-top:30px">
                </div>
                <div class="col-6">
                    <h5 style="text-align:left; margin-top:30px;"><b>Siti Rahmah</b></h5><br>
                    <h8 style="color:#676767;">Skill : </h8><br>
                    <h8 style="color:#676767;">Prodi :</h8><br>
                    <h8 style="color:#676767;">IPK :</h8>
                </div>
                <div class="col" style="margin-top:80px">
                    <h8 style="text-align:right; font-size:12px; color:#8A8A8A;">Contact:</h8><br>
                    <h8 style="text-align:right; font-size:12px; color:#1F5938;">081234567891</h8><br>
                    <h8 style="text-align:right; font-size:12px; color:#1F5938; margin-right:25px">siti.rahma@gmail.com</h8>
                </div>
            </div><br>
            <div class="row border"> 
                <div class="col">
                    <img src="foto2.png" alt="Logo" style="width:120px; height:120px; margin-top:30px">
                </div>
                <div class="col-6">
                    <h5 style="text-align:left; margin-top:30px;"><b>Zulkarnain</b></h5><br>
                    <h8 style="color:#676767;">Skill : </h8><br>
                    <h8 style="color:#676767;">Prodi :</h8><br>
                    <h8 style="color:#676767;">IPK :</h8>
                </div>
                <div class="col" style="margin-top:80px">
                    <h8 style="text-align:right; font-size:12px; color:#8A8A8A;">Contact:</h8><br>
                    <h8 style="text-align:right; font-size:12px; color:#1F5938;">081234567891</h8><br>
                    <h8 style="text-align:right; font-size:12px; color:#1F5938; margin-right:25px">zulkarnain@gmail.com</h8>
                </div>
            </div><br>
        </div>
    </div>
    </div>
   </div>
</div>
