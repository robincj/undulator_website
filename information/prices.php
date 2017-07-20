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
				<td>$<?=PRICE_AU?></td>
				<td>$<?=PRICE_AU_EARLY?></td>
			</tr>
			<tr>
				<td>A100</td>
				<td>$<?=PRICE_A100?></td>
				<td>$<?=PRICE_A100_EARLY?></td>
			</tr>
			<tr>
				<td>T-Shirts</td>
				<td>$<?=PRICE_TSHIRT?></td>
				<td>$<?=PRICE_TSHIRT?></td>
			</tr>
		</tbody>
	</table>
	<small>* Early bird price applies before <?=EARLY_ENTRY_DATE?>.</small><br />
	Team entries cost the same amount per person as individual entries.
</div>
