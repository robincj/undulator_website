<!DOCTYPE html>
<?php 
// Allow urls to be used to trigger the index page to load s specific maincontent by ajax.
$params = array_merge($_POST, $_GET);
$maincontent = 'home.php';
if (isset($params['page']) && $params['page']) {
	$maincontent = $params['page'].".php";
}
?>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
<title>Aorangi Undulator</title>
<link rel="shortcut icon" type="image/x-icon"
	href="images/logos/aorangi_undulator_icon.jpg" />
<!-- Bootstrap -->
<link href="js/bootstrap/css/bootstrap.min.css" rel="stylesheet">

<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script
	src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="js/bootstrap/js/bootstrap.min.js"></script>

<link href='http://fonts.googleapis.com/css?family=Montserrat:400,700'
	rel='stylesheet' type='text/css'>
<link href='http://fonts.googleapis.com/css?family=Jockey+One'
	rel='stylesheet' type='text/css'>

<!-- link rel="stylesheet" href="styles.css" -->
<style>
body {
	background-image: url(/images/textures/p2.png);
	background-repeat: repeat;
	font-family: 'Montserrat', sans-serif;
}

header {
	background-color: black;
	/* background-image: url(/images/logos/aorangi_undulator_banner_bgline.png) ;
	background-repeat: repeat-x; */
	text-align: center;
}

header .row {
	position: relative;
}

.header-right {
	position: absolute;
	bottom: 0;
	right: 0;
}

footer {
	height: 4em;
	margin: 2em;
	font-size: 90%;
	background-color: black;
	color: #aaa;
}

.share-icon-col {
	/* text-align: right; */
	
}

.register-button {
	margin: .5em;
}

.navbar li {
	text-align: center;
}

#sponsors_logos {
	display: inline;
}

#blurb {
	display: inline;
	width:
}

#social_links {
	display: inline;
}

.event-date {
	color: #aaaaaa;
	font-size: 2em;
	font-weight: bold;
}
</style>

<script>
function loadmaincontent(contentfile, nojump){
	//$('.maincontent').slideUp(400, function(){$(this).load(contentfile).slideDown();}
	$('.maincontent').load(contentfile).slideDown();
		if (!nojump){	
		 $('html, body').animate({
		        scrollTop: $("#main").offset().top -30
		    }, 500); }
		else {
			$('html, body').animate({ scrollTop: 0  }, 500);  
    	}
	
}
</script>
</head>

<body>

	<header>
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<img class="img-responsive"
						src="images/logos/aorangi_undulator_banner.png" />
				</div>
			</div>
		</div>
	</header>

<?php include 'navbar.php';?>

	<section>
		<div class="container-fluid">
			<div class="row">
				<div class="col-sm-2 col-md-3 text-center">
					<?php include 'sponsors.php';?>
				
				</div>
				<!-- /col -->

				<div class="col-sm-10 col-md-6 text-center">
					<p>
						Taking place Aorangi mountain range, situated in the south-east of
						the Wairarapa, the Aorangi Undulator is a 33km run which takes
						competitors through five valleys and four <i>undulations</i>. The
						November 2014 Aorangi Undulator was the first official race and
						the 2015 event is looking to be even more popular. Winners are
						expected to finish in around 5 hours while others will take up to
						10 hours.
					</p>
					<p>Those inclined towards longer distance events may want to look
						at the Aorangi 100, a 100km 3 day stage race starting in
						Eastbourne and finishing at Waikuku Lodge in the Aorangi forest
						park.</p>
					<div class="text-center">
						<h3>SATURDAY NOVEMBER 7th, 2015</h3>
						<h4><a onClick="loadmaincontent('enter.php')" title="Click here to enter" >Entries are open now!</a></h4>
						<br />
					</div>

				</div>
				<!-- /col -->

				<div class="col-md-3 share-icon-col text-center">
				<?php include 'share_icons.php';?>

				</div>
				<!-- /col -->
			</div>
			<!-- /row -->
		</div>
	</section>

	<section class="maincontent" id="main"></section>

	<script>$('.maincontent').load('<?php echo $maincontent ?>')</script>
	<footer>
		<br />
		<p style="text-align: right">Contact: Chris Martin 123-455678 or
			email: info@aorangiundulator.org &nbsp;&nbsp;
	
	</footer>

</body>

</html>

