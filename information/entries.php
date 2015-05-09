<?php include 'piwik_track.php'?>
<style>
#entries_panels {
	background-image: none;
	background-color: #FFFFFF;
	padding: 1em;
}

.tabtitle {
	font-style: bold;
}
</style>

<h3>Current Entries</h3>
<div role="tabpanel">
	<ul class="nav nav-tabs" role="tablist" id="entries_tab">
		<li role="presentation"><a class="tabtitle" href="#entries_AU"
			role="tab" data-toggle="tab">Aorangi<br>Undulator<br>&nbsp;&nbsp;
		</a></li>
		<li role="presentation"><a class="tabtitle" href="#entries_A100"
			role="tab" data-toggle="tab">Aorangi<br>Undulator 100<br>&nbsp;&nbsp;
		</a></li>
		<li role="presentation"><a class="tabtitle" href="#waitlist_AU"
			role="tab" data-toggle="tab">Aorangi<br>Undulator<br>Wait-List
		</a></li>
		<li role="presentation"><a class="tabtitle" href="#waitlist_A100"
			role="tab" data-toggle="tab">Aorangi<br>Undulator 100<br>Wait-List
		</a></li>
	</ul>

	<div id="entries_panels" class="tab-content">
		<div role="tabpanel" class="tab-pane fade" id="entries_AU">
			<?php entries_table ( "Aorangi Undulator", 'entries/entries_au_2015.csv' ); ?>
		</div>
		<div role="tabpanel" class="tab-pane fade" id="entries_A100">
			<?php entries_table ( "Aorangi Undulator 100", 'entries/entries_a100_2015.csv' ); ?>
		</div>

		<div role="tabpanel" class="tab-pane fade" id="waitlist_AU">
			<?php waitlist_table ( "Aorangi Undulator", 'entries/entries_au_2015.csv' ); ?>
		</div>
		<div role="tabpanel" class="tab-pane fade" id="waitlist_A100">
			<?php waitlist_table ( "Aorangi Undulator 100", 'entries/entries_a100_2015.csv' ); ?>
		</div>

	</div>
</div>

<script>
		$(function() { $('#entries_tab a:first').tab('show'); });
</script>

<?php
function entries_table($title, $csvfile) {
	// $waitlist = array ();
	echo "<h3>$title</h3>";
	?>
<table class="table">
	<thead>
		<tr>
			<th>Name</th>
			<th>Category</th>
			<th>Running Resum&eacute;</th>
		</tr>
	</thead>
	<tbody>
<?php
	foreach ( array_map ( 'str_getcsv', file ( $csvfile ) ) as $entry ) {
		if (! $entry)
			continue;
		list ( $name, $email, $cat, $paid, $previous, $wait ) = $entry;
		if ($wait == "W") {
			// $waitlist [] = $entry;
			continue;
		}
		
		print "<tr><td>$name</td><td>$cat</td><td>$previous</td></tr>\n";
	}
	?>

</tbody>
</table>
<?php
	// if ($waitlist) waitlist_table ( "$title Wait-List", $waitlist );
}
/**
 *
 * @param unknown $title        	
 * @param unknown $csvdata        	
 */
function waitlist_table($title, $csv) {
	// $csvdata could be an array of data already processed, or it could be a filename
	if (! is_array ( $csv )) {
		foreach ( array_map ( 'str_getcsv', file ( $csv ) ) as $entry ) {
			if (! $entry)
				continue;
			list ( $name, $email, $cat, $paid, $previous, $wait ) = $entry;
			if ($wait == "W") {
				$csvdata [] = $entry;
				continue;
			}
		}
	} else
		$csvdata = $csv;
	
	echo "<h3>$title Wait-List</h3>
	The following people have missed out on $title entries for the moment but are in line to get one as soon as any become available.
	";
	?>

<table class="table">
	<thead>
		<tr>
			<th>Name</th>
			<th>Category</th>
			<th>Running Resum&eacute;</th>
		</tr>
	</thead>
	<tbody>
	
	<?php
	foreach ( $csvdata as $entry ) {
		list ( $name, $email, $cat, $paid, $previous, $wait ) = $entry;
		print "<tr><td>$name</td><td>$cat</td><td>$previous</td></tr>\n";
	}
	?>
	
	</tbody>
</table>
<?php
}
?>

