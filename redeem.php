<!--database connection-->
<?php
    
$host='localhost';
$username='anomozco_chatuser1';
$user_pass='XhJ6a~U%C_Ws';
$database_in_use='anomozco_chat';

$con = mysqli_connect($host,$username,$user_pass,$database_in_use);
if (!$con)
{
    echo"not connected";
}
if (!mysqli_select_db($con,$database_in_use))
{
    echo"database not selected";
}

$allow=1;
if (($_GET['id'] )&&($_GET['tk'])){
    $id = $_GET['id'];
    $access_key = $_GET['tk'];
    $email_query = "SELECT * FROM instUsers WHERE access_key = '$access_key'";
            $result      = $con->query($email_query);
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    $user_points = $row['points'];
                }
            }
            else{$allow=0;}
}
else{
    $allow=0;
}
$email_query = "SELECT * FROM instDeals WHERE id = '$id'";
            $result      = $con->query($email_query);
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    $_SESSION['username'] = $row['name'];
                    $_SESSION['access_key'] = $row['access_key'];
                    $_SESSION['points'] = $row['points'];
                }
            }
            else{
                echo "found none";
                $allow=0;
            }
            
$promoCode = "";
$dealText = "";

if ($allow ==1){
    
$email_query = "SELECT * FROM instDealTokens WHERE dealId = '$id' AND isUsed = 0";
            $result      = $con->query($email_query);
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {

                    $promoCode = $row['token'];
                    $dealText = $row['text'];
                    $id_p = $row['id'];
                    $points = $row['pointsReq'];
                    
                    if ($user_points>$points){
                    
                    //$sql="UPDATE instDealTokens SET isUsed = 1 WHERE id = '$id_p';";
                    if(!mysqli_query($con,$sql))
                        {
                            //echo"can not change";
                        }
                        
                        //$sql="UPDATE instUsers SET points = (points - $points) WHERE access_key = '$access_key';";
                    if(!mysqli_query($con,$sql))
                        {
                            //echo"can not change";
                        }
                        
                    break;
                    }
                }
            }
            else{
                echo "found none";
                $allow=0;
            }
}
if ($user_points<$points){
    $allow=0;   
}

?>

<!DOCTYPE html>
	<html lang="zxx" class="no-js">
	<head>
		<style type="text/css">
		@import url('https://fonts.googleapis.com/css?family=Damion|Muli:400,600');
