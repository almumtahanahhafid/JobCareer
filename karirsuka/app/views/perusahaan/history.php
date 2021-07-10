<?php
$user = $data["user"];
$vacancies = $data["application"];
?>

<div class="container">
    <div class="main" id="profPerush">
        <div class="row">
            <div class="col-4">
                <div class="card text-center p-4 w-auto me-5">
                    <img src="data:image/jpeg;base64,<?= base64_encode($user["fotoPerush"]) ?>" class="card-img-top mx-auto" alt="Foto Profile" style="width:120px;">
                    <div class="card-body">
                    <h4 class="card-text"><b><?= $user["namaPerush"]; ?></b></h4>
                    <p class="card-text" style="font-size: 14px;"><?= $user["emailPerush"]; ?></p>
                        <h4 class="card-text mt-5" style="color: #1F5938;"><b>About</b></h4>
                        <p class="card-text"><?= $user["tentangPerush"]; ?></p>
                    </div>
                </div>
            </div>
            <div class="col-8">
                <div class="card border-0" style="margin-bottom: 70px;">
                    <div class="card-body" style="margin-bottom: 70px;">
                        <h5 class="card-title mb-5 fs-2 fw-bold" style="color: #1F5938;">Job Vacancy History</h5>
                        <table class="table table-hover table-bordered text-start align-middle">
                            <thead class="table">
                                <tr>
                                <th scope="col">No.</th>
                                    <th scope="col">id Lowongan</th>
                                    <th scope="col">Job Title</th>
                                    <th scope="col">Lowongan</th>
                                    <th scope="col">Post Date</th>
                                    <th scope="col">Applicant</th>
                                </tr>
                            </thead>
                            <tbody> <?php
                                    $i = 1;
                                    foreach ($vacancies as $vacancy) { ?>

                                    <tr>
                                        <th scope="row"><?= $i; ?></th>
                                        <td><?= $vacancy["idLowongan"]; ?></td>
                                        <td><?= $vacancy["judul"]; ?></td>
                                        <td><?= $vacancy["lowongan"]; ?></td>
                                        <td><?= $vacancy["tglMasuk"]; ?></td>
                                        <td>
                                            <a class="btn" href="<?= BASE_URL; ?>perusahaan/detailApplicant" style="background-color: #8DAA9A; color: #fff;">Details</a>
                                        </td>

                                    </tr>

                                <?php
                                        $i++;
                                    } ?>

                            </tbody>
                        </table>
                        <div class="d-grid gap-2 d-xl-flex justify-content-md-end" style="margin-top:80px;">
                            <a class="btn rounded-3 px-5 py-2 fs-5 mb-5 " style="background-color:#8DAA9A; color:#FBFBFB" href="#" role="button">Download History</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
</body>
