<?php
$path = ini_get('inclued.dumpdir');
if ($path && is_dir($path)) {

    echo "Path: $path", PHP_EOL;

    $inclues = new GlobIterator($path . DIRECTORY_SEPARATOR . 'inclued*');

    if ($inclues->count() === 0) {
            echo 'No clues today', PHP_EOL;
            exit;
        }

    foreach ($inclues as $inclue) {
    
            echo 'Inclued file: ', $inclue->getFilename(), PHP_EOL;
    
            $data = file_get_contents($inclue->getPathname());
            if ($data) {
                $inc = unserialize($data);
                echo ' -- filename: ', $inc['request']['SCRIPT_FILENAME'], PHP_EOL;
                echo ' -- number of includes: ', count($inc['includes']), PHP_EOL;
                print_r($inc);
                echo PHP_EOL;
            }
            echo PHP_EOL;
        }
} else {
    echo 'I am totally clueless today.', PHP_EOL;
    }
?>
