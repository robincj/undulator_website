<?php
$piwik = 'piwik_track.php';
$piwik = file_exists($piwik) ? $piwik : (file_exists("../$piwik") ? "../$piwik" : (file_exists("../../$piwik") ? "../../$piwik" : ''));
include $piwik;
$configFile = file_exists('config.php') ? 'config.php' : (file_exists('../config.php') ? '../config.php' : '../../config.php');
require_once $configFile;
$stringFuncFile = file_exists('php/lib') ? 'php/lib/string_functions.php' : (file_exists('lib') ? 'lib/string_functions.php' : (file_exists('../lib') ? '../lib/string_functions.php' : '../../lib/string_functions.php'));
require_once $stringFuncFile;
?>