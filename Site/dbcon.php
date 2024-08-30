<?php
require(__DIR__.'/vendor/autoload.php');
use Kreait\Firebase\Factory;

$factory = (new Factory())
    ->withServiceAccount('e-learning-1f3f9-firebase-adminsdk-p714j-533bf8f15d.json')
    ->withDatabaseUri('https://e-learning-1f3f9-default-rtdb.firebaseio.com/');

$database = $factory->createDatabase();
?>