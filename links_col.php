<style>
.links_col img {
	margin: auto;
	/* width: 180px; */
}

.other_event_link, .register-button {
	max-width: 150px;
}
</style>

<script>
$(function () {
  $('[data-toggle="tooltip"]').tooltip({html: true})
})
</script>

<div class="links_col">
	<div class="row">

		<div class="col-xs-6 col-md-12" >
			<a href="#">
				<button class="register-button btn btn-primary btn-md"
					onClick="loadmaincontent('enter.php')">Enter Now</button>
			</a>
		</div>
		<!-- 
		<div class="col-xs-6 col-sm-12 text-center">
			<a class="A100 other_event_link" href="/"> <img
				class="img-responsive" data-toggle="tooltip" data-placement="top"
				title="For something a little lighter,<br/> try the 1-day Aorangi
				Undulator"
			src="<?php echo $banner_image_other ?>" />
			</a> <a class="AU other_event_link" href="/A100.php"> <img
				class="img-responsive" data-toggle="tooltip" data-placement="top"
				title="Sounds too easy? <br/> Try the Aorangi
				Undulator 100"
			src="<?php echo $banner_image_other ?>" /></a>

		</div>
 -->

		<div class="col-xs-6 col-md-12">
			<a href="#" onClick="loadmaincontent('information/aorangi_trust.php')"><img class="img-responsive"
				width="165px" src="images/logos/aorangi_trust_logo.png" /></a>
		</div>
	</div>
	<br />
	<div class="panel panel-default">
		<div class="panel-body">
			<small>Sponsors</small>
			<div class="row">

				<div class="col-xs-4 col-md-12">
					<a href="http://www.tailwindnutrition.co.nz/"><img
						class="img-responsive" width="165px"
						src="images/sponsors/tailwind_nutrition_tr.png" /></a>
				</div>
				
				<div class="col-xs-6 col-md-12">
					<a href="http://www.snoworld.co.nz/"><img
						class="img-responsive" width="115px" style="padding: 3px;"
						src="images/sponsors/Salomon-Primary-Logo.black_lo_91512-small-tr.png" /></a>
				</div>
				
				<div class="col-xs-6 col-md-12">
					<a href="http://www.sportsandpain.co.nz/"><img
						class="img-responsive" width="160px" style="padding: 3px;"
						src="images/sponsors/SportsAndPain-Logo_small.jpg" /></a>
				</div>
			</div>
		</div>
	</div>

</div>