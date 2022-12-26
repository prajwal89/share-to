<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);


include 'vendor/autoload.php';

use Prajwal89\ShareTo;

$share_to = new ShareTo('title', 'url');

echo $share_to->all()->getButtons();
