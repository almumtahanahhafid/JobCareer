<div class="card border-bottom shadow-lg p-3 mb-5 bg-body" style="margin:150px auto; width:550px; height:550px; border-radius: 30px;">
  <div style="padding : 35px;">
    <div class="header-main" align="center">
      <img src="<?= BASE_URL; ?>image/uin1.png" alt="Logo" style="width:120px;height:140px;margin-bottom:30px;">
      <h3 class=primary>SIGN IN</h3>
    </div>
    <div class=container style="margin-left:60px; margin-top:30px">


      <form method="post" action="<?= BASE_URL; ?>alumni/loginAction">
        <div class="mb-3">
          <label for="email" class="form-label">Email</label>
          <input type="text" class="form-control" name="email" style="width:300px" id="email">
        </div>
        <div class="mb-3">
          <label for="password" class="form-label">Password</label>
          <input type="password" class="form-control" name="password" style="width:300px" id="password">
        </div>
        <button type="submit" class="btn mt-4 py-2 px-4" name="login" style="background-color: #8DAA9A"><span style="color:white;">LOGIN</span></button>
      </form>


    </div>

    <div align="center" style="margin-top:10px;">
      <i style="text-align:center;color:red">

        <?php
        $isFailed = $data["isFailed"];
        if ($isFailed) {
          echo "username atau password anda salah";
        }
        ?>

      </i>
    </div>
  </div>
</div>