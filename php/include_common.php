<?php
if (! function_exists('findFile')) {

    function findFile($fileName)
    {
        return file_exists($fileName) ? $fileName : (file_exists("../$fileName") ? "../$fileName" : (file_exists("../../$fileName") ? "../../$fileName" : (file_exists("../../../$fileName") ? "../../../$fileName" : '')));
    }
}

include findFile('piwik_track.php');
require_once findFile('config.php');
require_once findFile('php/lib/string_functions.php');
?>