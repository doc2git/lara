<?php
use Illuminate\Database\Capsule\Manager;
require __DIR__.'/../vendor/autoload.php';
$app = new Illuminate\Container\Container;
with(new Illuminate\Events\EventServiceProvider($app))->register();
with(new Illuminate\Routing\RoutingServiceProvider($app))->register();
$manager = new Manager();
$manager->addConnection(require '../config/database.php');
$manager->bootEloquent();
require __DIR__.'/../app/Http/routes.php';
$request = Illuminate\Http\Request::createFromGlobals();
$request = $app['router']->dispatch($request);
$request->send();
