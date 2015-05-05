<?php include 'piwik_track.php'?>
<?php

$to_organiser = "robin@aorangiundulator.org,chrismartinc@hotmail.com";
// $entries_dir = "/data/undulator/entries";
$entries_dir = "information/entries";

$params = array_merge ( $_POST, $_GET );

$price = $params ['price'];
$A100 = false;

$event_fullname = "Aorangi Undulator";
if ($params ['event'] == "A100") {
	$event_fullname = "A100 - 3 day 100km";
	$A100 = true;
}
$mailheader = 'From: info@aorangiundulator.org' . "\r\n" . 'Reply-To: info@aorangiundulator.org' . "\r\n";

$msg = "Hi {$params['firstname']}, thank you for entering the $event_fullname race.<p>
Your entry has been submitted and payment details will be sent to {$params['email']} shortly.<p>
If you have any queries please contact: <p>
Chris Martin, phone: 021 2166436 or email: info@aorangiundulator.org
<p>
Payment would be appreciated within 7 days of registering.<br>
Please also note that to secure the early-bird entry fee, full payment is required to be processed by the 1st of June, after this date and the standard entry fee will be payable
";

// Launch a modal with the message
echo <<<EOH
	<div class="modal fade" id="enteredModal" tabindex="-1" role="dialog"
		aria-labelledby="enteredModalLabel" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal"
						aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">$msg</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
				</div>
			</div>
		</div>
	</div>

	<script>
		$('#enteredModal').modal('show');
	</script>		

EOH;

// Add to entrylist csv file
$entrylist_file = "information/entries/entries_au_2015.csv";
$entrylimit = 200;
if ($params ['event'] == "A100") {
	$entrylist_file = "information/entries/entries_a100_2015.csv";
	$entrylimit = 30;
}
$entrycount = file_rowcount ( $entrylist_file, TRUE );

// Prepare params for CSV
foreach ( array_keys ( $params ) as $key ) {
	// Replace double-quotes with singles.
	$params [$key] = str_replace ( '"', "'", $params [$key] );
	// Replace line-breaks
	$params [$key] = str_replace ( "\n", "<br>", $params [$key] );
	$params [$key] = str_replace ( "\r", "", $params [$key] );
}

$row = "\n{$params['firstname']} {$params['surname']},{$params['email']},,,\"{$params['previous_events']}\",";

if ($entrycount >= $entrylimit) {
	$row .= "W";
}

file_put_contents ( $entrylist_file, $row, FILE_APPEND );

// Email organiser
// bool mail ( string $to , string $subject , string $message [, string $additional_headers [, string $additional_parameters ]] )

$subj = "$event_fullname entry for {$params['firstname']} {$params['surname']}";
$msg = '';
foreach ( $params as $pkey => $pval ) {
	$msg .= "$pkey: $pval\n";
}
$filename = "$entries_dir/{$params['firstname']}_{$params['surname']}_" . date ( 'YmdHis' ) . ".txt";
file_put_contents ( $filename, $msg );

mail ( $to_organiser, $subj, $msg, $mailheader );

// Build entrant email message
$subj = "$event_fullname entry";

$msg = <<<EOT
Hi, thank you for entering the $event_fullname race.
Please check your details:
$msg
EOT;

if ($A100)
	$msg .= " Unfortunately the event has reached maximum entry capacity so your entry will be put on a wait-list.
 If a vacancy comes available we will contact you and let you know that we are able to assist you with proving You Are Not Weak.";

else
	$msg .= "
Then kindly deposit the entry fee of $price into this account:
Account name: Aorangi Undulator
Account num:  02 0576 0059160 01
Use your full name as the reference.

Payment would be appreciated within 7 days of registering. 
Please also note that to secure the early-bird entry fee, full payment is required to be processed by the 1st of June, after this date and the standard entry fee will be payable
";

mail ( $params ['email'], $subj, $msg, $mailheader );
/**
 *
 * @param unknown $filename        	
 * @return number
 */
function file_rowcount($filename, $ignoreblanks = FALSE) {
	$linecount = 0;
	$handle = fopen ( $filename, "r" );
	while ( ! feof ( $handle ) ) {
		$line = fgets ( $handle );
		if ($ignoreblanks && preg_match ( "/^\s*$/", $line )) {
			continue;
		}
		$linecount ++;
	}
	
	fclose ( $handle );
	
	return $linecount;
}
