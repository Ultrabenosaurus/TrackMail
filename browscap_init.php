<?php
// file_put_contents("./database-log", "test", FILE_APPEND);

require 'browscap.php';
use phpbrowscap\Browscap;
$bc = new Browscap('./phpbrowscap');
echo "<pre>" . print_r($bc->getBrowser(), true) . "</pre>";

?>