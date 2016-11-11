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

		<div class="col-xs-6 col-md-12">
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
			<a href="#"
				onClick="loadmaincontent('information/aorangi_trust.php')"><img
				class="img-responsive" width="165px"
				src="images/logos/aorangi_trust_logo.png" /></a>
		</div>
	</div>
	<br />
	<div class="panel panel-default">
		<div class="panel-body">
			<small>Sponsors</small>
			<div class="row">
				<div class="col-xs-12">
					<a href="http://www.powerco.co.nz/"><img class="img-responsive"
						width="160px" style="padding: 3px; display: inline;"
						src="images/sponsors/powerco_logo.png" /></a><a
						href="http://www.thriveadventure.com/"><img class="img-responsive"
						width="160px" style="padding: 3px; display: inline;"
						title="ThLuxurious gateway to the Tararuas"
						src="images/sponsors/thrive.jpg" /></a> <a
						href="http://www.bivouac.co.nz/"><img class="img-responsive"
						width="160px" style="padding: 3px; display: inline;"
						src="images/sponsors/bivouac.png" /></a> <a
						href="http://www.spotnz.com/"><img class="img-responsive"
						width="160px" style="padding: 3px;  display: inline;background-color: #354041;"
						src="images/sponsors/spotnzlogo.png" /></a> <a
						href="http://www.macpac.co.nz/"><img class="img-responsive"
						width="160px" style="padding: 3px; display: inline;"
						src="images/sponsors/macpac.png" /></a>
				</div>
			</div>
		</div>
	</div>

</div>