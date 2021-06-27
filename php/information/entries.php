<?php require('include_common.php'); ?>
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
			<?php entries_table ( "Aorangi Undulator", "entries/".ENTRIES_FILE_AU,MAX_ENTRIES_AU ); ?>
		</div>
		<div role="tabpanel" class="tab-pane fade" id="entries_A100">
			<?php entries_table ( "Aorangi Undulator 100", "entries/".ENTRIES_FILE_A100, MAX_ENTRIES_A100 ); ?>
		</div>

		<div role="tabpanel" class="tab-pane fade" id="waitlist_AU">
			<?php waitlist_table ( "Aorangi Undulator", "entries/".ENTRIES_FILE_AU, MAX_ENTRIES_AU ); ?>
		</div>
		<div role="tabpanel" class="tab-pane fade" id="waitlist_A100">
			<?php waitlist_table ( "Aorangi Undulator 100", "entries/".ENTRIES_FILE_A100, MAX_ENTRIES_A100 ); ?>
		</div>

	</div>
</div>

<script>
		$(function() { $('#entries_tab a:first').tab('show'); });
</script>

<?php

/**
 *
 * @param int $age
 * @return string
 */
function category($age)
{
    // Chris' age category info:
    // 40 open.to 50 vet-to 60 super vet-plus 60 super duper vet sub 25 young legend
    // translation:
    $cats = array(
        25 => 'young legend',
        40 => 'open',
        50 => 'vet',
        60 => 'super vet',
        150 => 'super duper vet'
    );
    $category = 'unknown';
    if (is_numeric($age)) {
        foreach ($cats as $limit => $cat) {
            if ($age < $limit) {
                $category = $cat;
                break;
            }
        }
    }
    return ucwords($category);
}

/**
 *
 * @param string $title
 * @param string $csvfile
 * @param int $max_entries
 */
function entries_table($title, $csvfile, $max_entries)
{
    // $waitlist = array ();
    echo "<h3>$title</h3>";
    ?>
<div class="table-responsive unseen">
	<table class="table-responsive table table-striped">
		<thead>
			<tr>
				<th>#</th>
				<th>Name</th>
				<th>Category</th>
				<th>Home Town</th>
				<th>Running Resum&eacute;</th>
			</tr>
		</thead>
		<tbody>
<?php
    $count = 1;
    if (file_exists($csvfile)) {
        foreach (array_map('str_getcsv', file($csvfile)) as $entry) {
            if (! $entry || preg_match('/^#/', reset($entry)) || preg_match('/^\s*$/', reset($entry)))
                continue;
            // Fields:
            // NAME,EMAIL,CATEGORY,PAID,EXPERIENCE,WAITLIST,AGE,GENDER,PREDICTED,MERCHANDISE,FEE,LOCATION,MEDICAL,completed_AU,completed_A100
            $fields = [
                'name',
                'email',
                'cat',
                'paid',
                'previous',
                'wait',
                'age',
                'gender',
                'predicted',
                'merchandise',
                'fee',
                'location',
                'medical',
                'completedAU',
                'completedA100'
            ];
            foreach ($fields as $key => $field) {
                $entry[$field] = empty($entry[$key]) ? '' : $entry[$key];
            }

            // use existing cat if no age supplied
            if (! $entry['cat'] || is_numeric($entry['cat']))
                $entry['cat'] = category($entry['cat']);
            $entry['cat'] = ucwords($entry['cat']);
            $previousEnc = htmlentities($entry['previous'], ENT_QUOTES, NULL, FALSE);
            $previousUndulators = $entry['completedAU'] ? " <b>Undulators:</b> {$entry['completedAU']}" : '';
            $previousUndulators .= $entry['completedA100'] ? "  <b>A100:</b> {$entry['completedA100']}" : '';
            $previousUndulators = $previousUndulators ? "<b>Completed</b> $previousUndulators <br/>" : '';
            $previous = $previousUndulators . $entry['previous'];

            if ($count > $max_entries) {
                break;
            }
            ucname_($entry['name']);
            print "<tr data-toggle='tooltip' title='$previousEnc' data-placement='top' ><td>$count</td><td>{$entry['name']}</td><td>{$entry['cat']}</td><td>{$entry['location']}</td><td>$previous</td></tr>\n";
            $count ++;
        }
    }
    ?>

</tbody>
	</table>
</div>

<?php
}

/**
 *
 * @param string $title
 * @param array|string $csvdata
 */
function waitlist_table($title, $csv, $max_entries)
{
    // $csvdata could be an array of data already processed, or it could be a filename
    $count = 1;
    $csvdata = array();
    if (! is_array($csv) && file_exists($csv)) {
        foreach (array_map('str_getcsv', file($csv)) as $entry) {
            if (! $entry || preg_match('/^#/', reset($entry)) || preg_match('/^\s*$/', reset($entry)))
                continue;
            if ($count ++ <= $max_entries)
                continue;

            $csvdata[] = $entry;
        }
    } else
        $csvdata = $csv;

    echo "<h3>$title Wait-List</h3>
	The following people have missed out on $title entries for the moment but are in line to get one as soon as any become available.
	";
    ?>
<div class="table-responsive unseen">
	<table class="table table-striped">
		<thead>
			<tr>
				<th>#</th>
				<th>Name</th>
				<th>Category</th>
				<th>Running Resum&eacute;</th>
			</tr>
		</thead>
		<tbody>
	
	<?php
    $count = 1;
    if ($csvdata)
        foreach ($csvdata as $entry) {
            // Fields:
            // NAME,EMAIL,CATEGORY,PAID,EXPERIENCE,WAITLIST,AGE,GENDER,PREDICTED,,merchandise,price,homelocation,medical,completed_AU,completed_A100
            list ($name, $email, $cat, $paid, $previous, $wait, $age, $gender, $estTime, $merch, $price, $loc, $medical, $completedAU, $completedA100) = $entry;

            // use existing cat if no age supplied
            if (! $cat || is_numeric($age))
                $cat = category($age);
            $cat = ucwords($cat);
            ucname_($name);
            $previousEnc = htmlentities($previous, ENT_QUOTES, NULL, FALSE);
            $previousUndulators = $completedAU ? " <b>Undulators:</b> $completedAU" : '';
            $previousUndulators .= $completedA100 ? "  <b>A100:</b> $completedAU" : '';
            $previousUndulators = $previousUndulators ? "<b>Completed</b>$previousUndulators<br/>" : '';
            $previous = $previousUndulators . $previous;

            print "<tr data-toggle='tooltip' title='$previousEnc' data-placement='top' ><td>$count</td><td>$name</td><td>$cat</td><td>$previous</td></tr>\n";
            $count ++;
        }
    ?>
	
	</tbody>
	</table>
</div>
<script>
$(function () {
  $('[data-toggle="tooltip"]').tooltip({html: true})
})
</script>
<?php
}
?>