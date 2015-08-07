<?php
include 'autoload.php';
include 'Behat/vendor/autoload.php';

define('BEHAT_VERSION','2.5.5');

$app = new Behat\Behat\Console\BehatApplication(BEHAT_VERSION);
$app->run();

