<?php
/*
|--------------------------------------------------------------------------
| Пути к классам
|--------------------------------------------------------------------------
|
| Список классов в виде ключей массива и путей к их файлам в виде значений
|
*/

return [
	'Logs'	=>	'engine/protected/logs.php',
	'Registry'	=>	'engine/protected/registry.php',
	'Config'	=>	'engine/protected/config.php',
	'Request'	=>	'engine/protected/Request/Request.php',
	'File'		=>	'engine/protected/Request/File.php',
	'Cookie'	=>	'engine/protected/Request/Cookie.php',
	'Session'	=>	'engine/protected/session.php',
	'Response'	=>	'engine/protected/response.php',
	'Document'	=>	'engine/protected/document.php',
	'Builder'	=>	'engine/protected/Database/Builder.php',
	'DB'		=>	'engine/protected/Database/DB.php',
	'mysqlDriver'=>	'engine/protected/Database/drivers/mysql.php',
	'pdoDriver'=>	'engine/protected/Database/drivers/pdo.php',
	'Load'		=>	'engine/protected/Load.php',
	'Router'	=>	'engine/protected/Router/Router.php',
	'Route'		=>	'engine/protected/Router/Route.php',
	'HttpException'=>'engine/protected/Router/HttpException.php',
	'Controller'=> 	'engine/protected/Controller/Controller.php',
	'Model'		=>	'engine/protected/Model/Model.php',
	'View'		=>	'engine/protected/Views/View.php',
	'Zara'		=>	'engine/protected/Views/Zara/Zara.php',
	'ZaraCompiler'=>'engine/protected/Views/Zara/ZaraCompiler.php',
	'ZaraFactory'=>	'engine/protected/Views/Zara/ZaraFactory.php',
	'Debug'		=>	'engine/protected/Debug/Debug.php',
	'DebugException'=>	'engine/protected/Debug/DebugException.php',
	'Dumper'	=>	'engine/protected/Helpers/Dumper.php',
];