<?php

namespace TrytoMediaServer;

/**
 * Autoload.
 */
class Autoloader
{
    /**
     * Autoload root path.
     *
     * @var string
     */
    protected static $_autoloadRootPath = '';

    /**
     * Set autoload root path.
     *
     * @param string $root_path
     * @return void
     */
    public static function setRootPath($root_path)
    {
        self::$_autoloadRootPath = $root_path;
    }

    /**
     * Load files by namespace.
     *
     * @param string $name
     * @return boolean
     */
    public static function loadByNamespace($name)
    {
        $class_path = str_replace('\\', DIRECTORY_SEPARATOR, $name);
        if (strpos($name, 'TrytoMediaServer\\') === 0) {
            $class_file = __DIR__ . substr($class_path, strlen('TrytoMediaServer')) . '.php';
        } else {
            if (self::$_autoloadRootPath) {
                $class_file = self::$_autoloadRootPath . DIRECTORY_SEPARATOR . $class_path . '.php';
            }
            if (empty($class_file) || !is_file($class_file)) {
                $class_file = __DIR__ . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . "$class_path.php";
            }
        }

        if (is_file($class_file)) {
            require_once $class_file;
            if (class_exists($name, false)) {
                return true;
            }
        }
        return false;
    }
}

spl_autoload_register('\TrytoMediaServer\Autoloader::loadByNamespace');
