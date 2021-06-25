<?php
file_exists('piwik_track.php') ? include 'piwik_track.php' : include '../piwik_track.php';
file_exists('config.php') ? require_once 'config.php' : (file_exists('../config.php') ? require_once '../config.php' : require_once '../../config.php');
file_exists('php/lib') ? require_once 'php/lib/string_functions.php' : (file_exists('lib') ? require_once 'lib/string_functions.php' : (file_exists('../lib') ? require_once '../lib/string_functions.php' : require_once '../../lib/string_functions.php'));

?>