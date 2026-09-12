<?php
session_start();
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>فروشگاه انلاین لوازم التحریر</title>
	<link href="css/style.css" rel="stylesheet" type="text/css"/>
	
</head>
	<body>
    <div class="divTable">
        <div class="divTableRow">
	        <div class="divTaleCell">
				<header class="divTable">
					
					<div class="divTableRow">
						<div class="divTaleCell">
							<div >
								   <img height="55pt"; width="100%"; src="image/bg1.gif" alt=""/>
								<div class="wrapper">
                                   <button>
                                     محصولات شگفت انگیز                
                                     <span></span>
                                     <span></span>
                                     <span></span>
                                     <span></span>
                                   </button>
                                 </div>
							</div>
							<div class="logo">
								<img  src="image/logo.GIF" alt=""/>
							</div>
							<div >
							<img src="image/1p.jpg" alt="" height="25px" style="float:left;margin-left:2%;margin-top: 16pt ">
							</div>
		                    <form action="action_search.php"  method="post" id="search">
                                <input name="search" type="text" size="10" placeholder="جستجوی محصول..." />
								    <button  type="submit" class="searchButton" >
										<img  height="35px" width="35px"; src="image/search.jpg" alt=""/>
								</button>
                            </form>
							
							
							<nav class="style-4">
	                            <ul class="menu-4">
		                <li><a class="set_style_link"   data-hover="صفحه اصلی" href="index.php" style="transform: translateY(100%);" >صفحه اصلی</a></li>
						<li ><a class="set_style_link"  data-hover="عضویت درسایت" href="register.php">عضویت در سایت</a></li>
					<?php
					      if(isset($_SESSION["state_login"])&&$_SESSION["state_login"]===true)
						  {
					?>
					<li ><a class="set_style_link"  data-hover="خروج از سایت " href="logout.php">خروج از سایت <?php echo("({$_SESSION["realname"]})")
							  ?></a></li>
						<?php
									}//if پایان
									else
									{
									?>
						<li ><a class="set_style_link"  data-hover="ورود به سایت" href="login.php">ورود به سایت</a></li>
									<?php
									}//elseپایان 
										?>
						<li ><a class="set_style_link"  data-hover="درباره ما" href="about_us.php">درباره ما</a></li>
						<li ><a class="set_style_link"   data-hover="ارتباط باما" href="contact.php">ارتباط با ما</a></li>
									
									<?php
					      if(isset($_SESSION["state_login"]) && $_SESSION["state_login"]===true && $_SESSION["user_type"]=="admin")
						  {
					?>
					<li ><a class="set_style_link"  data-hover="مدیریت سایت  " href="admin_products.php">مدیریت سایت </a></li>
					<li ><a class="set_style_link"  data-hover="مدیریت سفارشات  " href="admin_orders_manage.php">مدیریت سفارشات </a></li>
						<?php
									}//if پایان
	                            ?>
									</ul>
	                        </nav>
							<hr width="100%" size="2px" align="center" >
							<div class="slideshow-container">
                                 <div class="mySlides fade">
                                        <div class="numbertext">1 / 3</div>
                                        <img src="image/b1.jpg" style="width:100%;">
                                        <div class="text">Caption Text</div>
                                   </div>
                                   <div class="mySlides fade">
                                       <div class="numbertext">2 / 3</div>
                                       <img src="image/b2.jpg" style="width:100%" >
                                       <div class="text">Caption Two</div>
                                    </div>
                                  <div class="mySlides fade">
                                    <div class="numbertext">3 / 3</div>
                                        <img src="image/b3.gif" style="width:100%">
                                        <div class="text">Caption Three</div>
                                   </div>
                                  <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
                                  <a class="next" onclick="plusSlides(1)">&#10095;</a>

                         </div>
                         <br>
                         <div style="text-align:center">
                            <span class="dot" onclick="currentSlide(1)"></span> 
                            <span class="dot" onclick="currentSlide(2)"></span> 
                            <span class="dot" onclick="currentSlide(3)"></span> 
                        </div>
                        <script>
                           var slideIndex = 0;
                           showSlides();

                          function showSlides() {
                           var i;
                           var slides = document.getElementsByClassName("mySlides");
                           for (i = 0; i < slides.length; i++) {
                           slides[i].style.display = "none"; 
                           }
                           slideIndex++;
                           if (slideIndex > slides.length) {slideIndex = 1} 
                           slides[slideIndex-1].style.display = "block"; 
                           setTimeout(showSlides, 4000); // Change image every4 seconds
                           }
                        </script>

                             </div>
                         </div>
				</header>
				<section class="divTable">
					<section class="divTableRow">
						<aside class="divTaleCell" style="width:18%;background-color:#F4DCF8;">
							<div class="containerm" style="margin-top: -8%;">
 
<div  id="menu" >
   <div class = 'nav' >
	   </br>
	   <span style="font-family: b nazanin;">دسته بندی کالاها</span>
	   <hr width="125%" size="2spx" align="center">
    <ul class = 'nav_list' >
      
      <div class = 'nav_list_item'>
	  <li><a href="#">نوشت افزار</a></li>
		<li><a href="#">ابزار نقاشی و رنگ امیزی</a></li>
	  <li><a href="#">ابزار طراحی و مهندسی</a></li>
	  <li><a href="#">لوازم اداری</a></li>
		<li><a href="#">دفترو کاغذ</a></li>
		<li><a href="#">کیف,کوله و جامدادی</a></li>
		<li><a href="#">بسته های لوازم التحریر</a></li>
		<li><a href="#">سالنامه</a></li>
		<li><a href="#">ملزومات هدیه</a></li>
		<li><a href="#">آلبوم عکس</a></li>
		<div class = 'nav_list_item'>
		<li><a href="#">چراغ مطالعه</a></li>
		<li><a href="#">میز تحریر</a></li>
			<br/>
			</div>
         </div>
	</ul>
  
 </div>
</div>
							
						</aside>
						<section class="divTaleCell" style="width:80%;border-bottom: 0;">
							