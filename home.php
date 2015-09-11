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

$entrylist_file = "information/entries/entries_au_2015.csv";
$entrycount = file_rowcount ( $entrylist_file, TRUE );
$entrylimit = 200;
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
if ($entrycount >= $entrylimit)
	$auMsg .= $full;
else
	$auMsg .= $notFull;

$entrylist_file = "information/entries/entries_a100_2015.csv";
$entrycount = file_rowcount ( $entrylist_file, TRUE );
$entrylimit = 30;
$a100Msg = '<div class="A100">';

if ($entrycount >= $entrylimit)
	$a100Msg .= $full;
else
	$a100Msg .= $notFull;

?>
<div id="intro"></div>
<script>
$("#intro").load("information/" + au_event + "_intro.php");
</script>

<div class="text-center">
	<?php echo $a100Msg . $auMsg?>

	<br />
<?php include "information/quotes.php"?>
<br />
</div>
<?php
include 'js/jssor_bootstrap/php/jssor_bootstrap_slider.php';
?>
