<?php include 'piwik_track.php'?>
<?php require_once 'config.php'?>
<?php

$to_organiser = "fitnessmad@gmail.com,chrismartinc@hotmail.com";
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
$mailheader_from = 'From: info@aorangiundulator.org' . "\r\n" . 'Reply-To: info@aorangiundulator.org' . "\r\n";

$msg = "Hi {$params['firstname']}, thank you for entering the $event_fullname race.<p>
Your entry has been submitted and payment details will be sent to {$params['email']} shortly.<p>
If you have any queries please contact: <p>
Chris Martin, phone: 021 2166436 or email: info@aorangiundulator.org
<p>
Payment would be appreciated within 7 days of registering.<br>";
if (date ( "Ymd" ) < 20160601)
	$msg .= "Please also note that to secure the early-bird entry fee, 
		full payment is required to be processed by ".EARLY_ENTRY_DATE.", after this date and the standard entry fee will be payable.";
	
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
$entrylist_file = "information/entries/" . ENTRIES_FILE_AU;
$entrylimit = 200;
if ($params ['event'] == "A100") {
	$entrylist_file = "information/entries/" . ENTRIES_FILE_A100;
	$entrylimit = 30;
}
$entrycount = file_rowcount ( $entrylist_file, TRUE );

// Prepare params for CSV
foreach ( array_keys ( $params ) as $key ) {
	$params [$key] = trim ( $params [$key] );
	// Replace double-quotes with singles.
	$params [$key] = str_replace ( '"', "'", $params [$key] );
	// Replace line-breaks
	$params [$key] = str_replace ( "\r\n", "<br>", $params [$key] );
	$params [$key] = str_replace ( "\n", "<br>", $params [$key] );
	$params [$key] = str_replace ( "\r", "", $params [$key] );
}

// Don't need t-shirt size if quantity is zero
if (! isset ( $params ['t-quantity'] ) || $params ['t-quantity'] == '0')
	$params ['t-size'] = '';
	
	/*
 * params:
 * firstname: Daniel
 * surname: McIlroy
 * email: dmcilroyiii@gmail.com
 * event: au
 * age: 32
 * gender: M
 * estimated_time: 7-8 hours
 * previous_events: Goat Tongariro 2013: 4:08, Goat Tongariro 2014: 3:35, Holdsworth Jumbo 2015: 3:54, Goat Kaimai 2015: 2:57
 * t-size: M
 * t-quantity: 1
 * query:
 * price: 75
 * homelocation:
 * medical:
 */
$row = "{$params['firstname']} {$params['surname']},{$params['email']},,,\"{$params['previous_events']}\",";
$row .= ",{$params['age']},{$params['gender']},{$params['estimated_time']},{$params['t-size']},{$params['t-quantity']},{$params['price']}";
$row .= ",{$params['homelocation']},{$params['medical']}";
$row = trim ( $row ) . "\n";
file_put_contents ( $entrylist_file, $row, FILE_APPEND );

// Email organiser
// bool mail ( string $to , string $subject , string $message [, string $additional_headers [, string $additional_parameters ]] )

$subj = "$event_fullname entry for {$params['firstname']} {$params['surname']}";
$msg = '';
foreach ( $params as $pkey => $pval ) {
	$msg .= "$pkey: $pval\n";
}
$filename = "$entries_dir/{$params['firstname']}_{$params['surname']}_" . date ( 'YmdHis' ) . ".txt";
$filename = str_replace ( " ", "_", $filename );
file_put_contents ( $filename, $msg );

// create a boundary string. It must be unique
// so we use the MD5 algorithm to generate a random hash
$mimeboundary = "MIME-BOUNDARY-" . md5 ( date ( 'r', time () ) );
// $mailheaders = $mailheader_from . "\r\nContent-Type: multipart/mixed; boundary=\"$mimeboundary\"";
$mailheaders = $mailheader_from . "Content-Type: multipart/mixed; boundary=\"$mimeboundary\"\r\n";
// read the atachment file contents into a string,
// encode it with MIME base64,
// and split it into smaller chunks
$attachment = chunk_split ( base64_encode ( file_get_contents ( $entrylist_file ) ) );
$organiser_msg = <<<EOM
--$mimeboundary
Content-Type: text/plain; charset="iso-8859-1"
Content-Transfer-Encoding: 7bit

$msg

--$mimeboundary
Content-Type: application/zip; name="$entrylist_file"  
Content-Transfer-Encoding: base64
Content-Disposition: attachment

$attachment

--$mimeboundary--
EOM;
// send the organiser update email
mail ( $to_organiser, $subj, $organiser_msg, $mailheaders );

// Build entrant email message
$subj = "$event_fullname entry";

$msg = <<<EOT
Hi, thank you for entering the $event_fullname race.
Please check your details:
$msg
EOT;

if ($entrycount >= $entrylimit)
	$msg .= " Unfortunately the event has reached maximum entry capacity so your entry will be put on a wait-list.
 If a vacancy comes available we will contact you and let you know that we are able to assist you with proving You Are Not Weak.";

else
	$msg .= "
Then kindly deposit the entry fee of $price into this account:
Account name: Aorangi Undulator
Account num:  02 0576 0059160 01
Use your full name as the reference.

Payment would be appreciated within 7 days of registering.
";
if ( time() < strtotime(EARLY_ENTRY_DATE) )
	$msg .= "Please also note that to secure the early-bird entry fee, full payment is required to be processed by ".EARLY_ENTRY_DATE.", after this date and the standard entry fee will be payable
";

mail ( $params ['email'], $subj, $msg, $mailheader_from );
/**
 *
 * @param string $filename        	
 * @return number
 */
function file_rowcount($filename, $ignoreblanks = FALSE) {
	$linecount = 0;
	$handle = fopen ( $filename, "r" );
	if ($handle) {
		while ( ! feof ( $handle ) ) {
			$line = fgets ( $handle );
			if ($ignoreblanks && preg_match ( "/^(#.*|\s*)$/", $line )) {
				continue;
			}
			$linecount ++;
		}
		
		fclose ( $handle );
	}
	return $linecount;
}