body{
  font-family: 'Muli', sans-serif;
}
h2 {
    font-family: 'Damion', cursive;
    font-weight: 400;
    color: #4caf50;
    font-size: 35px;
    text-align: center;
    position: relative;
}
h2:before {
    position: absolute;
    content: '';
    width: 100%;
    left: 0;
    top: 22px;
    background: #4caf50;
    height: 1px;
}
h2 i {
    font-style: normal;
    background: #fff;
    position: relative;
    padding: 10px;
}
:focus{outline: none;}
/* necessary to give position: relative to parent. */
input[type="text"]{font: 15px/24px 'Muli', sans-serif; color: #333; width: 100%; box-sizing: border-box; letter-spacing: 1px;}
:focus{outline: none;}
.col-3{float: left; width: 27.33%; margin: 40px 3%; position: relative;} /* necessary to give position: relative to parent. */
input[type="text"]{font: 15px/24px "Lato", Arial, sans-serif; color: #333; width: 100%; box-sizing: border-box; letter-spacing: 1px;}


input[type="email"]{font: 15px/24px 'Muli', sans-serif; color: #333; width: 100%; box-sizing: border-box; letter-spacing: 1px;}
:focus{outline: none;}
.col-3{float: left; width: 27.33%; margin: 40px 3%; position: relative;} /* necessary to give position: relative to parent. */
input[type="email"]{font: 15px/24px "Lato", Arial, sans-serif; color: #333; width: 100%; box-sizing: border-box; letter-spacing: 1px;}



.nextprev a.w3-right, .nextprev a.w3-left {
    background-color: #4CAF50;
    color: #ffffff;
    border-color: #4CAF50;
}
.nextprev a:link, .nextprev a:visited {
    background-color: #ffffff;
    color: #000000;
}
.w3-btn, .w3-btn:link, .w3-btn:visited {
    color: #FFFFFF;
    background-color: #4CAF50;
}
.nextprev a {
    font-size: 17px;
    border: 1px solid #cccccc;
}
.w3-left {
    float: left!important;
}
.w3-btn, .w3-button {
    -webkit-touch-callout: none;
    -webkit-user-select: none;
    -khtml-user-select: none;
    -moz-user-select: none;
    -ms-user-select: none;
    user-select: none;
}
.w3-btn, .w3-button {
    border: none;
    display: inline-block;
    padding: 8px 16px;
    vertical-align: middle;
    overflow: hidden;
    text-decoration: none;
    color: inherit;
    background-color: inherit;
    text-align: center;
    cursor: pointer;
    white-space: nowrap;
}
a {
    color: inherit;
}
a {
    background-color: transparent;
    -webkit-text-decoration-skip: objects;
}
*, *:before, *:after {
    box-sizing: inherit;
}
user agent stylesheet
a:-webkit-any-link {
    color: -webkit-link;
    cursor: pointer;
    text-decoration: underline;
}
.w3-white, .w3-hover-white:hover {
    color: #000!important;
    background-color: #fff!important;
}
.w3-light-grey, .w3-hover-light-grey:hover, .w3-light-gray, .w3-hover-light-gray:hover {
    color: #000!important;
    background-color: #f1f1f1!important;
}


		</style>

		<!-- Mobile Specific Meta -->
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<!-- Favicon-->
		<link rel="shortcut icon" href="img/fav.png">
		<!-- Author Meta -->
		<meta name="author" content="Anomoz">
		<!-- Meta Description -->
		<meta name="description" content="">
		<!-- Meta Keyword -->
		<meta name="keywords" content="">
		<!-- meta character set -->
		<meta charset="UTF-8">
		<!-- Site Title -->
		<title>Trashit Instagram Points</title>

		<link href="https://fonts.googleapis.com/css?family=Poppins:100,200,400,300,500,600,700" rel="stylesheet"> 
			<!--
			CSS
			============================================= -->
			<link rel="stylesheet" href="css/linearicons.css">
			<link rel="stylesheet" href="css/font-awesome.min.css">
			<link rel="stylesheet" href="css/bootstrap.css">
			<link rel="stylesheet" href="css/magnific-popup.css">
			<link rel="stylesheet" href="css/nice-select.css">
			<link rel="stylesheet" href="css/animate.min.css">
			<link rel="stylesheet" href="css/owl.carousel.css">
			<link rel="stylesheet" href="css/main.css">
			<link rel="stylesheet" href="css/list.css">

	</head>
		<body>	

			<!-- start banner Area -->
			<section class="banner-area" id="home">
				<div class="overlay overlay-bg"></div>
				<div class="container">
					<div class="row fullscreen d-flex justify-content-center align-items-center">
						<div class="banner-content col-lg-9 col-md-12 ">
							<h1 class="mb-10" style="    font-size: 30px;
    font-weight: 400;"><?if ($allow==0){echo"invalid Page";}?></h1>
    
    <?php if ($allow==1){?>
                    <h1 class="mb-10" style="font-size: 40px;
    font-weight: 500;">Your Promo Code: <?echo $promoCode?></h1>
    <h1 class="mb-10" style="font-size: 28px;
    font-weight: 400;"><?echo $dealText?></h1>
    <h1 class="mb-10" style="font-size: 15px;
    font-weight: 400;">Your points have be deducted. Please store the Promocode somewhere safe.</h1>

						<?php }?>
						<div class="row d-flex justify-content-center align-items-center">
						    
						<a class="w3-left w3-btn" href="css3_object-fit.asp" style="margin: 10px;">Email me the code</a>
							<form method="post" action="index.php">
						<input required="" type="email" name="snip" class="form-control form-control-lg input-block js-email-notice-trigger" placeholder="Enter your Email">
					    </form>
					    
					    
						</div>
						<div class="row d-flex justify-content-center align-items-center">
						    
					
						<a class="w3-left w3-btn" href="css3_object-fit.asp" style="margin: 10px;">Send me by SMS</a>
						<form method="post" action="index.php">
						<input required="" type="text" name="snip" class="form-control form-control-lg input-block js-email-notice-trigger" placeholder="Enter your Phone number">
					    </form>
					    
					    
					
						</div>
				</div>	
					</div>
				</div>
			</section>
			<!-- End banner Area -->

			<script src="js/vendor/jquery-2.2.4.min.js"></script>
			<script src="js/main.js"></script>	
<div style="left: -900px; position: absolute;">
<textarea id=t></textarea>
</div>
		</body>
	</html>
