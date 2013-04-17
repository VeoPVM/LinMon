<?php
function getVersion() {
    $version = file_get_contents("version");

    if (!$version) {
        return "Error getting version \n";
    }

    return $version;
}
?>