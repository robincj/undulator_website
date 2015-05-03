<style>
.navbar li {
	text-align: center;
}

nav a.other_event_link {
	padding: 5px;
}

nav .other_event_link img {
	width: 150px;
}
</style>

<nav class="navbar navbar-default">
	<div class="container-fluid">
		<!-- Brand and toggle get grouped for better mobile display -->
		<div class="navbar-header">
			<button type="button" class="navbar-toggle collapsed"
				data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
				<span class="sr-only">Toggle navigation</span> <span
					class="icon-bar"></span> <span class="icon-bar"></span> <span
					class="icon-bar"></span>
			</button>

		</div>

		<!-- Collect the nav links, forms, and other content for toggling -->
		<div class="collapse navbar-collapse"
			id="bs-example-navbar-collapse-1">
			<ul class="nav navbar-nav">

				<li><a href="#" onClick="loadmaincontent('home.php', true)">HOME</a></li>

				<li class="dropdown"><a href="#" class="dropdown-toggle"
					data-toggle="dropdown" role="button" aria-expanded="false">ENTER <span
						class="caret"></span></a>

					<ul class="dropdown-menu" role="menu">
						<li><a href="#"
							onClick="loadmaincontent('information/prices.php')">PRICES</a></li>
						<li><a href="#" onClick="loadmaincontent('enter.php')">ENTER</a></li>
						<li><a href="#" onClick="loadmaincontent('t-shirt.php')">T-SHIRT</a></li>
						<li><a href="#"
							onClick="loadmaincontent('information/entries.php')">ENTRIES SO
								FAR</a></li>
					</ul></li>

				<li class="dropdown"><a href="#" class="dropdown-toggle"
					data-toggle="dropdown" role="button" aria-expanded="false">EVENT
						INFORMATION<span class="caret"></span>
				</a>

					<ul class="dropdown-menu" role="menu">

						<li class="AU"><a href="#"
							onClick="loadmaincontent('information/directions.php')">HOW TO
								GET THERE</a></li>
						<!-- <li class="A100"><a href="#" onClick="loadmaincontent('information/directions.php')">DAY 2
								START: HOW TO GET THERE</a></li> -->
						<li class="AU"><a href="#"
							onClick="loadmaincontent('information/schedule.php')">RACE DAY
								SCHEDULE</a></li>
						<!-- <li class="A100"><a
						  href="#"	onClick="loadmaincontent('information/schedule.php')">A100 DAY 2
								SCHEDULE</a></li> -->

						<li><a href="#"
							onClick="loadmaincontent('information/course_notes.php')">COURSE
								INFORMATION</a></li>
						<li class="AU"><a href="#"
							onClick="loadmaincontent('information/maps.php')">RACE MAPS AND
								PROFILES</a></li>

						<li class="AU"><a href="#"
							onClick="loadmaincontent('information/what_to_expect.php')">WHAT
								TO EXPECT</a></li>
						<li onClick="loadmaincontent('information/q_and_a.php')"><a
							href="#">Q &amp; A</a></li>
						<li onClick="loadmaincontent('information/equipment_list.php')"><a
							href="#">EQUIPMENT LIST</a></li>
					</ul></li>

				<li class="dropdown"><a href="#" class="dropdown-toggle"
					data-toggle="dropdown" role="button" aria-expanded="false">RESULTS
						<span class="caret"></span>
				</a>

					<ul class="dropdown-menu" role="menu">
						<li class="AU"><a href="results/results_2013.jpg">2013 RESULTS</a></li>

						<li><a class="AU" href="results/Undulator Results 2014.xls">2014
								RESULTS</a></li>
						<li><a class="A100" href="results/A100 Results 2014.xls">2014
								RESULTS</a></li>


					</ul></li>

				<li class="dropdown"><a href="#" class="dropdown-toggle"
					data-toggle="dropdown" role="button" aria-expanded="false">MORE <span
						class="caret"></span></a>

					<ul class="dropdown-menu" role="menu">
						<li><a href="#"
							onClick="loadmaincontent('information/quotes.php')">INSPIRATIONAL
								QUOTES</a></li>
						<!-- <li class="disabled"><a  href="#">QUOTES</a></li>
						<li class="disabled"><a  href="#">PHOTOS</a></li>
					 -->
					   <li><a href="#" onClick="loadmaincontent('gallery.php')">PHOTOS</a></li>
						<li><a href="#" onClick="loadmaincontent('youtube.php')">VIDEOS</a></li>

						<li><a href="#"
							onClick="loadmaincontent('information/accommodation.php')">PLACES
								TO STAY</a></li>
						<li class="divider"></li>
						<li><a href="#"
							onClick="loadmaincontent('information/other_races.php')">OTHER
								RACES</a></li>

						<li><a href="#"
							onClick="loadmaincontent('information/aorangi_trust.php')">AORANGI
								TRUST</a></li>
						<li><a href="#"
							onClick="loadmaincontent('information/sponsor_tailwind.php')">TAILWIND
								SUPPLEMENTS</a></li>
					</ul></li>

				<!-- 
				<li id="othereventlink"><a class="A100" style="display: none"
					href="/">AORANGI UNDULATOR (1 day)</a> <a class="AU"
					style="display: none" href="/A100.php">AORANGI UNDULATOR 100</a></li>
			-->
				<li><a class="A100 other_event_link" href="/"> <img
						class="img-responsive" data-toggle="tooltip" data-placement="top"
						title="For something a little lighter,<br/> try the 1-day Aorangi
						Undulator"
            src="<?php echo $banner_image_other ?>" />
				</a> <a class="AU other_event_link" href="/A100.php"> <img
						class="img-responsive" data-toggle="tooltip" data-placement="top"
						title="Sounds too easy? <br/> Try the Aorangi
						Undulator 100"
            src="<?php echo $banner_image_other ?>" /></a></li>

			</ul>

		</div>
		<!-- /.navbar-collapse -->
	</div>
	<!-- /.container-fluid -->
</nav>
