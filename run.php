<?php

require_once __DIR__.'/vendor/autoload.php';

$kiyoshiApp = new \Quartet\WorkflowerExample\KiyoshiApp();
$output = $kiyoshiApp->run();

echo implode(' ', $output)."\n";
