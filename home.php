<?php include 'piwik_track.php'?>
<?php require_once 'config.php'?>

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

$entrylist_file = "information/entries/" . ENTRIES_FILE_AU;
if (! file_exists ( $entrylist_file ))
	file_put_contents ( $entrylist_file, '' );
$entrycount = file_rowcount ( $entrylist_file, TRUE );
$entriesLeft = MAX_ENTRIES_AU - $entrycount;
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
	$auMsg .= $entriesLeft < MAX_ENTRIES_AU * 0.8 ? "<div class='AU'><h4>Only $entriesLeft entries Left!</h4></div>" : '';
}

$entrylist_file = "information/entries/" . ENTRIES_FILE_A100;
if (! file_exists ( $entrylist_file ))
	file_put_contents ( $entrylist_file, '' );
$entrycount = file_rowcount ( $entrylist_file, TRUE );
$entriesLeft = MAX_ENTRIES_A100 - $entrycount;
$a100Msg = '<div class="A100">';

if (! ENTRIES_OPEN) {
	$a100Msg = '';
	$auMsg = "<div><h5>Entries are not yet open for the next event.</h5></div>";
} elseif ($entriesLeft <= 0)
	$a100Msg .= $full;
else {
	$a100Msg .= $notFull;
	$auMsg .= $entriesLeft < MAX_ENTRIES_A100 * 0.6 ? "<div class='A100'><h4>Only $entriesLeft entries Left!</h4></div>" : '';
}
// OVERRIDE ENTRY MESSAGE FOR RESULTS
// $a100Msg = '';
// $auMsg = '<div><a href="https://drive.google.com/file/d/0B0kHo5rD1yVIUmpKa1FfSTJpU01tcno4YlNqWlNKem52QU5J/view?usp=sharing">Results for 2016 are here.</a></div>';

echo "<!-- max: " . MAX_ENTRIES_A100 . " count:  $entrycount Left: $entriesLeft -->";
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
		<div class="text-center"><?= $a100Msg . $auMsg?></div>
	</div>
</div>

<div class="row AU">
	<div class='col-xs-12'>
		<div class="text-center">
			<h4>
				<a href="#" onClick="loadmaincontent('information/prizes.php')">Prizes</a>
			</h4>
		</div>
	</div>
</div>
<div class="row A100">
	<div class='col-xs-12'>
		<div class="text-center">
			<a href="#" onClick="loadmaincontent('results/spirit_award.php')">
				A100 Spirit Award Trophy</a>
		</div>
	</div>
</div>
<div class="row">
	<div class='col-xs-12'>
		<div class="text-center">
			<h4>
				<a target="_blank"
					href="https://docs.google.com/spreadsheets/d/14x0hCkAPMbertFb8YOBZupYoh1EFa_ATBfazKcHZ6NQ">2018
					RESULTS</a>
			</h4>
		</div>
	</div>
</div>
<!-- 
<div class="row">
	<div class='col-xs-12'>
		<div class="text-center">
			<a href="#" onClick="loadmaincontent('information/course_notes.php')">Detailed
				course maps</a>
		</div>
	</div>
</div>
 -->

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
