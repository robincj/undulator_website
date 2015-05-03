<?php include 'piwik_track.php'?>
<?php

include_once 'php/createthumbs.php';

$originals = "images/photos/originals";
$photodir = "images/photos";
$thumbdir = "images/photos/thumbs";
createThumbs ( $originals, $photodir, 1140 );
createThumbs ( $originals, $thumbdir, 100 );
echo "<div>";
include 'js/jssor_bootstrap/php/jssor_image-gallery.php';
echo "</div>";

?>