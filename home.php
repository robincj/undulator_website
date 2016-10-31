<?php include 'piwik_track.php'?>


<?php
function file_rowcount($filename, $ignoreblanks = FALSE) {
	$linecount = 0;
	$handle = fopen ( $filename, "r" );
	while ( ! feof ( $handle ) ) {
		$line = fgets ( $handle );
		if ($ignoreblanks && preg_match ( "/^(#.*|\s*)$/", $line )) {
			continue;
		}
		$linecount ++;
	}
	
	fclose ( $handle );
	
	return $linecount;
}
$entrylist_file = "information/entries/entries_au_2016.csv";
if (! file_exists ( $entrylist_file ))
	file_put_contents ( $entrylist_file, '' );
$entrycount = file_rowcount ( $entrylist_file, TRUE );
$entrylimit = 200;
$entriesLeft = $entrylimit - $entrycount;
$notFull = <<<EOH
		<h4>
			<a href="#" onClick="loadmaincontent('enter.php')"
				title="Click here to enter">Entries are open now!</a>
		</h4>
	</div>
EOH;
$full = <<<EOH
		<h4 style="color: red;">The event has reached its entry limit!</h4>
		<h4>
			<a href="#" onClick="loadmaincontent('enter.php')"
				title="Click here to put yourself on the wait-list">Put yourself on
				the wait-list in case entries become available.</a>
		</h4>
	</div>
EOH;

$auMsg = '<div class="AU">';
if ($entriesLeft <= 0)
	$auMsg .= $full;
else {
	$auMsg .= $notFull;
	$auMsg .= $entriesLeft < 21 ? "<div class='AU'><h4>Only $entriesLeft entries Left!</h4></div>" : '';
}
$entrylist_file = "information/entries/entries_a100_2016.csv";
if (! file_exists ( $entrylist_file ))
	file_put_contents ( $entrylist_file, '' );
$entrycount = file_rowcount ( $entrylist_file, TRUE );
$entrylimit = 30;
$entriesLeft = $entrylimit - $entrycount;
$a100Msg = '<div class="A100">';

if ($entriesLeft <= 0)
	$a100Msg .= $full;
else {
	$a100Msg .= $notFull;
	$auMsg .= $entriesLeft < 21 ? "<div class='A100'><h4>Only $entriesLeft entries Left!</h4></div>" : '';
}

// OVERRIDE ENTRY MESSAGE FOR RESULTS
// $a100Msg = '';
// $auMsg = '<div><a href="results/AU_A100_2015_V6.xlsx">Results for 2015 are here.</a></div>';

?>
<div class="row">
	<div class='col-xs-12'>
		<div id="intro"></div>
	</div>
</div>
<script>
$("#intro").load("information/" + au_event + "_intro.php");
</script>

<div class="row">
	<div class='col-xs-12'>
		<div class="text-center">
			<h4>
				<a href="#"
					onClick="loadmaincontent('information/course_notes.php')">Detailed
					course maps now available HERE.</a>
			</h4>
		</div>
	</div>
</div>

<div class="row">
	<div class='col-xs-12'>
		<div class="text-center"><?= $a100Msg . $auMsg?></div>
	</div>
</div>
<div class="row">
	<div class='col-xs-12'>
		<div class="text-center">
			<a href="results/AU_A100_2015_V6.xlsx">Results for 2015 are here.</a>
		</div>
	</div>
</div>
<br />
<div class="row">
	<div class='mainsponsor col-xs-12'
		style='background-color: #662d91; color: white;'>
		Brought to you with a big thanks to our main sponsor <a
			href="http://www.powerco.co.nz/"><img style="padding: 3px;"
			src="images/sponsors/powerco_logo.png" /></a>
	</div>
	<div class='quotebox col-xs-12' style='display: none;'><?php include "information/quotes.php"?></div>
</div>
<script>$(document).ready(function(){
	setTimeout(function(){ $('.mainsponsor').hide('slow'); $('.quotebox').show('slow');}, 8000);
});
	</script>
<br />
<div class="row">
	<div class='col-xs-12'><?php include 'js/jssor_bootstrap/php/jssor_bootstrap_slider.php';?>	</div>
</div>
