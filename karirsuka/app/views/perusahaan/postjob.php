<?php
$user = $data["user"];

?>
<body>
<div class="container">
  <div class="card m-5">
    <div class="card-body p-5">
      <h5 class="card-title fw-bold mt-5 px-5" style ="color:#1F5938">Post a Job</h5>

      <form method ="POST" action="<?= BASE_URL; ?>/Perusahaan/postingjob" class="row g-3 needs-validation" novalidate>
      <input type="text" class="form-control" id="idPerush" name ="idPerush" value="<?= $user["idPerush"]?>" hidden />
        <div class="col-md-12">
          <div class="form-outline">
            <div class="mb-3 mt-4 px-5">
              <label for="judul" class="form-label">Job Title</label>
              <input type="text" class="form-control" id="judul" name ="judul" placeholder="Enter Job Title"  required />
            </div>
          </div>
        </div>
        <div class="col-md-12">
          <div class="form-outline">
            <div class="mb-3 px-5">
              <label for="deskripsi" class="form-label">Job Description</label>
              <textarea class="form-control" id="deskripsi" name="deskripsi" rows="3" placeholder="Enter Job Description" required></textarea>
            </div>
          </div>
        </div>
        <div class="col-md-12">
          <div class="form-outline">
            <div class="mb-3 px-5">
              <label for="syarat" class="form-label">Job Requirements</label>
              <textarea class="form-control" id="syarat" name="syarat" rows="3" placeholder="Enter  Job Requirements "required></textarea>
            </div>
          </div>
        </div>
        <div class="col-md-6">
          <div class="form-outline">
            <div class="mb-3 px-5">
              <label for="salary" class="form-label">Salary</label>
              <input type="number" class="form-control" id="salary" name= "salary" placeholder="Enter Salary" required />
            </div>
          </div>
        </div>
        <div class="col-md-6">
          <div class="form-outline">
            <div class="px-5">
              <label for="batasLowongan" class="form-label">Closing Date</label>
              <input type="date" class="form-control" id="batasLowongan" name="batasLowongan" placeholder="Enter Closing Date" required />
            </div>
          </div>
        </div>
        <div class="col-md-6">
          <div class="form-outline">
            <div class="mb-3 px-5">
              <label for="kompetensi" class="form-label">Competence</label>
              <input type="text" class="form-control" id="kompetensi" name= "kompetensi" placeholder="Enter Competence" required />
            </div>
          </div>
        </div>
        <div class="col-md-6">
          <div class="form-outline">
            <div class="px-5">
              <label for="lowongan" class="form-label">Position</label>
              <input type="text" class="form-control" id="lowongan" name="lowongan" placeholder="Enter Position" required />
            </div>
          </div>
        </div>
        <div class="col-md-12">
          <div class="form-outline">
            <div class="mb-3 mt-4 px-5">
              <label for="lokasi" class="form-label">Job Location</label>
              <input type="text" class="form-control" id="lokasi" name ="lokasi" placeholder="Enter Job Location"  required />
            </div>
          </div>
        </div>
        <div class="col-md-12">
          <div class="form-check mb-3 px-5">
            <input class="form-check-input" type="checkbox" value="" id="invalidCheck" required />
            <label class="form-check-label" for="invalidCheck"> Agree to terms and conditions </label>
          </div>
        </div>
        <div class="d-grid gap-2 d-xl-flex justify-content-md-end pe-5" style="margin-top:120px;">
          <button type ="submit" class="btn rounded-3 px-5 py-2 fw-bold fs-5 mb-5" style ="background-color:#8DAA9A; color:#FBFBFB">Post</button>
        </div>
      </form>
    </div>
  </div>
</div>
</body>


<!-- Validation Form -->
<script>
(() => {
  'use strict';
  const forms = document.querySelectorAll('.needs-validation');

  Array.prototype.slice.call(forms).forEach((form) => {
    form.addEventListener('submit', (event) => {
      if (!form.checkValidity()) {
        event.preventDefault();
        event.stopPropagation();
      }
      form.classList.add('was-validated');
    }, false);
  });
})();
</script>
