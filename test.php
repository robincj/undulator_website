<?php
include 'php/createthumbs.php';
$originals = "images/photos/originals";
$photodir = "images/photos";
$thumbdir = "images/photos/thumbs";
createThumbs ( $originals, $photodir, 1140 );
createThumbs ( $originals, $thumbdir, 100 );