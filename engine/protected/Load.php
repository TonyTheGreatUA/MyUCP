<?php
/*
* MyUCP
*/

class Load
{
    /**
     * @var Application
     */
	private $app;

    /**
     * Load constructor.
     */
	public function __construct()
    {
		$this->app = app();
	}

    /**
     * @return array
     * @throws DebugException
     */
	public function model()
    {
		$names = func_get_args();

		$loaded = [];

		foreach($names[0] as $name) {
			if(!file_exists($this->app->appPath('models' . DIRECTORY_SEPARATOR . $name . 'Model.php'))) {
			    if(!file_exists($this->app->appPath('models' . DIRECTORY_SEPARATOR . $name . '.php')))
                    throw new DebugException("Не удалось загрузить модель [{$name}]");

                require_once($this->app->appPath('models' . DIRECTORY_SEPARATOR . $name . '.php'));

                if(class_exists($name)){
                    $this->app->$name = new $name($this->app);
                    $loaded[] = $this->app->$name;
                }
            } else {
                if(!file_exists($this->app->appPath('models' . DIRECTORY_SEPARATOR . $name . 'Model.php')))
                    throw new DebugException("Не удалось загрузить модель [{$name}Model]");

                require_once($this->app->appPath('models' . DIRECTORY_SEPARATOR . $name . 'Model.php'));

                $modelClass = $name . "Model";

                if(class_exists($modelClass)){
                    $this->app->$modelClass = new $modelClass($this->app);
                    $loaded[] = $this->app->$modelClass;
                }
            }
		}

		return $loaded;
	}

    /**
     * @return bool
     * @throws DebugException
     */
	public function library()
    {
		$names = func_get_args();

		foreach($names[0] as $name){
			$libClass = $name . 'Library';
			$libPath = ENGINE_DIR . 'lib/' . $name . '.php';
			
			if(is_readable($libPath)){
				require_once($libPath);
			} else {
				throw new DebugException('Ошибка: Не удалось загрузить библиотеку ' . $name . '!');
			}
		}

		return true;
	}

    /**
     * @return bool
     */
	public function inject()
    {
		$names = func_get_args();

		foreach($names[0] as $name){
			if(class_exists($name)){
				$this->app->$name = new $name($this->app);
			}
		}

		return true;
	}
}