<?php include 'piwik_track.php'?>
<?php file_exists('config.php')?require_once 'config.php':require_once '../config.php'?>
<div id="prices-table">
	<h2>Prices</h2>
	<table class="table table-condensed">
		<thead>
			<tr>
				<th>Event</th>
				<th>Price</th>
				<th>Early bird price*</th>
			</tr>
		</thead>
		<tbody>
			<tr>
				<td>Aorangi Undulator</td>
				<td>$50</td>
				<td>$35</td>
			</tr>
			<tr>
				<td>A100</td>
				<td>$180</td>
				<td>$150</td>
			</tr>
			<tr>
				<td>T-Shirts</td>
				<td>$25</td>
				<td>$25</td>
			</tr>
		</tbody>
	</table>
	<small>* Early bird price applies before June 1st <?php echo $event_year?>.</small><br />
	Team entries cost the same amount per person as individual entries.
</div>
