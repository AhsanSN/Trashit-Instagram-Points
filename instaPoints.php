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

//get users data
$access_token = "7109981707.898d6c8.034c26cb207a468e8db1bdb4e14a1fe23";
$email_query = "SELECT * FROM instUsers WHERE access_key = '$access_token'";
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
    font-weight: 400;">Trashit Instagram Points</h1>
                            <h1 class="mb-10" style="    font-size: 30px;
    font-weight: 400;">Your Points: <?echo $_SESSION['points']?></h1>
    
							<div class="container">
						<div class="callto-action-wrap col-lg-12 relative section-gap">

							<ul class="ul_txt">
							    <?php
    							    $email_query = "SELECT * FROM instDeals";
                                    $result      = $con->query($email_query);
                                    if ($result->num_rows > 0) {
                                        while ($row = $result->fetch_assoc()) {
                                            
                                            ?>
                                            <li <?php
                                            if ($row['pointsReq']<$_SESSION['points']){
                                                echo "style='background-color: #a1e2a1;'";
                                            }
                                            ?>class="li_txt" onclick="copy('my text 1')"><a class="a_txt" href="#home" id="a"><?php echo $row['text']?></a>
                                            <?
                                            
                                        }
                                    }
                                    else{
                                        echo "found none";
                                    }
							    ?>
								  
							</ul>							
						</div>
					

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
