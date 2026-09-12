<?php
include ("includes/header.php");

if (!(isset($_SESSION["state_login"]) && ($_SESSION["state_login"])) === true){
	
?>
<script type="text/javascript">
	<!--
	location.replace("index.php");
	-->
</script>
<?php
}//if پایان


$link=mysqli_connect("localhost","root","","shop_db");

if (mysqli_connect_errno())
	exit("خطایی با شرح زیر رخ داده است".mysqli_connect_error());

$query = "SELECT * FROM users WHERE username='{$_SESSION['username']}'";
$result = mysqli_query($link,$query);

if ($row = mysqli_fetch_array($result)){
	
	$realname = $row['realname'];
	$email = $row['email'];
}

?>

<br/> 
<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100 p-l-50 p-r-50 p-t-72 p-b-50">
			
                 <form name="contact" action="action_contact.php"  method="post">
		           <table width="100%" border="0" style="margin-left: auto;margin-right: auto;">
		             <div class="wrap-input100 validate-input" data-validate="Username is required">
			              <span class="label-input100">نام و نام خانوادگی</span><span style="color: red;">*</span>
			              <input type="text" id="realname" name="realname" value="<?php echo ($realname) ?>" placeholder="نام کاربری..." class="input100" />
			              <span class="focus-input100"></span>
		             </div>
		
		             <div class="wrap-input100 validate-input" data-validate = "Password is required">
						  <span class="label-input100">آدرس پست الکترونیک</span><span style="color: red">*</span>
			              <input class="input100" placeholder="پست الکترونیکی..."  type="text" id="email" name="email" value="<?php echo ($email) ?>" />
						 <span class="focus-input100"></span>
		             </div>
		
		             <div class="wrap-input100 validate-input" data-validate = "Password is required">
			         <span class="label-input100">پیام متن</span><span style="color: red">*</span>
			         <textarea class="input100" id="detail" name="detail" cols="45" rows="10" wrap="virtual" ></textarea>
					 <span class="focus-input100"></span>
		             </div>
					 
					 <div class="container-login100-form-btn">
						<div class="wrap-login100-form-btn">
							<div class="login100-form-bgbtn"></div>
							    <div class="login100-form-btn">
                                  <input type="submit" value="ارسال" class="login100-form-bgbtn" style="color:#ECE4E4;font-size: 20px;"/>
							</div>
						</div>
					</div>
					   
		             <br/>
		             <div class="container-login100-form-btn">
						<div class="wrap-login100-form-btn">
							<div class="login100-form-bgbtn"></div>
							    <div class="login100-form-btn">
		                             <input type="reset" value="جدید" class="login100-form-bgbtn" style="color:#ECE4E4;font-size: 20px;" />
								</div>
						 </div>
					</div>
						
			      </table>	
					 
               </form>
				
			</div>
		</div>
	</div>	

<?php
include ("includes/footer.php");
?>