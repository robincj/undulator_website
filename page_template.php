<!DOCTYPE html>
<?php
// Allow urls to be used to trigger the index page to load s specific maincontent by ajax.
$params = array_merge ( $_POST, $_GET );
$maincontent = 'home.php';
if (isset ( $params ['page'] ) && $params ['page']) {
	$maincontent = $params ['page'] . ".php";
}

$banner_image = "images/logos/{$au_event}_banner.png";
$banner_image_other = "images/logos/{$au_other_event}_banner.png";
$main_css = "css/{$au_event}_main.css";

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
<link href='http://fonts.googleapis.com/css?family=Handlee' rel='stylesheet' type='text/css'>
<link href='css/main.css' rel='stylesheet' type='text/css'>

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
					<img class="<?php echo $au_event ?> banner_image img-responsive"
						src="<?php echo $banner_image ?>" />
				</div>
			</div>
		</div>
	</header>

<?php include 'navbar.php';?>

	<section>
		<div class="container">
			<div class="row">
				<div class="col-xs-12 col-md-3 text-center">
					<?php include 'links_col.php';?>				
				</div>
				<!-- /col -->

				<div id="main" class="maincontent col-xs-12 col-sm-10 col-md-8"></div>

				<div class="col-xs-12 col-sm-1 share-icon-col text-center">
					<?php include 'share_icons.php';?>
				</div>
				<!-- /col -->
			</div>
			<!-- /row -->
		</div>

	</section>


	<script>loadmaincontent('<?php echo $maincontent ?>', true)</script>
	<footer>
		<br />
		<p style="text-align: right">Contact: Chris Martin 021 2166436 or
			email: info@aorangiundulator.org &nbsp;&nbsp;</p>
		<br /> &nbsp;

	</footer>

</body>

</html>

