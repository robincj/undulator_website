<?php include 'piwik_track.php'?>
<h2>Entries So Far</h2>

<?php
entries_table ( "Aorangi Undulator 100", 'entries/entries_a100_2015.csv' );
entries_table ( "Aorangi Undulator", 'entries/entries_au_2015.csv' );
function entries_table($title, $csvfile) {
	$waitlist = array ();
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
			$waitlist [] = $entry;
			continue;
		}
		print "<tr><td>$name</td><td>$cat</td><td>$previous</td></tr>\n";
	}
	?>

</tbody>
</table>
<?php
	if ($waitlist)
		waitlist_table ( "$title Wait-List", $waitlist );
}
/**
 *
 * @param unknown $title        	
 * @param unknown $csvdata        	
 */
function waitlist_table($title, $csvdata) {
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

