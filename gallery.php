<?php include 'piwik_track.php'?>
<?php

include_once 'php/createthumbs.php';

$originals = "images/photos/originals";
$photodir = "images/photos";
$thumbdir = "images/photos/thumbs";
createThumbs ( $originals, $photodir, 600 );
createThumbs ( $originals, $thumbdir, 100 );
echo "<div>";
// include 'js/jssor_bootstrap/php/jssor_image-gallery.php';
include 'tiler/tiler.php';
$tiler = new Tiler ();
$tiler->photodir = $photodir;
$tiler->photodir_url = "/images/photos";
$tiler->show ();
echo "</div>";

?>
<br />
<div class="bordered-box text-center">

	<p>More photos can be viewed here:
	<ul>
		<li><a
			href='https://www.flickr.com/photos/96525237@N08/sets/72157634894768852/'
		>Flickr</a></li>
		<li>The <a href='https://www.facebook.com/groups/1548916308660466/'>Aorangi
				Undulator 100 Facebook page</a>
		</li>
		<li><a
			href='https://www.facebook.com/pav.kotarba/media_set?set=a.10154875353490287.626285286&type=3'
		>Pavel's Facebook page</a></li>
		<li><a href='https://www.dropbox.com/l/3CzfVe7fseKF2ATSC21Inn'>Anne
				Rose's Dropbox</a></li>
	</ul>
	</p>

</div>