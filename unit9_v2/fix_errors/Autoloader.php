<?php

declare(strict_types=1);

/**
 * Class auto loader
 */
class Autoloader {

    /**
     * Register function for requiring needed PhP files
     *
     * @return void
     */
    public static function registerAutoload(): void {
        spl_autoload_register(static function ($class) {
            $file1 = ROOT . DS . str_replace('\\', DS, $class) . '.php';
            $file2 = ROOT . DS . 'ShopProduct' . DS . str_replace('\\', DS, $class) . '.php';

            $files = [$file1, $file2];

            foreach ($files as $f) {
                if (file_exists($f)) {
                    require $f;

                    return true;
                }
            }

            return false;
        });
    }

}
