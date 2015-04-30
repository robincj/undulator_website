<h2>Entries So Far</h2>
<h3>Aorangi Undulator 100</h3>
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
$csvfile = 'entries/entries_a100_2015.csv';
foreach ( array_map ( 'str_getcsv', file ( $csvfile ) ) as $entry ) {
	list ( $name, $email, $cat, $paid, $previous ) = $entry;
	print "<tr><td>$name</td><td>$cat</td><td>$previous</td></tr>\n";
}
?>

</tbody>
</table>

<h3>Aorangi Undulator</h3>
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
$csvfile = 'entries/entries_au_2015.csv';
foreach ( array_map ( 'str_getcsv', file ( $csvfile ) ) as $entry ) {
	list ( $name, $email, $cat, $paid, $previous ) = $entry;
	print "<tr><td>$name</td><td>$cat</td><td>$previous</td></tr>\n";
}
?>

</tbody>
</table>