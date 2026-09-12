<?php
 include ("includes/header.php");
if (isset($_SESSION["state_login"])&&$_SESSION["state_login"]===true){
?>
<script type="text/javascript">
	<!--
	location.replace("index.php");//به صفحه index.php منتقل شود
	-->
</script>
<?php
}//if پایان
	?>
<br/>
<div class="limiter">
		<div class="container-login100">

			<div class="wrap-login100 p-l-50 p-r-50 p-t-72 p-b-50">
				<form class="login100-form validate-form" name="login" method="post" action="action_login.php">
				
					<div class="wrap-input100 validate-input" data-validate="Username is required">
						<span class="label-input100">نام کاربری:</span><span style="color: red">*</span>
						<input class="input100" type="text" placeholder="نام کاربری..." name="username" id="username">
						<span class="focus-input100"></span>
					</div>
					
					<div class="wrap-input100 validate-input" data-validate = "Password is required">
						<span class="label-input100">کلمه عبور:</span><span style="color: red">*</span>
						<input class="input100" type="password"  placeholder="*************" name="password" id="password">
						<span class="focus-input100"></span>
					</div>
					
					<div class="container-login100-form-btn">
						<div class="wrap-login100-form-btn">
							<div class="login100-form-bgbtn"></div>
							<div class="login100-form-btn">
							<input  type=submit value="ورود"  class="login100-form-bgbtn" style="color:#ECE4E4;font-size: 20px;"  />
							</div>
						</div>
					</div>
					<div class="container-login100-form-btn">
						<div class="wrap-login100-form-btn">
							<div class="login100-form-bgbtn"></div>
							<div class="login100-form-btn">
							<input type="reset" value="جدید" class="login100-form-bgbtn" style="color:#ECE4E4;font-size: 20px;"  />
							</div>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>	
				

<?php
  include ("includes/footer.php");
?>