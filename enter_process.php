<?php include 'piwik_track.php'?>
<?php require_once 'config.php'?>
<?php

$to_organiser = "fitnessmad@gmail.com,chrismartinc@hotmail.com";
// $entries_dir = "/data/undulator/entries";
$entries_dir = "information/entries";

$params = array_merge($_POST, $_GET);

if (empty($params['firstname']) || empty($params['surname']) || empty($params['email'])) {
    // Invalid form submission
    messageModal("You did not complete the entry form correctly.  Please try again.<p>
If you have any queries please contact: <p>
Chris Martin, phone: 021 2166436 or email: info@aorangiundulator.org");
    exit();
}

$price = $params['price'];
/**
 *
 * @var string $A100
 */
$A100 = false;

$event_fullname = "Aorangi Undulator";
if ($params['event'] == "A100") {
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
if (date("Ymd") < 20160601)
    $msg .= "Please also note that to secure the early-bird entry fee, 
		full payment is required to be processed by " . EARLY_ENTRY_DATE . ", after this date and the standard entry fee will be payable.";

messageModal($msg);

// Add to entrylist csv file
$entrylist_file = "information/entries/" . ENTRIES_FILE_AU;
$entrylimit = MAX_ENTRIES_AU;
if ($params['event'] == "A100") {
    $entrylist_file = "information/entries/" . ENTRIES_FILE_A100;
    $entrylimit = MAX_ENTRIES_A100;
}
$entrycount = file_rowcount($entrylist_file, TRUE);

// Prepare params for CSV
$merchandise = [];
foreach ($params as $key => &$val) {
    if (strpos($key, '-quantity') && $val) {
        $merchandise[$key] = $val;
        unset($params[$key]);
    } else if (strpos($key, '-size') && $val) {
        $merchandise[$key] = $val;
        unset($params[$key]);
    } else {
        $val = trim($val);
        // Replace double-quotes with singles.
        $val = str_replace('"', "'", $val);
        // Replace line-breaks
        $$val = str_replace("\r\n", "<br>", $val);
        $val = str_replace("\n", "<br>", $val);
        $val = str_replace("\r", "", $val);
    }
    $params['merchandise'] = $merchandise;
}

// $merchandise = $merchandise ? json_encode($merchandise, true) : '';
$params['merchandise'] = str_replace("}", '"', str_replace("{", '"', str_replace('"', "'", json_encode($merchandise))));

/*
 * params:
 * firstname: Malcolm
 * surname: Kerr (Virdie)
 * email: mkerr2004@yahoo.co.uk
 * homelocation: Wellington
 * event: au
 * age: 33
 * gender: M
 * estimated_time: 9 hours? No idea what average is
 * previous_events: WUU2k, Tawawera, Mount Everest Marathon
 * completed_AU: 0
 * completed_A100: 0
 * medical: I have a tendency to swear a lot when having to go up gnarly hills. (It's mainly directed at how much I hate the race director at that moment in time)
 * THIR-Undulator-headband-quantity: 0
 * query: Won entry through Cassie's fundraiser
 * price: 75
 * merchandise: "'T-Shirt-quantity':'1','T-Shirt-size':'M'"
 */
if ($entrycount === 0) {
    // Add header row
    $row = "# name,email,,,previous_events,,age,gender,estimated_time,merchandise,price,homelocation,medical,completed_AU,completed_A100\n";
    file_put_contents($entrylist_file, $row, FILE_APPEND);
}
$homelocation=str_replace('"', "'", $params['homelocation']);
$medical=str_replace('"', "'", $params['medical']);
$previous_events=str_replace('"', "'", $params['previous_events']);

$row = "{$params['firstname']} {$params['surname']},{$params['email']},,,\"{$previous_events}\",";
$row .= ",{$params['age']},{$params['gender']},{$params['estimated_time']},{$params['merchandise']},{$params['price']}";
$row .= ",\"{$homelocation}\",\"{$medical}\",{$params['completed_AU']},{$params['completed_A100']}";
$row = trim($row) . "\n";
file_put_contents($entrylist_file, $row, FILE_APPEND);

// Email organiser
// bool mail ( string $to , string $subject , string $message [, string $additional_headers [, string $additional_parameters ]] )

$subj = "$event_fullname entry for {$params['firstname']} {$params['surname']}";
$msg = '';
foreach ($params as $pkey => $pval) {
    $msg .= "$pkey: $pval\n";
}
$filename = "$entries_dir/{$params['firstname']}_{$params['surname']}_" . date('YmdHis') . ".txt";
$filename = str_replace(" ", "_", $filename);
file_put_contents($filename, $msg);

// create a boundary string. It must be unique
// so we use the MD5 algorithm to generate a random hash
$mimeboundary = "MIME-BOUNDARY-" . md5(date('r', time()));
// $mailheaders = $mailheader_from . "\r\nContent-Type: multipart/mixed; boundary=\"$mimeboundary\"";
$mailheaders = $mailheader_from . "Content-Type: multipart/mixed; boundary=\"$mimeboundary\"\r\n";
// read the atachment file contents into a string,
// encode it with MIME base64,
// and split it into smaller chunks
$attachment = chunk_split(base64_encode(file_get_contents($entrylist_file)));
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
mail($to_organiser, $subj, $organiser_msg, $mailheaders);

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
Then kindly deposit the entry fee of \$$price into this account:
Account name: Aorangi Undulator
Account num:  02 0576 0059160 01
Use your full name as the reference.

Payment would be appreciated within 7 days of registering.
";
if (time() < strtotime(EARLY_ENTRY_DATE))
    $msg .= "Please also note that to secure the early-bird entry fee, full payment is required to be processed by " . EARLY_ENTRY_DATE . ", after this date and the standard entry fee will be payable
";

mail($params['email'], $subj, $msg, $mailheader_from);

/**
 *
 * @param string $filename
 * @return number
 */
function file_rowcount($filename, $ignoreblanks = FALSE)
{
    $linecount = 0;
    $handle = fopen($filename, "r");
    if ($handle) {
        while (! feof($handle)) {
            $line = fgets($handle);
            if ($ignoreblanks && preg_match("/^(#.*|\s*)$/", $line)) {
                continue;
            }
            $linecount ++;
        }

        fclose($handle);
    }
    return $linecount;
}

/**
 *
 * @param string $msg
 */
function messageModal($msg)
{
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
}
