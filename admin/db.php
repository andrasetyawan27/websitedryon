<?php

require __DIR__ . '/vendor/autoload.php';

use Kreait\Firebase\Factory;

$factory = (new Factory())
    ->withServiceAccount('laundry.json')
    ->withDatabaseUri('https://laundryandrasetyawan-default-rtdb.asia-southeast1.firebasedatabase.app/');
/*  
    withServiceAccount dari config API Firebase
    withDatabaseUri dari utl database Firebase
*/

$database = $factory->createDatabase();