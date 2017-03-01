<?php include 'piwik_track.php'?>
<?php file_exists('config.php')?require_once 'config.php':require_once '../config.php'?>
<div class="text-center">
	<h2>Maps and Profiles</h2>
	<p>
		For GPS route data go to <a target="_blank"
			href="http://www.wildernessmag.co.nz/trips/trip/aorangi-crossing/">Wilderness
			Magazine</a>, <a target="_blank"
			href="http://connect.garmin.com/activity/392807672">Garmin</a> or <a
			target="_blank"
			href="http://www.mapmyrun.com/nz/upper-hutt-wellington/aorangi-undulator-route-322964533">MapMyRun</a>.
	</p>

	<div class="row">
		<div class="col-sm-12">
			<a href="images/maps/AU_route.png" target="_blank"> <img
				class="AU img-responsive" src="images/maps/AU_route.png" />
			</a>
			<a href="images/maps/A100/A100-day2-route.png" target="_blank"> <img
				class="A100 img-responsive" src="images/maps/A100/A100-day2-route.png" />
			</a>
		</div>
	</div>

	<iframe id="mapmyfitness_route"
		src="http://snippets.mapmycdn.com/routes/view/embedded/322964533?width=600&height=400&elevation=true&info=true&line_color=E60f0bdb&rgbhex=DB0B0E&distance_markers=1&unit_type=metric&map_mode=TERRAIN&last_updated=2014-08-25T10:44:33+12:00&show_marker_every=2"
		height="640px" width="100%" frameborder="0"></iframe>
	<div style="text-align: right; padding-right: 20px;">
		<!-- 
		<a target="_blank" href="http://www.mapmyrun.com/routes/create/">Create
			Maps</a> or find more routes in <a target="_blank"
			href="/nz/upper-hutt-wellington/"> Upper Hutt </a> from millions at <a
			href="http://www.mapmyrun.com">MapMyRun</a>
			 -->
	</div>
	<!--
	<h3>3D Video of Route <small>(requires Google-Earth plugin)</small></h3>
      <iframe width="100%" height="350px" scrolling="no" src="http://www.mapmyrun.com/routes/render_route_video?route_id=322964533">
            <a href="http://www.mapmyrun.com/nz/upper-hutt-wellington/aorangi-undulator-route-322964533" class="notranslate">Aorangi Undulator</a> 
        </iframe>
   -->
	<div class="row">
		<div class="col-sm-6">
			<!--
			<a href="images/maps/elevation.jpg" target="_blank">
				<img src="images/maps/elevation.jpg" /></a> 
			<a href="images/maps/crap_map.jpg" target="_blank"> <img
				src="images/maps/crap_map.jpg" /></a>
				
			 -->
		</div>
		<div class="col-sm-6">
			<a href="images/maps/better_map.jpg" target="_blank"> <img
				src="images/maps/better_map.jpg" /></a>
		</div>
	</div>

</div>
