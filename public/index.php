<?php

require '../vendor/autoload.php';

$app = new Martians\Mars\Application;

$container = $app->getContainer();

$container['config'] = function () {
  return [
    'db_driver' => 'mysql'
  ];
};

$app->get('/', function () {
   echo 'home';
});

$app->get('/contact', function () {
    echo 'contact';
});

$app->run();

//var_dump($container);
/*echo '<br/>';
var_dump($container);*/
