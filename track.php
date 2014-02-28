<?php
require 'database.php';
require 'browscap.php';
use phpbrowscap\Browscap;

header('Content-Type: image/png');
echo base64_decode('iVBORw0KGgoAAAANSUhEUgAAAAEAAAABAQMAAAAl21bKAAAAA1BMVEUAAACnej3aAAAAAXRSTlMAQObYZgAAAApJREFUCNdjYAAAAAIAAeIhvDMAAAAASUVORK5CYII=');

if((isset($_GET["batch"]) && !empty($_GET["batch"])) && (isset($_GET["email"]) && !empty($_GET["email"]))){
	$bc = new Browscap('./phpbrowscap');
	$current_browser = $bc->getBrowser();
	$client = $current_browser->Parent;
	$platform = ((isset($current_browser->Platform_Description)) ? $current_browser->Platform_Description : $current_browser->Platform);

	$db = new db(json_encode($_GET["batch"]), json_encode($_GET["email"]), $client, $platform);
}

?>