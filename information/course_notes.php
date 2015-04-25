<style>
#course_notes {
	background-image: none;
	background-color: #FFFFFF;
	padding: 1em;
}
</style>

<h2>Course Information</h2>
<h3>GPX Data</h3>
If you use a GPS device that can import routes in GPX format then please
download and unzip the file from the links below.
<ul class="list-group">
	<li class="AU list-group-item"><a
		href="information/gpx/AorangiUndulator100_Day_2.gpx.zip">Aorangi
			Undulator GPX data (Zip)</a></li>
	<li class="A100 list-group-item"><a
		href="information/gpx/AorangiUndulator100_Day_1.gpx.zip">Aorangi
			Undulator 100, Day 1 GPX data (Zip)</a></li>
	<li class="A100 list-group-item"><a
		href="information/gpx/AorangiUndulator100_Day_2.gpx.zip">Aorangi
			Undulator 100, Day 2 GPX data (Zip)</a></li>
	<li class="A100 list-group-item"><a
		href="information/gpx/AorangiUndulator100_Day_3.gpx.zip">Aorangi
			Undulator 100, Day 3 GPX data (Zip)</a></li>
	<li class="A100 list-group-item"><a
		href="information/gpx/AorangiUndulator100_Days_1-3.gpx.zip">Aorangi
			Undulator 100, Days 1-3 combined GPX data (Zip)</a></li>
</ul>

<div class="A100" id="A100_overview_map" ></div>

<h3>Course Notes</h3>
<div class="A100" role="tabpanel">
	<ul class="nav nav-tabs" role="tablist" id="coursenotes_tab">
		<li role="presentation"><a href="#coursenotes_day1" role="tab"
			data-toggle="tab">A100 Day 1</a></li>
		<li role="presentation"><a href="#coursenotes_day2" role="tab"
			data-toggle="tab">A100 Day 2</a></li>
		<li role="presentation"><a href="#coursenotes_day3" role="tab"
			data-toggle="tab">A100 Day 3</a></li>
	</ul>
	<div id="course_notes" class="tab-content">
		<div role="tabpanel" class="tab-pane fade active"
			id="coursenotes_day1">
							<?php include('course_notes_A100_day_1.php');?>
						</div>
		<div role="tabpanel" class="tab-pane fade" id="coursenotes_day2"><?php include('course_notes_AU.php'); ?></div>
		<div role="tabpanel" class="tab-pane fade" id="coursenotes_day3"><?php include('course_notes_A100_day_3.php'); ?></div>

	</div>
</div>
<div class="AU">				
	<?php include('course_notes_AU.php');?>
</div>

<script>
	if ( au_event == "A100" ) { 
		$(function () { 
			$('#coursenotes_tab a:first').tab('show');
			document.getElementById('A100_overview_map').innerHTML = '<h3>Overview Map</h3><a href="images/maps/A100/A100_overview_map.jpg" target="_blank"><img width="200px" class="img-responsive" src="images/maps/A100/A100_overview_map.jpg" /></a>';
			});		
	 }
</script>