<!DOCTYPE html>
<?php
// Allow urls to be used to trigger the index page to load s specific maincontent by ajax.
$params = array_merge ( $_POST, $_GET );
$maincontent = 'home.php';
if (isset ( $params ['page'] ) && $params ['page']) {
	$maincontent = $params ['page'] . ".php";
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

.banner_image {
	height: 10em;
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

.AU {
	display: none;
}

.A100 {
	display: none;
}
</style>

<!-- main stylesheet to override defaults above -->
<link rel="stylesheet" href="<?php echo $main_css ?>">

<script>
var au_event = '<?php echo $au_event ?>';

$( document ).ajaxComplete(function() {
	if ( au_event == "A100" ) {
		$('.AU').css('display', 'none');
		$('.A100').css('display', 'block');	
	}
	else {
		$('.A100').css('display', 'none');
		$('.AU').css('display', 'block');
	}
})

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
					<img class="banner_image img-responsive"
						src="<?php echo $banner_image ?>" />
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
					<?php include $intro;?>
					<div>
						<h4>
							<a onClick="loadmaincontent('enter.php')"
								title="Click here to enter">Entries are open now!</a>
						</h4>
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

	<script>loadmaincontent('<?php echo $maincontent ?>', true)</script>
	<footer>
		<br />
		<p style="text-align: right">Contact: Chris Martin 123-455678 or
			email: info@aorangiundulator.org &nbsp;&nbsp;
	
	</footer>

</body>

</html>

