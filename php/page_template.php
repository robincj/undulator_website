<?php require('include_common.php'); ?>
<?php
/**
 *
 * @var string $banner_image_other
 * @var string $au_event
 */
?>
<!DOCTYPE html>
<?php
// Allow urls to be used to trigger the index page to load s specific maincontent by ajax.
$maincontent = 'home.php';
if (! empty($_REQUEST['page'])) {
    $maincontent = $_REQUEST['page'] . ".php?";
}
if (! empty($_REQUEST['event']) && $_REQUEST['event'] != $au_event) {
    $previous = $au_event;
    $au_event = $_REQUEST['event'];
    $au_other_event = $previous;
}
if (! empty($_REQUEST['gallerypage'])) {
    $maincontent .= "&gallerypage=" . $_REQUEST['gallerypage'];
}
if (! empty($_REQUEST['year'])) {
    $maincontent .= "&year=" . $_REQUEST['year'];
}

$banner_image = "images/logos/{$au_event}_banner.png";
$banner_image_other = "images/logos/{$au_other_event}_banner.png";
$main_css = "css/{$au_event}_main.css?" . date("YmdHis");

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

<link href='https://fonts.googleapis.com/css?family=Montserrat:400,700'
	rel='stylesheet' type='text/css'>
<link href='https://fonts.googleapis.com/css?family=Jockey+One'
	rel='stylesheet' type='text/css'>
<link href='https://fonts.googleapis.com/css?family=Handlee'
	rel='stylesheet' type='text/css'>
<link href='css/main.css?v=1' rel='stylesheet' type='text/css'>
<link href='css/unseen-column.css' rel='stylesheet' type='text/css'>
<link
	href='https://cdnjs.cloudflare.com/ajax/libs/ekko-lightbox/5.3.0/ekko-lightbox.css'
	rel='stylesheet' type='text/css'>

<!-- 
<link type="text/css"
	href="js/timepicker/css/bootstrap-timepicker.min.css" />
<script type="text/javascript"
	src="js/timepicker/js/bootstrap-timepicker.min.js"></script>
 -->
<!-- main stylesheet to override defaults above -->
<link rel="stylesheet" href="<?php echo $main_css ?>">
<!-- page styles -->

<script>
//Global variable to identify event as AU or A100
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
	$('.maincontent').load("php/"+contentfile).slideDown();
	if (!nojump){	
	 $('html, body').animate({
	        scrollTop: $("#main").offset().top -30
	    }, 500); }
	else {
		$('html, body').animate({ scrollTop: 0  }, 500);  
    }
    var pageref = contentfile.replace(/\.[^\.]+$/,"");
	window.window.history.pushState({},"","/?event="+au_event+"&page="+pageref);	
}
</script>

</head>

<body>
	<script type="text/javascript" src="/piwik/piwik.js"></script>
<?php include 'piwik_track.php'?>
<div id='wrap'>
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
					<div class="col-xs-12 col-md-2 text-center">
					<?php include 'links_col.php';?>				
				</div>
					<!-- /col -->

					<div id="main" class="maincontent col-xs-12 col-md-9"></div>

					<div class="col-xs-12 col-md-1 share-icon-col text-center">
					<?php include 'share_icons.php';?>
				</div>
					<!-- /col -->
				</div>
				<!-- /row -->
			</div>

		</section>


		<script>loadmaincontent('<?= $maincontent ?>', true)</script>

		<div id="push"></div>
	</div>
	<div id="footer">
		<div class="container">
			<div class="row">
				<div class='col-sm-3'>
					<?php
    // Main sponsor <a href="http://www.powerco.co.nz/"><img
    // style="padding: 3px;" src="images/sponsors/powerco_logo.png" /></a>
    ?>
					
				<a href="/"> <img class="img-responsive" data-toggle="tooltip"
						data-placement="top" title="The 1-day Aorangi Undulator"
						src="<?php echo $banner_image ?>" />
					</a>
				</div>
				<div class='col-sm-3'>
					<a href="/A100.php"> <img class="img-responsive"
						data-toggle="tooltip" data-placement="top"
						title="The 3-day Aorangi Undulator 100"
						src="<?php echo $banner_image_other ?>" /></a>
				</div>
				<div class='col-sm-6 contact'>
					<div style="text-align: right">
						<br />Contact: Chris Martin 021 2166436 or email:
						info@aorangiundulator.org
					</div>
				</div>
			</div>
		</div>
	</div>

</body>

</html>

