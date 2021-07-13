<div class="card border-bottom shadow-lg p-3 mb-5 bg-body" style="margin:150px auto; width:550px; height:550px; border-radius: 30px;">
    <div style="padding : 35px;" >
      <div class="header-main" align="center">
        <img src="<?= BASE_URL; ?>image/uin1.png" alt="Logo" style="width:120px;height:140px;margin-bottom:30px;">
        <h3 class=primary>Register Account</h3>
      </div>
      <div class=container style="margin-left:60px; margin-top:30px;">
      <form  method="post" action="<?= BASE_URL ?>perusahaan/registerAction">
        <div class="mb-3">
            <input type="text" class="form-control" name="email" style="width:300px" id="email" placeholder="Email">
        </div>
        <div class="mb-3">
            <input type="password" class="form-control" name="password" style="width:300px" id="password" placeholder="Password" onchange="check_pass();">
        </div>
        <div class="mb-3">
            <input type="password" class="form-control" name="confirm_password" style="width:300px" id="confirm_password" placeholder="Re-enter Password" onchange="check_pass();">
        </div>
        <button type="submit" id="submit" class="btn py-2 px-4" name ="login" style="background-color: #8DAA9A"><span style="color:white;">REGISTER</span></button>
      </form>
      </div>
      <div align="center" style="margin-top:10px;">
      <i style="text-align:center;color:red">
		<?php 
		if(isset($_GET['pesan'])){
			if($_GET['pesan'] == "gagal"){
				echo "username atau password anda salah";
			}
		}
		?>	
      </i>
      </div>
    </div> 
	</div> 

  </body>
  <script src="<?= BASE_URL; ?>js/passChecker.js"></script>


</html>
