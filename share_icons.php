<style>
.share-icon-block {
	white-space: nowrap;
	display: inline;
	/* position: absolute; 
	
	top: 10px;
	right: 5px;
	width: 40px;
	height: 160px;
	text-align: right; */
}

.share-icon {
	display: inline-block;
	margin: 4px;
	width: 32px;
	height: 32px;
	cursor: pointer;
	vertical-align: middle;
	background-image: url(/images/logos/share-icons.png);
	/* float: right; */
}

.share-twitter {
	background-position: -40px 0;
}

a.share-twitter:hover {
	background-position: -40px -40px;
}

.share-facebook {
	background-position: 0 0;
}

a.share-facebook:hover {
	background-position: 0 -40px;
}

.share-youtube {
	background-position: -200px 0;
}

a.share-youtube:hover {
	background-position: -200px -40px;
}
</style>


<div class="row">
<div class="col-xs-12 col-sm-4 col-md-0">
</div>
	<div class="col-xs-12 col-sm-4 col-md-12 text-center">
		<button class="register-button btn btn-primary btn-lg"
			onClick="loadmaincontent('enter.php')">Register Now</button>
	</div>
	<div class="col-xs-12 col-sm-4 col-md-12 share-icon-block text-center">

		<a class="share-icon share-facebook" target="_blank"
			href="http://www.facebook.com/aorangiundulator"
			title="Undulator on Facebook"></a>
		<!--  <a
		class="share-icon share-facebook" target="_blank"
		href="https://www.facebook.com/groups/1548916308660466/"
		title="A100 on Facebook"></a> -->
		<a class="share-icon share-twitter" target="_blank"
			href="https://twitter.com/intent/follow?region=follow_link&screen_name=undulator0109&tw_p=followbutton"
			title="Follow on Twitter"></a> <a class="share-icon share-youtube"
			target="_blank" href="http://www.youtube.com/watch?v=x3mVNYRViv4"
			title="Undulator on YouTube"></a>

	</div>
</div>