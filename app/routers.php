<?php
/*
|--------------------------------------------------------------------------
| Маршрутизация
|--------------------------------------------------------------------------
|
| Укажите пути маршрутизации и какие контроллеры будут выполняться вместе
| с их параметрами и так же действиями которые они должны выполнять
|
*/
//
//Router::any("/", function() {
//	return view("welcome");
//});

Router::any("/", "HomeController@welcome");