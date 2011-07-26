<?php
$path = ini_get('inclued.dumpdir');
$filename = isset($argv[1]) ? $argv[1] : false;

if($path && is_dir($path) && is_file($path.$filename)) {
    $data = file_get_contents($path.$filename);
    $inclued = unserialize($data);
    print_r($inclued['classes']);
    echo PHP_EOL;
}
?>
