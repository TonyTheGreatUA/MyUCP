<?php

namespace MyUCP\Debug;

use Error;
use Exception;
use MyUCP\Foundation\Application;

class HandleExceptions
{
    /**
     * @var Application
     */
    protected $app;

    /**
     * @param Application $app
     */
    public function make(Application $app)
    {
        $this->app = $app;

        error_reporting(-1);

        set_error_handler([$this, 'handleError']);

        set_exception_handler([$this, 'handleException']);

        register_shutdown_function([$this, 'handleShutdown']);

        if(! config('debug_mode', true)) {
            ini_set('display_errors', 'Off');
        }
    }

    /**
     * @param $level
     * @param $message
     * @param string $file
     * @param int $line
     * @param array $context
     */
    public function handleError($level, $message, $file = '', $line = 0, $context = [])
    {
        if (error_reporting() & $level) {
            exit(new Debug($message, $file, $line));
        }
    }

    /**
     * @param $e
     */
    public function handleException($e)
    {
        if($e instanceof Exception) {
            exit(new Debug($e->getMessage(), $e->getFile(), $e->getLine(), $e->getCode(), $e->getTrace()));
        }

        if($e instanceof Error) {
            exit(new Debug($e->getMessage(), $e->getFile(), $e->getLine(), $e->getCode(), $e->getTrace()));
        }
    }

    /**
     *
     */
    public function handleShutdown()
    {
        if (!is_null($error = error_get_last()) && $this->isFatal($error['type'])) {
            exit(new Debug($error['message'], $error['file'], $error['line'], $error['type']));
        }
    }

    /**
     * Determine if the error type is fatal.
     *
     * @param  int  $type
     * @return bool
     */
    protected static function isFatal($type)
    {
        return in_array($type, [E_COMPILE_ERROR, E_CORE_ERROR, E_ERROR, E_PARSE]);
    }
}