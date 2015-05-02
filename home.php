<?php include 'piwik_track.php' ?>
<div id="intro"></div>
<script>
$("#intro").load("information/" + au_event + "_intro.php");
</script>

<div class="text-center">
	<div class="AU">
		<h4>
			<a href="#" onClick="loadmaincontent('enter.php')"
				title="Click here to enter">Entries are open now!</a>
		</h4>
	</div>
	<div class="A100">
		<h4 style="color: red;">The Aorangi Undulator 100 event has reached
			its entry limit!</h4>
		<h4>
			<a href="#" onClick="loadmaincontent('enter.php')"
				title="Click here to put yourself on the wait-list">Put yourself on
				the wait-list in case entries become available.</a>
		</h4>
	</div>
	<br />
<?php include "information/quotes.php"?>
<br />
</div>
<?php
include 'js/jssor_bootstrap/php/jssor_bootstrap_slider.php';
?>
