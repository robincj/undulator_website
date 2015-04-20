<?php
$to_organiser = "robin@aorangiundulator.org,chrismartinc@hotmail.com";
$entries_dir="/data/undulator/entries";

$params = array_merge ( $_POST, $_GET );

$price = $params ['price'];

$event_full = "Aorangi Undulator";
if ($params ['event'] == "A100")
	$event_full = "A100 - 3 day 100km";

$mailheader = 'From: info@aorangiundulator.org' . "\r\n" .
 'Reply-To: info@aorangiundulator.org' . "\r\n";

$msg = "Hi {$params['firstname']}, thank you for entering the $event_full race.<p>
Your entry has been submitted and payment details will be sent to {$params['email']} shortly.<p>
If you have any queries please contact: <p>
Chris Martin, phone: 123-455678 or email: info@aorangiundulator.org ";

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

// bool mail ( string $to , string $subject , string $message [, string $additional_headers [, string $additional_parameters ]] )

$subj = "$event_full entry for {$params['firstname']} {$params['surname']}";
$msg = '';
foreach ( $params as $pkey => $pval ) {
	$msg .= "$pkey: $pval\n";
}
$filename =  "$entries_dir/{$params['firstname']}_{$params['surname']}_". date( 'YmdHis') .".txt";
file_put_contents ( $filename, $msg );

mail ( $to_organiser, $subj, $msg, $mailheader );

$subj = "$event_full entry";

$msg = <<<EOT
Hi, thank you for entering the $event_full race.
Please check your details:
$msg

Then kindly deposit the entry fee of $price into this account:
Account name: Aorangi Undulator
Account num:  02 0576 0059160 01
Use your full name as the reference.

EOT;

mail ( $params ['email'], $subj, $msg, $mailheader );
