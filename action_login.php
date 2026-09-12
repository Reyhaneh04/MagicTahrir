<?php
include ("includes/header.php");

if ((isset($_POST['username']) && !empty($_POST['username']) && isset($_POST['password']) && !empty($_POST['password']))){
	$username = $_POST['username']; 
    $password = $_POST['password'];
}else
	exit("یرخی از فیلدها مقدار دهی نشده");

$link = mysqli_connect("localhost","root","","shop_db");

if (mysqli_connect_errno())
	exit ("خطایی با شرح زیز است:".mysqli_connect_error());

$query = "SELECT * FROM USERS WHERE username='$username' AND password='$password'";
$result = mysqli_query($link,$query);

$row = mysqli_fetch_array($result);

if ($row){
 	$_SESSION["state_login"] = true;
	$_SESSION["realname"] = $row['realname'];
	
	$_SESSION["username"] = $row['username'];
	
	if ($row["type"] == 0){
		$_SESSION["user_type"] = "public";
	}
	elseif ($row["type"] == 1){
		$_SESSION["user_type"] = "admin";
		?>
<script type="text/javascript">
	<!--
	location.replace("admin_products.php");
	-->
</script>
<?php
	}//پایان elseif

	echo ("<p style='color:green;'><b>{$row['realname']} به فروشگاه مجیک تحریر خوش امدید </b></p>");
}
else ("<p style='color:red;'><b>{$row['realname']} نام کاربری یا کلمه عبور یافت نشد </b></p>");
	
mysqli_close($link);
?>

<?php
include ("includes/footer.php")
?>