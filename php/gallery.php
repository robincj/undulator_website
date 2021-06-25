<?php require('include_common.php'); ?>
<?php

include_once 'php/lib/createthumbs.php';

$page = 1;

if (isset ( $_REQUEST ['gallerypage'] )) {
	$page = $_REQUEST ['gallerypage'];
}

$years = [ 2015, 2018, 2020 ];
$year = 2015;
if (!empty($_REQUEST ['year'])) {
	$year = $_REQUEST ['year'];
}

$originals = "images/photos/$year/originals";
$photodir = "images/photos/$year";
$thumbdir = "images/photos/$year/thumbs";
createThumbs ( $originals, $photodir, 600 );
createThumbs ( $originals, $thumbdir, 100 );

// include 'js/jssor_bootstrap/php/jssor_image-gallery.php';
include 'tiler/tiler.php';
$tiler = new Tiler ( array (
		'photodir' => $photodir,
		'photodirUrl' => "/$photodir",
		'maxPerPage' => 16 
) );

$numPages = $tiler->getNumberOfPages ();
echo "<div> <h3> $year Gallery </h3>";
$ylinks = array ();
foreach ( $years as $y ) {
	if ($y != $year)
		$ylinks [] = "<a href='javascript:void(0)' onclick='loadmaincontent(\"gallery.php?year=$y\");'> $y </a>";
}
if ($ylinks)
	echo "Other years: " . implode ( " | ", $ylinks );

echo "<h4> Gallery Pages: </h4>";
$links = array ();
if ($page > 1) {
	$url = "gallery.php?gallerypage=" . ($page - 1) . "&year=$year";
	$links [] = "<a href='javascript:void(0)' onclick='loadmaincontent(\"$url\");'> &lt; </a>";
} else
	$links [] = "&lt;";

foreach ( range ( 1, $numPages ) as $p ) {
	$url = "gallery.php?gallerypage=$p&year=$year";
	if ($page == $p)
		$links [] = "<b>$p</b>";
	else
		$links [] = "<a href='javascript:void(0)' onclick='loadmaincontent(\"$url\");'>$p</a>";
}

if ($page < $numPages) {
	$url = "gallery.php?gallerypage=" . ($page + 1) . "&year=$year";
	$links [] = "<a href='javascript:void(0)' onclick='loadmaincontent(\"$url\");'> &gt; </a>";
} else
	$links [] = "&gt;";

echo implode ( " | ", $links );

echo "</div>";
echo "<div>";
$tiler->showPage ( $page );
echo "</div>";

?>
<br />
<div class="bordered-box text-center">

	<p>More photos can be viewed here:
	
	
	<ul>
		<li><a
			href='https://www.flickr.com/photos/96525237@N08/sets/72157634894768852/'>Flickr</a></li>
		<li>The <a href='https://www.facebook.com/groups/1548916308660466/'>Aorangi
				Undulator 100 Facebook page</a>
		</li>
		<li><a
			href='https://www.facebook.com/pav.kotarba/media_set?set=a.10154875353490287.626285286&type=3'>Pavel's
				Facebook page</a></li>
		<li><a href='https://www.dropbox.com/l/3CzfVe7fseKF2ATSC21Inn'>Anne
				Rose's Dropbox</a></li>
	</ul>

</div>
