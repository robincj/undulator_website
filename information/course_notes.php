<?php include 'piwik_track.php'?>
<style>
#course_notes {
	background-image: none;
	background-color: #FFFFFF;
	padding: 1em;
}

.tabtitle {
	font-size: 200%;
	font-style: bold;
}
</style>

<h2>Course Information</h2>

<div class="panel-group" id="course_info_accordion" role="tablist"
	aria-multiselectable="true">


	<div class="panel panel-default">
		<div class="panel-heading" role="tab" id="topo_map_panel_heading">
			<h4 class="panel-title">
				<a data-toggle="collapse" data-parent="#topo_map_accordion"
					href="#topo_map_panel" aria-expanded="true"
					aria-controls="collapseOne"> Detailed Course Map Downloads </a>
			</h4>
		</div>
		<div id="topo_map_panel" class=" panel-collapse collapse"
			role="tabpanel" aria-labelledby="topo_map_panel_heading">
			<div class="panel-body">
			
			Use these links to download from DropBox (fast)
				<ul class="list-group">				
					<li class="A100 list-group-item"><a target='_blank'
						href="https://www.dropbox.com/s/v7qjylj2wnfvfrt/Undulator_Day1_A3_Print_Size_with_MagneticNorth.jpg?dl=0">
							A100 Day 1 Course Map</a> <br/>Please note that the route on this map does not show the final 6km to Lake Oneke.</li>				
					<li class="AU list-group-item"><a target='_blank'
						href="https://www.dropbox.com/s/0hqpbfqtns1zoc6/Undulator_Day2_A3_Print_Size_with_MagneticNorth.jpg?dl=0">
							Aorangi Undulator 1-day Course Map</a></li>
					<li class="A100 list-group-item"><a target='_blank'
						href="https://www.dropbox.com/s/0hqpbfqtns1zoc6/Undulator_Day2_A3_Print_Size_with_MagneticNorth.jpg?dl=0">
							A100 Day 2 Course Map</a></li>
					<li class="A100 list-group-item"><a target='_blank'
						href="https://www.dropbox.com/s/yrpe93ryelddb8m/Undulator_Day3_A3_Print_Size_MagneticNorth.jpg?dl=0">
							A100 Day 3 Course Map</a></li>
				</ul>
				
				
			Use these links to download from Aorangi Undulator site (slow)
				<ul class="list-group">				
					<li class="A100 list-group-item"><a target='_blank' download
						href="images/maps/topo/day1_topo.jpg">
							A100 Day 1 Course Map</a> <br/>Please note that the route on this map does not show the final 6km to Lake Oneke.</li>				
					<li class="AU list-group-item"><a target='_blank' download
						href="images/maps/topo/day2_topo.jpg">
							Aorangi Undulator 1-day Course Map</a></li>
					<li class="A100 list-group-item"><a target='_blank' download
						href="images/maps/topo/day2_topo.jpg">
							A100 Day 2 Course Map</a></li>
					<li class="A100 list-group-item"><a target='_blank' download
						href="images/maps/topo/day3_topo.jpg">
							A100 Day 3 Course Map</a></li>
				</ul>
			</div>
		</div>
	</div>

	<p></p>

	<div class="panel panel-default">
		<div class="panel-heading" role="tab" id="gpx_accordion_heading">
			<h4 class="panel-title">
				<a data-toggle="collapse" data-parent="#course_info_accordion"
					href="#gpx_downloads" aria-expanded="true"
					aria-controls="collapseOne"> GPX Data Downloads </a>
			</h4>
		</div>
		<div id="gpx_downloads" class="panel-collapse collapse"
			role="tabpanel" aria-labelledby="gpx_accordion_heading">
			<div class="panel-body">
				If you use a GPS device that can import routes in GPX format then
				please download and unzip the file from the links below.
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
				<p>
					For more GPS route data go to <a target="_blank"
						href="http://www.wildernessmag.co.nz/trips/trip/aorangi-crossing/">Wilderness
						Magazine</a>, <a target="_blank"
						href="http://connect.garmin.com/activity/392807672">Garmin</a> or
					<a target="_blank"
						href="http://www.mapmyrun.com/nz/upper-hutt-wellington/aorangi-undulator-route-322964533">MapMyRun</a>.
				</p>


			</div>
		</div>
	</div>
	<p></p>

	<div class="A100 panel panel-default">
		<div class="panel-heading" role="tab"
			id="A100_overview_map_panel_heading">
			<h4 class="panel-title">
				<a data-toggle="collapse" data-parent="#course_info_accordion"
					href="#A100_overview_map_panel" aria-expanded="true"
					aria-controls="collapseOne"> Aorangi Undulator 100 Overview Diagram
				</a>
			</h4>
		</div>
		<div id="A100_overview_map_panel" class=" panel-collapse collapse"
			role="tabpanel" aria-labelledby="A100_overview_map_panel_heading">
			<div class="panel-body">
				Click on the image below to enlarge it.
				<div class="A100" id="A100_overview_map"></div>
			</div>
		</div>
	</div>

</div>

<div class="A100" id="A100_overview_map"></div>

<h3>Route Details</h3>
<div class="A100" role="tabpanel">
	<ul class="nav nav-tabs" role="tablist" id="coursenotes_tab">
		<li role="presentation"><a class="tabtitle" href="#coursenotes_day1"
			id="tab_coursenotes_day1" role="tab" data-toggle="tab">Day 1</a></li>
		<li role="presentation"><a class="tabtitle" href="#coursenotes_day2"
			id="tab_coursenotes_day2" role="tab" data-toggle="tab">Day 2</a></li>
		<li role="presentation"><a class="tabtitle" href="#coursenotes_day3"
			id="tab_coursenotes_day3" role="tab" data-toggle="tab">Day 3</a></li>
	</ul>
	<div id="course_notes" class="tab-content">
		<div role="tabpanel" class="tab-pane fade" id="coursenotes_day1">
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
		$(function() {		
			$('#coursenotes_tab a:first').tab('show');
			document.getElementById('A100_overview_map').innerHTML = '<h3>Overview Map</h3><a href="images/maps/A100/A100_overview_map.jpg" target="_blank"><img width="200px" class="img-responsive" src="images/maps/A100/A100_overview_map.jpg" /></a>';
		});
	};	
	
	function loadDay1GarminMap(){
		$('#day1-garmin').html(
				"<iframe src='https://connect.garmin.com/activity/embed/817983777' width='465' height='500' frameborder='0' align='middle'></iframe>"
		);
				
	}
	function loadDay2MmrMap(){
		$('#day2-mmr').html(
				'<iframe src="http://snippets.mapmycdn.com/routes/view/embedded/322964533?width=600&height=400&elevation=true&info=true&line_color=E60f0bdb&rgbhex=DB0B0E&distance_markers=1&unit_type=metric&map_mode=TERRAIN&last_updated=2014-08-25T10:44:33+12:00&show_marker_every=2"'+
				'height="640px" width="100%" frameborder="1"></iframe>'
		);
				
	}
	
	$(document).ready( function(){
		if ( $('#coursenotes_day1').hasClass('active') ) { loadDay1GarminMap() }
		$('.tabtitle').on('click', function(){ 
			if ( $('#coursenotes_day1').hasClass('active') ) { loadDay1GarminMap() }
			else if ( $('#coursenotes_day2').hasClass('active') ) { loadDay2MmrMap() }
		});
		
	});
</script>
