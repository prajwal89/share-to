<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

include 'vendor/autoload.php';

use Prajwal89\ShareTo;

echo '<hr><p>Get all available buttons</p> ';
$share = new ShareTo('McqMate - MCQ Portal for Students', 'https://mcqmate.com/');
echo $share->all()->getButtons();


echo '<hr><p>Get single button</p> ';
$share2 = new ShareTo('McqMate - MCQ Portal for Students', 'https://mcqmate.com/');
echo $share2->whatsapp()->getButtons();


echo '<hr><p>Get multiple buttons</p> ';
$share3 = new ShareTo('McqMate - MCQ Portal for Students', 'https://mcqmate.com/');
echo $share3->whatsapp()->twitter()->getButtons();


echo '<p style="text-align: center">OR</p>';
$share4 = new ShareTo('McqMate - MCQ Portal for Students', 'https://mcqmate.com/');
echo $share4->only(['whatsapp', 'twitter'])->getButtons();


echo '<hr><p>Get all links</p> ';
$share4 = new ShareTo('McqMate - MCQ Portal for Students', 'https://mcqmate.com/');
$links = $share4->all()->getRawLinks();
print("<pre>" . print_r($links, true) . "</pre>");